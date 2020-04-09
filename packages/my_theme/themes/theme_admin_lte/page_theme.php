<?php   
namespace Concrete\Package\MyTheme\Theme\ThemeAdminLte;

use Concrete\Core\Page\Theme\Theme;
class PageTheme extends Theme {

    public function getThemeName()
    {
        return t('Theme Admin LTE');
    }

    public function getThemeDescription()
    {
        return t('Simplicity. Designed.');
    }

}
