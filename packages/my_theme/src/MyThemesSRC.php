<?php      
namespace Concrete\Package\MyTheme\Src;

use Concrete\Core\Foundation\Object as Object;
use Database;
use Config;
use Loader;
use Package;
use Exception;

defined('C5_EXECUTE') or die(_("Access Denied."));
class MyThemesSRC extends Object
{

	//Package Name Handle
	public static function PackageNameHandle()
	{
		$PackageNameHandle = 'my_theme';
		return $PackageNameHandle;
	}
	
	//Path
	public static function PackagePathTools()
    {
		$pkg=Package::getByHandle(self::PackageNameHandle());
		$pkg_url_tools = $pkg->getRelativePath(). '/tools';
		return $pkg_url_tools;
	}
		
}