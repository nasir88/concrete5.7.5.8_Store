<?php       
namespace Concrete\Package\LandingPages\Block\SectionPages;
use \Concrete\Core\Block\BlockController;
use Database;
use Loader;
use Core;

defined('C5_EXECUTE') or die(_("Access Denied."));

class Controller extends BlockController {
	
	protected $btTable = 'nsr_sectionlandingpages';
	protected $btInterfaceWidth = "300";
	protected $btInterfaceHeight = "100"; 
    protected $btDefaultSet = 'navigation';

	public function getBlockTypeDescription() {
		return t("Add Section Landing Pages.");
	}
		
	public function getBlockTypeName() {
		return t("Section Pages");
	}
	
	function save($data) { 
		
		$db = Database::get();
		
		$bID = $db->GetOne("SELECT bID FROM nsr_sectionlandingpages WHERE bID=?", array($this->bID));
		
		if ($bID == null || $bID == '') {
			
			$db->Execute("INSERT INTO nsr_sectionlandingpages (
							bID,
							cSectionLanding 
						  ) VALUES (
							'".$this->bID."', 
							'".$data['cSectionLanding']."'
						  )"); 
			
			
		} else {
			
			$db->Execute("UPDATE nsr_sectionlandingpages SET 
									cSectionLanding = '".$data['cSectionLanding']."'										
								  WHERE 
									bID= '".$this->bID."'
								");
			
		}		  
					  
	}		
	
	//Delete Blocks
	public function delete() {
		
		$db = Database::get();
		$db->Execute("DELETE FROM nsr_sectionlandingpages WHERE bID=?", array($this->bID));
		
		parent::delete();
		
	}
	
}