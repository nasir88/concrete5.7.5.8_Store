<?php   
namespace Concrete\Package\ThemeNSR\Theme\nsr;

use Concrete\Core\Page\Theme\Theme;
class PageTheme extends Theme {

	public function registerAssets() {
        $this->requireAsset('javascript', 'jquery');
	}
	
    public function getThemeName()
    {
        return t('NSR Theme');
    }

    public function getThemeDescription()
    {
        return t('For Simple eCommerce');
    }

}
