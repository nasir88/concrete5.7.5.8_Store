<?php 
namespace Concrete\Package\ThemeNSR;

use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

    protected $pkgHandle = 'theme_nsr';
    protected $appVersionRequired = '5.7.4.2';
    protected $pkgVersion = '1.0.2';
    protected $pkgAllowsFullContentSwap = false;

    public function getPackageName() {
        return t("NSR Theme");
    }

    public function getPackageDescription() {
        return t("For Simple eCommerce.");
    }

    public function install() {
        $pkg = parent::install();
        Theme::add('nsr', $pkg);
    }


}
