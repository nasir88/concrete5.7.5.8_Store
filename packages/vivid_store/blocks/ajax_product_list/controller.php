<?php
namespace Concrete\Package\VividStore\Block\VividProductList;

use \Concrete\Core\Block\BlockController;
use Core;
use View;
use Page;
use Database;
use \Concrete\Package\VividStore\Src\VividStore\Product\ProductList as StoreProductList;
use \Concrete\Package\VividStore\Src\VividStore\Group\GroupList as StoreGroupList;

class controller extends BlockController
{
    protected $btTable = 'btVividStoreProductList';
    protected $btInterfaceWidth = "450";
    protected $btWrapperClass = 'ccm-ui';
    protected $btInterfaceHeight = "400";
    protected $btDefaultSet = 'vivid_store';

    public function getBlockTypeDescription()
    {
        return t("Add a Product List for Vivid Store");
    }

    public function getBlockTypeName()
    {
        return t("Product List");
    }
    
	public function add()
    {
        $this->requireAsset('css', 'select2');
        $this->requireAsset('javascript', 'select2');
        $this->getGroupList();
        $this->set('groupfilters', array());
    }
    
	public function edit()
    {
        $this->requireAsset('css', 'select2');
        $this->requireAsset('javascript', 'select2');
        $this->getGroupList();
        $this->set('groupfilters', $this->getGroupFilters());
    }

    public function getGroupFilters()
    {
        $db = Database::get();
        $vals = array($this->bID);
        $result = $db->getAll("SELECT gID FROM btVividStoreProductListGroups where bID = ?", $vals);

        $list = array();

        if ($result) {
            foreach ($result as $g) {
                $list[] = $g['gID'];
            }
        }

        return $list;
    }

    public function getGroupList()
    {
        $grouplist = StoreGroupList::getGroupList();
        $this->set("grouplist", $grouplist);
    }
    
	public function view()
    {
        $products = new StoreProductList();
        $sort = $this->sortOrder;
        if ($_GET['sort'.$this->bID]){
            $sort = $_GET['sort'.$this->bID];
        }
        $products->setSortBy($sort);

        if ($this->filter == 'current' || $this->filter == 'current_children') {
            $page = Page::getCurrentPage();
            $products->setCID($page->getCollectionID());

            if ($this->filter == 'current_children') {
                $products->setCIDs($page->getCollectionChildrenArray());
            }
        }


        if ($this->filter == 'page' || $this->filter == 'page_children') {
            if ($this->filterCID) {
                $products->setCID($this->filterCID);

                if ($this->filter == 'page_children') {
                    $targetpage = Page::getByID($this->filterCID);
                    if ($targetpage) {
                        $products->setCIDs($targetpage->getCollectionChildrenArray());
                    }
                }
            }
        }
        $products->setItemsPerPage($this->maxProducts);
        $products->setGroupIDs($this->getGroupFilters());
        $products->setFeatureType($this->showFeatured);
        $products->setShowOutOfStock($this->showOutOfStock);
        $products->setGroupMatchAny($this->groupMatchAny);
        $paginator = $products->getPagination();
        $pagination = $paginator->renderDefaultView();
        $products = $paginator->getCurrentPageResults();

        foreach ($products as $product) {
            $product->setInitialVariation();
        }

        $this->set('sort',$sort);
        $this->set('products', $products);
        $this->set('pagination', $pagination);
        $this->set('paginator', $paginator);

        //load some helpers
        $this->set('ih', Core::make('helper/image'));
        $this->set('th', Core::make('helper/text'));
        
        $this->requireAsset("css", "font-awesome");

        $js = \Concrete\Package\VividStore\Controller::returnHeaderJS();
        $this->requireAsset('javascript', 'jquery');
        $this->addFooterItem($js);
        $this->requireAsset('javascript', 'vivid-store');
        $this->requireAsset('css', 'vivid-store');
        $this->requireAsset('javascript', 'jplist.waypoints.min');
        $this->requireAsset('javascript', 'jplist.core.min');
        $this->requireAsset('javascript', 'jplist.sort-bundle.min');
        $this->requireAsset('javascript', 'jplist.textbox-filter.min');
        $this->requireAsset('javascript', 'jplist.history-bundle.min');
        $this->requireAsset('javascript', 'jplist.filter-toggle-bundle.min');
        $this->requireAsset('javascript', 'jplist.list-grid-view.min');
        $this->requireAsset('javascript', 'jplist.function');
        $this->requireAsset('css', 'jplist.core.min');
        $this->requireAsset('css', 'jplist.textbox-filter.min');
        $this->requireAsset('css', 'jplist.history-bundle.min');
        $this->requireAsset('css', 'jplist.filter-toggle-bundle.min');
        $this->requireAsset('css', 'jplist.list-grid-view.min');
        $this->requireAsset('css', 'jplist.style');
		
    }
    
	public function save($args)
    {
        $args['showOutOfStock'] = isset($args['showOutOfStock']) ? 1 : 0;
        $args['showDescription'] = isset($args['showDescription']) ? 1 : 0;
        $args['showQuickViewLink'] = isset($args['showQuickViewLink']) ? 1 : 0;
        $args['showPageLink'] = isset($args['showPageLink']) ? 1 : 0;
        $args['showAddToCart'] = isset($args['showAddToCart']) ? 1 : 0;
        $args['showLink'] = isset($args['showLink']) ? 1 : 0;
        $args['showButton'] = isset($args['showButton']) ? 1 : 0;
        $args['truncateEnabled'] = isset($args['truncateEnabled']) ? 1 : 0;
        $args['showPagination'] = isset($args['showPagination']) ? 1 : 0;
        $args['showSortOptions'] = isset($args['showSortOptions']) ? 1 : 0;

        $filtergroups = $args['filtergroups'];
        unset($args['filtergroups']);

        $db = Database::get();
        $vals = array($this->bID);
        $db->Execute("DELETE FROM btVividStoreProductListGroups where bID = ?", $vals);

        //insert  groups
        if (!empty($filtergroups)) {
            foreach ($filtergroups as $gID) {
                $vals = array($this->bID,(int)$gID);
                //Log::addEntry($vals);
                $db->Execute("INSERT INTO btVividStoreProductListGroups (bID,gID) VALUES (?,?)", $vals);
            }
        }

        parent::save($args);
    }
    
	public function validate($args)
    {
        $e = Core::make("helper/validation/error");
        $nh = Core::make("helper/number");
        if ($args['maxProducts'] < 1) {
            $e->add(t('Max Products must be at least 1'));
        }

        if (($args['filter'] == 'page' || $args['filter'] == 'page_children') && $args['filterCID'] <= 0) {
            $e->add(t('A page must be selected'));
        }

        if (!$nh->isInteger($args['maxProducts'])) {
            $e->add(t('Max Product must be a whole number'));
        }
        return $e;
    }

    public function action_update_sort()
    {
        $sortOrder = $this->post('sortOrder');
    }

}
