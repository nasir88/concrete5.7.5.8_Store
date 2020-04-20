<?php 
namespace Concrete\Package\LandingPages;

use Package;
use BlockType;
use SinglePage;
use View;
use Loader;
use Route;

class Controller extends \Concrete\Core\Package\Package
{

    protected $pkgHandle = 'landing_pages';
    protected $appVersionRequired = '5.7.5.8';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t('Create Landing Pages.');
    }

    public function getPackageName()
    {
        return t('Landing Pages');
    }

	public function install() 
	{
		$pkg = parent::install();

		//Install Block
		//BlockType::installBlockTypeFromPackage('landing_pages', $pkg);
		
		//Install Dashboard Pages
        $page1 = SinglePage::add('/dashboard/pages/landing_pages', $pkg);
        $page1->updateCollectionName(t('Landing Pages'));		
		
		//$page2 = SinglePage::add('/dashboard/hw_simple_testimonials/addtestimonials', $pkg);
		//$page2->updateCollectionName(t('Add Testimonial'));
		
		//$db = Loader::db();
		//$db->Execute("INSERT INTO nsr_landingpages (iPK_LandingPages,menuNavigation) VALUES ('1','myLogoMini.png')");

				
		return $pkg;
	}
	
	public function uninstall() {
		parent::uninstall();
		$db = Loader::db();
		$db->Execute('DROP TABLE nsr_landingpages');
	}

}