<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Shipping;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ShippingMethodType extends \Concrete\Package\VividStore\Src\VividStore\Shipping\ShippingMethodType implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'smtID', 'smtHandle', 'smtName', 'pkgID', 'hideFromAddMenu', '' . "\0" . 'Concrete\\Package\\VividStore\\Src\\VividStore\\Shipping\\ShippingMethodType' . "\0" . 'methodTypeController');
        }

        return array('__isInitialized__', 'smtID', 'smtHandle', 'smtName', 'pkgID', 'hideFromAddMenu', '' . "\0" . 'Concrete\\Package\\VividStore\\Src\\VividStore\\Shipping\\ShippingMethodType' . "\0" . 'methodTypeController');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ShippingMethodType $proxy) {
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
    public function setHandle($handle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHandle', array($handle));

        return parent::setHandle($handle);
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function setPackageID($pkgID)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPackageID', array($pkgID));

        return parent::setPackageID($pkgID);
    }

    /**
     * {@inheritDoc}
     */
    public function setMethodTypeController()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMethodTypeController', array());

        return parent::setMethodTypeController();
    }

    /**
     * {@inheritDoc}
     */
    public function hideFromAddMenu($bool = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'hideFromAddMenu', array($bool));

        return parent::hideFromAddMenu($bool);
    }

    /**
     * {@inheritDoc}
     */
    public function isHiddenFromAddMenu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isHiddenFromAddMenu', array());

        return parent::isHiddenFromAddMenu();
    }

    /**
     * {@inheritDoc}
     */
    public function getShippingMethodTypeID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShippingMethodTypeID', array());

        return parent::getShippingMethodTypeID();
    }

    /**
     * {@inheritDoc}
     */
    public function getHandle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHandle', array());

        return parent::getHandle();
    }

    /**
     * {@inheritDoc}
     */
    public function getShippingMethodTypeName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShippingMethodTypeName', array());

        return parent::getShippingMethodTypeName();
    }

    /**
     * {@inheritDoc}
     */
    public function getPackageID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPackageID', array());

        return parent::getPackageID();
    }

    /**
     * {@inheritDoc}
     */
    public function getMethodTypeController()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMethodTypeController', array());

        return parent::getMethodTypeController();
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

    /**
     * {@inheritDoc}
     */
    public function renderDashboardForm($sm)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'renderDashboardForm', array($sm));

        return parent::renderDashboardForm($sm);
    }

    /**
     * {@inheritDoc}
     */
    public function addMethod($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMethod', array($data));

        return parent::addMethod($data);
    }

}