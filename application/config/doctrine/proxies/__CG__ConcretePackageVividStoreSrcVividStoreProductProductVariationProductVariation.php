<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Product\ProductVariation;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ProductVariation extends \Concrete\Package\VividStore\Src\VividStore\Product\ProductVariation\ProductVariation implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'pvID', 'pID', 'pvPrice', 'pvSKU', 'pvSalePrice', 'pvfID', 'pvQty', 'pvQtyUnlim', 'pvWidth', 'pvHeight', 'pvLength', 'pvWeight', 'pvNumberItems', 'options');
        }

        return array('__isInitialized__', 'pvID', 'pID', 'pvPrice', 'pvSKU', 'pvSalePrice', 'pvfID', 'pvQty', 'pvQtyUnlim', 'pvWidth', 'pvHeight', 'pvLength', 'pvWeight', 'pvNumberItems', 'options');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ProductVariation $proxy) {
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
    public function getVariationFID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationFID', array());

        return parent::getVariationFID();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationFID($pvfID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationFID', array($pvfID));

        return parent::setVariationFID($pvfID);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationImageID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationImageID', array());

        return parent::getVariationImageID();
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationImageObj()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationImageObj', array());

        return parent::getVariationImageObj();
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptions', array());

        return parent::getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function getOptionItemIDs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptionItemIDs', array());

        return parent::getOptionItemIDs();
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
    public function getProductID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductID', array());

        return parent::getProductID();
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationSKU()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationSKU', array());

        return parent::getVariationSKU();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationSKU($pvSKU)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationSKU', array($pvSKU));

        return parent::setVariationSKU($pvSKU);
    }

    /**
     * {@inheritDoc}
     */
    public function setProductID($pID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductID', array($pID));

        return parent::setProductID($pID);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationPrice', array());

        return parent::getVariationPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function getFormattedVariationPrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFormattedVariationPrice', array());

        return parent::getFormattedVariationPrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationPrice($pvPrice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationPrice', array($pvPrice));

        return parent::setVariationPrice($pvPrice);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationSalePrice()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationSalePrice', array());

        return parent::getVariationSalePrice();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationSalePrice($pvSalePrice)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationSalePrice', array($pvSalePrice));

        return parent::setVariationSalePrice($pvSalePrice);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationQty()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationQty', array());

        return parent::getVariationQty();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationQty($pvQty)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationQty', array($pvQty));

        return parent::setVariationQty($pvQty);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationQtyUnlim()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationQtyUnlim', array());

        return parent::getVariationQtyUnlim();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationQtyUnlim($pvQtyUnlim)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationQtyUnlim', array($pvQtyUnlim));

        return parent::setVariationQtyUnlim($pvQtyUnlim);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationWidth', array());

        return parent::getVariationWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationWidth($pvWidth)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationWidth', array($pvWidth));

        return parent::setVariationWidth($pvWidth);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationHeight', array());

        return parent::getVariationHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationHeight($pvHeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationHeight', array($pvHeight));

        return parent::setVariationHeight($pvHeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationLength()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationLength', array());

        return parent::getVariationLength();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationLength($pvLength)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationLength', array($pvLength));

        return parent::setVariationLength($pvLength);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationWeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationWeight', array());

        return parent::getVariationWeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationWeight($pvWeight)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationWeight', array($pvWeight));

        return parent::setVariationWeight($pvWeight);
    }

    /**
     * {@inheritDoc}
     */
    public function getVariationNumberItems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVariationNumberItems', array());

        return parent::getVariationNumberItems();
    }

    /**
     * {@inheritDoc}
     */
    public function setVariationNumberItems($pvNumberItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVariationNumberItems', array($pvNumberItems));

        return parent::setVariationNumberItems($pvNumberItems);
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
    public function isSellable()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isSellable', array());

        return parent::isSellable();
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
    public function delete()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'delete', array());

        return parent::delete();
    }

}
