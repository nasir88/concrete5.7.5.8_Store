<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Dashboard\Files;
namespace Application\Controller\SinglePage\Dashboard\Files;

use \Concrete\Core\Page\Controller\DashboardPageController;
use User;
use FileSet;
use Loader;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class AddSet extends DashboardPageController
{

    public $helpers = array('form', 'validation/token', 'concrete/ui');

    public function do_add()
    {
        extract($this->getHelperObjects());


        if (!$validation_token->validate("file_sets_add")) {
            $this->error->add($validation_token->getErrorMessage());
            return;
        }

        if (!trim($this->post('file_set_name'))) {
            $this->error->add(t('Please Enter a Name'));
            return;
        }
        $setName = trim($this->post('file_set_name'));

        if (!$this->error->has()) {
            $fsOverrideGlobalPermissions = ($this->post('fsOverrideGlobalPermissions') == 1) ? 1 : 0;
            $fs = FileSet::add($setName, $fsOverrideGlobalPermissions);
			
			//Add By Nasir
			$URLTheme = new URLTheme();
			$myURLTheme = $URLTheme->myURLTheme();
            $this->redirect('/'.$myURLTheme.'/files/sets', 'file_set_added');
        }
    }

}
