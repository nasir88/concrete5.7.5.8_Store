<?php 
namespace Concrete\Package\MyTheme;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

    protected $pkgHandle = 'my_theme';
    protected $appVersionRequired = '5.7.4.2';
    protected $pkgVersion = '2.3.0.1';
    protected $pkgAllowsFullContentSwap = false;

    public function getPackageName() {
        return t("My Theme LTE");
    }

    public function getPackageDescription() {
        return t("Simplicity. Designed.");
    }

    public function install() {
        $pkg = parent::install();
        Theme::add('theme_admin_lte', $pkg);
        Theme::add('theme_nsr', $pkg);
    }
	
}
