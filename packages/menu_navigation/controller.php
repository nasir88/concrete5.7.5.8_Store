<?php
//Package Name		: Menu Navigation
//Package Handle	: menu_navigation
     
namespace Concrete\Package\MenuNavigation;
use Package;
use BlockType;
use SinglePage;
use BlockTypeSet;
use View;
use Loader;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

	protected $pkgHandle = 'menu_navigation';
	protected $appVersionRequired = '5.7.4';
	protected $pkgVersion = '1.2';
			
 	
	public function getPackageName() 
	{
		return t("Menu Navigation.");
	}

	public function getPackageDescription() 
	{
		return t("Creates Menu Navigation Trees & Sitemaps.");
	}

	public function install() 
	{
		$pkg = parent::install();
		
		// install block
		BlockType::installBlockTypeFromPackage('menu_navigation', $pkg);
		
		return $pkg;
	}
	
	public function uninstall() 
	{
		parent::uninstall();
	}

}