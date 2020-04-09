<?php      
namespace Concrete\Package\NsrSiteLogo\Src;

use Concrete\Core\Foundation\Object as Object;
use Database;
use Config;
use Loader;
use Package;
use Exception;

defined('C5_EXECUTE') or die(_("Access Denied."));
class SiteLogoSRC extends Object
{

	//Package Name Handle
	public static function PackageNameHandle()
	{
		$PackageNameHandle = 'nsr_site_logo';
		return $PackageNameHandle;
	}
	
	//Path
	public static function PackagePathCSS()
    {
		$pkg=Package::getByHandle(self::PackageNameHandle());
		$pkg_url_css = $pkg->getRelativePath(). '/tools/css/';
		return $pkg_url_css;
	}
	
	public static function PackagePathImage()
    {
		$pkg=Package::getByHandle(self::PackageNameHandle());
		$pkg_url_img = $pkg->getRelativePath(). '/tools/image/';
		return $pkg_url_img;
	}
	
	public static function PackageUploadPathImage()
    {
		$pkg=Package::getByHandle(self::PackageNameHandle());
		$pkg_url_img =  'packages\\'.self::PackageNameHandle().'\\tools\\image\\';
		return $pkg_url_img;
	}
	
	//Query
	public static function getAllDataByPK()
    {
		$iPK_SiteLogo = '1';
		
		$db = Loader::db();
		$q = "SELECT * FROM nsr_sitelogo WHERE iPK_SiteLogo = '{$iPK_SiteLogo}'";
		$r = $db->query($q);
		if ($r) {
			$row = $r->fetchRow();

			$iPK_SiteLogo = $row['iPK_SiteLogo'];
			$imageFileMini = $row['imageFileMini'];
			$imageFile = $row['imageFile'];
		}
	
		$DisplayData = array(
            "iPK_SiteLogo" => $iPK_SiteLogo,
            "imageFileMini" => $imageFileMini,
            "imageFile" => $imageFile
        );
		
        return $DisplayData;
	}
	
	
}