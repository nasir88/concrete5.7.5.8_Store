<?php
//Add By Nasir
//namespace Concrete\Controller\SinglePage\Account;
namespace Application\Controller\SinglePage\Account;

use Concrete\Controller\SinglePage\Account\EditProfile as AccountProfileEditPageController;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as URLTheme;

class Avatar extends AccountProfileEditPageController
{

    public function view()
    {
        parent::view();
        $this->requireAsset('javascript', 'swfobject');
    }

    public function save_thumb()
    {
        $this->view();
        $token = $this->app->make('token');

        if (!$token->validate('avatar/save_thumb')) {
            return false;
        }


        $profile = $this->get('profile');
        if (!is_object($profile) || $profile->getUserID() < 1) {
            return false;
        }

        if (isset($_POST['thumbnail']) && strlen($_POST['thumbnail'])) {
            $thumb = base64_decode($_POST['thumbnail']);
            $image = \Image::load($thumb);
            $profile->updateUserAvatar($image);
        }

		//Add By Nasir
		$URLTheme = new URLTheme();
		$myURLAccount = $URLTheme->myURLAccount();
        $this->redirect('/'.$myURLAccount.'/avatar', 'saved');
    }

    public function saved()
    {
        $this->set('success', 'Avatar updated!');
        $this->view();
    }

    public function deleted()
    {
        $this->set('success', 'Avatar removed.');
        $this->view();
    }

    public function delete()
    {
        $this->view();
        if (!$this->token->validate('delete_avatar')) {
            $this->error->add($this->token->getErrorMessage());
        }
        if (!$this->error->has()) {
            $profile = $this->get('profile');
            $av = $this->get('av');

            $service = \Core::make('user.avatar');
            $service->removeAvatar($profile);
			
			//Add By Nasir
			$URLTheme = new URLTheme();
			$myURLAccount = $URLTheme->myURLAccount();
            $this->redirect('/'.$myURLAccount.'/avatar', 'deleted');
        }
    }

}
