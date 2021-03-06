<?php

namespace DoctrineProxies\__CG__\Concrete\Package\VividStore\Src\VividStore\Promotion\PromotionRules;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SubtotalMinimumPromotionRule extends \Concrete\Package\VividStore\Src\VividStore\Promotion\PromotionRules\SubtotalMinimumPromotionRule implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'id', 'promotionID', 'view', 'viewPath', 'theme', 'controllerActionPath', 'themeViewTemplate', 'helpers', 'sets', 'action', 'request', 'parameters', 'app');
        }

        return array('__isInitialized__', 'id', 'promotionID', 'view', 'viewPath', 'theme', 'controllerActionPath', 'themeViewTemplate', 'helpers', 'sets', 'action', 'request', 'parameters', 'app');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SubtotalMinimumPromotionRule $proxy) {
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
    public function dashboardForm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'dashboardForm', array());

        return parent::dashboardForm();
    }

    /**
     * {@inheritDoc}
     */
    public function addRule($data)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRule', array($data));

        return parent::addRule($data);
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
    public function cartMeetsRule()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'cartMeetsRule', array());

        return parent::cartMeetsRule();
    }

    /**
     * {@inheritDoc}
     */
    public function setPromotionID($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPromotionID', array($id));

        return parent::setPromotionID($id);
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
    public function getPromotionID()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPromotionID', array());

        return parent::getPromotionID();
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
    public function setViewObject(\Concrete\Core\View\AbstractView $view)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setViewObject', array($view));

        return parent::setViewObject($view);
    }

    /**
     * {@inheritDoc}
     */
    public function setTheme($mixed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTheme', array($mixed));

        return parent::setTheme($mixed);
    }

    /**
     * {@inheritDoc}
     */
    public function getTheme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTheme', array());

        return parent::getTheme();
    }

    /**
     * {@inheritDoc}
     */
    public function setThemeViewTemplate($template)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setThemeViewTemplate', array($template));

        return parent::setThemeViewTemplate($template);
    }

    /**
     * {@inheritDoc}
     */
    public function getThemeViewTemplate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getThemeViewTemplate', array());

        return parent::getThemeViewTemplate();
    }

    /**
     * {@inheritDoc}
     */
    public function getControllerActionPath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getControllerActionPath', array());

        return parent::getControllerActionPath();
    }

    /**
     * {@inheritDoc}
     */
    public function getViewObject()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getViewObject', array());

        return parent::getViewObject();
    }

    /**
     * {@inheritDoc}
     */
    public function action()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'action', array());

        return parent::action();
    }

    /**
     * {@inheritDoc}
     */
    public function requireAsset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'requireAsset', array());

        return parent::requireAsset();
    }

    /**
     * {@inheritDoc}
     */
    public function addHeaderItem($item)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addHeaderItem', array($item));

        return parent::addHeaderItem($item);
    }

    /**
     * {@inheritDoc}
     */
    public function addFooterItem($item)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFooterItem', array($item));

        return parent::addFooterItem($item);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $val)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'set', array($key, $val));

        return parent::set($key, $val);
    }

    /**
     * {@inheritDoc}
     */
    public function getSets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSets', array());

        return parent::getSets();
    }

    /**
     * {@inheritDoc}
     */
    public function shouldRunControllerTask()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'shouldRunControllerTask', array());

        return parent::shouldRunControllerTask();
    }

    /**
     * {@inheritDoc}
     */
    public function getHelperObjects()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHelperObjects', array());

        return parent::getHelperObjects();
    }

    /**
     * {@inheritDoc}
     */
    public function get($key = NULL, $defaultValue = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'get', array($key, $defaultValue));

        return parent::get($key, $defaultValue);
    }

    /**
     * {@inheritDoc}
     */
    public function getTask()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTask', array());

        return parent::getTask();
    }

    /**
     * {@inheritDoc}
     */
    public function getAction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAction', array());

        return parent::getAction();
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParameters', array());

        return parent::getParameters();
    }

    /**
     * {@inheritDoc}
     */
    public function on_start()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'on_start', array());

        return parent::on_start();
    }

    /**
     * {@inheritDoc}
     */
    public function on_before_render()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'on_before_render', array());

        return parent::on_before_render();
    }

    /**
     * {@inheritDoc}
     */
    public function isPost()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isPost', array());

        return parent::isPost();
    }

    /**
     * {@inheritDoc}
     */
    public function post($key = NULL, $defaultValue = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'post', array($key, $defaultValue));

        return parent::post($key, $defaultValue);
    }

    /**
     * {@inheritDoc}
     */
    public function redirect()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'redirect', array());

        return parent::redirect();
    }

    /**
     * {@inheritDoc}
     */
    public function runTask($action, $parameters)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'runTask', array($action, $parameters));

        return parent::runTask($action, $parameters);
    }

    /**
     * {@inheritDoc}
     */
    public function runAction($action, $parameters = array (
))
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'runAction', array($action, $parameters));

        return parent::runAction($action, $parameters);
    }

    /**
     * {@inheritDoc}
     */
    public function request($key = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'request', array($key));

        return parent::request($key);
    }

    /**
     * {@inheritDoc}
     */
    public function setApplication(\Concrete\Core\Application\Application $application)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApplication', array($application));

        return parent::setApplication($application);
    }

}
