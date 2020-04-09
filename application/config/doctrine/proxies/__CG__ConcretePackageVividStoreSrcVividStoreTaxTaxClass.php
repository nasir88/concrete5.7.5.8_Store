<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Tax;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class TaxClass extends \Concrete\Package\VividStore\Src\VividStore\Tax\TaxClass implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'tcID', 'taxClassHandle', 'taxClassName', 'taxClassRates', 'locked');
        }

        return array('__isInitialized__', 'tcID', 'taxClassHandle', 'taxClassName', 'taxClassRates', 'locked');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (TaxClass $proxy) {
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
    public function setTaxClassHandle($handle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaxClassHandle', array($handle));

        return parent::setTaxClassHandle($handle);
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxClassName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaxClassName', array($name));

        return parent::setTaxClassName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxClassRates(array $rates = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaxClassRates', array($rates));

        return parent::setTaxClassRates($rates);
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxClassLock($locked)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTaxClassLock', array($locked));

        return parent::setTaxClassLock($locked);
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
    public function getTaxClassHandle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClassHandle', array());

        return parent::getTaxClassHandle();
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxClassName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClassName', array());

        return parent::getTaxClassName();
    }

    /**
     * {@inheritDoc}
     */
    public function isLocked()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isLocked', array());

        return parent::isLocked();
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxClassRates()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClassRates', array());

        return parent::getTaxClassRates();
    }

    /**
     * {@inheritDoc}
     */
    public function getTaxClassRateIDs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTaxClassRateIDs', array());

        return parent::getTaxClassRateIDs();
    }

    /**
     * {@inheritDoc}
     */
    public function addTaxClassRate($trID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addTaxClassRate', array($trID));

        return parent::addTaxClassRate($trID);
    }

    /**
     * {@inheritDoc}
     */
    public function taxClassContainsTaxRate(\Concrete\Package\VividStore\Src\VividStore\Tax\TaxRate $taxRate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'taxClassContainsTaxRate', array($taxRate));

        return parent::taxClassContainsTaxRate($taxRate);
    }

    /**
     * {@inheritDoc}
     */
    public function update($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'update', array($data));

        return parent::update($data);
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
