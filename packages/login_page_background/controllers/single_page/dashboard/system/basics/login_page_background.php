<?php 
namespace Concrete\Package\LoginPageBackground\Controller\SinglePage\Dashboard\System\Basics;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;
use File;

class LoginPageBackground extends DashboardPageController
{

    public function view()
    {
        $background_image = Config::get('login_page_background.background_image');

        $this->set('background_image', $background_image);

        $imageObject = false;
        if ($background_image) {
            $imageObject = File::getByID($background_image);
            if (!is_object($imageObject)) {
                unset($imageObject);
            }
        }

        $this->set('imageObject', $imageObject);
    }

    public function save_settings()
    {
        if ($this->token->validate('save_settings')) {
            if ($this->isPost()) {
                $background_image = $this->post('background_image');

                if ($background_image) {
                    $imageObject = File::getByID($background_image);

                    if (is_object($imageObject)) {
                        $background_image_url = $imageObject->getRelativePath();
                        Config::save('concrete.urls.background_url', $background_image_url);
                        Config::save('concrete.white_label.background_url', true);
                        Config::save('login_page_background.background_image', $background_image);
                    }

                } else {
                    Config::save('concrete.urls.background_url', null);
                    Config::save('concrete.white_label.background_url', false);
                    Config::save('login_page_background.background_image', null);
                }

                $this->set('message', t('Settings Saved'));
            }
        } else {
            $this->set('error', array($this->token->getErrorMessage()));
        }
    }

}