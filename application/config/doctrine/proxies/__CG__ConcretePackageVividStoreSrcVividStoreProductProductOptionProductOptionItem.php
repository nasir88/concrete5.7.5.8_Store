<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Product\ProductOption;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ProductOptionItem extends \Concrete\Package\VividStore\Src\VividStore\Product\ProductOption\ProductOptionItem implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'poiID', 'pID', 'pogID', 'poiName', 'poiSort', 'poiHidden', '' . "\0" . 'Concrete\\Package\\VividStore\\Src\\VividStore\\Product\\ProductOption\\ProductOptionItem' . "\0" . 'variationoptionitems');
        }

        return array('__isInitialized__', 'poiID', 'pID', 'pogID', 'poiName', 'poiSort', 'poiHidden', '' . "\0" . 'Concrete\\Package\\VividStore\\Src\\VividStore\\Product\\ProductOption\\ProductOptionItem' . "\0" . 'variationoptionitems');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ProductOptionItem $proxy) {
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
    public function getProductOptionGroupID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductOptionGroupID', array());

        return parent::getProductOptionGroupID();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getSort()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSort', array());

        return parent::getSort();
    }

    /**
     * {@inheritDoc}
     */
    public function getHidden()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHidden', array());

        return parent::getHidden();
    }

    /**
     * {@inheritDoc}
     */
    public function isHidden()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isHidden', array());

        return parent::isHidden();
    }

    /**
     * {@inheritDoc}
     */
    public function update(\Concrete\Package\VividStore\Src\VividStore\Product\Product $product, $name, $sort, $hidden = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'update', array($product, $name, $sort, $hidden));

        return parent::update($product, $name, $sort, $hidden);
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
