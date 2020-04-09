<?php   
namespace Concrete\Package\MyTheme\Theme\ThemeNsr;

use Concrete\Core\Page\Theme\Theme;
class PageTheme extends Theme {
	
    public function getThemeName()
    {
        return t('Theme NSR');
    }

    public function getThemeDescription()
    {
        return t('For Simple eCommerce');
    }

}
