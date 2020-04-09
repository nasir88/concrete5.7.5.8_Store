<?php
namespace Concrete\Package\NsrSiteLogo\Controller\SinglePage\Dashboard\System\Basics;
use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;
use Loader;
use Core;
use Exception;
use Package;

use Concrete\Package\NsrSiteLogo\Src\SiteLogoSrc as SiteLogoSRC;
use \Application\Controller\MyControllers\MyTheme as URLTheme;

//Class : Title Page
class SiteLogo extends DashboardPageController {


	//View
	public function view() {
	
		//Include CSS
		$CSSSitePath = SiteLogoSRC::PackagePathCSS();
		$this->addHeaderItem(Core::make('helper/html')->css($CSSSitePath.'style.css')); 
		
		//Include Theme
		$URLTheme = new URLTheme();
		$myURLTheme = $URLTheme->myURLTheme();
		$this->set('myURLTheme',$myURLTheme);
		
		//Display Data
		$SiteLogoData = SiteLogoSRC::getAllDataByPK();
		$SiteLogoPath = SiteLogoSRC::PackagePathImage();
		
		$this->set('SiteLogoImage',$SiteLogoPath.$SiteLogoData['imageFile']);
		$this->set('SiteLogoImageMini',$SiteLogoPath.$SiteLogoData['imageFileMini']);
		
	}
	
	//Edit
	public function edit_sitelogo($iPK_SiteLogo)
	{
	
		//Post Data
		$imageFile4040 	= $_FILES['imageFile4040']['name'];
		$tmp_File4040   = $_FILES['imageFile4040']['tmp_name'];
		
		$imageFile22040 = $_FILES['imageFile22040']['name'];
		$tmp_File22040  = $_FILES['imageFile22040']['tmp_name'];
		
		//Default FileName
		$name1 = 'myLogoMini'.time().'.png';
		$name2 = 'myLogo'.time().'.png';
		
		
		//Validation Data
		//if(!isset($_FILES['imageFile22040']) || !is_uploaded_file($_FILES['imageFile22040']['tmp_name'])){
		//	$this->error->add(t('* Image file is Missing.'));
		//}
		/* if (strlen($Author) > 2) {
			$this->error->add(t('* Author Name field has too many characters.'));
        }
		if (strlen($Company) > 2) {
			$this->error->add(t('* The Company field has too many characters.'));
        } */
		
		//Process
		if (!$this->error->has()) {
		
			//Path File Upload
			$destination_path = getcwd().DIRECTORY_SEPARATOR;
			$ImageSitePath = SiteLogoSRC::PackageUploadPathImage();
			
			//Get Current Path
			$SiteLogoData = SiteLogoSRC::getAllDataByPK();
			
			//Process Large Image
			if(isset($_FILES['imageFile22040']) && !empty($_FILES['imageFile22040']['name'])) {
			
				//Delete File
				if (file_exists($destination_path.$ImageSitePath.$SiteLogoData['imageFile'])){
					unlink($destination_path.$ImageSitePath.$SiteLogoData['imageFile']);
				}
				//Upload File
				move_uploaded_file($tmp_File22040, $destination_path.$ImageSitePath.$name2);
				
				//Update DB
				$db = Loader::db();
				$data = array(
					'imageFile' => $name2,
				);
				$db->update('nsr_sitelogo', $data, array('iPK_SiteLogo' => $iPK_SiteLogo));
			
			}
			
			//Process Small Image
			if(isset($_FILES['imageFile4040']) && !empty($_FILES['imageFile4040']['name'])) {
			
				//Delete File
				if (file_exists($destination_path.$ImageSitePath.$SiteLogoData['imageFileMini'])){
					unlink($destination_path.$ImageSitePath.$SiteLogoData['imageFileMini']);
				}
				//Upload File
				move_uploaded_file($tmp_File4040, $destination_path.$ImageSitePath.$name1);
				
				//Update DB
				$db = Loader::db();
				$data = array(
					'imageFileMini' => $name1,
				);
				$db->update('nsr_sitelogo', $data, array('iPK_SiteLogo' => $iPK_SiteLogo));
				
			}
			
			//Redirect Page
			$URLTheme = new URLTheme();
			$myURLTheme = $URLTheme->myURLTheme();
			if ($myURLTheme === 'dashboard') {
				$this->redirect('/'.$myURLTheme.'/system/basics/sitelogo', 'logo_updated');
			} else {
				$this->redirect('/'.$myURLTheme.'/system/site-logo', 'logo_updated');
			}
			
		} else {
			$this->set('error', array($this->token->getErrorMessage()));
        }
	}
	
	//Message Update
	public function logo_updated()
    {
        $this->set('success', t("Logo Updated."));
        $this->view();
    }
	


}
