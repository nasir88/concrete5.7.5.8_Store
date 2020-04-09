<?php 
namespace Concrete\Package\LoginPageBackground;

use SinglePage;

/*
Login Page Background by Karl Dilkington (aka MrKDilkington)
This software is licensed under the terms described in the concrete5.org marketplace.
Please find the add-on there for the latest license copy.
*/

class Controller extends \Concrete\Core\Package\Package
{

    protected $pkgHandle = 'login_page_background';
    protected $appVersionRequired = '5.7.5RC1';
    protected $pkgVersion = '0.9';

    public function getPackageDescription()
    {
        return t('Customize the login page background image.');
    }

    public function getPackageName()
    {
        return t('Login Page Background');
    }

    public function install()
    {
        $pkg = parent::install();

        SinglePage::add('/dashboard/system/basics/login_page_background', $pkg);
    }

}