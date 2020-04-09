<?php 
namespace Concrete\Package\OverrideCore;

use Exception;
use Package;
use View;
use Loader;
use Page;
use PageTheme;
use Events;
use Environment;
use Route;
use User;
use Core;

//Add By Nasir
use \Application\Controller\MyControllers\MyTheme as ThemeHandle;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package
{

    protected $pkgHandle = 'override_core';
    protected $appVersionRequired = '5.7.4.2';
    protected $pkgVersion = '1.0.0';

    public function getPackageName() {
        return t("Override Core");
    }

    public function getPackageDescription() {
        return t("Override Designed.");
    }
	
	function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {
			$pageURL .= "s";
		}
		
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		
		return $pageURL;
	}
	
	function CheckOnPageURLForThemeAdminLte() {
	
		$curPageURL = $this->curPageURL();
		$ThemeHandle = new ThemeHandle();
		$myURLThemeDashboard = $ThemeHandle->myURLThemeDashboard();
		$myURLThemeAdminLte = $ThemeHandle->myURLThemeAdminLte();

		if (strpos($curPageURL,$myURLThemeAdminLte) !== false){
			return '2'; 
		}else if (strpos($curPageURL,$myURLThemeDashboard) !== false) {
			return '1';
		}else{
			return '0'; 
		}
	
	}
	

	public function on_start()
    {      

		$objEnvOnPage = Environment::get();
		
		//////////////////////////////////////
		//UI - Login & Register/////////////// 
		//////////////////////////////////////
		$objEnvOnPage->overrideCoreByPackage('single_pages/login.php', $this);
		$objEnvOnPage->overrideCoreByPackage('authentication/concrete/form.php', $this);
		$objEnvOnPage->overrideCoreByPackage('authentication/concrete/forgot_password.php', $this);
		$objEnvOnPage->overrideCoreByPackage('single_pages/register.php', $this);
		
			
			
		//////////////////////////////////////
		//Panels////////////////////////////// 
		//////////////////////////////////////
		//Panels > Attributes
		$objEnvOnPage->overrideCoreByPackage('views/panels/page/attributes.php', $this);
		
		//Panels > Versions
		$objEnvOnPage->overrideCoreByPackage('views/panels/page/versions.php', $this);
		
		//Panels > Add
		$objEnvOnPage->overrideCoreByPackage('views/panels/add.php', $this);
		
		
		
		//////////////////////////////////////
		//Elements////////////////////////////
		//////////////////////////////////////
		//Elements > Permission > Block
		$objEnvOnPage->overrideCoreByPackage('elements/permission/lists/block.php', $this);
		
		//Elements > Block Header View
		//$objEnvOnPage->overrideCoreByPackage('elements/block_header_view.php', $this);
		
		
		//throw new Exception($this->CheckOnPageURLForThemeAdminLte());
		 
		if ($this->CheckOnPageURLForThemeAdminLte() == '0' || $this->CheckOnPageURLForThemeAdminLte() == '2' ) {

			//////////////////////////////////////
			//UI - System Error/////////////////// 
			//////////////////////////////////////
			//$objEnvOnPage->overrideCoreByPackage('elements/system_errors.php', $this);
			
			
			
			//////////////////////////////////////
			//UI - Template All Listing/////////// 
			//////////////////////////////////////
			$objEnvOnPage->overrideCoreByPackage('elements/search/template.php', $this);

			

			//////////////////////////////////////
			//UI - Account//////////////////////// 
			//////////////////////////////////////
			$objEnvOnPage->overrideCoreByPackage('single_pages/account/view.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/account/edit_profile.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/account/avatar.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/account/messages/inbox.php', $this);

			
			
			//////////////////////////////////////
			//Pages/////////////////////////////// 
			//////////////////////////////////////
			//UI - Dashboard > Sitemap
			$objEnvOnPage->overrideCoreByPackage('elements/pages/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/sitemap/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/sitemap/full.php', $this);
			
			
			
			//////////////////////////////////////
			//Users/////////////////////////////// 
			//////////////////////////////////////
			//UI - Dashboard > Users
			$objEnvOnPage->overrideCoreByPackage('elements/users/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/users/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/users/add.php', $this);
			
			//UI - Dashboard > Users > Groups
			$objEnvOnPage->overrideCoreByPackage('elements/group/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/users/groups.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/users/add_group.php', $this);
			
			
			
			//////////////////////////////////////
			//Files/////////////////////////////// 
			//////////////////////////////////////
			//UI - Dashboard > Files > File Manager
			$objEnvOnPage->overrideCoreByPackage('elements/files/search.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/files/search.php', $this);
			
			//UI - Dashboard > Files > Sets
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/files/sets.php', $this);
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/files/add_set.php', $this);
			
			//UI - Dashboard > Files > Allowed File Types
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/files/filetypes.php', $this);
			
			//UI - Dashboard > Files > File Manager Permissions
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/files/permissions.php', $this);
			
			
			
			//////////////////////////////////////
			//System & Setting//////////////////// 
			//////////////////////////////////////
			//UI - Dashboard > System & Setting > Basics > Name
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/basics/name.php', $this);
			
			//UI - Dashboard > System & Setting > Basics > Social Links
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/basics/social.php', $this);
			
			//UI - Dashboard > System & Setting > Basics > Bookmark Icons
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/basics/icons.php', $this);
			
			//UI - Dashboard > System & Setting > Login & Registration > Login Destination
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/registration/postlogin.php', $this);
			
			//UI - Dashboard > System & Setting > Login & Registration > Public Profiles
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/registration/profiles.php', $this);
			
			//UI - Dashboard > System & Setting > Login & Registration > Public Registration
			$objEnvOnPage->overrideCoreByPackage('single_pages/dashboard/system/registration/open.php', $this);
			
			
			
			//////////////////////////////////////
			//Dialogs/////////////////////////////
			//////////////////////////////////////
			//Dialogs > Design
			$objEnvOnPage->overrideCoreByPackage('views/dialogs/page/design.php', $this);
			
			//Dialogs > Search Customize
			$objEnvOnPage->overrideCoreByPackage('views/dialogs/search/customize.php', $this);
			
			
			
			//////////////////////////////////////
			//Elements/////////////////////////////
			//////////////////////////////////////
			//Elements > Permission > Page
			$objEnvOnPage->overrideCoreByPackage('elements/permission/lists/page.php', $this);
			
			//Elements > Permission > File
			$objEnvOnPage->overrideCoreByPackage('elements/permission/lists/file.php', $this);
			
			
			
			//////////////////////////////////////
			//Tools/////////////////////////////
			//////////////////////////////////////
			//Tools > Files > Permission
			$objEnvOnPage->overrideCoreByPackage('tools/files/permissions.php', $this);
	   
		}
		
    }
	
}
?>