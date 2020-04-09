<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage;
namespace Application\Controller\SinglePage;

use Page;
use \Concrete\Core\Page\Controller\AccountPageController;
class Account extends AccountPageController {

    public function save_complete() {
        $this->set('success', t('Profile updated successfully.'));
        $this->view();
    }

    public function view()
    {
        $c = Page::getCurrentPage();
        $pages = $c->getCollectionChildren();
        $this->set('pages', $pages);
    }
}