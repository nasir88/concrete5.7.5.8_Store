<?php 
namespace Concrete\Package\VividStore;

use Package;
use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as PaymentMethod;
use \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethodType as ShippingMethodType;
use \Concrete\Package\VividStore\Src\VividStore\Utilities\Installer;
use Illuminate\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Whoops\Exception\ErrorException;
use Route;
use Asset;
use AssetList;
use View;

class controller extends Package
{
    protected $pkgHandle = 'vivid_store';
    protected $appVersionRequired = '5.7.5.7';
	//Edit By Nasir - VERSION001
    protected $pkgVersion = '3.1.4.32';
	//End
    public function getPackageDescription()
    {
        return t("Add a Store to your Site");
    }

    public function getPackageName()
    {
        return t("Vivid Store");
    }

    public function installStore()
    {
        $pkg = Package::getByHandle('vivid_store');
        if (version_compare($pkg->getPackageVersion(), '2.1', '<')) {
            Installer::renameDatabaseTables($pkg);
        }
        if (version_compare(APP_VERSION, '5.7.4', '<')) {
            Installer::refreshDatabase($pkg);
        }
        Installer::installSinglePages($pkg);
        Installer::removeLegacySinglePages($pkg);
        Installer::installProductParentPage($pkg);
        Installer::installStoreProductPageType($pkg);
        Installer::updateConfigStorage($pkg);
        Installer::setDefaultConfigValues($pkg);
        Installer::installPaymentMethods($pkg);
        Installer::installPromotionRewardTypes($pkg);
        Installer::installPromotionRuleTypes($pkg);
        Installer::installShippingMethods($pkg);
        Installer::installBlocks($pkg);
        Installer::setPageTypeDefaults($pkg);
        Installer::installCustomerGroups($pkg);
        Installer::installUserAttributes($pkg);
        Installer::installOrderAttributes($pkg);
        Installer::installProductAttributes($pkg);
        Installer::createDDFileset($pkg);
        Installer::installOrderStatuses($pkg);
        Installer::installDefaultTaxClass($pkg);
        if (version_compare($pkg->getPackageVersion(), '3.0', '<')) {
            Installer::migrateOldShippingMethod($pkg);
            Installer::migrateOldTaxRates($pkg);
        }
		
		//Edit By Nasir - MODIFYDB001
		Installer::modifyDatabaseTables($pkg);
		//End
    }

    public function install()
    {
        if (!class_exists("SOAPClient")) {
            throw new ErrorException(t('This package requires that the SOAP client for PHP is installed'));
        } else {
            $this->on_start();
            parent::install();
            $this->installStore();
        }
    }

    public function upgrade()
    {
        $pkg = Package::getByHandle('vivid_store');
        if (version_compare($pkg->getPackageVersion(), '3.1.2', '<')) {
            Installer::upgrade($pkg);
        }
        parent::upgrade();
        $this->installStore();
    }

    public function registerRoutes()
    {
        Route::register('/cart/getSubTotal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getSubTotal');
        Route::register('/cart/getTaxTotal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getTaxTotal');
        Route::register('/cart/getTotal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getTotal');
        Route::register('/cart/getShippingTotal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getShippingTotal');
		
		//Add By Nasir - DISCOUNT001
        Route::register('/discount/storeCode', '\Concrete\Package\VividStore\Src\VividStore\Discount\DiscountModal::storeCode');
        Route::register('/discount/getDiscountListElement', '\Concrete\Package\VividStore\Src\VividStore\Discount\DiscountModal::getDiscountListElement');
		Route::register('/discount/clearCode', '\Concrete\Package\VividStore\Src\VividStore\Discount\DiscountModal::clearCode');
        Route::register('/cart/getDiscountTotal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getDiscountTotal');
		//End
		
        Route::register('/cart/getTotalItems', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartTotal::getTotalItems');
        Route::register('/cart/getmodal', '\Concrete\Package\VividStore\Src\VividStore\Cart\CartModal::getCartModal');
		
		//Add By Nasir - ADDRESS001
        Route::register('/address/getAddressModal', '\Concrete\Package\VividStore\Src\VividStore\Address\AddressModal::getAddressModal');
        Route::register('/address/getAddressListElement', '\Concrete\Package\VividStore\Src\VividStore\Address\AddressModal::getAddressListElement');
        Route::register('/address/updateAddressModal', '\Concrete\Package\VividStore\Src\VividStore\Address\AddressModal::updateAddressModal');
        Route::register('/address/defaultAddressModal', '\Concrete\Package\VividStore\Src\VividStore\Address\AddressModal::defaultAddressModal');
        Route::register('/address/removeAddressModal', '\Concrete\Package\VividStore\Src\VividStore\Address\AddressModal::removeAddressModal');
		//End
		
        Route::register('/productmodal', '\Concrete\Package\VividStore\Src\VividStore\Product\ProductModal::getProductModal');
        Route::register('/checkout/getstates', '\Concrete\Package\VividStore\Src\VividStore\Utilities\States::getStateList');
        Route::register('/checkout/getShippingMethods', '\Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout::getShippingMethods');
        Route::register('/checkout/updater', '\Concrete\Package\VividStore\Src\VividStore\Utilities\Checkout::updater');
        Route::register('/productfinder', '\Concrete\Package\VividStore\Src\VividStore\Utilities\ProductFinder::getProductMatch');
        Route::register('/checkout/paypalresponse', '\Concrete\Package\VividStore\Src\VividStore\Payment\Methods\PaypalStandard\PaypalStandardPaymentMethod::validateCompletion');
        Route::register('/dashboard/store/orders/details/slip', '\Concrete\Package\VividStore\Src\VividStore\Utilities\OrderSlip::renderOrderPrintSlip');
        Route::register('/dashboard/store/promotions/utility/save_reward', '\Concrete\Package\VividStore\Src\VividStore\Promotion\PromotionUtility::saveReward');
    }
	
    public function on_start()
    {
        // Initialize composer
        $filesystem = new Filesystem();
        $filesystem->getRequire(__DIR__ . '/vendor/autoload.php');

        $this->registerRoutes();

        $al = AssetList::getInstance();
        $al->register('css', 'vivid-store', 'css/vivid-store.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'vividStoreDashboard', 'css/vividStoreDashboard.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('javascript', 'vivid-store', 'js/vivid-store.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_FOOTER, 'minify' => false, 'combine' => false), $this);
        $al->register('javascript', 'vividStoreFunctions', 'js/vividStoreFunctions.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_FOOTER, 'minify' => false, 'combine' => false), $this);
        
		//Add By Nasir - JS001 & CSS001
		$al->register('javascript', 'countdown', 'js/countdown.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		
		$al->register('javascript', 'jplist.waypoints.min', 'js/jplist/jplist.waypoints.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.core.min', 'js/jplist/jplist.core.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.sort-bundle.min', 'js/jplist/jplist.sort-bundle.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.textbox-filter.min', 'js/jplist/jplist.textbox-filter.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.history-bundle.min', 'js/jplist/jplist.history-bundle.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.filter-toggle-bundle.min', 'js/jplist/jplist.filter-toggle-bundle.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.list-grid-view.min', 'js/jplist/jplist.list-grid-view.min.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		$al->register('javascript', 'jplist.function', 'js/jplist/jplist.function.js', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);

        $al->register('css', 'jplist.core.min', 'css/jplist/jplist.core.min.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'jplist.textbox-filter.min', 'css/jplist/jplist.textbox-filter.min.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'jplist.history-bundle.min', 'css/jplist/jplist.history-bundle.min.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'jplist.filter-toggle-bundle.min', 'css/jplist/jplist.filter-toggle-bundle.min.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'jplist.list-grid-view.min', 'css/jplist/jplist.list-grid-view.min.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'jplist.style', 'css/jplist/jplist.style.css', array('version' => '1', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
		//End
		
        $al->register('javascript', 'chartist', 'js/chartist.js', array('version' => '0.9.4', 'position' => Asset::ASSET_POSITION_FOOTER, 'minify' => false, 'combine' => false), $this);
        $al->register('css', 'chartist', 'css/chartist.css', array('version' => '0.9.4', 'position' => Asset::ASSET_POSITION_HEADER, 'minify' => false, 'combine' => false), $this);
        $al->registerGroup('chartist',
            array(
                array('javascript', 'chartist'),
                array('css', 'chartist'),
            )
        );
    }
    
	public function uninstall()
    {
        $authnetpm = PaymentMethod::getByHandle('auth_net');
        if (is_object($authnetpm)) {
            $authnetpm->delete();
        }
        $invoicepm = PaymentMethod::getByHandle('invoice');
        if (is_object($invoicepm)) {
            $invoicepm->delete();
        }
        $paypalpm = PaymentMethod::getByHandle('paypal_standard');
        if (is_object($paypalpm)) {
            $paypalpm->delete();
        }
		
		//Add By Nasir - PAYMENT001
        $banktransferpm = PaymentMethod::getByHandle('bank_transfer');
        if (is_object($banktransferpm)) {
            $banktransferpm->delete();
        }
		//End

        $shippingMethodType = ShippingMethodType::getByHandle('flat_rate');
        if (is_object($shippingMethodType)) {
            $shippingMethodType->delete();
        }
        $shippingMethodType = ShippingMethodType::getByHandle('free_shipping');
        if (is_object($shippingMethodType)) {
            $shippingMethodType->delete();
        }
        parent::uninstall();
    }

    public static function returnHeaderJS()
    {
        $vividStoreJS = array(
            'URLs' => array(
                'ProductModal' => View::url('/productmodal'),
                'Cart' => View::url('/cart'),
				//Add By Nasir - ADDRESS001
                'Address' => View::url('/address'),
				//End
				//Add By Nasir - DISCOUNT001
                'Discount' => View::url('/discount'),
				//End
                'Checkout' => View::url('/checkout'),
                'Home' => View::url('/')
            ),
            'Strings' => array(
                'AreYouSure' => t('Are you sure?'),
                'Error' => t('An error has occured.'),
                'QtyError' => t('Quantity must be greater than zero'),
                'AddRewardType' => t('Add Reward Type'),
                'AddRuleType' => t('Add Rule Type'),
                'Add' => t('Add'),
                'Cancel' => t('Cancel')
            )

        );
        $script = "<script type=\"text/javascript\">";
        $script .= "var vividStore = window.vividStore || {};";
        $script .= "$(function(){ vividStore = $.extend(vividStore,".json_encode($vividStoreJS)."); });";
        $script .= "</script>";
        return $script;
    }

}
