<?php
//Edit By Nasir
//namespace Concrete\Package\VividStore\Controller\SinglePage\Dashboard\Store;
namespace Application\Controller\SinglePage\Dashboard\Store;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Session;

use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountRule as StoreDiscountRule;
use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountCode as StoreDiscountCode;
use \Concrete\Package\VividStore\Src\VividStore\Discount\DiscountRuleList as StoreDiscountRuleList;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Discounts extends DashboardPageController
{
    public function view() {
        $discountRuleList = new StoreDiscountRuleList();
        $discountRuleList->setItemsPerPage(10);

        $paginator = $discountRuleList->getPagination();
        $pagination = $paginator->renderDefaultView();
        $this->set('discounts',$paginator->getCurrentPageResults());
        $this->set('pagination',$pagination);
        $this->set('paginator', $paginator);

        $this->set('pageTitle', t('Discount Rules'));
    }

    public function add() {
        $this->set('pageTitle', t('Add Discount Rule'));
    }

    public function edit($drID) {

        $discountRule = StoreDiscountRule::getByID($drID);

        $this->set('d', $discountRule);
        $this->set('pageTitle', t('Edit Discount Rule'));
    }

    public function codes($drID, $successcount = null) {
        $discountRule = StoreDiscountRule::getByID($drID);

        $this->set('d', $discountRule);
        if ($discountRule) {
            $this->set('codes', $discountRule->getCodes());
        }

        $this->set('pageTitle', t('Codes for discount rule') . ': ' . $discountRule->drName);

        if (!is_null($successcount)) {
            $this->set('successCount', $successcount);
        }

        if (is_array(Session::get('vividstore.failedcodes'))) {
            $this->set('failedcodes', Session::get('vividstore.failedcodes'));
            Session::set('vividstore.failedcodes',null);
        }
    }

    public function delete() {
	
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
		
        if ($this->isPost()) {
            $data = $this->post();
            $dr = StoreDiscountRule::getByID($data['drID']);

            if ($dr) {
                $dr->remove();
            }
			
            $this->redirect('/'.$myURLTheme.'/store/discounts/', 'deleted');
        }
		
        $this->redirect('/'.$myURLTheme.'/store/discounts/');
    }

    public function deletecode() {
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
		
        if ($this->isPost()) {
            $data = $this->post();
            $dc = StoreDiscountCode::getByID($data['dcID']);

            if ($dc) {
                $ruleid = $dc->drID;
                $dc->remove();
			
                $this->redirect('/'.$myURLTheme.'/store/discounts/codes/'. $ruleid);
            }
        }
		
        $this->redirect('/'.$myURLTheme.'/store/discounts/');
    }

    public function addcodes($drID) {
        if ($this->isPost()) {
            $data = $this->post();

            $codes = trim($data['codes']);

            if ($codes) {
                $codes = str_replace(",", "\n", $codes);
                $codes = explode("\n", $codes);

                $failed = array();
                $successcount = 0;

                foreach ($codes as $code) {
                    $code = trim($code);

                    if ($code) {
                        if (!StoreDiscountCode::add($drID, $code)) {
                            $failed[] = $code;
                        } else {
                            $successcount++;
                        }
                    }
                }
            }
        }

        if (!empty($failed)) {
            Session::set('vividstore.failedcodes', $failed);
        }
	
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
        $this->redirect('/'.$myURLTheme.'/store/discounts/codes/' . $drID, $successcount );
    }

    public function save()
    {
		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
		
        if ($this->isPost() ) {
            $data = $this->post();

            if($data['drID']){
                $this->edit($data['drID']);
            }

            $errors = StoreDiscountCode::validate($data);
            if (!$errors->has()) {

                $discountrule = StoreDiscountRule::save($data);

                if($data['drID']){
                    $this->redirect('/'.$myURLTheme.'/store/discounts/', 'updated');
                } else {

                    if ( $discountrule->drTrigger == 'code') {
                        $this->redirect('/'.$myURLTheme.'/store/discounts/codes/'. $discountrule->drID);
                    } else {
                        $this->redirect('/'.$myURLTheme.'/store/discounts/', 'success');
                    }
                }
           } else {
               $this->error = $errors;
           }
           //if no errors
        } // if post
    }

    public function success() {
        $this->set('success',"Discount Rule Added");
        $this->view();
    }

    public function updated() {
        $this->set('success',"Discount Rule Updated");
        $this->view();
    }

    public function deleted() {
        $this->set('success',"Discount Rule Deleted");
        $this->view();
    }

}
