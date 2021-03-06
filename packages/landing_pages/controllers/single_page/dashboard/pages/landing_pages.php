<?php 
namespace Concrete\Package\LandingPages\Controller\SinglePage\Dashboard\Pages;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Database;
use Config;
use Core;
use Page;
use Loader;
use View;
use Session;
use Exception;
use File;

class LandingPages extends DashboardPageController
{

	//View Page
    public function view() {
	}

	public function actionInsert() {
	
		//Declare
		$status = true;
		$message = 'Insert OK';
		$redirectURL = '';
		
		$db = Database::get();
		$data = $this->post();
		
		//Truncate
		$db = Database::get();
        $db->Execute("TRUNCATE TABLE nsr_landingpages");
		
		//Insert
		$count = count($data['iSort']);
        if ($count>0) {
            for ($i=0;$i<$count;$i++) {

					$db->Execute("INSERT INTO nsr_landingpages (
											cName,
											iSort 
										  ) VALUES (
											'".$data['cName'][$i]."', 
											'".$data['iSort'][$i]."'
										  )"); 
										  
			}
		}
		
		//Send response
		$json = Loader::helper('json');
		$jsonData = array(
			'status' => $status,
			'message' => $message,
			'redirect' => $redirectURL,
		);
		echo $json->encode($jsonData);
		
		exit;
		
	}

	public function actionFetch() {
	
		//Fetch
		$db = Loader::db();
	    $r = $db->Execute("SELECT * FROM nsr_landingpages");
		
		$someArray = [];
		while ($row = $r->FetchRow()) {
			array_push($someArray, [
			  'iPK_LandingPages'   => $row['iPK_LandingPages'],
			  'cName' => $row['cName'],
			  'iSort' => $row['iSort']
			]);
		}
		
		//Send response
		$json = Loader::helper('json');
		echo $json->encode($someArray);
		
		exit;

    }

/* 	public function actionUpdate() {
	
		//Declare
		$status = true;
		$message = 'Update OK';
		$redirectURL = '';
		
		$db = Database::get();
		$data = $this->post();
		
		//Update
		$count = count($data['iSort']);
		if ($count>0) {
			for ($i=0;$i<$count;$i++) {
				$db->Execute("UPDATE nsr_landingpages SET 
										cName = '".$data['cName'][$i]."'										
									  WHERE 
										iPK_LandingPages= '".$data['iPK_LandingPages'][$i]."'");
			}
		}
		
		//Send response
		$json = Loader::helper('json');
		$jsonData = array(
			'status' => $status,
			'message' => $message,
			'redirect' => $redirectURL,
		);
		echo $json->encode($jsonData);
		
		exit;
	
	} */

/* 	public function actionDelete() {
		
		//Declare
		$status = true;
		$message = 'Delete OK';
		$redirectURL = '';
		
		$db = Database::get();
		$data = $this->post();
		
		//Delete
 		$vals = array(
			$this->post('iPK_LandingPages')
		);
        $db = Database::get();
        $db->Execute("DELETE FROM nsr_landingpages WHERE iPK_LandingPages=?",$vals);
			
		//Send response
		$json = Loader::helper('json');
		$jsonData = array(
			'status' => $status,
			'message' => $message,
			'redirect' => $redirectURL,
		);
		echo $json->encode($jsonData);
		
		exit;
		
	} */
	
}
	
/* 	
<?php 
$db = Database::get();
$data = $db->Execute("SELECT * FROM nsr_landingpages");

if ($data->rowCount() > 0) {
	foreach ($data as $k=>$nsr_landingpages) {
?>
		$("#list-empty").hide();
		
		optionsContainer.append(optionsTemplate({
			iID: '<?php  echo $nsr_landingpages['iPK_LandingPages'];?>',
			cName: '<?php  echo $nsr_landingpages['cName']; ?>',
			iSort: '<?php  echo $nsr_landingpages['iSort']; ?>'
		}));
<?php 
	} 
} else {
?>
	$("#list-empty").html(msgError);
	$("#list-empty").show();
<?php 
}
?> */