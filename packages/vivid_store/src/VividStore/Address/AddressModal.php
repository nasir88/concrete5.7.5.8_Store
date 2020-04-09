<?php  
namespace Concrete\Package\VividStore\Src\VividStore\Address;

use \Concrete\Core\Controller\Controller as RouteController;
use Database;
use Core;
use View;
use Session;
use Config;
use Page;
use Exception;
use Illuminate\Filesystem\Filesystem;
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as StoreCart;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Calculator as StoreCalculator;
use \Concrete\Package\VividStore\Src\VividStore\Customer\Customer as StoreCustomer;

class AddressModal extends RouteController
{

	public function getAddressListElement()
    {
        $fileSystem = new \Illuminate\Filesystem\Filesystem;
        if ($fileSystem->exists(DIR_BASE.'/application/elements/address_list.php')) {
            View::element('address_list', array('address'=>self::getMyAddress()));
        } else {
            View::element('address_list', array('address'=>self::getMyAddress()), 'vivid_store');
        }
    }

    public function getAddressModal()
    {
        $cart = StoreCart::getCart();
        $total = StoreCalculator::getSubTotal();
		
		$baMode = $this->post('baMode');
		$baID = $this->post('baID');
		
        if (Filesystem::exists(DIR_BASE.'/application/elements/address_modal.php')) {
            View::element('address_modal', array('baID'=>$baID, 'baMode'=>$baMode));
        } else {
            View::element('address_modal', array('baID'=>$baID, 'baMode'=>$baMode),'vivid_store');
        }
    }
	
	public function updateAddressModal()
    {
		$db = Database::get();
		$customer = new StoreCustomer();
		$userID = $customer->getUserID();
		$baMode = $this->post('baMode');
        
		$vals = array(
					$this->post('baFirstName'),
					$this->post('baLastName'),
					$this->post('baCompanyName'),
					$this->post('baPhone'),
					$this->post('baFirstAddress'),
					$this->post('baSecondAddress'),
					$this->post('baCountry'),
					$this->post('baCity'),
					$this->post('baState'),
					$this->post('baPostalCode'),
					$userID
				);
				
		//Insert
		if ($baMode == 'add') {
			$db->Execute("INSERT INTO VividStoreBookAddress (baFirstName,baLastName,baCompanyName,baPhone,baFirstAddress,baSecondAddress,baCountry,baCity,baState,baPostalCode,uID) VALUES (?,?,?,?,?,?,?,?,?,?,?)",$vals);
			return true;
		}
		
		//Edit
		if ($baMode == 'edit') {
			$vals_where = array($this->post('baID'));
			
			$db->Execute("UPDATE VividStoreBookAddress set baFirstName = ?,baLastName = ?,baCompanyName = ?,baPhone = ?,baFirstAddress = ?,baSecondAddress = ?,baCountry = ?,baCity = ?,baState = ?,baPostalCode = ?,uID = ? WHERE baID=?",array_merge($vals,$vals_where));
			return true;
		}
		
		return false;
	}
	
    public function defaultAddressModal() {
		$customer = new StoreCustomer();
		$vals_where = array($this->post('baID'),$customer->getUserID());
        $db = Database::get();
		
		$db->Execute("UPDATE VividStoreBookAddress set baDefault = 0 WHERE baID <> ? AND uID=? ",$vals_where);
		$db->Execute("UPDATE VividStoreBookAddress set baDefault = 1 WHERE baID = ? AND uID=?",$vals_where);
			
		return true;
    }
	
    public function removeAddressModal() {
		$vals_where = array($this->post('baID'));
        $db = Database::get();
        $db->Execute("DELETE FROM VividStoreBookAddress WHERE baID=?",$vals_where);
		return true;
    }
	
	public function getMyAddress() {
		$customer = new StoreCustomer();
		
		$db = \Database::connection();
		$rows = $db->GetAll("SELECT * FROM VividStoreBookAddress WHERE uID=?", $customer->getUserID());
		return $rows;
    }
	
	public function getMyAddressByID($baID) {
		$db = \Database::connection();
		$rows = $db->GetAll("SELECT * FROM VividStoreBookAddress WHERE baID=?", $baID);
		
		foreach ($rows as $k=>$addressItem) {
			$baID 			 = $addressItem['baID'];
            $baFirstName 	 = $addressItem['baFirstName'];
            $baLastName 	 = $addressItem['baLastName'];
            $baCompanyName 	 = $addressItem['baCompanyName'];
            $baPhone 		 = $addressItem['baPhone'];
            $baFirstAddress  = $addressItem['baFirstAddress'];
            $baSecondAddress = $addressItem['baSecondAddress'];
            $baCountry 		 = $addressItem['baCountry'];
            $baCity			 = $addressItem['baCity'];
            $baState 		 = $addressItem['baState'];
            $baPostalCode	 = $addressItem['baPostalCode'];
            $baDefault	 	 = $addressItem['baDefault'];
            $uID	 	 	 = $addressItem['uID'];
		}
		
		$dataAddress = array(
            "baID" => $baID,
            "baFirstName" => $baFirstName,
            "baLastName" => $baLastName,
            "baCompanyName" => $baCompanyName,
            "baPhone" => $baPhone,
            "baFirstAddress" => $baFirstAddress,
            "baSecondAddress" => $baSecondAddress,
            "baCountry" => $baCountry,
            "baCity" => $baCity,
            "baState" => $baState,
            "baPostalCode" => $baPostalCode,
            "baDefault" => $baDefault,
            "uID" => $uID,
        );
        return $dataAddress;
    }
	
	public function getMyAddressByDefault() {
		$customer = new StoreCustomer();
		
		$db = \Database::connection();
		$rows = $db->GetAll("SELECT * FROM VividStoreBookAddress WHERE baDefault='1' AND uID=?", $customer->getUserID());
		
		foreach ($rows as $k=>$addressItem) {
			$baID 			 = $addressItem['baID'];
            $baFirstName 	 = $addressItem['baFirstName'];
            $baLastName 	 = $addressItem['baLastName'];
            $baCompanyName 	 = $addressItem['baCompanyName'];
            $baPhone 		 = $addressItem['baPhone'];
            $baFirstAddress  = $addressItem['baFirstAddress'];
            $baSecondAddress = $addressItem['baSecondAddress'];
            $baCountry 		 = $addressItem['baCountry'];
            $baCity			 = $addressItem['baCity'];
            $baState 		 = $addressItem['baState'];
            $baPostalCode	 = $addressItem['baPostalCode'];
            $baDefault	 	 = $addressItem['baDefault'];
            $uID	 	 	 = $addressItem['uID'];
		}
		
		$dataAddress = array(
            "baID" => $baID,
            "baFirstName" => $baFirstName,
            "baLastName" => $baLastName,
            "baCompanyName" => $baCompanyName,
            "baPhone" => $baPhone,
            "baFirstAddress" => $baFirstAddress,
            "baSecondAddress" => $baSecondAddress,
            "baCountry" => $baCountry,
            "baCity" => $baCity,
            "baState" => $baState,
            "baPostalCode" => $baPostalCode,
            "baDefault" => $baDefault,
            "uID" => $uID,
        );
        return $dataAddress;
	}

}
