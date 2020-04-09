<?php      
namespace Concrete\Package\NsrSiteLogo;
use Package;
use BlockType;
use SinglePage;
use View;
use Loader;
use Route;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends Package {

	protected $pkgHandle = 'nsr_site_logo';
	protected $appVersionRequired = '5.7.4';
	protected $pkgVersion = '1.0.0';
			
	public function getPackageName() 
	{
		return t("NSR : Site Logo");
	}

	public function getPackageDescription() 
	{
		return t("Logo For Theme Admin");
	}

	public function install() 
	{
		$pkg = parent::install();

		//Install Block
		//BlockType::installBlockTypeFromPackage('hw_simple_testimonials', $pkg);
		
		//Install Dashboard Pages
		$page1 = SinglePage::add('/dashboard/system/basics/sitelogo', $pkg);
        $page1->updateCollectionName(t('Site Logo'));		
		
		//$page2 = SinglePage::add('/dashboard/hw_simple_testimonials/addtestimonials', $pkg);
		//$page2->updateCollectionName(t('Add Testimonial'));
		
		$db = Loader::db();
		$db->Execute("INSERT INTO nsr_sitelogo (iPK_SiteLogo,imageFileMini,imageFile) VALUES ('1','myLogoMini.png','myLogo.png')");

				
		return $pkg;
	}
	
	public function uninstall() {
		parent::uninstall();
		$db = Loader::db();
		$db->Execute('DROP TABLE nsr_sitelogo');
	}

}