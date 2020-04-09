<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Product;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Product extends \Concrete\Package\VividStore\Src\VividStore\Product\Product implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'pID', 'cID', 'pName', 'pSKU', 'pDesc', 'pDetail', 'pPrice', 'pSalePrice', 'pFeatured', 'pQty', 'pQtyUnlim', 'pNoQty', 'pTaxClass', 'pTaxable', 'pfID', 'pActive', 'pDateAdded', 'pShippable', 'pWidth', 'pHeight', 'pLength', 'pWeight', 'pCreateUserAccount', 'pAutoCheckout', 'pExclusive', 'pVariations', 'variation');
        }

        return array('__isInitialized__', 'pID', 'cID', 'pName', 'pSKU', 'pDesc', 'pDetail', 'pPrice', 'pSalePrice', 'pFeatured', 'pQty', 'pQtyUnlim', 'pNoQty', 'pTaxClass', 'pTaxable', 'pfID', 'pActive', 'pDateAdded', 'pShippable', 'pWidth', 'pHeight', 'pLength', 'pWeight', 'pCreateUserAccount', 'pAutoCheckout', 'pExclusive', 'pVariations', 'variation');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Product $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setVariation($variation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariation', array($variation));

        return parent::setVariation($variation);
    }

    /**
     * {@inheritDoc}
     */
    public function setInitialVariation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setInitialVariation', array());

        return parent::setInitialVariation();
    }

    /**
     * {@inheritDoc}
     */
    public function getVariation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariation', array());

        return parent::getVariation();
    }

    /**
     * {@inheritDoc}
     */
    public function setCollectionID($cID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCollectionID', array($cID));

        return parent::setCollectionID($cID);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductName', array($name));

        return parent::setProductName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductSKU($sku)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductSKU', array($sku));

        return parent::setProductSKU($sku);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductDescription', array($description));

        return parent::setProductDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductDetail($detail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductDetail', array($detail));

        return parent::setProductDetail($detail);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductPrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductPrice', array($price));

        return parent::setProductPrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductSalePrice($price)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductSalePrice', array($price));

        return parent::setProductSalePrice($price);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsFeatured($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsFeatured', array($bool));

        return parent::setIsFeatured($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductQty($qty)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductQty', array($qty));

        return parent::setProductQty($qty);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsUnlimited($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsUnlimited', array($bool));

        return parent::setIsUnlimited($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setAllowBackOrder($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAllowBackOrder', array($bool));

        return parent::setAllowBackOrder($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setNoQty($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNoQty', array($bool));

        return parent::setNoQty($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductTaxClass($taxClass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductTaxClass', array($taxClass));

        return parent::setProductTaxClass($taxClass);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsTaxable($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsTaxable', array($bool));

        return parent::setIsTaxable($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductImageID($fID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductImageID', array($fID));

        return parent::setProductImageID($fID);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsActive($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsActive', array($bool));

        return parent::setIsActive($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductDateAdded($date)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductDateAdded', array($date));

        return parent::setProductDateAdded($date);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsShippable($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsShippable', array($bool));

        return parent::setIsShippable($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductWidth($width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductWidth', array($width));

        return parent::setProductWidth($width);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductHeight($height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductHeight', array($height));

        return parent::setProductHeight($height);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductLength($length)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductLength', array($length));

        return parent::setProductLength($length);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductWeight($weight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductWeight', array($weight));

        return parent::setProductWeight($weight);
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatesUserAccount($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatesUserAccount', array($bool));

        return parent::setCreatesUserAccount($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setAutoCheckout($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAutoCheckout', array($bool));

        return parent::setAutoCheckout($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setIsExclusive($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsExclusive', array($bool));

        return parent::setIsExclusive($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function setHasVariations($bool)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHasVariations', array($bool));

        return parent::setHasVariations($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function updateProductQty($qty, $pvID = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'updateProductQty', array($qty, $pvID));

        return parent::updateProductQty($qty, $pvID);
    }

    /**
     * {@inheritDoc}
     */
    public function saveProduct($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'saveProduct', array($data));

        return parent::saveProduct($data);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductID', array());

        return parent::getProductID();
    }

    /**
     * {@inheritDoc}
     */
    public function getID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getID', array());

        return parent::getID();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductName', array());

        return parent::getProductName();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductSKU()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductSKU', array());

        return parent::getProductSKU();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductPageID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductPageID', array());

        return parent::getProductPageID();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductDesc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductDesc', array());

        return parent::getProductDesc();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductDetail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductDetail', array());

        return parent::getProductDetail();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductPrice', array());

        return parent::getProductPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getFormattedOriginalPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormattedOriginalPrice', array());

        return parent::getFormattedOriginalPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getFormattedPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormattedPrice', array());

        return parent::getFormattedPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductSalePrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductSalePrice', array());

        return parent::getProductSalePrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getFormattedSalePrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormattedSalePrice', array());

        return parent::getFormattedSalePrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getActivePrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActivePrice', array());

        return parent::getActivePrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getFormattedActivePrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormattedActivePrice', array());

        return parent::getFormattedActivePrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxClassID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClassID', array());

        return parent::getTaxClassID();
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxClass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClass', array());

        return parent::getTaxClass();
    }

    /**
     * {@inheritDoc}
     */
    public function isTaxable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTaxable', array());

        return parent::isTaxable();
    }

    /**
     * {@inheritDoc}
     */
    public function isFeatured()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isFeatured', array());

        return parent::isFeatured();
    }

    /**
     * {@inheritDoc}
     */
    public function isActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isActive', array());

        return parent::isActive();
    }

    /**
     * {@inheritDoc}
     */
    public function isShippable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isShippable', array());

        return parent::isShippable();
    }

    /**
     * {@inheritDoc}
     */
    public function getDimensions($whl = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDimensions', array($whl));

        return parent::getDimensions($whl);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductWeight', array());

        return parent::getProductWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductImageID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductImageID', array());

        return parent::getProductImageID();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductImageObj()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductImageObj', array());

        return parent::getProductImageObj();
    }

    /**
     * {@inheritDoc}
     */
    public function getBaseProductImageID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBaseProductImageID', array());

        return parent::getBaseProductImageID();
    }

    /**
     * {@inheritDoc}
     */
    public function getBaseProductImageObj()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBaseProductImageObj', array());

        return parent::getBaseProductImageObj();
    }

    /**
     * {@inheritDoc}
     */
    public function hasDigitalDownload()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasDigitalDownload', array());

        return parent::hasDigitalDownload();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductDownloadFiles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductDownloadFiles', array());

        return parent::getProductDownloadFiles();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductDownloadFileObjects()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductDownloadFileObjects', array());

        return parent::getProductDownloadFileObjects();
    }

    /**
     * {@inheritDoc}
     */
    public function createsLogin()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'createsLogin', array());

        return parent::createsLogin();
    }

    /**
     * {@inheritDoc}
     */
    public function allowQuantity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'allowQuantity', array());

        return parent::allowQuantity();
    }

    /**
     * {@inheritDoc}
     */
    public function isExclusive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isExclusive', array());

        return parent::isExclusive();
    }

    /**
     * {@inheritDoc}
     */
    public function hasVariations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasVariations', array());

        return parent::hasVariations();
    }

    /**
     * {@inheritDoc}
     */
    public function isUnlimited()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isUnlimited', array());

        return parent::isUnlimited();
    }

    /**
     * {@inheritDoc}
     */
    public function autoCheckout()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'autoCheckout', array());

        return parent::autoCheckout();
    }

    /**
     * {@inheritDoc}
     */
    public function allowBackOrders()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'allowBackOrders', array());

        return parent::allowBackOrders();
    }

    /**
     * {@inheritDoc}
     */
    public function hasUserGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hasUserGroups', array());

        return parent::hasUserGroups();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductUserGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductUserGroups', array());

        return parent::getProductUserGroups();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductUserGroupIDs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductUserGroupIDs', array());

        return parent::getProductUserGroupIDs();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductImage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductImage', array());

        return parent::getProductImage();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductImageThumb()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductImageThumb', array());

        return parent::getProductImageThumb();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductQty()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductQty', array());

        return parent::getProductQty();
    }

    /**
     * {@inheritDoc}
     */
    public function isSellable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isSellable', array());

        return parent::isSellable();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductImages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductImages', array());

        return parent::getProductImages();
    }

    /**
     * {@inheritDoc}
     */
    public function getproductimagesobjects()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getproductimagesobjects', array());

        return parent::getproductimagesobjects();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductLocationPages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductLocationPages', array());

        return parent::getProductLocationPages();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductOptionGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductOptionGroups', array());

        return parent::getProductOptionGroups();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductOptionItems($onlyvisible = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductOptionItems', array($onlyvisible));

        return parent::getProductOptionItems($onlyvisible);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductGroupIDs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductGroupIDs', array());

        return parent::getProductGroupIDs();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductGroups()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductGroups', array());

        return parent::getProductGroups();
    }

    /**
     * {@inheritDoc}
     */
    public function getProductVariations()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductVariations', array());

        return parent::getProductVariations();
    }

    /**
     * {@inheritDoc}
     */
    public function save()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'save', array());

        return parent::save();
    }

    /**
     * {@inheritDoc}
     */
    public function remove()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'remove', array());

        return parent::remove();
    }

    /**
     * {@inheritDoc}
     */
    public function generatePage($templateID = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'generatePage', array($templateID));

        return parent::generatePage($templateID);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductPageDescription($newDescription)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductPageDescription', array($newDescription));

        return parent::setProductPageDescription($newDescription);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductPageID($cID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductPageID', array($cID));

        return parent::setProductPageID($cID);
    }

    /**
     * {@inheritDoc}
     */
    public function getTotalSold()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTotalSold', array());

        return parent::getTotalSold();
    }

    /**
     * {@inheritDoc}
     */
    public function setAttribute($ak, $value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAttribute', array($ak, $value));

        return parent::setAttribute($ak, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttribute($ak, $displayMode = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttribute', array($ak, $displayMode));

        return parent::getAttribute($ak, $displayMode);
    }

    /**
     * {@inheritDoc}
     */
    public function getAttributeValueObject($ak, $createIfNotFound = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAttributeValueObject', array($ak, $createIfNotFound));

        return parent::getAttributeValueObject($ak, $createIfNotFound);
    }

}