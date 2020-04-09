<?php
namespace Application\Controller\MyControllers;

use Controller;
use Page;
use PageTheme;

class MyTheme extends Controller
{

	//Set Name Theme Handle = ThemeAdminLte
	public function ThemeAdminLte()
    {
		return 'theme_admin_lte';
	}
	
	//Set Name Theme Handle = ThemeNSR
	public function ThemeNSR()
    {
		return 'theme_nsr';
	}

	//Get Theme Handle From Page
	public function myThemeHandle()
    {
		$page = Page::getCurrentPage();
		$pageID = $page->getCollectionID();
		$PageAttr = Page::getByID($pageID);
		$PageThemeAttr = PageTheme::getByID($PageAttr->getCollectionThemeID());
		
		return $PageThemeAttr->getThemeHandle();
	}
	
    //Return URL By Theme
	public function myURLTheme()
    {	
		
		if ($this->myThemeHandle() === $this->ThemeAdminLte()) {
			$myURL = 'my-dashboard';
		}else{
			$myURL = 'dashboard';
		}
		return $myURL;
	}
	
	//Return URL By Account
	public function myURLAccount()
    {	
		
		if ($this->myThemeHandle() === $this->ThemeAdminLte()) {
			$myURLacc = 'account-1';
		}else{
			$myURLacc = 'account';
		}
		return $myURLacc;
	}
	
	//Set URL By Name Theme
	public function myURLThemeAdminLte()
    {
		return 'my-dashboard';
	}
	public function myURLThemeDashboard()
    {
		return 'dashboard';
	}
	
}

