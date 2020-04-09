<?php
namespace {
    die('Intended for use with IDE symbol matching only.');
    //Generated on Fri, 05 Feb 2016 03:00:38 +0100

    class Area extends \Concrete\Core\Area\Area
    {
        /**
         * @param string $arDisplayName
         */
        public function setAreaDisplayName($arDisplayName)
        {
            return parent::setAreaDisplayName($arDisplayName);
        }
        /**
         * Returns whether or not controls are to be displayed.
         *
         * @return bool
         */
        public function showControls()
        {
            return parent::showControls();
        }
        /**
         * Force enables controls to show.
         */
        public function forceControlsToDisplay()
        {
            return parent::forceControlsToDisplay();
        }
        /**
         * @param int $cspan
         */
        public function setAreaGridMaximumColumns($cspan)
        {
            return parent::setAreaGridMaximumColumns($cspan);
        }
        /**
         * @return int|null
         *
         * @throws \Exception
         */
        public function getAreaGridMaximumColumns()
        {
            return parent::getAreaGridMaximumColumns();
        }
        /**
         * Enable Grid containers.
         */
        final public function enableGridContainer()
        {
            return parent::enableGridContainer();
        }
        /**
         * @return bool
         */
        public function isGridContainerEnabled()
        {
            return parent::isGridContainerEnabled();
        }
        /**
         * @return string
         */
        public function getAreaDisplayName()
        {
            return parent::getAreaDisplayName();
        }
        /**
         * @return string
         */
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        /**
         * @return string
         */
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        /**
         * @return string
         */
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        /**
         * @return string
         */
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * returns the Collection's cID.
         *
         * @return int
         */
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        /**
         * returns the Collection object for the current Area.
         *
         * @return Page
         */
        public function getAreaCollectionObject()
        {
            return parent::getAreaCollectionObject();
        }
        /**
         * whether or not it's a global area.
         *
         * @return bool
         */
        public function isGlobalArea()
        {
            return parent::isGlobalArea();
        }
        /**
         * returns the arID of the current area.
         *
         * @return int
         */
        public function getAreaID()
        {
            return parent::getAreaID();
        }
        /**
         * returns the handle for the current area.
         *
         * @return string
         */
        public function getAreaHandle()
        {
            return parent::getAreaHandle();
        }
        /**
         * Returns the total number of blocks in an area.
         *
         * @param Page $c must be passed if the display() method has not been run on the area object yet.
         */
        public function getTotalBlocksInArea($c = false)
        {
            return parent::getTotalBlocksInArea($c);
        }
        /**
         * Returns the amount of actual blocks in the area, does not exclude core blocks or layouts, does not recurse.
         */
        public function getTotalBlocksInAreaEditMode()
        {
            return parent::getTotalBlocksInAreaEditMode();
        }
        /**
         * check if the area has permissions that override the page's permissions.
         *
         * @return bool
         */
        public function overrideCollectionPermissions()
        {
            return parent::overrideCollectionPermissions();
        }
        /**
         * @return int
         */
        public function getAreaCollectionInheritID()
        {
            return parent::getAreaCollectionInheritID();
        }
        /**
         * Sets the total number of blocks an area allows. Does not limit by type.
         *
         * @param int $num
         */
        public function setBlockLimit($num)
        {
            return parent::setBlockLimit($num);
        }
        /**
         * disables controls for the current area.
         */
        public function disableControls()
        {
            return parent::disableControls();
        }
        /**
         * gets the maximum allowed number of blocks, -1 if unlimited.
         *
         * @return int
         */
        public function getMaximumBlocks()
        {
            return parent::getMaximumBlocks();
        }
        /**
         * @param string $task
         * @param null $alternateHandler
         *
         * @return string
         */
        public function getAreaUpdateAction($task = "update", $alternateHandler = null)
        {
            return parent::getAreaUpdateAction($task, $alternateHandler);
        }
        /**
         * @param Page $c
         */
        public function refreshCache($c)
        {
            return parent::refreshCache($c);
        }
        /**
         * Gets the Area object for the given page and area handle.
         *
         * @param Page $c
         * @param string $arHandle
         *
         * @return Area
         */
        final public static function get($c, $arHandle)
        {
            return Concrete\Core\Area\Area::get($c, $arHandle);
        }
        /**
         * Creates an area in the database. I would like to make this static but PHP pre 5.3 sucks at this stuff.
         *
         * @param Page $c
         * @param string $arHandle
         *
         * @return Area
         */
        public function create($c, $arHandle)
        {
            return parent::create($c, $arHandle);
        }
        /**
         * @param $arID
         *
         * @return string
         */
        public static function getAreaHandleFromID($arID)
        {
            return Concrete\Core\Area\Area::getAreaHandleFromID($arID);
        }
        /**
         * Get all of the blocks within the current area for a given page.
         *
         * @param Page|bool $c
         *
         * @return Block[]
         */
        public function getAreaBlocksArray($c = false)
        {
            return parent::getAreaBlocksArray($c);
        }
        /**
         * Gets a list of all areas.
         *
         * @return array
         */
        public static function getHandleList()
        {
            return Concrete\Core\Area\Area::getHandleList();
        }
        /**
         * @param Page $c
         *
         * @return Area[]
         */
        public static function getListOnPage(Concrete\Core\Page\Page $c)
        {
            return Concrete\Core\Area\Area::getListOnPage($c);
        }
        /**
         * This function removes all permissions records for the current Area
         * and sets it to inherit from the Page permissions.
         */
        public function revertToPagePermissions()
        {
            return parent::revertToPagePermissions();
        }
        /**
         * Rescans the current Area's permissions ensuring that it's inheriting permissions properly up the chain.
         *
         * @return bool
         */
        public function rescanAreaPermissionsChain()
        {
            return parent::rescanAreaPermissionsChain();
        }
        /**
         * works a lot like rescanAreaPermissionsChain() but it works down. This is typically only
         * called when we update an area to have specific permissions, and all areas that are on pagesbelow it with the same
         * handle, etc... should now inherit from it.
         *
         * @param int $cIDToCheck
         */
        public function rescanSubAreaPermissions($cIDToCheck = null)
        {
            return parent::rescanSubAreaPermissions($cIDToCheck);
        }
        /**
         * similar to rescanSubAreaPermissions, but for those who have setup their pages to inherit master collection permissions.
         *
         * @see Area::rescanSubAreaPermissions()
         *
         * @param Page $masterCollection
         *
         * @return bool
         */
        public function rescanSubAreaPermissionsMasterCollection($masterCollection)
        {
            return parent::rescanSubAreaPermissionsMasterCollection($masterCollection);
        }
        /**
         * @param Page $c
         * @param string $arHandle
         *
         * @return Area
         */
        public static function getOrCreate($c, $arHandle)
        {
            return Concrete\Core\Area\Area::getOrCreate($c, $arHandle);
        }
        /**
         * @param Page $c
         */
        public function load($c)
        {
            return parent::load($c);
        }
        /**
         * @return Block[]
         */
        protected function getAreaBlocks()
        {
            return parent::getAreaBlocks();
        }
        /**
         * displays the Area in the page
         * ex: $a = new Area('Main'); $a->display($c);.
         *
         * @param Page $c
         * @param Block[] $alternateBlockArray optional array of blocks to render instead of default behavior
         *
         * @return bool
         */
        public function display($c = false, $alternateBlockArray = null)
        {
            return parent::display($c, $alternateBlockArray);
        }
        /**
         * Exports the area to content format.
         *
         * @param \SimpleXMLElement $p
         * @param Page $page
         */
        public function export($p, $page)
        {
            return parent::export($p, $page);
        }
        /**
         * Specify HTML to automatically print before blocks contained within the area.
         *
         * @param string $html
         */
        public function setBlockWrapperStart($html)
        {
            return parent::setBlockWrapperStart($html);
        }
        /**
         * Set HTML that automatically prints after any blocks contained within the area.
         *
         * @param string $html
         */
        public function setBlockWrapperEnd($html)
        {
            return parent::setBlockWrapperEnd($html);
        }
        public function overridePagePermissions()
        {
            return parent::overridePagePermissions();
        }
        /**
         * Sets a custom block template for blocks of a type specified by the btHandle
         * Note, these can be stacked. For example
         * $a->setCustomTemplate('image', 'banner');
         * $a->setCustomTemplate('content', 'masthead_content');.
         *
         * @param string $btHandle handle for the block type
         * @param string $view string identifying the block template ex: 'templates/breadcrumb.php'
         */
        public function setCustomTemplate($btHandle, $view)
        {
            return parent::setCustomTemplate($btHandle, $view);
        }
        /**
         * returns an array of custom templates defined for this Area object.
         *
         * @return array
         */
        public function getAreaCustomTemplates()
        {
            return parent::getAreaCustomTemplates();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Asset extends \Concrete\Core\Asset\Asset
    {
        public function getOutputAssetType()
        {
            return parent::getOutputAssetType();
        }
        /**
         * @param Asset[] $assets
         *
         * @return Asset[]
         *
         * @abstract
         */
        public static function process($assets)
        {
            return Concrete\Core\Asset\Asset::process($assets);
        }
        /**
         * @return bool
         */
        public function assetSupportsMinification()
        {
            return parent::assetSupportsMinification();
        }
        /**
         * @return bool
         */
        public function assetSupportsCombination()
        {
            return parent::assetSupportsCombination();
        }
        /**
         * @param bool $minify
         */
        public function setAssetSupportsMinification($minify)
        {
            return parent::setAssetSupportsMinification($minify);
        }
        /**
         * @param bool $combine
         */
        public function setAssetSupportsCombination($combine)
        {
            return parent::setAssetSupportsCombination($combine);
        }
        /**
         * @return string
         */
        public function getAssetURL()
        {
            return parent::getAssetURL();
        }
        /**
         * @return string
         */
        public function getAssetHashKey()
        {
            return parent::getAssetHashKey();
        }
        /**
         * @return string
         */
        public function getAssetPath()
        {
            return parent::getAssetPath();
        }
        /**
         * @return string
         */
        public function getAssetHandle()
        {
            return parent::getAssetHandle();
        }
        /**
         * @return string
         */
        public function getAssetFilename()
        {
            return parent::getAssetFilename();
        }
        /**
         * @param string $version
         */
        public function setAssetVersion($version)
        {
            return parent::setAssetVersion($version);
        }
        /**
         * @param array $paths
         */
        public function setCombinedAssetSourceFiles($paths)
        {
            return parent::setCombinedAssetSourceFiles($paths);
        }
        /**
         * @return string
         */
        public function getAssetVersion()
        {
            return parent::getAssetVersion();
        }
        /**
         * @param string $position
         */
        public function setAssetPosition($position)
        {
            return parent::setAssetPosition($position);
        }
        /**
         * @param \Package $pkg
         */
        public function setPackageObject($pkg)
        {
            return parent::setPackageObject($pkg);
        }
        /**
         * @param string $url
         */
        public function setAssetURL($url)
        {
            return parent::setAssetURL($url);
        }
        /**
         * @param string $path
         */
        public function setAssetPath($path)
        {
            return parent::setAssetPath($path);
        }
        /**
         * @return string
         */
        public function getAssetURLPath()
        {
            return parent::getAssetURLPath();
        }
        /**
         * @return bool
         */
        public function isAssetLocal()
        {
            return parent::isAssetLocal();
        }
        /**
         * @param bool $isLocal
         */
        public function setAssetIsLocal($isLocal)
        {
            return parent::setAssetIsLocal($isLocal);
        }
        /**
         * @return string
         */
        public function getAssetPosition()
        {
            return parent::getAssetPosition();
        }
        /**
         * @param string $path
         */
        public function mapAssetLocation($path)
        {
            return parent::mapAssetLocation($path);
        }
        /**
         * @return string|null
         */
        public function getAssetContents()
        {
            return parent::getAssetContents();
        }
        /**
         * @param string $route
         *
         * @return string|null
         */
        protected static function getAssetContentsByRoute($route)
        {
            return Concrete\Core\Asset\Asset::getAssetContentsByRoute($route);
        }
        public function register($filename, $args, $pkg = false)
        {
            return parent::register($filename, $args, $pkg);
        }
    }

    class AssetList extends \Concrete\Core\Asset\AssetList
    {
        public function getRegisteredAssets()
        {
            return parent::getRegisteredAssets();
        }
        /**
         * @return \Concrete\Core\Asset\AssetGroup[]
         */
        public function getRegisteredAssetGroups()
        {
            return parent::getRegisteredAssetGroups();
        }
        /**
         * @return AssetList
         */
        public static function getInstance()
        {
            return Concrete\Core\Asset\AssetList::getInstance();
        }
        /**
         * @param string $assetType
         * @param string $assetHandle
         * @param string $filename
         * @param array $args
         * @param bool $pkg
         * @return Asset
         */
        public function register($assetType, $assetHandle, $filename, $args = array(), $pkg = false)
        {
            return parent::register($assetType, $assetHandle, $filename, $args, $pkg);
        }
        /**
         * @param array $assets
         */
        public function registerMultiple(array $assets)
        {
            return parent::registerMultiple($assets);
        }
        /**
         * @param Asset $asset
         */
        public function registerAsset(Concrete\Core\Asset\Asset $asset)
        {
            return parent::registerAsset($asset);
        }
        /**
         * @param string $assetGroupHandle
         * @param array $assetHandles
         * @param bool $customClass
         */
        public function registerGroup($assetGroupHandle, $assetHandles, $customClass = false)
        {
            return parent::registerGroup($assetGroupHandle, $assetHandles, $customClass);
        }
        /**
         * @param array $asset_groups
         */
        public function registerGroupMultiple(array $asset_groups)
        {
            return parent::registerGroupMultiple($asset_groups);
        }
        /**
         * @param string $assetType
         * @param string $assetHandle
         * @return Asset
         */
        public function getAsset($assetType, $assetHandle)
        {
            return parent::getAsset($assetType, $assetHandle);
        }
        /**
         * @param string $assetGroupHandle
         * @return \Concrete\Core\Asset\AssetGroup
         */
        public function getAssetGroup($assetGroupHandle)
        {
            return parent::getAssetGroup($assetGroupHandle);
        }
    }

    class AttributeSet extends \Concrete\Core\Attribute\Set
    {
        public static function getByID($asID)
        {
            return Concrete\Core\Attribute\Set::getByID($asID);
        }
        public static function getByHandle($asHandle, $akCategoryID = null)
        {
            return Concrete\Core\Attribute\Set::getByHandle($asHandle, $akCategoryID);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Attribute\Set::getListByPackage($pkg);
        }
        public function getAttributeSetID()
        {
            return parent::getAttributeSetID();
        }
        public function getAttributeSetHandle()
        {
            return parent::getAttributeSetHandle();
        }
        public function getAttributeSetName()
        {
            return parent::getAttributeSetName();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function getAttributeSetKeyCategoryID()
        {
            return parent::getAttributeSetKeyCategoryID();
        }
        public function isAttributeSetLocked()
        {
            return parent::isAttributeSetLocked();
        }
        /** Returns the display name for this attribute set (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *	Escape the result in html format (if $format is 'html').
         *	If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getAttributeSetDisplayName($format = "html")
        {
            return parent::getAttributeSetDisplayName($format);
        }
        public function updateAttributeSetName($asName)
        {
            return parent::updateAttributeSetName($asName);
        }
        public function updateAttributeSetHandle($asHandle)
        {
            return parent::updateAttributeSetHandle($asHandle);
        }
        public function addKey($ak)
        {
            return parent::addKey($ak);
        }
        public function clearAttributeKeys()
        {
            return parent::clearAttributeKeys();
        }
        public function export($axml)
        {
            return parent::export($axml);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Attribute\Set::exportList($xml);
        }
        public function getAttributeKeys()
        {
            return parent::getAttributeKeys();
        }
        public function contains($ak)
        {
            return parent::contains($ak);
        }
        /**
         * Removes an attribute set and sets all keys within to have a set ID of 0.
         */
        public function delete()
        {
            return parent::delete();
        }
        public function deleteKey($ak)
        {
            return parent::deleteKey($ak);
        }
        protected function rescanDisplayOrder()
        {
            return parent::rescanDisplayOrder();
        }
        public function updateAttributesDisplayOrder($uats)
        {
            return parent::updateAttributesDisplayOrder($uats);
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Attribute\Set::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class AuthenticationType extends \Concrete\Core\Authentication\AuthenticationType
    {
        public static function getListSorted()
        {
            return Concrete\Core\Authentication\AuthenticationType::getListSorted();
        }
        /**
         * Return a raw list of authentication types
         * @param bool $sorted true: Sort by display order, false: sort by install order
         * @param bool $activeOnly true: include only active types, false: include active and inactive types
         * @return AuthenticationType[]
         */
        public static function getList($sorted = false, $activeOnly = false)
        {
            return Concrete\Core\Authentication\AuthenticationType::getList($sorted, $activeOnly);
        }
        /**
         * Load an AuthenticationType from an array.
         * @param array $arr should be an array of the following key/value pairs to create an object from:
         * <pre>
         * array(
         *     'authTypeID' => int,
         *     'authTypeHandle' => string,
         *     'authTypeName' => string,
         *     'authTypeDisplayOrder' => int,
         *     'authTypeIsEnabled' => tinyint,
         *     'pkgID' => int
         * )
         * </pre>
         * @return bool|\Concrete\Core\Authentication\AuthenticationType
         */
        public static function load($arr)
        {
            return Concrete\Core\Authentication\AuthenticationType::load($arr);
        }
        /**
         * Load the AuthenticationTypeController into the AuthenticationType
         */
        protected function loadController()
        {
            return parent::loadController();
        }
        /**
         * AuthenticationType::getPackageHandle
         * Return the package handle.
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Return an array of AuthenticationTypes that are associated with a specific package.
         * @param Package $pkg
         * @return AuthenticationType[]
         */
        public static function getListByPackage(Concrete\Core\Package\Package $pkg)
        {
            return Concrete\Core\Authentication\AuthenticationType::getListByPackage($pkg);
        }
        /**
         * @param string $atHandle New AuthenticationType handle
         * @param string $atName New AuthenticationType name, expect this to be presented with "%s Authentication Type"
         * @param int $order Order int, used to order the display of AuthenticationTypes
         * @param bool|\Package $pkg Package object to which this AuthenticationType is associated.
         * @throws \Exception
         * @return AuthenticationType Returns a loaded authentication type.
         */
        public static function add($atHandle, $atName, $order = 0, $pkg = false)
        {
            return Concrete\Core\Authentication\AuthenticationType::add($atHandle, $atName, $order, $pkg);
        }
        /**
         * Return loaded AuthenticationType with the given handle.
         * @param string $atHandle AuthenticationType handle.
         * @throws \Exception when an invalid handle is provided
         * @return AuthenticationType
         */
        public static function getByHandle($atHandle)
        {
            return Concrete\Core\Authentication\AuthenticationType::getByHandle($atHandle);
        }
        /**
         * Return loaded AuthenticationType with the given ID.
         * @param int $authTypeID
         * @throws \Exception
         * @return AuthenticationType
         */
        public static function getByID($authTypeID)
        {
            return Concrete\Core\Authentication\AuthenticationType::getByID($authTypeID);
        }
        public function getAuthenticationTypeName()
        {
            return parent::getAuthenticationTypeName();
        }
        public function getAuthenticationTypeDisplayOrder()
        {
            return parent::getAuthenticationTypeDisplayOrder();
        }
        public function getAuthenticationTypePackageID()
        {
            return parent::getAuthenticationTypePackageID();
        }
        public function getController()
        {
            return parent::getController();
        }
        public function getAuthenticationTypeIconHTML()
        {
            return parent::getAuthenticationTypeIconHTML();
        }
        /**
         * Update the name
         * @param string $authTypeName
         */
        public function setAuthenticationTypeName($authTypeName)
        {
            return parent::setAuthenticationTypeName($authTypeName);
        }
        /**
         * AuthenticationType::setAuthenticationTypeDisplayOrder
         * Update the order for display.
         *
         * @param int $order value from 0-n to signify order.
         */
        public function setAuthenticationTypeDisplayOrder($order)
        {
            return parent::setAuthenticationTypeDisplayOrder($order);
        }
        public function getAuthenticationTypeID()
        {
            return parent::getAuthenticationTypeID();
        }
        /**
         * AuthenticationType::toggle
         * Toggle the active state of an AuthenticationType
         */
        public function toggle()
        {
            return parent::toggle();
        }
        public function isEnabled()
        {
            return parent::isEnabled();
        }
        public function getAuthenticationTypeStatus()
        {
            return parent::getAuthenticationTypeStatus();
        }
        /**
         * AuthenticationType::disable
         * Disable an authentication type.
         */
        public function disable()
        {
            return parent::disable();
        }
        /**
         * AuthenticationType::enable
         * Enable an authentication type.
         */
        public function enable()
        {
            return parent::enable();
        }
        /**
         * AuthenticationType::delete
         * Remove an AuthenticationType, this should be used sparingly.
         */
        public function delete()
        {
            return parent::delete();
        }
        /**
         * Return the path to a file
         * @param string $_file the relative path to the file.
         * @return bool|string
         */
        public function getAuthenticationTypeFilePath($_file)
        {
            return parent::getAuthenticationTypeFilePath($_file);
        }
        /**
         * Return the first existing file path in this order:
         *  - /models/authentication/types/HANDLE
         *  - /packages/PKGHANDLE/authentication/types/HANDLE
         *  - /concrete/models/authentication/types/HANDLE
         *  - /concrete/core/models/authentication/types/HANDLE
         *
         * @param string $_file The filename you want.
         * @return string This will return false if the file is not found.
         */
        protected function mapAuthenticationTypeFilePath($_file)
        {
            return parent::mapAuthenticationTypeFilePath($_file);
        }
        public function getAuthenticationTypeHandle()
        {
            return parent::getAuthenticationTypeHandle();
        }
        /**
         * Render the settings form for this type.
         * Settings forms are expected to handle their own submissions and redirect to the appropriate page.
         * Otherwise, if the method exists, all $_REQUEST variables with the arrangement: HANDLE[]
         * in an array to the AuthenticationTypeController::saveTypeForm
         */
        public function renderTypeForm()
        {
            return parent::renderTypeForm();
        }
        /**
         * Render the login form for this authentication type.
         *
         * @param string $element
         * @param array  $params
         */
        public function renderForm($element = "form", $params = array())
        {
            return parent::renderForm($element, $params);
        }
        /**
         * Render the hook form for saving the profile settings.
         * All settings are expected to be saved by each individual authentication type
         */
        public function renderHook()
        {
            return parent::renderHook();
        }
        public function hasHook()
        {
            return parent::hasHook();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Block extends \Concrete\Core\Block\Block
    {
        public static function populateManually($blockInfo, $c, $a)
        {
            return Concrete\Core\Block\Block::populateManually($blockInfo, $c, $a);
        }
        /**
         * Returns a block.
         */
        public static function getByName($blockName)
        {
            return Concrete\Core\Block\Block::getByName($blockName);
        }
        public static function getByID($bID, $c = null, $a = null)
        {
            return Concrete\Core\Block\Block::getByID($bID, $c, $a);
        }
        public function getBlockTypeID()
        {
            return parent::getBlockTypeID();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getAreaHandle()
        {
            return parent::getAreaHandle();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getProxyBlock()
        {
            return parent::getProxyBlock();
        }
        public function setProxyBlock($block)
        {
            return parent::setProxyBlock($block);
        }
        public function display($view = "view")
        {
            return parent::display($view);
        }
        public function isGlobal()
        {
            return parent::isGlobal();
        }
        public function getBlockCachedRecord()
        {
            return parent::getBlockCachedRecord();
        }
        public function getBlockCachedOutput($area)
        {
            return parent::getBlockCachedOutput($area);
        }
        public function isBlockInStack()
        {
            return parent::isBlockInStack();
        }
        public function getBlockCollectionObject()
        {
            return parent::getBlockCollectionObject();
        }
        public function getOriginalCollection()
        {
            return parent::getOriginalCollection();
        }
        public function getBlockID()
        {
            return parent::getBlockID();
        }
        public function setBlockCachedOutput($content, $lifetime, $area)
        {
            return parent::setBlockCachedOutput($content, $lifetime, $area);
        }
        public function inc($file)
        {
            return parent::inc($file);
        }
        public function getBlockPath()
        {
            return parent::getBlockPath();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function getBlockTypeHandle()
        {
            return parent::getBlockTypeHandle();
        }
        public function revertToAreaPermissions()
        {
            return parent::revertToAreaPermissions();
        }
        public function loadNewCollection(&$c)
        {
            return parent::loadNewCollection($c);
        }
        public function setBlockAreaObject(&$a)
        {
            return parent::setBlockAreaObject($a);
        }
        public function disableBlockVersioning()
        {
            return parent::disableBlockVersioning();
        }
        public function getNumChildren()
        {
            return parent::getNumChildren();
        }
        public function getController()
        {
            return parent::getController();
        }
        public function getInstance()
        {
            return parent::getInstance();
        }
        public function getBlockTypeObject()
        {
            return parent::getBlockTypeObject();
        }
        public function getCollectionList()
        {
            return parent::getCollectionList();
        }
        public function update($data)
        {
            return parent::update($data);
        }
        public function refreshBlockOutputCache()
        {
            return parent::refreshBlockOutputCache();
        }
        public function getBlockCollectionID()
        {
            return parent::getBlockCollectionID();
        }
        public function isActive()
        {
            return parent::isActive();
        }
        public function deactivate()
        {
            return parent::deactivate();
        }
        public function activate()
        {
            return parent::activate();
        }
        public function alias($c)
        {
            return parent::alias($c);
        }
        public function overrideAreaPermissions()
        {
            return parent::overrideAreaPermissions();
        }
        public function overrideBlockTypeCacheSettings()
        {
            return parent::overrideBlockTypeCacheSettings();
        }
        public function enableBlockContainer()
        {
            return parent::enableBlockContainer();
        }
        public function ignorePageThemeGridFrameworkContainer()
        {
            return parent::ignorePageThemeGridFrameworkContainer();
        }
        public function overrideBlockTypeContainerSettings()
        {
            return parent::overrideBlockTypeContainerSettings();
        }
        public function getBlockCacheSettingsObject()
        {
            return parent::getBlockCacheSettingsObject();
        }
        public function cacheBlockOutput()
        {
            return parent::cacheBlockOutput();
        }
        /**
         * Called by the scrapbook proxy block, this disables the original block container for the current request,
         * because the scrapbook block takes care of rendering the container.
         */
        public function disableBlockContainer()
        {
            return parent::disableBlockContainer();
        }
        public function cacheBlockOutputOnPost()
        {
            return parent::cacheBlockOutputOnPost();
        }
        public function cacheBlockOutputForRegisteredUsers()
        {
            return parent::cacheBlockOutputForRegisteredUsers();
        }
        public function getBlockOutputCacheLifetime()
        {
            return parent::getBlockOutputCacheLifetime();
        }
        public function getCustomStyleSetID()
        {
            return parent::getCustomStyleSetID();
        }
        public function getBlockAreaObject()
        {
            return parent::getBlockAreaObject();
        }
        /**
         * Move block to a new collection.
         *
         * @param Collection $collection
         * @param Area       $area
         *
         * @return bool
         */
        public function move(Concrete\Core\Page\Collection\Collection $collection, Concrete\Core\Area\Area $area)
        {
            return parent::move($collection, $area);
        }
        public function duplicate($nc, $isCopyFromMasterCollectionPropagation = false)
        {
            return parent::duplicate($nc, $isCopyFromMasterCollectionPropagation);
        }
        public function getCustomStyle($force = false)
        {
            return parent::getCustomStyle($force);
        }
        public function resetBlockContainerSettings()
        {
            return parent::resetBlockContainerSettings();
        }
        public function setCustomContainerSettings($enableBlockContainer)
        {
            return parent::setCustomContainerSettings($enableBlockContainer);
        }
        public function resetCustomCacheSettings()
        {
            return parent::resetCustomCacheSettings();
        }
        public function setCustomCacheSettings($enabled, $enabledOnPost, $enabledForRegistered, $lifetime)
        {
            return parent::setCustomCacheSettings($enabled, $enabledOnPost, $enabledForRegistered, $lifetime);
        }
        public function setCustomStyleSet(Concrete\Core\StyleCustomizer\Inline\StyleSet $set)
        {
            return parent::setCustomStyleSet($set);
        }
        public function resetCustomStyle()
        {
            return parent::resetCustomStyle();
        }
        /**
         * Removes a cached version of the block.
         */
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        public function setBlockCollectionObject($c)
        {
            return parent::setBlockCollectionObject($c);
        }
        public function getBlockTypeName()
        {
            return parent::getBlockTypeName();
        }
        public function getBlockUserID()
        {
            return parent::getBlockUserID();
        }
        /**
         * Gets the date the block was added.
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getBlockDateAdded()
        {
            return parent::getBlockDateAdded();
        }
        public function getBlockDateLastModified()
        {
            return parent::getBlockDateLastModified();
        }
        public function setBlockActionCollectionID($bActionCID)
        {
            return parent::setBlockActionCollectionID($bActionCID);
        }
        public function getBlockEditAction()
        {
            return parent::getBlockEditAction();
        }
        public function _getBlockAction()
        {
            return parent::_getBlockAction();
        }
        /**
         * @return int|false The block action collection id or false if not found
         */
        public function getBlockActionCollectionID()
        {
            return parent::getBlockActionCollectionID();
        }
        public function getBlockUpdateInformationAction()
        {
            return parent::getBlockUpdateInformationAction();
        }
        public function getBlockUpdateCssAction()
        {
            return parent::getBlockUpdateCssAction();
        }
        public function isEditable()
        {
            return parent::isEditable();
        }
        public function delete($forceDelete = false)
        {
            return parent::delete($forceDelete);
        }
        public function deleteBlock($forceDelete = false)
        {
            return parent::deleteBlock($forceDelete);
        }
        public function isAlias($c = null)
        {
            return parent::isAlias($c);
        }
        public function setOriginalBlockID($originalBID)
        {
            return parent::setOriginalBlockID($originalBID);
        }
        public function moveBlockToDisplayOrderPosition($afterBlock)
        {
            return parent::moveBlockToDisplayOrderPosition($afterBlock);
        }
        public function getBlockDisplayOrder()
        {
            return parent::getBlockDisplayOrder();
        }
        public function setAbsoluteBlockDisplayOrder($do)
        {
            return parent::setAbsoluteBlockDisplayOrder($do);
        }
        public function doOverrideAreaPermissions()
        {
            return parent::doOverrideAreaPermissions();
        }
        public function setCustomTemplate($template)
        {
            return parent::setCustomTemplate($template);
        }
        public function updateBlockInformation($data)
        {
            return parent::updateBlockInformation($data);
        }
        public function setName($name)
        {
            return parent::setName($name);
        }
        public function refreshCacheAll()
        {
            return parent::refreshCacheAll();
        }
        public function export($node, $exportType = "full")
        {
            return parent::export($node, $exportType);
        }
        public function isAliasOfMasterCollection()
        {
            return parent::isAliasOfMasterCollection();
        }
        public function getBlockName()
        {
            return parent::getBlockName();
        }
        public function getBlockFilename()
        {
            return parent::getBlockFilename();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    /**
     * @Entity
     * @Table(name="BlockTypes")
     */
    class BlockType extends \Concrete\Core\Block\BlockType\BlockType
    {
        /**
         * Retrieves a BlockType object based on its btHandle
         *
         * @return BlockType
         */
        public static function getByHandle($btHandle)
        {
            return Concrete\Core\Block\BlockType\BlockType::getByHandle($btHandle);
        }
        /**
         * Clears output and record caches.
         */
        public static function clearCache()
        {
            return Concrete\Core\Block\BlockType\BlockType::clearCache();
        }
        /**
         * Retrieves a BlockType object based on its btID
         *
         * @return BlockType
         */
        public static function getByID($btID)
        {
            return Concrete\Core\Block\BlockType\BlockType::getByID($btID);
        }
        /**
         * @deprecated
         */
        public static function installBlockTypeFromPackage($btHandle, $pkg)
        {
            return Concrete\Core\Block\BlockType\BlockType::installBlockTypeFromPackage($btHandle, $pkg);
        }
        /**
         * Installs a BlockType that is passed via a btHandle string. The core or override directories are parsed.
         */
        public static function installBlockType($btHandle, $pkg = false)
        {
            return Concrete\Core\Block\BlockType\BlockType::installBlockType($btHandle, $pkg);
        }
        /**
         * Return the class file that this BlockType uses
         *
         * @return string
         */
        public static function getBlockTypeMappedClass($btHandle, $pkgHandle = false)
        {
            return Concrete\Core\Block\BlockType\BlockType::getBlockTypeMappedClass($btHandle, $pkgHandle);
        }
        /**
         * Sets the Ignore Page Theme Gride Framework Container
         */
        public function setBlockTypeIgnorePageThemeGridFrameworkContainer($btIgnorePageThemeGridFrameworkContainer)
        {
            return parent::setBlockTypeIgnorePageThemeGridFrameworkContainer($btIgnorePageThemeGridFrameworkContainer);
        }
        /**
         * Sets the block type handle
         */
        public function setBlockTypeName($btName)
        {
            return parent::setBlockTypeName($btName);
        }
        /**
         * Sets the block type description
         */
        public function setBlockTypeDescription($btDescription)
        {
            return parent::setBlockTypeDescription($btDescription);
        }
        /**
         * Sets the block type handle
         */
        public function setBlockTypeHandle($btHandle)
        {
            return parent::setBlockTypeHandle($btHandle);
        }
        /**
         * Determines if the block type has templates available
         *
         * @return boolean
         */
        public function hasAddTemplate()
        {
            return parent::hasAddTemplate();
        }
        /**
         * gets the available composer templates
         * used for editing instances of the BlockType while in the composer ui in the dashboard
         *
         * @return TemplateFile[]
         */
        public function getBlockTypeComposerTemplates()
        {
            return parent::getBlockTypeComposerTemplates();
        }
        /**
         * @return string
         */
        public function getBlockTypeHandle()
        {
            return parent::getBlockTypeHandle();
        }
        /**
         * if a the current BlockType supports inline edit or not
         *
         * @return boolean
         */
        public function supportsInlineEdit()
        {
            return parent::supportsInlineEdit();
        }
        /**
         * if a the current BlockType supports inline add or not
         *
         * @return boolean
         */
        public function supportsInlineAdd()
        {
            return parent::supportsInlineAdd();
        }
        /**
         * Returns true if the block type is internal (and therefore cannot be removed) a core block
         *
         * @return boolean
         */
        public function isInternalBlockType()
        {
            return parent::isInternalBlockType();
        }
        /**
         * returns the width in pixels that the block type's editing dialog will open in
         *
         * @return int
         */
        public function getBlockTypeInterfaceWidth()
        {
            return parent::getBlockTypeInterfaceWidth();
        }
        /**
         * returns the height in pixels that the block type's editing dialog will open in
         *
         * @return int
         */
        public function getBlockTypeInterfaceHeight()
        {
            return parent::getBlockTypeInterfaceHeight();
        }
        /**
         * If true, container classes will not be wrapped around this block type in edit mode (if the
         * theme in question supports a grid framework.
         * @return bool
         */
        public function ignorePageThemeGridFrameworkContainer()
        {
            return parent::ignorePageThemeGridFrameworkContainer();
        }
        /**
         * returns the id of the BlockType's package if it's in a package
         *
         * @return int
         */
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * gets the BlockTypes description text
         *
         * @return string
         */
        public function getBlockTypeDescription()
        {
            return parent::getBlockTypeDescription();
        }
        /**
         * @return string
         */
        public function getBlockTypeName()
        {
            return parent::getBlockTypeName();
        }
        /**
         * @return boolean
         */
        public function isCopiedWhenPropagated()
        {
            return parent::isCopiedWhenPropagated();
        }
        /**
         * If true, this block is not versioned on a page – it is included as is on all versions of the page, even when updated.
         *
         * @return boolean
         */
        public function includeAll()
        {
            return parent::includeAll();
        }
        /**
         * @deprecated
         */
        public function getBlockTypeClassFromHandle()
        {
            return parent::getBlockTypeClassFromHandle();
        }
        /**
         * Returns the class for the current block type.
         */
        public function getBlockTypeClass()
        {
            return parent::getBlockTypeClass();
        }
        /**
         * returns the handle of the BlockType's package if it's in a package
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Returns an array of all BlockTypeSet objects that this block is in
         */
        public function getBlockTypeSets()
        {
            return parent::getBlockTypeSets();
        }
        /**
         * @return int
         */
        public function getBlockTypeID()
        {
            return parent::getBlockTypeID();
        }
        /**
         * Returns the number of unique instances of this block throughout the entire site
         * note - this count could include blocks in areas that are no longer rendered by the theme
         *
         * @param boolean specify true if you only want to see the number of blocks in active pages
         * @return int
         */
        public function getCount($ignoreUnapprovedVersions = false)
        {
            return parent::getCount($ignoreUnapprovedVersions);
        }
        /**
         * Not a permissions call. Actually checks to see whether this block is not an internal one.
         *
         * @return boolean
         */
        public function canUnInstall()
        {
            return parent::canUnInstall();
        }
        /**
         * if a the current BlockType is Internal or not - meaning one of the core built-in concrete5 blocks
         *
         * @access private
         * @return boolean
         */
        public function isBlockTypeInternal()
        {
            return parent::isBlockTypeInternal();
        }
        /**
         * Renders a particular view of a block type, using the public $controller variable as the block type's controller
         *
         * @param string template 'view' for the default
         * @return void
         */
        public function render($view = "view")
        {
            return parent::render($view);
        }
        /**
         * get's the block type controller
         *
         * @return BlockTypeController
         */
        public function getController()
        {
            return parent::getController();
        }
        /**
         * Gets the custom templates available for the current BlockType
         *
         * @return TemplateFile[]
         */
        public function getBlockTypeCustomTemplates()
        {
            return parent::getBlockTypeCustomTemplates();
        }
        /**
         * @private
         */
        public function setBlockTypeDisplayOrder($displayOrder)
        {
            return parent::setBlockTypeDisplayOrder($displayOrder);
        }
        /**
         * refreshes the BlockType's database schema throws an Exception if error
         *
         * @return void
         */
        public function refresh()
        {
            return parent::refresh();
        }
        protected function loadFromController($bta)
        {
            return parent::loadFromController($bta);
        }
        /**
         * Removes the block type. Also removes instances of content.
         */
        public function delete()
        {
            return parent::delete();
        }
        /**
         * Adds a block to the system without adding it to a collection.
         * Passes page and area data along if it is available, however.
         *
         * @param mixed            $data
         * @param bool|\Collection $c
         * @param bool|\Area       $a
         * @return bool|\Concrete\Core\Block\Block
         */
        public function add($data, $c = false, $a = false)
        {
            return parent::add($data, $c, $a);
        }
        /**
         * Loads controller
         */
        protected function loadController()
        {
            return parent::loadController();
        }
    }

    class BlockTypeList extends \Concrete\Core\Block\BlockType\BlockTypeList
    {
        public function includeInternalBlockTypes()
        {
            return parent::includeInternalBlockTypes();
        }
        public function get($itemsToGet = 100, $offset = 0)
        {
            return parent::get($itemsToGet, $offset);
        }
        public function filterByPackage(Concrete\Core\Package\Package $pkg)
        {
            return parent::filterByPackage($pkg);
        }
        /**
         * @todo comment this one
         * @param string $xml
         * @return void
         */
        public static function exportList($xml)
        {
            return Concrete\Core\Block\BlockType\BlockTypeList::exportList($xml);
        }
        /**
         * returns an array of Block Types used in the concrete5 Dashboard
         * @return BlockType[]
         */
        public static function getDashboardBlockTypes()
        {
            return Concrete\Core\Block\BlockType\BlockTypeList::getDashboardBlockTypes();
        }
        /**
         * Gets a list of block types that are not installed, used to get blocks that can be installed
         * This function only surveys the web/blocks directory - it's not looking at the package level.
         * @return BlockType[]
         */
        public static function getAvailableList()
        {
            return Concrete\Core\Block\BlockType\BlockTypeList::getAvailableList();
        }
        /**
         * gets a list of installed BlockTypes
         * @return BlockType[]
         */
        public static function getInstalledList()
        {
            return Concrete\Core\Block\BlockType\BlockTypeList::getInstalledList();
        }
        public static function resetBlockTypeDisplayOrder($column = "btID")
        {
            return Concrete\Core\Block\BlockType\BlockTypeList::resetBlockTypeDisplayOrder($column);
        }
        public function getTotal()
        {
            return parent::getTotal();
        }
        public function debug($dbg = true)
        {
            return parent::debug($dbg);
        }
        protected function setQuery($query)
        {
            return parent::setQuery($query);
        }
        protected function getQuery()
        {
            return parent::getQuery();
        }
        public function addToQuery($query)
        {
            return parent::addToQuery($query);
        }
        protected function setupAutoSort()
        {
            return parent::setupAutoSort();
        }
        protected function executeBase()
        {
            return parent::executeBase();
        }
        protected function setupSortByString()
        {
            return parent::setupSortByString();
        }
        protected function setupAttributeSort()
        {
            return parent::setupAttributeSort();
        }
        /**
         * Adds a filter to this item list.
         */
        public function filter($column, $value, $comparison = "=")
        {
            return parent::filter($column, $value, $comparison);
        }
        public function getSearchResultsClass($field)
        {
            return parent::getSearchResultsClass($field);
        }
        public function sortBy($key, $dir = "asc")
        {
            return parent::sortBy($key, $dir);
        }
        public function groupBy($key)
        {
            return parent::groupBy($key);
        }
        public function having($column, $value, $comparison = "=")
        {
            return parent::having($column, $value, $comparison);
        }
        public function getSortByURL($column, $dir = "asc", $baseURL = false, $additionalVars = array())
        {
            return parent::getSortByURL($column, $dir, $baseURL, $additionalVars);
        }
        protected function setupAttributeFilters($join)
        {
            return parent::setupAttributeFilters($join);
        }
        public function filterByAttribute($column, $value, $comparison = "=")
        {
            return parent::filterByAttribute($column, $value, $comparison);
        }
        public function enableStickySearchRequest($namespace = false)
        {
            return parent::enableStickySearchRequest($namespace);
        }
        public function getQueryStringSortVariable()
        {
            return parent::getQueryStringSortVariable();
        }
        public function getQueryStringSortDirectionVariable()
        {
            return parent::getQueryStringSortDirectionVariable();
        }
        protected function getStickySearchNameSpace($namespace = "")
        {
            return parent::getStickySearchNameSpace($namespace);
        }
        public function resetSearchRequest($namespace = "")
        {
            return parent::resetSearchRequest($namespace);
        }
        public function addToSearchRequest($key, $value)
        {
            return parent::addToSearchRequest($key, $value);
        }
        public function getSearchRequest()
        {
            return parent::getSearchRequest();
        }
        public function setItemsPerPage($num)
        {
            return parent::setItemsPerPage($num);
        }
        public function getItemsPerPage()
        {
            return parent::getItemsPerPage();
        }
        public function setItems($items)
        {
            return parent::setItems($items);
        }
        protected function loadQueryStringPagingVariable()
        {
            return parent::loadQueryStringPagingVariable();
        }
        public function setNameSpace($ns)
        {
            return parent::setNameSpace($ns);
        }
        /**
         * Returns an array of object by "page"
         */
        public function getPage($page = false)
        {
            return parent::getPage($page);
        }
        protected function setCurrentPage($page = false)
        {
            return parent::setCurrentPage($page);
        }
        /**
         * Displays summary text about a list
         */
        public function displaySummary($right_content = "")
        {
            return parent::displaySummary($right_content);
        }
        public function isActiveSortColumn($column)
        {
            return parent::isActiveSortColumn($column);
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function requiresPaging()
        {
            return parent::requiresPaging();
        }
        public function getPagination($url = false, $additionalVars = array())
        {
            return parent::getPagination($url, $additionalVars);
        }
        /**
         * Gets paging that works in our new format */
        public function displayPagingV2($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPagingV2($script, $return, $additionalVars);
        }
        /**
         * Gets standard HTML to display paging */
        public function displayPaging($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPaging($script, $return, $additionalVars);
        }
        /**
         * Returns an object with properties useful for paging
         */
        public function getSummary()
        {
            return parent::getSummary();
        }
        public function getSortBy()
        {
            return parent::getSortBy();
        }
        public function getSortByDirection()
        {
            return parent::getSortByDirection();
        }
        /**
         * Sets up a multiple columns to search by. Each argument is taken "as-is" (including asc or desc) and concatenated with commas
         * Note that this is overrides any previous sortByMultiple() call, and all sortBy() calls. Alternatively, you can pass a single
         * array with multiple columns to sort by as its values.
         * e.g. $list->sortByMultiple('columna desc', 'columnb asc');
         * or $list->sortByMultiple(array('columna desc', 'columnb asc'));
         */
        public function sortByMultiple()
        {
            return parent::sortByMultiple();
        }
    }

    class BlockTypeSet extends \Concrete\Core\Block\BlockType\Set
    {
        public static function getByID($btsID)
        {
            return Concrete\Core\Block\BlockType\Set::getByID($btsID);
        }
        public static function getByHandle($btsHandle)
        {
            return Concrete\Core\Block\BlockType\Set::getByHandle($btsHandle);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Block\BlockType\Set::getListByPackage($pkg);
        }
        public static function getList()
        {
            return Concrete\Core\Block\BlockType\Set::getList();
        }
        public function getBlockTypeSetID()
        {
            return parent::getBlockTypeSetID();
        }
        public function getBlockTypeSetHandle()
        {
            return parent::getBlockTypeSetHandle();
        }
        public function getBlockTypeSetName()
        {
            return parent::getBlockTypeSetName();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /** Returns the display name for this instance (localized and escaped accordingly to $format)
         * @param string $format = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getBlockTypeSetDisplayName($format = "html")
        {
            return parent::getBlockTypeSetDisplayName($format);
        }
        public function updateBlockTypeSetName($btsName)
        {
            return parent::updateBlockTypeSetName($btsName);
        }
        public function updateBlockTypeSetHandle($btsHandle)
        {
            return parent::updateBlockTypeSetHandle($btsHandle);
        }
        public function addBlockType(Concrete\Core\Block\BlockType\BlockType $bt)
        {
            return parent::addBlockType($bt);
        }
        public function clearBlockTypes()
        {
            return parent::clearBlockTypes();
        }
        public static function add($btsHandle, $btsName, $pkg = false)
        {
            return Concrete\Core\Block\BlockType\Set::add($btsHandle, $btsName, $pkg);
        }
        public function export($axml)
        {
            return parent::export($axml);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Block\BlockType\Set::exportList($xml);
        }
        public function getBlockTypes()
        {
            return parent::getBlockTypes();
        }
        public function get()
        {
            return parent::get();
        }
        public function contains($bt)
        {
            return parent::contains($bt);
        }
        public function displayOrder($bt)
        {
            return parent::displayOrder($bt);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function deleteKey($bt)
        {
            return parent::deleteKey($bt);
        }
        protected function rescanDisplayOrder()
        {
            return parent::rescanDisplayOrder();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Cache extends \Concrete\Core\Cache\Cache
    {
        /**
         * Loads the composite driver from constants
         * @param $level
         * @return \Stash\Interfaces\DriverInterface
         */
        protected function loadConfig($level)
        {
            return parent::loadConfig($level);
        }
        /**
         * Deletes an item from the cache
         * @param string $key Name of the cache item ID
         * @return bool True if deleted, false if not
         */
        public function delete($key)
        {
            return parent::delete($key);
        }
        /**
         * Checks if an item exists in the cache
         * @param string $key Name of the cache item ID
         * @return bool True if exists, false if not
         */
        public function exists($key)
        {
            return parent::exists($key);
        }
        /**
         * Removes all values from the cache
         */
        public function flush()
        {
            return parent::flush();
        }
        /**
         * Gets a value from the cache
         * @param string $key Name of the cache item ID
         * @return \Stash\Interfaces\ItemInterface
         */
        public function getItem($key)
        {
            return parent::getItem($key);
        }
        /**
         * Enables the cache
         */
        public function enable()
        {
            return parent::enable();
        }
        /**
         * Disables the cache
         */
        public function disable()
        {
            return parent::disable();
        }
        /**
         * Returns true if the cache is enabled, false if not
         * @return bool
         */
        public function isEnabled()
        {
            return parent::isEnabled();
        }
        /**
         * Disables all cache levels
         */
        public static function disableAll()
        {
            return Concrete\Core\Cache\Cache::disableAll();
        }
        /**
         * Enables all cache levels
         */
        public static function enableAll()
        {
            return Concrete\Core\Cache\Cache::enableAll();
        }
    }

    /**
     * An object that represents a particular request to the Concrete-powered website. The request object then determines what is being requested, based on the path, and presents itself to the rest of the dispatcher (which loads the page, etc...).
     *
     * @package    Core
     * @author     Andrew Embler <andrew@concrete5.org>
     * @category   Concrete
     * @copyright  Copyright (c) 2003-2008 Concrete5. (http://www.concrete5.org)
     * @license    http://www.concrete5.org/license/     MIT License
     */
    class Request extends \Concrete\Core\Http\Request
    {
        /**
         * @return static
         */
        public static function getInstance()
        {
            return Concrete\Core\Http\RequestBase::getInstance();
        }
        /**
         * @param SymfonyRequest $instance
         */
        public static function setInstance(Symfony\Component\HttpFoundation\Request $instance)
        {
            return Concrete\Core\Http\RequestBase::setInstance($instance);
        }
        /**
         * @return \Concrete\Core\Page\Page
         */
        public function getCurrentPage()
        {
            return parent::getCurrentPage();
        }
        /**
         * @param \Concrete\Core\Page\Page $c
         */
        public function setCurrentPage(Concrete\Core\Page\Page $c)
        {
            return parent::setCurrentPage($c);
        }
        public function clearCurrentPage()
        {
            return parent::clearCurrentPage();
        }
        /**
         * @return \Concrete\Core\User\UserInfo
         */
        public function getCustomRequestUser()
        {
            return parent::getCustomRequestUser();
        }
        /**
         * @param \Concrete\Core\User\UserInfo $ui
         */
        public function setCustomRequestUser($ui)
        {
            return parent::setCustomRequestUser($ui);
        }
        /**
         * @return bool
         */
        public function hasCustomRequestUser()
        {
            return parent::hasCustomRequestUser();
        }
        /**
         * @return string
         */
        public function getCustomRequestDateTime()
        {
            return parent::getCustomRequestDateTime();
        }
        /**
         * @param string $date
         */
        public function setCustomRequestDateTime($date)
        {
            return parent::setCustomRequestDateTime($date);
        }
        /**
         * Determines whether a request matches a particular pattern.
         *
         * @param string $pattern
         *
         * @return bool
         */
        public function matches($pattern)
        {
            return parent::matches($pattern);
        }
        /**
         * Returns the full path for a request.
         *
         * @return string
         */
        public function getPath()
        {
            return parent::getPath();
        }
        /**
         * If no arguments are passed, returns the post array. If a key is passed, it returns the value as it exists in the post array.
         * If a default value is provided and the key does not exist in the POST array, the default value is returned.
         *
         * @param string $key
         * @param mixed $defaultValue
         *
         * @return mixed
         */
        public static function post($key = null, $defaultValue = null)
        {
            return Concrete\Core\Http\RequestBase::post($key, $defaultValue);
        }
        /**
         * @param string $key
         * @param mixed $defaultValue
         *
         * @return mixed
         */
        public static function request($key = null, $defaultValue = null)
        {
            return Concrete\Core\Http\RequestBase::request($key, $defaultValue);
        }
        /**
         * @return bool
         */
        public static function isPost()
        {
            return Concrete\Core\Http\RequestBase::isPost();
        }
        /**
         * Sets the parameters for this request.
         *
         * This method also re-initializes all properties.
         *
         * @param array  $query      The GET parameters
         * @param array  $request    The POST parameters
         * @param array  $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array  $cookies    The COOKIE parameters
         * @param array  $files      The FILES parameters
         * @param array  $server     The SERVER parameters
         * @param string $content    The raw body data
         *
         * @api
         */
        public function initialize(array $query = array(), array $request = array(), array $attributes = array(), array $cookies = array(), array $files = array(), array $server = array(), $content = null)
        {
            return parent::initialize($query, $request, $attributes, $cookies, $files, $server, $content);
        }
        /**
         * Creates a new request with values from PHP's super globals.
         *
         * @return Request A new request
         *
         * @api
         */
        public static function createFromGlobals()
        {
            return Symfony\Component\HttpFoundation\Request::createFromGlobals();
        }
        /**
         * Creates a Request based on a given URI and configuration.
         *
         * The information contained in the URI always take precedence
         * over the other information (server and parameters).
         *
         * @param string $uri        The URI
         * @param string $method     The HTTP method
         * @param array  $parameters The query (GET) or request (POST) parameters
         * @param array  $cookies    The request cookies ($_COOKIE)
         * @param array  $files      The request files ($_FILES)
         * @param array  $server     The server parameters ($_SERVER)
         * @param string $content    The raw body data
         *
         * @return Request A Request instance
         *
         * @api
         */
        public static function create($uri, $method = "GET", $parameters = array(), $cookies = array(), $files = array(), $server = array(), $content = null)
        {
            return Symfony\Component\HttpFoundation\Request::create($uri, $method, $parameters, $cookies, $files, $server, $content);
        }
        /**
         * Sets a callable able to create a Request instance.
         *
         * This is mainly useful when you need to override the Request class
         * to keep BC with an existing system. It should not be used for any
         * other purpose.
         *
         * @param callable|null $callable A PHP callable
         */
        public static function setFactory($callable)
        {
            return Symfony\Component\HttpFoundation\Request::setFactory($callable);
        }
        /**
         * Clones a request and overrides some of its parameters.
         *
         * @param array $query      The GET parameters
         * @param array $request    The POST parameters
         * @param array $attributes The request attributes (parameters parsed from the PATH_INFO, ...)
         * @param array $cookies    The COOKIE parameters
         * @param array $files      The FILES parameters
         * @param array $server     The SERVER parameters
         *
         * @return Request The duplicated request
         *
         * @api
         */
        public function duplicate(array $query = null, array $request = null, array $attributes = null, array $cookies = null, array $files = null, array $server = null)
        {
            return parent::duplicate($query, $request, $attributes, $cookies, $files, $server);
        }
        /**
         * Overrides the PHP global variables according to this request instance.
         *
         * It overrides $_GET, $_POST, $_REQUEST, $_SERVER, $_COOKIE.
         * $_FILES is never overridden, see rfc1867
         *
         * @api
         */
        public function overrideGlobals()
        {
            return parent::overrideGlobals();
        }
        /**
         * Sets a list of trusted proxies.
         *
         * You should only list the reverse proxies that you manage directly.
         *
         * @param array $proxies A list of trusted proxies
         *
         * @api
         */
        public static function setTrustedProxies(array $proxies)
        {
            return Symfony\Component\HttpFoundation\Request::setTrustedProxies($proxies);
        }
        /**
         * Gets the list of trusted proxies.
         *
         * @return array An array of trusted proxies.
         */
        public static function getTrustedProxies()
        {
            return Symfony\Component\HttpFoundation\Request::getTrustedProxies();
        }
        /**
         * Sets a list of trusted host patterns.
         *
         * You should only list the hosts you manage using regexs.
         *
         * @param array $hostPatterns A list of trusted host patterns
         */
        public static function setTrustedHosts(array $hostPatterns)
        {
            return Symfony\Component\HttpFoundation\Request::setTrustedHosts($hostPatterns);
        }
        /**
         * Gets the list of trusted host patterns.
         *
         * @return array An array of trusted host patterns.
         */
        public static function getTrustedHosts()
        {
            return Symfony\Component\HttpFoundation\Request::getTrustedHosts();
        }
        /**
         * Sets the name for trusted headers.
         *
         * The following header keys are supported:
         *
         *  * Request::HEADER_CLIENT_IP:    defaults to X-Forwarded-For   (see getClientIp())
         *  * Request::HEADER_CLIENT_HOST:  defaults to X-Forwarded-Host  (see getClientHost())
         *  * Request::HEADER_CLIENT_PORT:  defaults to X-Forwarded-Port  (see getClientPort())
         *  * Request::HEADER_CLIENT_PROTO: defaults to X-Forwarded-Proto (see getScheme() and isSecure())
         *
         * Setting an empty value allows to disable the trusted header for the given key.
         *
         * @param string $key   The header key
         * @param string $value The header name
         *
         * @throws \InvalidArgumentException
         */
        public static function setTrustedHeaderName($key, $value)
        {
            return Symfony\Component\HttpFoundation\Request::setTrustedHeaderName($key, $value);
        }
        /**
         * Gets the trusted proxy header name.
         *
         * @param string $key The header key
         *
         * @return string The header name
         *
         * @throws \InvalidArgumentException
         */
        public static function getTrustedHeaderName($key)
        {
            return Symfony\Component\HttpFoundation\Request::getTrustedHeaderName($key);
        }
        /**
         * Normalizes a query string.
         *
         * It builds a normalized query string, where keys/value pairs are alphabetized,
         * have consistent escaping and unneeded delimiters are removed.
         *
         * @param string $qs Query string
         *
         * @return string A normalized query string for the Request
         */
        public static function normalizeQueryString($qs)
        {
            return Symfony\Component\HttpFoundation\Request::normalizeQueryString($qs);
        }
        /**
         * Enables support for the _method request parameter to determine the intended HTTP method.
         *
         * Be warned that enabling this feature might lead to CSRF issues in your code.
         * Check that you are using CSRF tokens when required.
         * If the HTTP method parameter override is enabled, an html-form with method "POST" can be altered
         * and used to send a "PUT" or "DELETE" request via the _method request parameter.
         * If these methods are not protected against CSRF, this presents a possible vulnerability.
         *
         * The HTTP method can only be overridden when the real HTTP method is POST.
         */
        public static function enableHttpMethodParameterOverride()
        {
            return Symfony\Component\HttpFoundation\Request::enableHttpMethodParameterOverride();
        }
        /**
         * Checks whether support for the _method request parameter is enabled.
         *
         * @return bool True when the _method request parameter is enabled, false otherwise
         */
        public static function getHttpMethodParameterOverride()
        {
            return Symfony\Component\HttpFoundation\Request::getHttpMethodParameterOverride();
        }
        /**
         * Gets a "parameter" value.
         *
         * This method is mainly useful for libraries that want to provide some flexibility.
         *
         * Order of precedence: GET, PATH, POST
         *
         * Avoid using this method in controllers:
         *
         *  * slow
         *  * prefer to get from a "named" source
         *
         * It is better to explicitly get request parameters from the appropriate
         * public property instead (query, attributes, request).
         *
         * @param string $key     the key
         * @param mixed  $default the default value
         * @param bool   $deep    is parameter deep in multidimensional array
         *
         * @return mixed
         */
        public function get($key, $default = null, $deep = false)
        {
            return parent::get($key, $default, $deep);
        }
        /**
         * Gets the Session.
         *
         * @return SessionInterface|null The session
         *
         * @api
         */
        public function getSession()
        {
            return parent::getSession();
        }
        /**
         * Whether the request contains a Session which was started in one of the
         * previous requests.
         *
         * @return bool
         *
         * @api
         */
        public function hasPreviousSession()
        {
            return parent::hasPreviousSession();
        }
        /**
         * Whether the request contains a Session object.
         *
         * This method does not give any information about the state of the session object,
         * like whether the session is started or not. It is just a way to check if this Request
         * is associated with a Session instance.
         *
         * @return bool true when the Request contains a Session object, false otherwise
         *
         * @api
         */
        public function hasSession()
        {
            return parent::hasSession();
        }
        /**
         * Sets the Session.
         *
         * @param SessionInterface $session The Session
         *
         * @api
         */
        public function setSession(Symfony\Component\HttpFoundation\Session\SessionInterface $session)
        {
            return parent::setSession($session);
        }
        /**
         * Returns the client IP addresses.
         *
         * In the returned array the most trusted IP address is first, and the
         * least trusted one last. The "real" client IP address is the last one,
         * but this is also the least trusted one. Trusted proxies are stripped.
         *
         * Use this method carefully; you should use getClientIp() instead.
         *
         * @return array The client IP addresses
         *
         * @see getClientIp()
         */
        public function getClientIps()
        {
            return parent::getClientIps();
        }
        /**
         * Returns the client IP address.
         *
         * This method can read the client IP address from the "X-Forwarded-For" header
         * when trusted proxies were set via "setTrustedProxies()". The "X-Forwarded-For"
         * header value is a comma+space separated list of IP addresses, the left-most
         * being the original client, and each successive proxy that passed the request
         * adding the IP address where it received the request from.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-For",
         * ("Client-Ip" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-ip" key.
         *
         * @return string The client IP address
         *
         * @see getClientIps()
         * @see http://en.wikipedia.org/wiki/X-Forwarded-For
         *
         * @api
         */
        public function getClientIp()
        {
            return parent::getClientIp();
        }
        /**
         * Returns current script name.
         *
         * @return string
         *
         * @api
         */
        public function getScriptName()
        {
            return parent::getScriptName();
        }
        /**
         * Returns the path being requested relative to the executed script.
         *
         * The path info always starts with a /.
         *
         * Suppose this request is instantiated from /mysite on localhost:
         *
         *  * http://localhost/mysite              returns an empty string
         *  * http://localhost/mysite/about        returns '/about'
         *  * http://localhost/mysite/enco%20ded   returns '/enco%20ded'
         *  * http://localhost/mysite/about?var=1  returns '/about'
         *
         * @return string The raw path (i.e. not urldecoded)
         *
         * @api
         */
        public function getPathInfo()
        {
            return parent::getPathInfo();
        }
        /**
         * Returns the root path from which this request is executed.
         *
         * Suppose that an index.php file instantiates this request object:
         *
         *  * http://localhost/index.php         returns an empty string
         *  * http://localhost/index.php/page    returns an empty string
         *  * http://localhost/web/index.php     returns '/web'
         *  * http://localhost/we%20b/index.php  returns '/we%20b'
         *
         * @return string The raw path (i.e. not urldecoded)
         *
         * @api
         */
        public function getBasePath()
        {
            return parent::getBasePath();
        }
        /**
         * Returns the root URL from which this request is executed.
         *
         * The base URL never ends with a /.
         *
         * This is similar to getBasePath(), except that it also includes the
         * script filename (e.g. index.php) if one exists.
         *
         * @return string The raw URL (i.e. not urldecoded)
         *
         * @api
         */
        public function getBaseUrl()
        {
            return parent::getBaseUrl();
        }
        /**
         * Gets the request's scheme.
         *
         * @return string
         *
         * @api
         */
        public function getScheme()
        {
            return parent::getScheme();
        }
        /**
         * Returns the port on which the request is made.
         *
         * This method can read the client port from the "X-Forwarded-Port" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Port" header must contain the client port.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Port",
         * configure it via "setTrustedHeaderName()" with the "client-port" key.
         *
         * @return string
         *
         * @api
         */
        public function getPort()
        {
            return parent::getPort();
        }
        /**
         * Returns the user.
         *
         * @return string|null
         */
        public function getUser()
        {
            return parent::getUser();
        }
        /**
         * Returns the password.
         *
         * @return string|null
         */
        public function getPassword()
        {
            return parent::getPassword();
        }
        /**
         * Gets the user info.
         *
         * @return string A user name and, optionally, scheme-specific information about how to gain authorization to access the server
         */
        public function getUserInfo()
        {
            return parent::getUserInfo();
        }
        /**
         * Returns the HTTP host being requested.
         *
         * The port name will be appended to the host if it's non-standard.
         *
         * @return string
         *
         * @api
         */
        public function getHttpHost()
        {
            return parent::getHttpHost();
        }
        /**
         * Returns the requested URI (path and query string).
         *
         * @return string The raw URI (i.e. not URI decoded)
         *
         * @api
         */
        public function getRequestUri()
        {
            return parent::getRequestUri();
        }
        /**
         * Gets the scheme and HTTP host.
         *
         * If the URL was called with basic authentication, the user
         * and the password are not added to the generated string.
         *
         * @return string The scheme and HTTP host
         */
        public function getSchemeAndHttpHost()
        {
            return parent::getSchemeAndHttpHost();
        }
        /**
         * Generates a normalized URI (URL) for the Request.
         *
         * @return string A normalized URI (URL) for the Request
         *
         * @see getQueryString()
         *
         * @api
         */
        public function getUri()
        {
            return parent::getUri();
        }
        /**
         * Generates a normalized URI for the given path.
         *
         * @param string $path A path to use instead of the current one
         *
         * @return string The normalized URI for the path
         *
         * @api
         */
        public function getUriForPath($path)
        {
            return parent::getUriForPath($path);
        }
        /**
         * Generates the normalized query string for the Request.
         *
         * It builds a normalized query string, where keys/value pairs are alphabetized
         * and have consistent escaping.
         *
         * @return string|null A normalized query string for the Request
         *
         * @api
         */
        public function getQueryString()
        {
            return parent::getQueryString();
        }
        /**
         * Checks whether the request is secure or not.
         *
         * This method can read the client port from the "X-Forwarded-Proto" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Proto" header must contain the protocol: "https" or "http".
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Proto"
         * ("SSL_HTTPS" for instance), configure it via "setTrustedHeaderName()" with
         * the "client-proto" key.
         *
         * @return bool
         *
         * @api
         */
        public function isSecure()
        {
            return parent::isSecure();
        }
        /**
         * Returns the host name.
         *
         * This method can read the client port from the "X-Forwarded-Host" header
         * when trusted proxies were set via "setTrustedProxies()".
         *
         * The "X-Forwarded-Host" header must contain the client host name.
         *
         * If your reverse proxy uses a different header name than "X-Forwarded-Host",
         * configure it via "setTrustedHeaderName()" with the "client-host" key.
         *
         * @return string
         *
         * @throws \UnexpectedValueException when the host name is invalid
         *
         * @api
         */
        public function getHost()
        {
            return parent::getHost();
        }
        /**
         * Sets the request method.
         *
         * @param string $method
         *
         * @api
         */
        public function setMethod($method)
        {
            return parent::setMethod($method);
        }
        /**
         * Gets the request "intended" method.
         *
         * If the X-HTTP-Method-Override header is set, and if the method is a POST,
         * then it is used to determine the "real" intended HTTP method.
         *
         * The _method request parameter can also be used to determine the HTTP method,
         * but only if enableHttpMethodParameterOverride() has been called.
         *
         * The method is always an uppercased string.
         *
         * @return string The request method
         *
         * @api
         *
         * @see getRealMethod()
         */
        public function getMethod()
        {
            return parent::getMethod();
        }
        /**
         * Gets the "real" request method.
         *
         * @return string The request method
         *
         * @see getMethod()
         */
        public function getRealMethod()
        {
            return parent::getRealMethod();
        }
        /**
         * Gets the mime type associated with the format.
         *
         * @param string $format The format
         *
         * @return string The associated mime type (null if not found)
         *
         * @api
         */
        public function getMimeType($format)
        {
            return parent::getMimeType($format);
        }
        /**
         * Gets the format associated with the mime type.
         *
         * @param string $mimeType The associated mime type
         *
         * @return string|null The format (null if not found)
         *
         * @api
         */
        public function getFormat($mimeType)
        {
            return parent::getFormat($mimeType);
        }
        /**
         * Associates a format with mime types.
         *
         * @param string       $format    The format
         * @param string|array $mimeTypes The associated mime types (the preferred one must be the first as it will be used as the content type)
         *
         * @api
         */
        public function setFormat($format, $mimeTypes)
        {
            return parent::setFormat($format, $mimeTypes);
        }
        /**
         * Gets the request format.
         *
         * Here is the process to determine the format:
         *
         *  * format defined by the user (with setRequestFormat())
         *  * _format request parameter
         *  * $default
         *
         * @param string $default The default format
         *
         * @return string The request format
         *
         * @api
         */
        public function getRequestFormat($default = "html")
        {
            return parent::getRequestFormat($default);
        }
        /**
         * Sets the request format.
         *
         * @param string $format The request format.
         *
         * @api
         */
        public function setRequestFormat($format)
        {
            return parent::setRequestFormat($format);
        }
        /**
         * Gets the format associated with the request.
         *
         * @return string|null The format (null if no content type is present)
         *
         * @api
         */
        public function getContentType()
        {
            return parent::getContentType();
        }
        /**
         * Sets the default locale.
         *
         * @param string $locale
         *
         * @api
         */
        public function setDefaultLocale($locale)
        {
            return parent::setDefaultLocale($locale);
        }
        /**
         * Get the default locale.
         *
         * @return string
         */
        public function getDefaultLocale()
        {
            return parent::getDefaultLocale();
        }
        /**
         * Sets the locale.
         *
         * @param string $locale
         *
         * @api
         */
        public function setLocale($locale)
        {
            return parent::setLocale($locale);
        }
        /**
         * Get the locale.
         *
         * @return string
         */
        public function getLocale()
        {
            return parent::getLocale();
        }
        /**
         * Checks if the request method is of specified type.
         *
         * @param string $method Uppercase request method (GET, POST etc).
         *
         * @return bool
         */
        public function isMethod($method)
        {
            return parent::isMethod($method);
        }
        /**
         * Checks whether the method is safe or not.
         *
         * @return bool
         *
         * @api
         */
        public function isMethodSafe()
        {
            return parent::isMethodSafe();
        }
        /**
         * Returns the request body content.
         *
         * @param bool $asResource If true, a resource will be returned
         *
         * @return string|resource The request body content or a resource to read the body stream.
         *
         * @throws \LogicException
         */
        public function getContent($asResource = false)
        {
            return parent::getContent($asResource);
        }
        /**
         * Gets the Etags.
         *
         * @return array The entity tags
         */
        public function getETags()
        {
            return parent::getETags();
        }
        /**
         * @return bool
         */
        public function isNoCache()
        {
            return parent::isNoCache();
        }
        /**
         * Returns the preferred language.
         *
         * @param array $locales An array of ordered available locales
         *
         * @return string|null The preferred locale
         *
         * @api
         */
        public function getPreferredLanguage(array $locales = null)
        {
            return parent::getPreferredLanguage($locales);
        }
        /**
         * Gets a list of languages acceptable by the client browser.
         *
         * @return array Languages ordered in the user browser preferences
         *
         * @api
         */
        public function getLanguages()
        {
            return parent::getLanguages();
        }
        /**
         * Gets a list of charsets acceptable by the client browser.
         *
         * @return array List of charsets in preferable order
         *
         * @api
         */
        public function getCharsets()
        {
            return parent::getCharsets();
        }
        /**
         * Gets a list of encodings acceptable by the client browser.
         *
         * @return array List of encodings in preferable order
         */
        public function getEncodings()
        {
            return parent::getEncodings();
        }
        /**
         * Gets a list of content types acceptable by the client browser.
         *
         * @return array List of content types in preferable order
         *
         * @api
         */
        public function getAcceptableContentTypes()
        {
            return parent::getAcceptableContentTypes();
        }
        /**
         * Returns true if the request is a XMLHttpRequest.
         *
         * It works if your JavaScript library sets an X-Requested-With HTTP header.
         * It is known to work with common JavaScript frameworks:
         *
         * @link http://en.wikipedia.org/wiki/List_of_Ajax_frameworks#JavaScript
         *
         * @return bool true if the request is an XMLHttpRequest, false otherwise
         *
         * @api
         */
        public function isXmlHttpRequest()
        {
            return parent::isXmlHttpRequest();
        }
        protected function prepareRequestUri()
        {
            return parent::prepareRequestUri();
        }
        /**
         * Prepares the base URL.
         *
         * @return string
         */
        protected function prepareBaseUrl()
        {
            return parent::prepareBaseUrl();
        }
        /**
         * Prepares the base path.
         *
         * @return string base path
         */
        protected function prepareBasePath()
        {
            return parent::prepareBasePath();
        }
        /**
         * Prepares the path info.
         *
         * @return string path info
         */
        protected function preparePathInfo()
        {
            return parent::preparePathInfo();
        }
        /**
         * Initializes HTTP request formats.
         */
        protected static function initializeFormats()
        {
            return Symfony\Component\HttpFoundation\Request::initializeFormats();
        }
    }

    /**
     * @deprecated
     * @package Concrete\Core\Cache
     */
    class CacheLocal extends \Concrete\Core\Cache\CacheLocal
    {
        /**
         * Creates a cache key based on the group and id by running it through md5
         * @param string $group Name of the cache group
         * @param string $id Name of the cache item ID
         * @return string The cache key
         */
        public static function key($group, $id)
        {
            return Concrete\Core\Cache\CacheLocal::key($group, $id);
        }
        public static function get()
        {
            return Concrete\Core\Cache\CacheLocal::get();
        }
        public static function getEntry($type, $id)
        {
            return Concrete\Core\Cache\CacheLocal::getEntry($type, $id);
        }
        public static function flush()
        {
            return Concrete\Core\Cache\CacheLocal::flush();
        }
        public static function delete($type, $id)
        {
            return Concrete\Core\Cache\CacheLocal::delete($type, $id);
        }
        public static function set($type, $id, $object)
        {
            return Concrete\Core\Cache\CacheLocal::set($type, $id, $object);
        }
    }

    class Collection extends \Concrete\Core\Page\Collection\Collection
    {
        public static function reindexPendingPages()
        {
            return Concrete\Core\Page\Collection\Collection::reindexPendingPages();
        }
        public static function getByHandle($handle)
        {
            return Concrete\Core\Page\Collection\Collection::getByHandle($handle);
        }
        public function addCollection($data)
        {
            return parent::addCollection($data);
        }
        public static function createCollection($data)
        {
            return Concrete\Core\Page\Collection\Collection::createCollection($data);
        }
        /**
         * @param int   $cID
         * @param mixed $version 'RECENT'|'ACTIVE'|version id
         *
         * @return Collection
         */
        public static function getByID($cID, $version = "RECENT")
        {
            return Concrete\Core\Page\Collection\Collection::getByID($cID, $version);
        }
        public function loadVersionObject($cvID = "ACTIVE")
        {
            return parent::loadVersionObject($cvID);
        }
        public function getVersionToModify()
        {
            return parent::getVersionToModify();
        }
        public function getVersionObject()
        {
            return parent::getVersionObject();
        }
        public function cloneVersion($versionComments)
        {
            return parent::cloneVersion($versionComments);
        }
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        public function getNextVersionComments()
        {
            return parent::getNextVersionComments();
        }
        public function getFeatureAssignments()
        {
            return parent::getFeatureAssignments();
        }
        /**
         * Returns the value of the attribute with the handle $ak
         * of the current object.
         *
         * $displayMode makes it possible to get the correct output
         * value. When you need the raw attribute value or object, use
         * this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle');
         * </code>
         *
         * But if you need the formatted output supported by some
         * attribute, use this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle', 'display');
         * </code>
         *
         * An attribute type like "date" will then return the date in
         * the correct format just like other attributes will show
         * you a nicely formatted output and not just a simple value
         * or object.
         *
         *
         * @param string|object $akHandle
         * @param bool       $displayMode
         *
         * @return type
         */
        public function getAttribute($akHandle, $displayMode = false)
        {
            return parent::getAttribute($akHandle, $displayMode);
        }
        public function getCollectionAttributeValue($ak)
        {
            return parent::getCollectionAttributeValue($ak);
        }
        public function clearCollectionAttributes($retainAKIDs = array())
        {
            return parent::clearCollectionAttributes($retainAKIDs);
        }
        public function getVersionID()
        {
            return parent::getVersionID();
        }
        public function reindex($index = false, $actuallyDoReindex = true)
        {
            return parent::reindex($index, $actuallyDoReindex);
        }
        public function clearAttribute($ak)
        {
            return parent::clearAttribute($ak);
        }
        public function getAttributeValueObject($ak, $createIfNotFound = false)
        {
            return parent::getAttributeValueObject($ak, $createIfNotFound);
        }
        public function getSetCollectionAttributes()
        {
            return parent::getSetCollectionAttributes();
        }
        public function addAttribute($ak, $value)
        {
            return parent::addAttribute($ak, $value);
        }
        public function setAttribute($ak, $value)
        {
            return parent::setAttribute($ak, $value);
        }
        /**
         * @param string $arHandle
         *
         * @return Area
         */
        public function getArea($arHandle)
        {
            return parent::getArea($arHandle);
        }
        public function hasAliasedContent()
        {
            return parent::hasAliasedContent();
        }
        public function getCollectionDateLastModified()
        {
            return parent::getCollectionDateLastModified();
        }
        public function getCollectionHandle()
        {
            return parent::getCollectionHandle();
        }
        public function getCollectionDateAdded()
        {
            return parent::getCollectionDateAdded();
        }
        /**
         * Retrieves all custom style rules that should be inserted into the header on a page, whether they are defined in areas
         * or blocks.
         */
        public function outputCustomStyleHeaderItems($return = false)
        {
            return parent::outputCustomStyleHeaderItems($return);
        }
        public function getAreaCustomStyle($area, $force = false)
        {
            return parent::getAreaCustomStyle($area, $force);
        }
        public function resetAreaCustomStyle($area)
        {
            return parent::resetAreaCustomStyle($area);
        }
        public function setCustomStyleSet($area, $set)
        {
            return parent::setCustomStyleSet($area, $set);
        }
        public function relateVersionEdits($oc)
        {
            return parent::relateVersionEdits($oc);
        }
        public function getCollectionTypeID()
        {
            return parent::getCollectionTypeID();
        }
        public function getPageTypeID()
        {
            return parent::getPageTypeID();
        }
        public function rescanDisplayOrder($arHandle)
        {
            return parent::rescanDisplayOrder($arHandle);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        public function getGlobalBlocks()
        {
            return parent::getGlobalBlocks();
        }
        /**
         * List the blocks in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlocks($arHandle = false)
        {
            return parent::getBlocks($arHandle);
        }
        /**
         * List the block IDs in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlockIDs($arHandle = false)
        {
            return parent::getBlockIDs($arHandle);
        }
        public function addBlock($bt, $a, $data)
        {
            return parent::addBlock($bt, $a, $data);
        }
        public function getCollectionAreaDisplayOrder($arHandle, $ignoreVersions = false)
        {
            return parent::getCollectionAreaDisplayOrder($arHandle, $ignoreVersions);
        }
        public function addFeature(Concrete\Core\Feature\Feature $fe)
        {
            return parent::addFeature($fe);
        }
        public function markModified()
        {
            return parent::markModified();
        }
        public function delete()
        {
            return parent::delete();
        }
        public function duplicateCollection()
        {
            return parent::duplicateCollection();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class CollectionAttributeKey extends \Concrete\Core\Attribute\Key\CollectionKey
    {
        public static function getDefaultIndexedSearchTable()
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getDefaultIndexedSearchTable();
        }
        /**
         * Returns an attribute value list of attributes and values (duh) which a collection version can store
         * against its object.
         *
         * @return AttributeValueList
         */
        public static function getAttributes($cID, $cvID, $method = "getValue")
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getAttributes($cID, $cvID, $method);
        }
        public static function getColumnHeaderList()
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getColumnHeaderList();
        }
        public static function getSearchableIndexedList()
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getSearchableIndexedList();
        }
        public static function getSearchableList()
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getSearchableList();
        }
        public function getAttributeValue($avID, $method = "getValue")
        {
            return parent::getAttributeValue($avID, $method);
        }
        public static function getByID($akID)
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getByID($akID);
        }
        public static function getByHandle($akHandle)
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getByHandle($akHandle);
        }
        public static function getList()
        {
            return Concrete\Core\Attribute\Key\CollectionKey::getList();
        }
        protected function saveAttribute($nvc, $value = false)
        {
            return parent::saveAttribute($nvc, $value);
        }
        public static function add($at, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\CollectionKey::add($at, $args, $pkg);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function getIndexedSearchTable()
        {
            return parent::getIndexedSearchTable();
        }
        public function getSearchIndexFieldDefinition()
        {
            return parent::getSearchIndexFieldDefinition();
        }
        /**
         * Returns the name for this attribute key.
         */
        public function getAttributeKeyName()
        {
            return parent::getAttributeKeyName();
        }
        /** Returns the display name for this attribute (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getAttributeKeyDisplayName($format = "html")
        {
            return parent::getAttributeKeyDisplayName($format);
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getAttributeKeyHandle()
        {
            return parent::getAttributeKeyHandle();
        }
        /**
         * Deprecated. Going to be replaced by front end display name.
         */
        public function getAttributeKeyDisplayHandle()
        {
            return parent::getAttributeKeyDisplayHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getAttributeKeyID()
        {
            return parent::getAttributeKeyID();
        }
        public function getAttributeKeyCategoryID()
        {
            return parent::getAttributeKeyCategoryID();
        }
        /**
         * Returns whether the attribute key is searchable.
         */
        public function isAttributeKeySearchable()
        {
            return parent::isAttributeKeySearchable();
        }
        /**
         * Returns whether the attribute key is internal.
         */
        public function isAttributeKeyInternal()
        {
            return parent::isAttributeKeyInternal();
        }
        /**
         * Returns whether the attribute key is indexed as a "keyword search" field.
         */
        public function isAttributeKeyContentIndexed()
        {
            return parent::isAttributeKeyContentIndexed();
        }
        /**
         * Returns whether the attribute key is one that was automatically created by a process.
         */
        public function isAttributeKeyAutoCreated()
        {
            return parent::isAttributeKeyAutoCreated();
        }
        /**
         * Returns whether the attribute key is included in the standard search for this category.
         */
        public function isAttributeKeyColumnHeader()
        {
            return parent::isAttributeKeyColumnHeader();
        }
        /**
         * Returns whether the attribute key is one that can be edited through the frontend.
         */
        public function isAttributeKeyEditable()
        {
            return parent::isAttributeKeyEditable();
        }
        public function getComputedAttributeKeyCategoryHandle()
        {
            return parent::getComputedAttributeKeyCategoryHandle();
        }
        /**
         * Loads the required attribute fields for this instantiated attribute.
         */
        protected function load($akIdentifier, $loadBy = "akID")
        {
            return parent::load($akIdentifier, $loadBy);
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public static function getInstanceByID($akID)
        {
            return Concrete\Core\Attribute\Key\Key::getInstanceByID($akID);
        }
        /**
         * Returns an attribute type object.
         */
        public function getAttributeType()
        {
            return parent::getAttributeType();
        }
        /**
         * Returns the attribute type handle.
         */
        public function getAttributeTypeHandle()
        {
            return parent::getAttributeTypeHandle();
        }
        public function getAttributeKeyType()
        {
            return parent::getAttributeKeyType();
        }
        /**
         * Returns a list of all attributes of this category.
         */
        public static function getAttributeKeyList($akCategoryHandle, $filters = array())
        {
            return Concrete\Core\Attribute\Key\Key::getAttributeKeyList($akCategoryHandle, $filters);
        }
        public function export($axml, $exporttype = "full")
        {
            return parent::export($axml, $exporttype);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Attribute\Key\Key::exportList($xml);
        }
        /**
         * Note, this queries both the pkgID found on the AttributeKeys table AND any attribute keys of a special type
         * installed by that package, and any in categories by that package.
         * That's because a special type, if the package is uninstalled, is going to be unusable
         * by attribute keys that still remain.
         */
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Attribute\Key\Key::getListByPackage($pkg);
        }
        public static function import(SimpleXMLElement $ak)
        {
            return Concrete\Core\Attribute\Key\Key::import($ak);
        }
        /**
         * Adds an attribute key.
         */
        protected static function addAttributeKey($akCategoryHandle, $type, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\Key::addAttributeKey($akCategoryHandle, $type, $args, $pkg);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        /**
         * Updates an attribute key.
         */
        public function update($args)
        {
            return parent::update($args);
        }
        /**
         * Duplicates an attribute key.
         */
        public function duplicate($args = array())
        {
            return parent::duplicate($args);
        }
        public function inAttributeSet($as)
        {
            return parent::inAttributeSet($as);
        }
        public function setAttributeKeyColumnHeader($r)
        {
            return parent::setAttributeKeyColumnHeader($r);
        }
        /**
         * @param string $table
         * @param array $columnHeaders
         * @param \Concrete\Core\Attribute\Value\ValueList $attribs
         * @param mixed $rs this is a legacy parameter, not actually used anymore
         */
        public function reindex($table, $columnHeaders, $attribs, $rs = null)
        {
            return parent::reindex($table, $columnHeaders, $attribs, $rs);
        }
        public function updateSearchIndex($prevHandle = false)
        {
            return parent::updateSearchIndex($prevHandle);
        }
        public function getAttributeValueIDList()
        {
            return parent::getAttributeValueIDList();
        }
        /**
         * Adds a generic attribute record (with this type) to the AttributeValues table.
         */
        public function addAttributeValue()
        {
            return parent::addAttributeValue();
        }
        public function getAttributeKeyIconSRC()
        {
            return parent::getAttributeKeyIconSRC();
        }
        public function getController()
        {
            return parent::getController();
        }
        /**
         * Renders a view for this attribute key. If no view is default we display it's "view"
         * Valid views are "view", "form" or a custom view (if the attribute has one in its directory)
         * Additionally, an attribute does not have to have its own interface. If it doesn't, then whatever
         * is printed in the corresponding $view function in the attribute's controller is printed out.
         */
        public function render($view = "view", $value = false, $return = false)
        {
            return parent::render($view, $value, $return);
        }
        /**
         * Validates the request object to see if the current request fulfills the "requirement" portion of an attribute.
         *
         * @return bool|\Concrete\Core\Error\Error
         */
        public function validateAttributeForm()
        {
            return parent::validateAttributeForm();
        }
        public function createIndexedSearchTable()
        {
            return parent::createIndexedSearchTable();
        }
        public function setAttributeSet($as)
        {
            return parent::setAttributeSet($as);
        }
        public function clearAttributeSets()
        {
            return parent::clearAttributeSets();
        }
        public function getAttributeSets()
        {
            return parent::getAttributeSets();
        }
        /**
         * Saves an attribute using its stock form.
         */
        public function saveAttributeForm($obj)
        {
            return parent::saveAttributeForm($obj);
        }
        /**
         * Sets an attribute directly with a passed value.
         */
        public function setAttribute($obj, $value)
        {
            return parent::setAttribute($obj, $value);
        }
        /**
         * @deprecated
         */
        public function outputSearchHTML()
        {
            return parent::outputSearchHTML();
        }
        /**
         * @deprecated
         */
        public function getKeyName()
        {
            return parent::getKeyName();
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getKeyHandle()
        {
            return parent::getKeyHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getKeyID()
        {
            return parent::getKeyID();
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Attribute\Key\Key::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class CollectionVersion extends \Concrete\Core\Page\Collection\Version\Version
    {
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        public static function get(&$c, $cvID)
        {
            return Concrete\Core\Page\Collection\Version\Version::get($c, $cvID);
        }
        public function getAttribute($ak, $c, $displayMode = false)
        {
            return parent::getAttribute($ak, $c, $displayMode);
        }
        public function isApproved()
        {
            return parent::isApproved();
        }
        public function isMostRecent()
        {
            return parent::isMostRecent();
        }
        public function isNew()
        {
            return parent::isNew();
        }
        public function getVersionID()
        {
            return parent::getVersionID();
        }
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        public function getVersionName()
        {
            return parent::getVersionName();
        }
        public function getVersionComments()
        {
            return parent::getVersionComments();
        }
        public function getVersionAuthorUserID()
        {
            return parent::getVersionAuthorUserID();
        }
        public function getVersionApproverUserID()
        {
            return parent::getVersionApproverUserID();
        }
        public function getVersionAuthorUserName()
        {
            return parent::getVersionAuthorUserName();
        }
        public function getVersionApproverUserName()
        {
            return parent::getVersionApproverUserName();
        }
        public function getCustomAreaStyles()
        {
            return parent::getCustomAreaStyles();
        }
        /**
         * Gets the date the collection version was created
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getVersionDateCreated()
        {
            return parent::getVersionDateCreated();
        }
        public function canWrite()
        {
            return parent::canWrite();
        }
        public function setComment($comment)
        {
            return parent::setComment($comment);
        }
        public function createNew($versionComments)
        {
            return parent::createNew($versionComments);
        }
        public function approve($doReindexImmediately = true)
        {
            return parent::approve($doReindexImmediately);
        }
        public function discard()
        {
            return parent::discard();
        }
        public function canDiscard()
        {
            return parent::canDiscard();
        }
        public function removeNewStatus()
        {
            return parent::removeNewStatus();
        }
        public function deny()
        {
            return parent::deny();
        }
        public function delete()
        {
            return parent::delete();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class ConcreteAuthenticationTypeController extends \Concrete\Authentication\Concrete\Controller
    {
        public function getHandle()
        {
            return parent::getHandle();
        }
        public function deauthenticate(Concrete\Core\User\User $u)
        {
            return parent::deauthenticate($u);
        }
        public function getAuthenticationTypeIconHTML()
        {
            return parent::getAuthenticationTypeIconHTML();
        }
        public function verifyHash(Concrete\Core\User\User $u, $hash)
        {
            return parent::verifyHash($u, $hash);
        }
        public function view()
        {
            return parent::view();
        }
        public function buildHash(Concrete\Core\User\User $u, $test = 1)
        {
            return parent::buildHash($u, $test);
        }
        public function isAuthenticated(Concrete\Core\User\User $u)
        {
            return parent::isAuthenticated($u);
        }
        public function saveAuthenticationType($values)
        {
            return parent::saveAuthenticationType($values);
        }
        /**
         * Called when a user wants a password reset email sent, is passed in the user's email address.
         */
        public function forgot_password()
        {
            return parent::forgot_password();
        }
        public function change_password($uHash = "")
        {
            return parent::change_password($uHash);
        }
        public function password_changed()
        {
            return parent::password_changed();
        }
        public function email_validated()
        {
            return parent::email_validated();
        }
        public function invalid_token()
        {
            return parent::invalid_token();
        }
        public function authenticate()
        {
            return parent::authenticate();
        }
        public function v($hash = "")
        {
            return parent::v($hash);
        }
        public function getAuthenticationType()
        {
            return parent::getAuthenticationType();
        }
        public function completeAuthentication(Concrete\Core\User\User $u)
        {
            return parent::completeAuthentication($u);
        }
        public function setViewObject(Concrete\Core\View\AbstractView $view)
        {
            return parent::setViewObject($view);
        }
        public function setTheme($mixed)
        {
            return parent::setTheme($mixed);
        }
        public function getTheme()
        {
            return parent::getTheme();
        }
        public function setThemeViewTemplate($template)
        {
            return parent::setThemeViewTemplate($template);
        }
        public function getThemeViewTemplate()
        {
            return parent::getThemeViewTemplate();
        }
        public function getControllerActionPath()
        {
            return parent::getControllerActionPath();
        }
        public function getViewObject()
        {
            return parent::getViewObject();
        }
        public function action()
        {
            return parent::action();
        }
        public function requireAsset()
        {
            return parent::requireAsset();
        }
        /**
         * Adds an item to the view's header. This item will then be automatically printed out before the <body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addHeaderItem($item)
        {
            return parent::addHeaderItem($item);
        }
        /**
         * Adds an item to the view's footer. This item will then be automatically printed out before the </body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addFooterItem($item)
        {
            return parent::addFooterItem($item);
        }
        public function set($key, $val)
        {
            return parent::set($key, $val);
        }
        public function getSets()
        {
            return parent::getSets();
        }
        public function shouldRunControllerTask()
        {
            return parent::shouldRunControllerTask();
        }
        public function getHelperObjects()
        {
            return parent::getHelperObjects();
        }
        public function get($key = null, $defaultValue = null)
        {
            return parent::get($key, $defaultValue);
        }
        public function getTask()
        {
            return parent::getTask();
        }
        public function getAction()
        {
            return parent::getAction();
        }
        public function getParameters()
        {
            return parent::getParameters();
        }
        public function on_start()
        {
            return parent::on_start();
        }
        public function on_before_render()
        {
            return parent::on_before_render();
        }
        /**
         * @deprecated
         */
        public function isPost()
        {
            return parent::isPost();
        }
        public function post($key = null, $defaultValue = null)
        {
            return parent::post($key, $defaultValue);
        }
        public function redirect()
        {
            return parent::redirect();
        }
        public function runTask($action, $parameters)
        {
            return parent::runTask($action, $parameters);
        }
        public function runAction($action, $parameters = array())
        {
            return parent::runAction($action, $parameters);
        }
        public function request($key = null)
        {
            return parent::request($key);
        }
        /**
         * Set the application object
         *
         * @param \Concrete\Core\Application\Application $application
         */
        public function setApplication(Concrete\Core\Application\Application $application)
        {
            return parent::setApplication($application);
        }
    }

    class Controller extends \Concrete\Core\Controller\Controller
    {
        public function setViewObject(Concrete\Core\View\AbstractView $view)
        {
            return parent::setViewObject($view);
        }
        public function setTheme($mixed)
        {
            return parent::setTheme($mixed);
        }
        public function getTheme()
        {
            return parent::getTheme();
        }
        public function setThemeViewTemplate($template)
        {
            return parent::setThemeViewTemplate($template);
        }
        public function getThemeViewTemplate()
        {
            return parent::getThemeViewTemplate();
        }
        public function getControllerActionPath()
        {
            return parent::getControllerActionPath();
        }
        public function getViewObject()
        {
            return parent::getViewObject();
        }
        public function action()
        {
            return parent::action();
        }
        public function requireAsset()
        {
            return parent::requireAsset();
        }
        /**
         * Adds an item to the view's header. This item will then be automatically printed out before the <body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addHeaderItem($item)
        {
            return parent::addHeaderItem($item);
        }
        /**
         * Adds an item to the view's footer. This item will then be automatically printed out before the </body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addFooterItem($item)
        {
            return parent::addFooterItem($item);
        }
        public function set($key, $val)
        {
            return parent::set($key, $val);
        }
        public function getSets()
        {
            return parent::getSets();
        }
        public function shouldRunControllerTask()
        {
            return parent::shouldRunControllerTask();
        }
        public function getHelperObjects()
        {
            return parent::getHelperObjects();
        }
        public function get($key = null, $defaultValue = null)
        {
            return parent::get($key, $defaultValue);
        }
        public function getTask()
        {
            return parent::getTask();
        }
        public function getAction()
        {
            return parent::getAction();
        }
        public function getParameters()
        {
            return parent::getParameters();
        }
        public function on_start()
        {
            return parent::on_start();
        }
        public function on_before_render()
        {
            return parent::on_before_render();
        }
        /**
         * @deprecated
         */
        public function isPost()
        {
            return parent::isPost();
        }
        public function post($key = null, $defaultValue = null)
        {
            return parent::post($key, $defaultValue);
        }
        public function redirect()
        {
            return parent::redirect();
        }
        public function runTask($action, $parameters)
        {
            return parent::runTask($action, $parameters);
        }
        public function runAction($action, $parameters = array())
        {
            return parent::runAction($action, $parameters);
        }
        public function request($key = null)
        {
            return parent::request($key);
        }
        /**
         * Set the application object
         *
         * @param \Concrete\Core\Application\Application $application
         */
        public function setApplication(Concrete\Core\Application\Application $application)
        {
            return parent::setApplication($application);
        }
    }

    class Conversation extends \Concrete\Core\Conversation\Conversation
    {
        public function getConversationID()
        {
            return parent::getConversationID();
        }
        public function getConversationParentMessageID()
        {
            return parent::getConversationParentMessageID();
        }
        public function getConversationDateCreated()
        {
            return parent::getConversationDateCreated();
        }
        public function getConversationDateLastMessage()
        {
            return parent::getConversationDateLastMessage();
        }
        public function getConversationMessagesTotal()
        {
            return parent::getConversationMessagesTotal();
        }
        public function getConversationMaxFileSizeGuest()
        {
            return parent::getConversationMaxFileSizeGuest();
        }
        public function getConversationMaxFileSizeRegistered()
        {
            return parent::getConversationMaxFileSizeRegistered();
        }
        public function getConversationMaxFilesGuest()
        {
            return parent::getConversationMaxFilesGuest();
        }
        public function getConversationMaxFilesRegistered()
        {
            return parent::getConversationMaxFilesRegistered();
        }
        public function getConversationFileExtensions()
        {
            return parent::getConversationFileExtensions();
        }
        public function getConversationAttachmentOverridesEnabled()
        {
            return parent::getConversationAttachmentOverridesEnabled();
        }
        public function getConversationAttachmentsEnabled()
        {
            return parent::getConversationAttachmentsEnabled();
        }
        public function getConversationNotificationOverridesEnabled()
        {
            return parent::getConversationNotificationOverridesEnabled();
        }
        public function overrideGlobalPermissions()
        {
            return parent::overrideGlobalPermissions();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public static function getByID($cnvID)
        {
            return Concrete\Core\Conversation\Conversation::getByID($cnvID);
        }
        public function getConversationPageObject()
        {
            return parent::getConversationPageObject();
        }
        public function setConversationPageObject($c)
        {
            return parent::setConversationPageObject($c);
        }
        public function updateConversationSummary()
        {
            return parent::updateConversationSummary();
        }
        /**
         * @return \Concrete\Core\User\UserInfo[]
         */
        public function getConversationMessageUsers()
        {
            return parent::getConversationMessageUsers();
        }
        public function setConversationParentMessageID($cnvParentMessageID)
        {
            return parent::setConversationParentMessageID($cnvParentMessageID);
        }
        public static function add()
        {
            return Concrete\Core\Conversation\Conversation::add();
        }
        public function setConversationAttachmentOverridesEnabled($cnvAttachmentOverridesEnabled)
        {
            return parent::setConversationAttachmentOverridesEnabled($cnvAttachmentOverridesEnabled);
        }
        public function setConversationNotificationOverridesEnabled($cnvNotificationOverridesEnabled)
        {
            return parent::setConversationNotificationOverridesEnabled($cnvNotificationOverridesEnabled);
        }
        public function setConversationAttachmentsEnabled($cnvAttachmentsEnabled)
        {
            return parent::setConversationAttachmentsEnabled($cnvAttachmentsEnabled);
        }
        public function setConversationMaxFileSizeGuest($cnvMaxFileSizeGuest)
        {
            return parent::setConversationMaxFileSizeGuest($cnvMaxFileSizeGuest);
        }
        public function setConversationMaxFileSizeRegistered($cnvMaxFileSizeRegistered)
        {
            return parent::setConversationMaxFileSizeRegistered($cnvMaxFileSizeRegistered);
        }
        public function setConversationMaxFilesGuest($cnvMaxFilesGuest)
        {
            return parent::setConversationMaxFilesGuest($cnvMaxFilesGuest);
        }
        public function setConversationMaxFilesRegistered($cnvMaxFilesRegistered)
        {
            return parent::setConversationMaxFilesRegistered($cnvMaxFilesRegistered);
        }
        public function setConversationFileExtensions($cnvFileExtensions)
        {
            return parent::setConversationFileExtensions($cnvFileExtensions);
        }
        public function getConversationSubscriptionEnabled()
        {
            return parent::getConversationSubscriptionEnabled();
        }
        public function setConversationSubscriptionEnabled($cnvEnableSubscription)
        {
            return parent::setConversationSubscriptionEnabled($cnvEnableSubscription);
        }
        /**
         * Similar to the method below, but excludes global subscribers who have opted out of conversations, etc...
         * This method should be used any time we actually act on subscriptions, send emails, etc...
         */
        public function getConversationUsersToEmail()
        {
            return parent::getConversationUsersToEmail();
        }
        public function getConversationSubscribedUsers()
        {
            return parent::getConversationSubscribedUsers();
        }
        public static function getDefaultSubscribedUsers()
        {
            return Concrete\Core\Conversation\Conversation::getDefaultSubscribedUsers();
        }
        public function setConversationSubscribedUsers($users)
        {
            return parent::setConversationSubscribedUsers($users);
        }
        public function isUserSubscribed($user)
        {
            return parent::isUserSubscribed($user);
        }
        public function subscribeUser($user)
        {
            return parent::subscribeUser($user);
        }
        public function unsubscribeUser($user)
        {
            return parent::unsubscribeUser($user);
        }
        public static function setDefaultSubscribedUsers($users)
        {
            return Concrete\Core\Conversation\Conversation::setDefaultSubscribedUsers($users);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class ConversationEditor extends \Concrete\Core\Conversation\Editor\Editor
    {
        public function setConversationEditorInputName($input)
        {
            return parent::setConversationEditorInputName($input);
        }
        public function getConversationEditorInputName()
        {
            return parent::getConversationEditorInputName();
        }
        /**
         * @param Conversation $cnvObject
         */
        public function setConversationObject($cnvObject)
        {
            return parent::setConversationObject($cnvObject);
        }
        public function getConversationObject()
        {
            return parent::getConversationObject();
        }
        /**
         * @param Message $message
         */
        public function setConversationMessageObject(Concrete\Core\Conversation\Message\Message $message)
        {
            return parent::setConversationMessageObject($message);
        }
        public function getConversationMessageObject()
        {
            return parent::getConversationMessageObject();
        }
        /**
         * @return string Returns the editor's formatted message
         */
        public function getConversationEditorMessageBody()
        {
            return parent::getConversationEditorMessageBody();
        }
        public function getConversationEditorHandle()
        {
            return parent::getConversationEditorHandle();
        }
        public function getConversationEditorID()
        {
            return parent::getConversationEditorID();
        }
        public function getConversationEditorName()
        {
            return parent::getConversationEditorName();
        }
        public function isConversationEditorActive()
        {
            return parent::isConversationEditorActive();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * Looks up and returns the Package.
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Looks up and returns a Package object for the current Editor's Package ID.
         *
         * @return Package
         */
        public function getPackageObject()
        {
            return parent::getPackageObject();
        }
        /**
         * @return Editor|null Returns the first found active conversation editor, null if no editor is active
         */
        public static function getActive()
        {
            return Concrete\Core\Conversation\Editor\Editor::getActive();
        }
        /**
         * Returns the appropriate conversation editor object for the given cnvEditorID.
         *
         * @param int $cnvEditorID
         *
         * @return Editor|null
         */
        public static function getByID($cnvEditorID)
        {
            return Concrete\Core\Conversation\Editor\Editor::getByID($cnvEditorID);
        }
        /**
         * Returns the appropriate conversation editor object for the given cnvEditorHandle.
         *
         * @param $cnvEditorHandle
         *
         * @return Editor|null
         */
        public static function getByHandle($cnvEditorHandle)
        {
            return Concrete\Core\Conversation\Editor\Editor::getByHandle($cnvEditorHandle);
        }
        /**
         * This function is used to instantiate a Conversation Editor object from an associative array.
         *
         * @param array $record an associative array of field value pairs for the ConversationEditor record
         *
         * @return Editor|null
         */
        protected static function createFromRecord($record)
        {
            return Concrete\Core\Conversation\Editor\Editor::createFromRecord($record);
        }
        /**
         * outputs an HTML block containing the add message form for the current Conversation Editor.
         */
        public function outputConversationEditorAddMessageForm()
        {
            return parent::outputConversationEditorAddMessageForm();
        }
        /**
         * Outputs an HTML block containing the message reply form for the current Conversation Editor.
         */
        public function outputConversationEditorReplyMessageForm()
        {
            return parent::outputConversationEditorReplyMessageForm();
        }
        /**
         * Returns a formatted conversation message body string, based on configuration options supplied.
         *
         * @param \Concrete\Core\Conversation\Conversation $cnv
         * @param string $cnvMessageBody
         * @param array $config
         *
         * @return string
         */
        public function formatConversationMessageBody($cnv, $cnvMessageBody, $config = array())
        {
            return parent::formatConversationMessageBody($cnv, $cnvMessageBody, $config);
        }
        /**
         * Creates a database record for the Conversation Editor, then attempts to return the object.
         *
         * @param string $cnvEditorHandle
         * @param string $cnvEditorName
         * @param bool|Package $pkg
         *
         * @return Editor|null
         */
        public static function add($cnvEditorHandle, $cnvEditorName, $pkg = false)
        {
            return Concrete\Core\Conversation\Editor\Editor::add($cnvEditorHandle, $cnvEditorName, $pkg);
        }
        /**
         * Removes the current editor object's record from the database.
         */
        public function delete()
        {
            return parent::delete();
        }
        /**
         * Deactivates all other Conversation Editors, and activates the current one.
         */
        public function activate()
        {
            return parent::activate();
        }
        /**
         * Function used to deactivate.
         */
        protected function deactivateAll()
        {
            return parent::deactivateAll();
        }
        /**
         * Returns an array of all Editor Objects.
         *
         * @param null $pkgID An optional filter for Package ID
         *
         * @return Editor[]
         */
        public static function getList($pkgID = null)
        {
            return Concrete\Core\Conversation\Editor\Editor::getList($pkgID);
        }
        /**
         * Returns an array of all Editor objects for the given package object.
         *
         * @param Package $pkg
         *
         * @return Editor[]
         */
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Conversation\Editor\Editor::getListByPackage($pkg);
        }
        public function export($xml)
        {
            return parent::export($xml);
        }
        /**
         * Adds a ConversationEditors node and all Editor records to the provided SimleXMLElement object provided.
         *
         * @param \SimpleXMLElement $xml
         */
        public static function exportList($xml)
        {
            return Concrete\Core\Conversation\Editor\Editor::exportList($xml);
        }
        /**
         * Returns whether or not the current Conversation Editor has an options form.
         *
         * @return bool
         */
        public function hasOptionsForm()
        {
            return parent::hasOptionsForm();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class ConversationFlagType extends \Concrete\Core\Conversation\FlagType\FlagType
    {
        public function getConversationFlagTypeHandle()
        {
            return parent::getConversationFlagTypeHandle();
        }
        public function getConversationFlagTypeID()
        {
            return parent::getConversationFlagTypeID();
        }
        public function init($id, $handle)
        {
            return parent::init($id, $handle);
        }
        public function delete()
        {
            return parent::delete();
        }
        public static function getByID($id)
        {
            return Concrete\Core\Conversation\FlagType\FlagType::getByID($id);
        }
        public static function getByhandle($handle)
        {
            return Concrete\Core\Conversation\FlagType\FlagType::getByhandle($handle);
        }
        public static function add($handle)
        {
            return Concrete\Core\Conversation\FlagType\FlagType::add($handle);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class ConversationMessage extends \Concrete\Core\Conversation\Message\Message
    {
        public function getConversationMessageID()
        {
            return parent::getConversationMessageID();
        }
        public function getConversationMessageSubject()
        {
            return parent::getConversationMessageSubject();
        }
        public function getConversationMessageBody()
        {
            return parent::getConversationMessageBody();
        }
        public function getConversationID()
        {
            return parent::getConversationID();
        }
        public function getConversationEditorID()
        {
            return parent::getConversationEditorID();
        }
        public function getConversationMessageLevel()
        {
            return parent::getConversationMessageLevel();
        }
        public function getConversationMessageParentID()
        {
            return parent::getConversationMessageParentID();
        }
        public function getConversationMessageSubmitIP()
        {
            return parent::getConversationMessageSubmitIP();
        }
        public function getConversationMessageSubmitUserAgent()
        {
            return parent::getConversationMessageSubmitUserAgent();
        }
        public function isConversationMessageDeleted()
        {
            return parent::isConversationMessageDeleted();
        }
        public function isConversationMessageFlagged()
        {
            return parent::isConversationMessageFlagged();
        }
        public function isConversationMessageApproved()
        {
            return parent::isConversationMessageApproved();
        }
        public function getConversationMessageFlagTypes()
        {
            return parent::getConversationMessageFlagTypes();
        }
        public function getConversationMessageTotalRatingScore()
        {
            return parent::getConversationMessageTotalRatingScore();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getConversationMessageAuthorObject()
        {
            return parent::getConversationMessageAuthorObject();
        }
        public function conversationMessageHasActiveChildren()
        {
            return parent::conversationMessageHasActiveChildren();
        }
        public function setMessageBody($cnvMessageBody)
        {
            return parent::setMessageBody($cnvMessageBody);
        }
        public function conversationMessageHasChildren()
        {
            return parent::conversationMessageHasChildren();
        }
        public function approve()
        {
            return parent::approve();
        }
        public function unapprove()
        {
            return parent::unapprove();
        }
        public function conversationMessageHasFlag($flag)
        {
            return parent::conversationMessageHasFlag($flag);
        }
        public function getConversationMessageBodyOutput($dashboardOverride = false)
        {
            return parent::getConversationMessageBodyOutput($dashboardOverride);
        }
        public function getConversationObject()
        {
            return parent::getConversationObject();
        }
        public function getConversationMessageUserObject()
        {
            return parent::getConversationMessageUserObject();
        }
        public function getConversationMessageUserID()
        {
            return parent::getConversationMessageUserID();
        }
        public function getConversationMessageDateTime()
        {
            return parent::getConversationMessageDateTime();
        }
        public function getConversationMessageDateTimeOutput($format = "default")
        {
            return parent::getConversationMessageDateTimeOutput($format);
        }
        public function rateMessage(Concrete\Core\Conversation\Rating\Type $ratingType, $commentRatingIP, $commentRatingUserID, $post = array())
        {
            return parent::rateMessage($ratingType, $commentRatingIP, $commentRatingUserID, $post);
        }
        public function hasRatedMessage(Concrete\Core\Conversation\Rating\Type $ratingType, $user)
        {
            return parent::hasRatedMessage($ratingType, $user);
        }
        public function getConversationMessageRating(Concrete\Core\Conversation\Rating\Type $ratingType)
        {
            return parent::getConversationMessageRating($ratingType);
        }
        public function flag($flagtype)
        {
            return parent::flag($flagtype);
        }
        public function unflag($flagtype)
        {
            return parent::unflag($flagtype);
        }
        public static function getByID($cnvMessageID)
        {
            return Concrete\Core\Conversation\Message\Message::getByID($cnvMessageID);
        }
        public function attachFile(Concrete\Core\File\File $f)
        {
            return parent::attachFile($f);
        }
        public function removeFile($cnvMessageAttachmentID)
        {
            return parent::removeFile($cnvMessageAttachmentID);
        }
        public function getAttachments($cnvMessageID)
        {
            return parent::getAttachments($cnvMessageID);
        }
        public static function getByAttachmentID($cnvMessageAttachmentID)
        {
            return Concrete\Core\Conversation\Message\Message::getByAttachmentID($cnvMessageAttachmentID);
        }
        public static function add(Concrete\Core\Conversation\Conversation $cnv, Concrete\Core\Conversation\Message\Author $author, $cnvMessageSubject, $cnvMessageBody, $parentMessage = false)
        {
            return Concrete\Core\Conversation\Message\Message::add($cnv, $author, $cnvMessageSubject, $cnvMessageBody, $parentMessage);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function restore()
        {
            return parent::restore();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class ConversationRatingType extends \Concrete\Core\Conversation\Rating\Type
    {
        public function getRatingTypeHandle()
        {
            return parent::getRatingTypeHandle();
        }
        public function getRatingTypeID()
        {
            return parent::getRatingTypeID();
        }
        /** Returns the list of all conversation rating types
         * @return array[Type]
         */
        public static function getList()
        {
            return Concrete\Core\Conversation\Rating\Type::getList();
        }
        public static function add($cnvRatingTypeHandle, $cnvRatingTypeName, $cnvRatingTypeCommunityPoints, $pkg = false)
        {
            return Concrete\Core\Conversation\Rating\Type::add($cnvRatingTypeHandle, $cnvRatingTypeName, $cnvRatingTypeCommunityPoints, $pkg);
        }
        public static function getByHandle($cnvRatingTypeHandle)
        {
            return Concrete\Core\Conversation\Rating\Type::getByHandle($cnvRatingTypeHandle);
        }
        public static function getByID($cnvRatingTypeID)
        {
            return Concrete\Core\Conversation\Rating\Type::getByID($cnvRatingTypeID);
        }
        public function export($xml)
        {
            return parent::export($xml);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Conversation\Rating\Type::exportList($xml);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Conversation\Rating\Type::getListByPackage($pkg);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function getConversationRatingTypeHandle()
        {
            return parent::getConversationRatingTypeHandle();
        }
        public function getConversationRatingTypeName()
        {
            return parent::getConversationRatingTypeName();
        }
        public function getConversationRatingTypeID()
        {
            return parent::getConversationRatingTypeID();
        }
        public function getConversationRatingTypePoints()
        {
            return parent::getConversationRatingTypePoints();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function getPackageObject()
        {
            return parent::getPackageObject();
        }
        /** Returns the display name for this instance (localized and escaped accordingly to $format)
         * @param string $format = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getConversationRatingTypeDisplayName($format = "html")
        {
            return parent::getConversationRatingTypeDisplayName($format);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Cookie extends Concrete\Core\Cookie\CookieJar
    {
        /**
         * @var Concrete\Core\Cookie\CookieJar
         */
        protected static $instance;
        /**
         * Adds a CookieObject to the cookie pantry
         * @param string $name The cookie name
         * @param string|null $value The value of the cookie
         * @param int $expire The number of seconds until the cookie expires
         * @param string $path The path for the cookie
         * @param null|string $domain The domain the cookie is available to
         * @param bool $secure whether the cookie should only be transmitted over a HTTPS connection from the client
         * @param bool $httpOnly Whether the cookie will be made accessible only through the HTTP protocol
         * @return \Symfony\Component\HttpFoundation\Cookie
         */
        public static function set($name, $value = null, $expire = 0, $path = "/", $domain = null, $secure = false, $httpOnly = true)
        {
            return static::$instance->set($name, $value, $expire, $path, $domain, $secure, $httpOnly);
        }
        /**
         * Adds a CookieObject to the array of cookies for the object
         * @param CookieObject $cookie
         */
        public static function add($cookie)
        {
            return static::$instance->add($cookie);
        }
        /**
         * Used to determine if the cookie key exists in the pantry
         * @param string $cookie
         * @return bool
         */
        public static function has($cookie)
        {
            return static::$instance->has($cookie);
        }
        public static function clear($cookie)
        {
            return static::$instance->clear($cookie);
        }
        /**
         * @param string $name    The key the cookie is stored under
         * @param mixed  $default A value to return if the cookie isn't set
         * @return mixed
         */
        public static function get($name, $default = null)
        {
            return static::$instance->get($name, $default);
        }
        /**
         * @return CookieObject[]
         */
        public static function getCookies()
        {
            return static::$instance->getCookies();
        }
        public static function getClearedCookies()
        {
            return static::$instance->getClearedCookies();
        }
        protected static function getRequest()
        {
            return static::$instance->getRequest();
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Cookie::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    /**
     * Useful functions for getting paths for concrete5 items.
     * @package Core
     * @author Andrew Embler <andrew@concrete5.org>
     * @copyright  Copyright (c) 2003-2012 Concrete5. (http://www.concrete5.org)
     * @license    http://www.concrete5.org/license/     MIT License
     */
    class Environment extends \Concrete\Core\Foundation\Environment
    {
        public static function get()
        {
            return Concrete\Core\Foundation\Environment::get();
        }
        public static function saveCachedEnvironmentObject()
        {
            return Concrete\Core\Foundation\Environment::saveCachedEnvironmentObject();
        }
        public function clearOverrideCache()
        {
            return parent::clearOverrideCache();
        }
        public function reset()
        {
            return parent::reset();
        }
        /**
         * Builds a list of all overrides.
         */
        protected function getOverrides()
        {
            return parent::getOverrides();
        }
        public function getDirectoryContents($dir, $ignoreFilesArray = array(), $recursive = false)
        {
            return parent::getDirectoryContents($dir, $ignoreFilesArray, $recursive);
        }
        public function overrideCoreByPackage($segment, $pkgOrHandle)
        {
            return parent::overrideCoreByPackage($segment, $pkgOrHandle);
        }
        public function getRecord($segment, $pkgHandle = false)
        {
            return parent::getRecord($segment, $pkgHandle);
        }
        /**
         * Bypasses overrides cache to get record.
         */
        public function getUncachedRecord($segment, $pkgHandle = false)
        {
            return parent::getUncachedRecord($segment, $pkgHandle);
        }
        /**
         * Returns a full path to the subpath segment. Returns false if not found.
         */
        public function getPath($subpath, $pkgIdentifier = false)
        {
            return parent::getPath($subpath, $pkgIdentifier);
        }
        /**
         * Returns  a public URL to the subpath item. Returns false if not found.
         */
        public function getURL($subpath, $pkgIdentifier = false)
        {
            return parent::getURL($subpath, $pkgIdentifier);
        }
        public function getOverrideList()
        {
            return parent::getOverrideList();
        }
    }

    class FacebookAuthenticationTypeController extends \Concrete\Authentication\Facebook\Controller
    {
        public function registrationGroupID()
        {
            return parent::registrationGroupID();
        }
        public function supportsRegistration()
        {
            return parent::supportsRegistration();
        }
        public function getAuthenticationTypeIconHTML()
        {
            return parent::getAuthenticationTypeIconHTML();
        }
        public function getHandle()
        {
            return parent::getHandle();
        }
        /**
         * @return Facebook
         */
        public function getService()
        {
            return parent::getService();
        }
        public function saveAuthenticationType($args)
        {
            return parent::saveAuthenticationType($args);
        }
        public function edit()
        {
            return parent::edit();
        }
        public function handle_authentication_attempt()
        {
            return parent::handle_authentication_attempt();
        }
        public function handle_authentication_callback()
        {
            return parent::handle_authentication_callback();
        }
        public function handle_attach_attempt()
        {
            return parent::handle_attach_attempt();
        }
        public function handle_attach_callback()
        {
            return parent::handle_attach_callback();
        }
        public function view()
        {
            return parent::view();
        }
        /**
         * Method used to clean up.
         * This method must be defined, if it isn't needed, leave it blank.
         *
         * @param \User $u
         * @return void
         */
        public function deauthenticate(Concrete\Core\User\User $u)
        {
            return parent::deauthenticate($u);
        }
        /**
         * Test user authentication status.
         *
         * @param \User $u
         * @return bool Returns true if user is authenticated, false if not
         */
        public function isAuthenticated(Concrete\Core\User\User $u)
        {
            return parent::isAuthenticated($u);
        }
        /**
         * @return Array
         */
        public function getAdditionalRequestParameters()
        {
            return parent::getAdditionalRequestParameters();
        }
        public function handle_error($error = false)
        {
            return parent::handle_error($error);
        }
        public function showError($error = null)
        {
            return parent::showError($error);
        }
        public function markError($error)
        {
            return parent::markError($error);
        }
        public function handle_success($message = false)
        {
            return parent::handle_success($message);
        }
        public function showSuccess($message = null)
        {
            return parent::showSuccess($message);
        }
        public function markSuccess($message)
        {
            return parent::markSuccess($message);
        }
        /**
         * Empty because we don't use the authenticate entry point.
         */
        public function authenticate()
        {
            return parent::authenticate();
        }
        /**
         * Create a cookie hash to identify the user indefinitely.
         *
         * @param \User $u
         *
         * @return string Unique hash to be used to verify the users identity
         */
        public function buildHash(Concrete\Core\User\User $u)
        {
            return parent::buildHash($u);
        }
        /**
         * Hash authentication disabled for oauth.
         *
         * @param \User  $u    object requesting verification.
         * @param string $hash
         *
         * @return bool returns true if the hash is valid, false if not
         */
        public function verifyHash(Concrete\Core\User\User $u, $hash)
        {
            return parent::verifyHash($u, $hash);
        }
        /**
         * @return \OAuth\Common\Token\TokenInterface
         */
        public function getToken()
        {
            return parent::getToken();
        }
        /**
         * @param \OAuth\Common\Token\TokenInterface $token
         */
        public function setToken(OAuth\Common\Token\TokenInterface $token)
        {
            return parent::setToken($token);
        }
        /**
         * @return null|\User
         *
         * @throws Exception
         */
        protected function attemptAuthentication()
        {
            return parent::attemptAuthentication();
        }
        /**
         * @return \OAuth\UserData\Extractor\ExtractorInterface
         *
         * @throws \OAuth\UserData\Exception\UndefinedExtractorException
         */
        public function getExtractor($new = false)
        {
            return parent::getExtractor($new);
        }
        protected function isValid()
        {
            return parent::isValid();
        }
        /**
         * @param $binding
         *
         * @return bool|string
         *
         * @throws \Doctrine\DBAL\DBALException
         */
        public function getBoundUserID($binding)
        {
            return parent::getBoundUserID($binding);
        }
        protected function createUser()
        {
            return parent::createUser();
        }
        public function supportsEmail()
        {
            return parent::supportsEmail();
        }
        public function supportsUniqueId()
        {
            return parent::supportsUniqueId();
        }
        public function supportsVerifiedEmail()
        {
            return parent::supportsVerifiedEmail();
        }
        public function isEmailVerified()
        {
            return parent::isEmailVerified();
        }
        public function getEmail()
        {
            return parent::getEmail();
        }
        public function supportsFullName()
        {
            return parent::supportsFullName();
        }
        public function supportsFirstName()
        {
            return parent::supportsFirstName();
        }
        public function supportsLastName()
        {
            return parent::supportsLastName();
        }
        public function getFirstName()
        {
            return parent::getFirstName();
        }
        public function getLastName()
        {
            return parent::getLastName();
        }
        public function getFullName()
        {
            return parent::getFullName();
        }
        public function supportsUsername()
        {
            return parent::supportsUsername();
        }
        public function getUsername()
        {
            return parent::getUsername();
        }
        /**
         * @param \User $user
         * @param       $binding
         *
         * @return int|null
         */
        public function bindUser(Concrete\Core\User\User $user, $binding)
        {
            return parent::bindUser($user, $binding);
        }
        /**
         * @param $user_id
         * @param $binding
         *
         * @return int|null
         */
        public function bindUserID($user_id, $binding)
        {
            return parent::bindUserID($user_id, $binding);
        }
        public function getUniqueId()
        {
            return parent::getUniqueId();
        }
        public function getAuthenticationType()
        {
            return parent::getAuthenticationType();
        }
        public function completeAuthentication(Concrete\Core\User\User $u)
        {
            return parent::completeAuthentication($u);
        }
        public function setViewObject(Concrete\Core\View\AbstractView $view)
        {
            return parent::setViewObject($view);
        }
        public function setTheme($mixed)
        {
            return parent::setTheme($mixed);
        }
        public function getTheme()
        {
            return parent::getTheme();
        }
        public function setThemeViewTemplate($template)
        {
            return parent::setThemeViewTemplate($template);
        }
        public function getThemeViewTemplate()
        {
            return parent::getThemeViewTemplate();
        }
        public function getControllerActionPath()
        {
            return parent::getControllerActionPath();
        }
        public function getViewObject()
        {
            return parent::getViewObject();
        }
        public function action()
        {
            return parent::action();
        }
        public function requireAsset()
        {
            return parent::requireAsset();
        }
        /**
         * Adds an item to the view's header. This item will then be automatically printed out before the <body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addHeaderItem($item)
        {
            return parent::addHeaderItem($item);
        }
        /**
         * Adds an item to the view's footer. This item will then be automatically printed out before the </body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addFooterItem($item)
        {
            return parent::addFooterItem($item);
        }
        public function set($key, $val)
        {
            return parent::set($key, $val);
        }
        public function getSets()
        {
            return parent::getSets();
        }
        public function shouldRunControllerTask()
        {
            return parent::shouldRunControllerTask();
        }
        public function getHelperObjects()
        {
            return parent::getHelperObjects();
        }
        public function get($key = null, $defaultValue = null)
        {
            return parent::get($key, $defaultValue);
        }
        public function getTask()
        {
            return parent::getTask();
        }
        public function getAction()
        {
            return parent::getAction();
        }
        public function getParameters()
        {
            return parent::getParameters();
        }
        public function on_start()
        {
            return parent::on_start();
        }
        public function on_before_render()
        {
            return parent::on_before_render();
        }
        /**
         * @deprecated
         */
        public function isPost()
        {
            return parent::isPost();
        }
        public function post($key = null, $defaultValue = null)
        {
            return parent::post($key, $defaultValue);
        }
        public function redirect()
        {
            return parent::redirect();
        }
        public function runTask($action, $parameters)
        {
            return parent::runTask($action, $parameters);
        }
        public function runAction($action, $parameters = array())
        {
            return parent::runAction($action, $parameters);
        }
        public function request($key = null)
        {
            return parent::request($key);
        }
        /**
         * Set the application object
         *
         * @param \Concrete\Core\Application\Application $application
         */
        public function setApplication(Concrete\Core\Application\Application $application)
        {
            return parent::setApplication($application);
        }
    }

    /**
     * @Entity
     * @Table(name="Files")
     */
    class File extends \Concrete\Core\File\File
    {
        /**
         * returns a file object for the given file ID
         * @param int $fID
         * @return File
         */
        public static function getByID($fID)
        {
            return Concrete\Core\File\File::getByID($fID);
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getPassword()
        {
            return parent::getPassword();
        }
        public function getStorageLocationID()
        {
            return parent::getStorageLocationID();
        }
        /**
         * @return \Concrete\Core\File\StorageLocation\StorageLocation
         */
        public function getFileStorageLocationObject()
        {
            return parent::getFileStorageLocationObject();
        }
        /**
         * @return \Concrete\Core\File\Version[]
         */
        public function getFileVersions()
        {
            return parent::getFileVersions();
        }
        /**
         * Reindex the attributes on this file.
         * @return void
         */
        public function reindex()
        {
            return parent::reindex();
        }
        public static function getRelativePathFromID($fID)
        {
            return Concrete\Core\File\File::getRelativePathFromID($fID);
        }
        protected function save()
        {
            return parent::save();
        }
        public function setFileStorageLocation(Concrete\Core\File\StorageLocation\StorageLocation $newLocation)
        {
            return parent::setFileStorageLocation($newLocation);
        }
        public function setPassword($pw)
        {
            return parent::setPassword($pw);
        }
        public function setOriginalPage($ocID)
        {
            return parent::setOriginalPage($ocID);
        }
        public function getOriginalPageObject()
        {
            return parent::getOriginalPageObject();
        }
        public function overrideFileSetPermissions()
        {
            return parent::overrideFileSetPermissions();
        }
        public function resetPermissions($fOverrideSetPermissions = 0)
        {
            return parent::resetPermissions($fOverrideSetPermissions);
        }
        public function getUserID()
        {
            return parent::getUserID();
        }
        public function setUserID($uID)
        {
            return parent::setUserID($uID);
        }
        public function getFileSets()
        {
            return parent::getFileSets();
        }
        public function isStarred($u = false)
        {
            return parent::isStarred($u);
        }
        public function getDateAdded()
        {
            return parent::getDateAdded();
        }
        /**
         * Returns a file version object that is to be written to. Computes whether we can use the current most recent version, OR a new one should be created
         */
        public function getVersionToModify($forceCreateNew = false)
        {
            return parent::getVersionToModify($forceCreateNew);
        }
        public function getFileID()
        {
            return parent::getFileID();
        }
        public function duplicate()
        {
            return parent::duplicate();
        }
        public static function add($filename, $prefix, $data = array(), $fsl = false)
        {
            return Concrete\Core\File\File::add($filename, $prefix, $data, $fsl);
        }
        public function getApprovedVersion()
        {
            return parent::getApprovedVersion();
        }
        public function inFileSet($fs)
        {
            return parent::inFileSet($fs);
        }
        /**
         * Removes a file, including all of its versions
         */
        public function delete()
        {
            return parent::delete();
        }
        /**
         * returns the most recent FileVersion object
         * @return Version
         */
        public function getRecentVersion()
        {
            return parent::getRecentVersion();
        }
        /**
         * returns the FileVersion object for the provided fvID
         * if none provided returns the approved version
         * @param int $fvID
         * @return Version
         */
        public function getVersion($fvID = null)
        {
            return parent::getVersion($fvID);
        }
        /**
         * Returns an array of all FileVersion objects owned by this file
         */
        public function getVersionList()
        {
            return parent::getVersionList();
        }
        public function getTotalDownloads()
        {
            return parent::getTotalDownloads();
        }
        public function getDownloadStatistics($limit = 20)
        {
            return parent::getDownloadStatistics($limit);
        }
        /**
         * Tracks File Download, takes the cID of the page that the file was downloaded from
         * @param int $rcID
         * @return void
         */
        public function trackDownload($rcID = null)
        {
            return parent::trackDownload($rcID);
        }
        /**
         * @deprecated
         */
        public function isError()
        {
            return parent::isError();
        }
    }

    class FileAttributeKey extends \Concrete\Core\Attribute\Key\FileKey
    {
        public static function getDefaultIndexedSearchTable()
        {
            return Concrete\Core\Attribute\Key\FileKey::getDefaultIndexedSearchTable();
        }
        /**
         * Returns an attribute value list of attributes and values (duh) which a collection version can store
         * against its object.
         *
         * @return AttributeValueList
         */
        public static function getAttributes($fID, $fvID, $method = "getValue")
        {
            return Concrete\Core\Attribute\Key\FileKey::getAttributes($fID, $fvID, $method);
        }
        public function getAttributeValue($avID, $method = "getValue")
        {
            return parent::getAttributeValue($avID, $method);
        }
        public static function getByHandle($akHandle)
        {
            return Concrete\Core\Attribute\Key\FileKey::getByHandle($akHandle);
        }
        public static function getByID($akID)
        {
            return Concrete\Core\Attribute\Key\FileKey::getByID($akID);
        }
        public static function getList()
        {
            return Concrete\Core\Attribute\Key\FileKey::getList();
        }
        public static function getSearchableList()
        {
            return Concrete\Core\Attribute\Key\FileKey::getSearchableList();
        }
        public static function getSearchableIndexedList()
        {
            return Concrete\Core\Attribute\Key\FileKey::getSearchableIndexedList();
        }
        public static function getImporterList($fv = false)
        {
            return Concrete\Core\Attribute\Key\FileKey::getImporterList($fv);
        }
        public static function getUserAddedList()
        {
            return Concrete\Core\Attribute\Key\FileKey::getUserAddedList();
        }
        /**
         */
        public static function get($akID)
        {
            return Concrete\Core\Attribute\Key\FileKey::get($akID);
        }
        protected function saveAttribute($f, $value = false)
        {
            return parent::saveAttribute($f, $value);
        }
        public static function add($at, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\FileKey::add($at, $args, $pkg);
        }
        public static function getColumnHeaderList()
        {
            return Concrete\Core\Attribute\Key\FileKey::getColumnHeaderList();
        }
        public function delete()
        {
            return parent::delete();
        }
        public function getIndexedSearchTable()
        {
            return parent::getIndexedSearchTable();
        }
        public function getSearchIndexFieldDefinition()
        {
            return parent::getSearchIndexFieldDefinition();
        }
        /**
         * Returns the name for this attribute key.
         */
        public function getAttributeKeyName()
        {
            return parent::getAttributeKeyName();
        }
        /** Returns the display name for this attribute (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getAttributeKeyDisplayName($format = "html")
        {
            return parent::getAttributeKeyDisplayName($format);
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getAttributeKeyHandle()
        {
            return parent::getAttributeKeyHandle();
        }
        /**
         * Deprecated. Going to be replaced by front end display name.
         */
        public function getAttributeKeyDisplayHandle()
        {
            return parent::getAttributeKeyDisplayHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getAttributeKeyID()
        {
            return parent::getAttributeKeyID();
        }
        public function getAttributeKeyCategoryID()
        {
            return parent::getAttributeKeyCategoryID();
        }
        /**
         * Returns whether the attribute key is searchable.
         */
        public function isAttributeKeySearchable()
        {
            return parent::isAttributeKeySearchable();
        }
        /**
         * Returns whether the attribute key is internal.
         */
        public function isAttributeKeyInternal()
        {
            return parent::isAttributeKeyInternal();
        }
        /**
         * Returns whether the attribute key is indexed as a "keyword search" field.
         */
        public function isAttributeKeyContentIndexed()
        {
            return parent::isAttributeKeyContentIndexed();
        }
        /**
         * Returns whether the attribute key is one that was automatically created by a process.
         */
        public function isAttributeKeyAutoCreated()
        {
            return parent::isAttributeKeyAutoCreated();
        }
        /**
         * Returns whether the attribute key is included in the standard search for this category.
         */
        public function isAttributeKeyColumnHeader()
        {
            return parent::isAttributeKeyColumnHeader();
        }
        /**
         * Returns whether the attribute key is one that can be edited through the frontend.
         */
        public function isAttributeKeyEditable()
        {
            return parent::isAttributeKeyEditable();
        }
        public function getComputedAttributeKeyCategoryHandle()
        {
            return parent::getComputedAttributeKeyCategoryHandle();
        }
        /**
         * Loads the required attribute fields for this instantiated attribute.
         */
        protected function load($akIdentifier, $loadBy = "akID")
        {
            return parent::load($akIdentifier, $loadBy);
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public static function getInstanceByID($akID)
        {
            return Concrete\Core\Attribute\Key\Key::getInstanceByID($akID);
        }
        /**
         * Returns an attribute type object.
         */
        public function getAttributeType()
        {
            return parent::getAttributeType();
        }
        /**
         * Returns the attribute type handle.
         */
        public function getAttributeTypeHandle()
        {
            return parent::getAttributeTypeHandle();
        }
        public function getAttributeKeyType()
        {
            return parent::getAttributeKeyType();
        }
        /**
         * Returns a list of all attributes of this category.
         */
        public static function getAttributeKeyList($akCategoryHandle, $filters = array())
        {
            return Concrete\Core\Attribute\Key\Key::getAttributeKeyList($akCategoryHandle, $filters);
        }
        public function export($axml, $exporttype = "full")
        {
            return parent::export($axml, $exporttype);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Attribute\Key\Key::exportList($xml);
        }
        /**
         * Note, this queries both the pkgID found on the AttributeKeys table AND any attribute keys of a special type
         * installed by that package, and any in categories by that package.
         * That's because a special type, if the package is uninstalled, is going to be unusable
         * by attribute keys that still remain.
         */
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Attribute\Key\Key::getListByPackage($pkg);
        }
        public static function import(SimpleXMLElement $ak)
        {
            return Concrete\Core\Attribute\Key\Key::import($ak);
        }
        /**
         * Adds an attribute key.
         */
        protected static function addAttributeKey($akCategoryHandle, $type, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\Key::addAttributeKey($akCategoryHandle, $type, $args, $pkg);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        /**
         * Updates an attribute key.
         */
        public function update($args)
        {
            return parent::update($args);
        }
        /**
         * Duplicates an attribute key.
         */
        public function duplicate($args = array())
        {
            return parent::duplicate($args);
        }
        public function inAttributeSet($as)
        {
            return parent::inAttributeSet($as);
        }
        public function setAttributeKeyColumnHeader($r)
        {
            return parent::setAttributeKeyColumnHeader($r);
        }
        /**
         * @param string $table
         * @param array $columnHeaders
         * @param \Concrete\Core\Attribute\Value\ValueList $attribs
         * @param mixed $rs this is a legacy parameter, not actually used anymore
         */
        public function reindex($table, $columnHeaders, $attribs, $rs = null)
        {
            return parent::reindex($table, $columnHeaders, $attribs, $rs);
        }
        public function updateSearchIndex($prevHandle = false)
        {
            return parent::updateSearchIndex($prevHandle);
        }
        public function getAttributeValueIDList()
        {
            return parent::getAttributeValueIDList();
        }
        /**
         * Adds a generic attribute record (with this type) to the AttributeValues table.
         */
        public function addAttributeValue()
        {
            return parent::addAttributeValue();
        }
        public function getAttributeKeyIconSRC()
        {
            return parent::getAttributeKeyIconSRC();
        }
        public function getController()
        {
            return parent::getController();
        }
        /**
         * Renders a view for this attribute key. If no view is default we display it's "view"
         * Valid views are "view", "form" or a custom view (if the attribute has one in its directory)
         * Additionally, an attribute does not have to have its own interface. If it doesn't, then whatever
         * is printed in the corresponding $view function in the attribute's controller is printed out.
         */
        public function render($view = "view", $value = false, $return = false)
        {
            return parent::render($view, $value, $return);
        }
        /**
         * Validates the request object to see if the current request fulfills the "requirement" portion of an attribute.
         *
         * @return bool|\Concrete\Core\Error\Error
         */
        public function validateAttributeForm()
        {
            return parent::validateAttributeForm();
        }
        public function createIndexedSearchTable()
        {
            return parent::createIndexedSearchTable();
        }
        public function setAttributeSet($as)
        {
            return parent::setAttributeSet($as);
        }
        public function clearAttributeSets()
        {
            return parent::clearAttributeSets();
        }
        public function getAttributeSets()
        {
            return parent::getAttributeSets();
        }
        /**
         * Saves an attribute using its stock form.
         */
        public function saveAttributeForm($obj)
        {
            return parent::saveAttributeForm($obj);
        }
        /**
         * Sets an attribute directly with a passed value.
         */
        public function setAttribute($obj, $value)
        {
            return parent::setAttribute($obj, $value);
        }
        /**
         * @deprecated
         */
        public function outputSearchHTML()
        {
            return parent::outputSearchHTML();
        }
        /**
         * @deprecated
         */
        public function getKeyName()
        {
            return parent::getKeyName();
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getKeyHandle()
        {
            return parent::getKeyHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getKeyID()
        {
            return parent::getKeyID();
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Attribute\Key\Key::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class FileImporter extends \Concrete\Core\File\Importer
    {
        /**
         * Returns a text string explaining the error that was passed.
         *
         * @param int $code
         *
         * @return string
         */
        public function getErrorMessage($code)
        {
            return parent::getErrorMessage($code);
        }
        public function addImportProcessor(Concrete\Core\File\ImportProcessor\ProcessorInterface $processor)
        {
            return parent::addImportProcessor($processor);
        }
        /**
         * @return string
         */
        public function generatePrefix()
        {
            return parent::generatePrefix();
        }
        /**
         * Imports a local file into the system. The file must be added to this path
         * somehow. That's what happens in tools/files/importers/.
         * If a $fr (FileRecord) object is passed, we assign the newly imported FileVersion
         * object to that File. If not, we make a new filerecord.
         *
         * @param string $pointer path to file
         * @param string|bool $filename
         * @param ConcreteFile|bool $fr
         *
         * @return number Error Code | \Concrete\Core\File\Version
         */
        public function import($pointer, $filename = false, $fr = false)
        {
            return parent::import($pointer, $filename, $fr);
        }
        /**
         * Imports a file in the default file storage location's incoming directory.
         *
         * @param string $filename
         * @param ConcreteFile|bool $fr
         *
         * @return number Error Code | \Concrete\Core\File\Version
         */
        public function importIncomingFile($filename, $fr = false)
        {
            return parent::importIncomingFile($filename, $fr);
        }
        public function setRescanThumbnailsOnImport($refresh)
        {
            return parent::setRescanThumbnailsOnImport($refresh);
        }
    }

    class FileList extends \Concrete\Core\File\FileList
    {
        protected function getAttributeKeyClassName()
        {
            return parent::getAttributeKeyClassName();
        }
        public function setPermissionsChecker(Closure $checker)
        {
            return parent::setPermissionsChecker($checker);
        }
        public function ignorePermissions()
        {
            return parent::ignorePermissions();
        }
        public function createQuery()
        {
            return parent::createQuery();
        }
        public function getTotalResults()
        {
            return parent::getTotalResults();
        }
        protected function createPaginationObject()
        {
            return parent::createPaginationObject();
        }
        /**
         * @param $queryRow
         * @return \Concrete\Core\File\File
         */
        public function getResult($queryRow)
        {
            return parent::getResult($queryRow);
        }
        public function checkPermissions($mixed)
        {
            return parent::checkPermissions($mixed);
        }
        public function filterByType($type)
        {
            return parent::filterByType($type);
        }
        public function filterByExtension($extension)
        {
            return parent::filterByExtension($extension);
        }
        /**
         * Filters by "keywords" (which searches everything including filenames,
         * title, users who uploaded the file, tags)
         */
        public function filterByKeywords($keywords)
        {
            return parent::filterByKeywords($keywords);
        }
        public function filterBySet($fs)
        {
            return parent::filterBySet($fs);
        }
        public function filterByNoSet()
        {
            return parent::filterByNoSet();
        }
        /**
         * Filters the file list by file size (in kilobytes)
         */
        public function filterBySize($from, $to)
        {
            return parent::filterBySize($from, $to);
        }
        /**
         * Filters by public date
         * @param string $date
         */
        public function filterByDateAdded($date, $comparison = "=")
        {
            return parent::filterByDateAdded($date, $comparison);
        }
        public function filterByOriginalPageID($ocID)
        {
            return parent::filterByOriginalPageID($ocID);
        }
        /**
         * filters a FileList by the uID of the approving User
         * @param int $uID
         * @return void
         */
        public function filterByApproverUserID($uID)
        {
            return parent::filterByApproverUserID($uID);
        }
        /**
         * filters a FileList by the uID of the owning User
         * @param int $uID
         * @return void
         * @since 5.4.1.1+
         */
        public function filterByAuthorUserID($uID)
        {
            return parent::filterByAuthorUserID($uID);
        }
        /**
         * Filters by "tags" only.
         */
        public function filterByTags($tags)
        {
            return parent::filterByTags($tags);
        }
        /**
         * Sorts by filename in ascending order.
         */
        public function sortByFilenameAscending()
        {
            return parent::sortByFilenameAscending();
        }
        /**
         * Sorts by file set display order in ascending order.
         */
        public function sortByFileSetDisplayOrder()
        {
            return parent::sortByFileSetDisplayOrder();
        }
        /**
         * Filters by a attribute.
         */
        public function filterByAttribute($handle, $value, $comparison = "=")
        {
            return parent::filterByAttribute($handle, $value, $comparison);
        }
        /**
         * @param StickyRequest $request
         */
        public function setupAutomaticSorting(Concrete\Core\Search\StickyRequest $request = null)
        {
            return parent::setupAutomaticSorting($request);
        }
        /**
         * @param \Doctrine\DBAL\Query\QueryBuilder $query
         * @return \Doctrine\DBAL\Query\QueryBuilder
         */
        public function finalizeQuery(Doctrine\DBAL\Query\QueryBuilder $query)
        {
            return parent::finalizeQuery($query);
        }
        public function getQueryObject()
        {
            return parent::getQueryObject();
        }
        public function deliverQueryObject()
        {
            return parent::deliverQueryObject();
        }
        public function executeGetResults()
        {
            return parent::executeGetResults();
        }
        public function debugStart()
        {
            return parent::debugStart();
        }
        public function debugStop()
        {
            return parent::debugStop();
        }
        protected function executeSortBy($column, $direction = "asc")
        {
            return parent::executeSortBy($column, $direction);
        }
        protected function executeSanitizedSortBy($column, $direction = "asc")
        {
            return parent::executeSanitizedSortBy($column, $direction);
        }
        /**
         * @deprecated
         */
        public function filter($field, $value, $comparison = "=")
        {
            return parent::filter($field, $value, $comparison);
        }
        public function debug()
        {
            return parent::debug();
        }
        public function isDebugged()
        {
            return parent::isDebugged();
        }
        public function sortBy($field, $direction = "asc")
        {
            return parent::sortBy($field, $direction);
        }
        public function sanitizedSortBy($field, $direction = "asc")
        {
            return parent::sanitizedSortBy($field, $direction);
        }
        /** Returns a full array of results. */
        public function getResults()
        {
            return parent::getResults();
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function isActiveSortColumn($field)
        {
            return parent::isActiveSortColumn($field);
        }
        public function disableAutomaticSorting()
        {
            return parent::disableAutomaticSorting();
        }
        public function getSortClassName($column)
        {
            return parent::getSortClassName($column);
        }
        public function getSortURL($column, $dir = "asc", $url = false)
        {
            return parent::getSortURL($column, $dir, $url);
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function getQuerySortColumnParameter()
        {
            return parent::getQuerySortColumnParameter();
        }
        public function getQueryPaginationPageParameter()
        {
            return parent::getQueryPaginationPageParameter();
        }
        public function getQuerySortDirectionParameter()
        {
            return parent::getQuerySortDirectionParameter();
        }
        public function setItemsPerPage($itemsPerPage)
        {
            return parent::setItemsPerPage($itemsPerPage);
        }
        /**
         * @return \Concrete\Core\Search\Pagination\Pagination|\Concrete\Core\Search\Pagination\PermissionablePagination
         */
        public function getPagination()
        {
            return parent::getPagination();
        }
        /**
         * @deprecated
         */
        public function get()
        {
            return parent::get();
        }
    }

    /**
     * @deprecated
     */
    class FilePermissions extends \Concrete\Core\Legacy\FilePermissions
    {
        public static function getGlobal()
        {
            return Concrete\Core\Legacy\FilePermissions::getGlobal();
        }
    }

    /**
     * Represents a file set.
     *
     * @method static Set add(string $setName, int $fsOverrideGlobalPermissions = 0, bool|\User $u = false, int $type = self::TYPE_PUBLIC) Deprecated method. Use Set::create instead.
     */
    class FileSet extends \Concrete\Core\File\Set\Set
    {
        /**
         * Returns an object mapping to the global file set, fsID = 0.
         * This is really only used for permissions mapping.
         */
        public static function getGlobal()
        {
            return Concrete\Core\File\Set\Set::getGlobal();
        }
        /**
         * @param bool|\User $u
         *
         * @return array
         */
        public static function getMySets($u = false)
        {
            return Concrete\Core\File\Set\Set::getMySets($u);
        }
        /**
         * Creats a new fileset if set doesn't exists.
         *
         * If we find a multiple groups with the same properties,
         * we return an array containing each group
         *
         * @param string $fs_name
         * @param int    $fs_type
         * @param int|bool    $fs_uid
         *
         * @return Mixed
         *
         * Dev Note: This will create duplicate sets with the same name if a set exists owned by another user!!!
         */
        public static function createAndGetSet($fs_name, $fs_type, $fs_uid = false)
        {
            return Concrete\Core\File\Set\Set::createAndGetSet($fs_name, $fs_type, $fs_uid);
        }
        /**
         * Get a file set object by a file set's id.
         *
         * @param int $fsID
         *
         * @return Set
         */
        public static function getByID($fsID)
        {
            return Concrete\Core\File\Set\Set::getByID($fsID);
        }
        /**
         * Adds a File set.
         *
         * @param string $setName
         * @param int $fsOverrideGlobalPermissions
         * @param bool|\User $u
         * @param int $type
         *
         * @return Set
         */
        public static function create($setName, $fsOverrideGlobalPermissions = 0, $u = false, $type = self::TYPE_PUBLIC)
        {
            return Concrete\Core\File\Set\Set::create($setName, $fsOverrideGlobalPermissions, $u, $type);
        }
        /**
         * Static method to return an array of File objects by the set id.
         *
         * @param  int $fsID
         *
         * @return array|void
         */
        public static function getFilesBySetID($fsID)
        {
            return Concrete\Core\File\Set\Set::getFilesBySetID($fsID);
        }
        /**
         * Static method to return an array of File objects by the set name.
         *
         * @param  string   $fsName
         * @param  int|bool $uID
         *
         * @return array|void
         */
        public static function getFilesBySetName($fsName, $uID = false)
        {
            return Concrete\Core\File\Set\Set::getFilesBySetName($fsName, $uID);
        }
        /**
         * Get a file set object by a file name.
         *
         * @param  string   $fsName
         * @param  int|bool $uID
         *
         * @return Set
         */
        public static function getByName($fsName, $uID = false)
        {
            return Concrete\Core\File\Set\Set::getByName($fsName, $uID);
        }
        /**
         * Returns an array of File objects from the current set.
         *
         * @return ConcreteFile[]
         */
        public function getFiles()
        {
            return parent::getFiles();
        }
        /**
         * @return int
         */
        public function getFileSetUserID()
        {
            return parent::getFileSetUserID();
        }
        /**
         * @return int
         */
        public function getFileSetType()
        {
            return parent::getFileSetType();
        }
        public function getSavedSearches()
        {
            return parent::getSavedSearches();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * @return int
         */
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        /**
         * @return int
         */
        public function getFileSetID()
        {
            return parent::getFileSetID();
        }
        /**
         * @param array $files Array of file IDs
         */
        public function updateFileSetDisplayOrder($files)
        {
            return parent::updateFileSetDisplayOrder($files);
        }
        /**
         * @return int
         */
        public function overrideGlobalPermissions()
        {
            return parent::overrideGlobalPermissions();
        }
        /**
         * @return string
         */
        public function getFileSetName()
        {
            return parent::getFileSetName();
        }
        /**
         * Returns the display name for this file set (localized and escaped accordingly to $format).
         *
         * @param string $format
         *
         * @return string
         */
        public function getFileSetDisplayName($format = "html")
        {
            return parent::getFileSetDisplayName($format);
        }
        /**
         * Updates a file set.
         *
         * @return Set
         */
        public function update($setName, $fsOverrideGlobalPermissions = 0)
        {
            return parent::update($setName, $fsOverrideGlobalPermissions);
        }
        /**
         * Adds the file to the set.
         *
         * @param int|\File $f_id //accepts an ID or a File object
         *
         * @return File|mixed
         */
        public function addFileToSet($f_id)
        {
            return parent::addFileToSet($f_id);
        }
        public function getSavedSearchRequest()
        {
            return parent::getSavedSearchRequest();
        }
        public function getSavedSearchColumns()
        {
            return parent::getSavedSearchColumns();
        }
        /**
         * @param int|\File $f_id
         */
        public function removeFileFromSet($f_id)
        {
            return parent::removeFileFromSet($f_id);
        }
        public function hasFileID($f_id)
        {
            return parent::hasFileID($f_id);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function acquireBaseFileSetPermissions()
        {
            return parent::acquireBaseFileSetPermissions();
        }
        public function resetPermissions()
        {
            return parent::resetPermissions();
        }
        public function assignPermissions($userOrGroup, $permissions = array(), $accessType = Concrete\Core\Permission\Key\FileSetKey::ACCESS_TYPE_INCLUDE)
        {
            return parent::assignPermissions($userOrGroup, $permissions, $accessType);
        }
        public function getJSONObject()
        {
            return parent::getJSONObject();
        }
    }

    /**
     * @Entity
     * @Table(name="FileVersions")
     */
    class FileVersion extends \Concrete\Core\File\Version
    {
        public static function add(Concrete\Core\File\File $file, $filename, $prefix, $data = array())
        {
            return Concrete\Core\File\Version::add($file, $filename, $prefix, $data);
        }
        public static function cleanTags($tagsStr)
        {
            return Concrete\Core\File\Version::cleanTags($tagsStr);
        }
        public function getPrefix()
        {
            return parent::getPrefix();
        }
        public function isApproved()
        {
            return parent::isApproved();
        }
        public function getTagsList()
        {
            return parent::getTagsList();
        }
        public function getTags()
        {
            return parent::getTags();
        }
        public function setAttribute($ak, $value)
        {
            return parent::setAttribute($ak, $value);
        }
        /**
         * returns the File object associated with this FileVersion object
         *
         * @return \File
         */
        public function getFile()
        {
            return parent::getFile();
        }
        public function setFile(Concrete\Core\File\File $file)
        {
            return parent::setFile($file);
        }
        public function clearAttribute($ak)
        {
            return parent::clearAttribute($ak);
        }
        public function getAttributeValueObject($ak, $createIfNotFound = false)
        {
            return parent::getAttributeValueObject($ak, $createIfNotFound);
        }
        public function getFileID()
        {
            return parent::getFileID();
        }
        public function getFileVersionID()
        {
            return parent::getFileVersionID();
        }
        /**
         * Removes a version of a file. Note, does NOT remove the file because we don't know where the file might elsewhere be used/referenced.
         */
        public function delete($deleteFilesAndThumbnails = false)
        {
            return parent::delete($deleteFilesAndThumbnails);
        }
        /**
         * Deletes the thumbnail for the particular thumbnail type.
         */
        public function deleteThumbnail($type)
        {
            return parent::deleteThumbnail($type);
        }
        /**
         * Returns an abstracted File object for the resource. NOT a concrete5 file object.
         *
         * @return \Concrete\Flysystem\File
         */
        public function getFileResource()
        {
            return parent::getFileResource();
        }
        public function getMimeType()
        {
            return parent::getMimeType();
        }
        public function getSize()
        {
            return parent::getSize();
        }
        public function getFullSize()
        {
            return parent::getFullSize();
        }
        public function getAuthorName()
        {
            return parent::getAuthorName();
        }
        public function getAuthorUserID()
        {
            return parent::getAuthorUserID();
        }
        /**
         * Gets the date a file version was added
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getDateAdded()
        {
            return parent::getDateAdded();
        }
        public function getExtension()
        {
            return parent::getExtension();
        }
        /**
         * Takes the current value of the file version and makes a new one with the same values
         */
        public function duplicate()
        {
            return parent::duplicate();
        }
        public function deny()
        {
            return parent::deny();
        }
        protected function save($flush = true)
        {
            return parent::save($flush);
        }
        public function getType()
        {
            return parent::getType();
        }
        public function getTypeObject()
        {
            return parent::getTypeObject();
        }
        /**
         * Returns an array containing human-readable descriptions of everything that happened in this version
         */
        public function getVersionLogComments()
        {
            return parent::getVersionLogComments();
        }
        public function updateTitle($title)
        {
            return parent::updateTitle($title);
        }
        public function logVersionUpdate($updateTypeID, $updateTypeAttributeID = 0)
        {
            return parent::logVersionUpdate($updateTypeID, $updateTypeAttributeID);
        }
        public function updateTags($tags)
        {
            return parent::updateTags($tags);
        }
        public function updateDescription($descr)
        {
            return parent::updateDescription($descr);
        }
        public function rename($filename)
        {
            return parent::rename($filename);
        }
        public function updateContents($contents)
        {
            return parent::updateContents($contents);
        }
        public function updateFile($filename, $prefix)
        {
            return parent::updateFile($filename, $prefix);
        }
        public function approve()
        {
            return parent::approve();
        }
        /**
         * Return the contents of a file
         */
        public function getFileContents()
        {
            return parent::getFileContents();
        }
        /**
         * Returns a url that can be used to download a file, will force the download of all file types, even if your browser can display them.
         */
        public function getForceDownloadURL()
        {
            return parent::getForceDownloadURL();
        }
        /**
         * Forces the download of a file.
         *
         * @return void
         */
        public function forceDownload()
        {
            return parent::forceDownload();
        }
        public function getFileName()
        {
            return parent::getFileName();
        }
        public function getRelativePath()
        {
            return parent::getRelativePath();
        }
        public function getThumbnails()
        {
            return parent::getThumbnails();
        }
        /**
         * Gets an attribute for the file. If "nice mode" is set, we display it nicely
         * for use in the file attributes table
         */
        public function getAttribute($ak, $mode = false)
        {
            return parent::getAttribute($ak, $mode);
        }
        public function rescanThumbnails()
        {
            return parent::rescanThumbnails();
        }
        /**
         * @deprecated
         * @param $level
         * @return mixed
         */
        public function hasThumbnail($level)
        {
            return parent::hasThumbnail($level);
        }
        public function getDetailThumbnailImage()
        {
            return parent::getDetailThumbnailImage();
        }
        public function getThumbnailURL($type)
        {
            return parent::getThumbnailURL($type);
        }
        /**
         * When given a thumbnail type versin object and a full path to a file on the server
         * the file is imported into the system as is as the thumbnail.
         * @param ThumbnailTypeVersion $version
         * @param $path
         */
        public function importThumbnail(Concrete\Core\File\Image\Thumbnail\Type\Version $version, $path)
        {
            return parent::importThumbnail($version, $path);
        }
        /**
         * Returns a full URL to the file on disk
         */
        public function getURL()
        {
            return parent::getURL();
        }
        /**
         * Returns a URL that can be used to download the file. This passes through the download_file single page.
         */
        public function getDownloadURL()
        {
            return parent::getDownloadURL();
        }
        /**
         * Responsible for taking a particular version of a file and rescanning all its attributes
         * This will run any type-based import routines, and store those attributes, generate thumbnails,
         * etc...
         */
        public function refreshAttributes($rescanThumbnails = true)
        {
            return parent::refreshAttributes($rescanThumbnails);
        }
        public function getTitle()
        {
            return parent::getTitle();
        }
        /**
         * Return a representation of the current FileVersion object as something easily serializable.
         */
        public function getJSONObject()
        {
            return parent::getJSONObject();
        }
        /**
         * Checks current viewers for this type and returns true if there is a viewer for this type, false if not
         */
        public function canView()
        {
            return parent::canView();
        }
        public function canEdit()
        {
            return parent::canEdit();
        }
        public function getGenericTypeText()
        {
            return parent::getGenericTypeText();
        }
        public function getDescription()
        {
            return parent::getDescription();
        }
        public function getListingThumbnailImage()
        {
            return parent::getListingThumbnailImage();
        }
    }

    class GlobalArea extends \Concrete\Core\Area\GlobalArea
    {
        /**
         * @return bool
         */
        public function isGlobalArea()
        {
            return parent::isGlobalArea();
        }
        /**
         * If called on a multilingual website, this global area will not load its content from the language-specific global area stack. Instead, it'll use
         * the stack in the default language, throughout the website.
         */
        public function ignoreCurrentLanguageSection()
        {
            return parent::ignoreCurrentLanguageSection();
        }
        /**
         * @param Page $c
         * @param string $arHandle
         * @return Area
         */
        public function create($c, $arHandle)
        {
            return parent::create($c, $arHandle);
        }
        /**
         * @return string
         */
        public function getAreaDisplayName()
        {
            return parent::getAreaDisplayName();
        }
        /**
         * @param Page $c
         *
         * @return int
         */
        public function getTotalBlocksInArea($c = false)
        {
            return parent::getTotalBlocksInArea($c);
        }
        /**
         * @param Page $c
         *
         * @return Page
         */
        protected function getGlobalAreaStackObject($c = false)
        {
            return parent::getGlobalAreaStackObject($c);
        }
        /**
         * @return int
         */
        public function getTotalBlocksInAreaEditMode()
        {
            return parent::getTotalBlocksInAreaEditMode();
        }
        /**
         * @return \Block[]
         */
        public function getAreaBlocks()
        {
            return parent::getAreaBlocks();
        }
        public function display($c = false, $fake = null)
        {
            return parent::display($c, $fake);
        }
        /**
         * Note that this function does not delete the global area's stack.
         * You probably want to call the "delete" method of the Stack model instead.
         * @param string $arHandle
         */
        public static function deleteByName($arHandle)
        {
            return Concrete\Core\Area\GlobalArea::deleteByName($arHandle);
        }
        /**
         * @param string $arDisplayName
         */
        public function setAreaDisplayName($arDisplayName)
        {
            return parent::setAreaDisplayName($arDisplayName);
        }
        /**
         * Returns whether or not controls are to be displayed.
         *
         * @return bool
         */
        public function showControls()
        {
            return parent::showControls();
        }
        /**
         * Force enables controls to show.
         */
        public function forceControlsToDisplay()
        {
            return parent::forceControlsToDisplay();
        }
        /**
         * @param int $cspan
         */
        public function setAreaGridMaximumColumns($cspan)
        {
            return parent::setAreaGridMaximumColumns($cspan);
        }
        /**
         * @return int|null
         *
         * @throws \Exception
         */
        public function getAreaGridMaximumColumns()
        {
            return parent::getAreaGridMaximumColumns();
        }
        /**
         * Enable Grid containers.
         */
        final public function enableGridContainer()
        {
            return parent::enableGridContainer();
        }
        /**
         * @return bool
         */
        public function isGridContainerEnabled()
        {
            return parent::isGridContainerEnabled();
        }
        /**
         * @return string
         */
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        /**
         * @return string
         */
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        /**
         * @return string
         */
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        /**
         * @return string
         */
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * returns the Collection's cID.
         *
         * @return int
         */
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        /**
         * returns the Collection object for the current Area.
         *
         * @return Page
         */
        public function getAreaCollectionObject()
        {
            return parent::getAreaCollectionObject();
        }
        /**
         * returns the arID of the current area.
         *
         * @return int
         */
        public function getAreaID()
        {
            return parent::getAreaID();
        }
        /**
         * returns the handle for the current area.
         *
         * @return string
         */
        public function getAreaHandle()
        {
            return parent::getAreaHandle();
        }
        /**
         * check if the area has permissions that override the page's permissions.
         *
         * @return bool
         */
        public function overrideCollectionPermissions()
        {
            return parent::overrideCollectionPermissions();
        }
        /**
         * @return int
         */
        public function getAreaCollectionInheritID()
        {
            return parent::getAreaCollectionInheritID();
        }
        /**
         * Sets the total number of blocks an area allows. Does not limit by type.
         *
         * @param int $num
         */
        public function setBlockLimit($num)
        {
            return parent::setBlockLimit($num);
        }
        /**
         * disables controls for the current area.
         */
        public function disableControls()
        {
            return parent::disableControls();
        }
        /**
         * gets the maximum allowed number of blocks, -1 if unlimited.
         *
         * @return int
         */
        public function getMaximumBlocks()
        {
            return parent::getMaximumBlocks();
        }
        /**
         * @param string $task
         * @param null $alternateHandler
         *
         * @return string
         */
        public function getAreaUpdateAction($task = "update", $alternateHandler = null)
        {
            return parent::getAreaUpdateAction($task, $alternateHandler);
        }
        /**
         * @param Page $c
         */
        public function refreshCache($c)
        {
            return parent::refreshCache($c);
        }
        /**
         * Gets the Area object for the given page and area handle.
         *
         * @param Page $c
         * @param string $arHandle
         *
         * @return Area
         */
        final public static function get($c, $arHandle)
        {
            return Concrete\Core\Area\Area::get($c, $arHandle);
        }
        /**
         * @param $arID
         *
         * @return string
         */
        public static function getAreaHandleFromID($arID)
        {
            return Concrete\Core\Area\Area::getAreaHandleFromID($arID);
        }
        /**
         * Get all of the blocks within the current area for a given page.
         *
         * @param Page|bool $c
         *
         * @return Block[]
         */
        public function getAreaBlocksArray($c = false)
        {
            return parent::getAreaBlocksArray($c);
        }
        /**
         * Gets a list of all areas.
         *
         * @return array
         */
        public static function getHandleList()
        {
            return Concrete\Core\Area\Area::getHandleList();
        }
        /**
         * @param Page $c
         *
         * @return Area[]
         */
        public static function getListOnPage(Concrete\Core\Page\Page $c)
        {
            return Concrete\Core\Area\Area::getListOnPage($c);
        }
        /**
         * This function removes all permissions records for the current Area
         * and sets it to inherit from the Page permissions.
         */
        public function revertToPagePermissions()
        {
            return parent::revertToPagePermissions();
        }
        /**
         * Rescans the current Area's permissions ensuring that it's inheriting permissions properly up the chain.
         *
         * @return bool
         */
        public function rescanAreaPermissionsChain()
        {
            return parent::rescanAreaPermissionsChain();
        }
        /**
         * works a lot like rescanAreaPermissionsChain() but it works down. This is typically only
         * called when we update an area to have specific permissions, and all areas that are on pagesbelow it with the same
         * handle, etc... should now inherit from it.
         *
         * @param int $cIDToCheck
         */
        public function rescanSubAreaPermissions($cIDToCheck = null)
        {
            return parent::rescanSubAreaPermissions($cIDToCheck);
        }
        /**
         * similar to rescanSubAreaPermissions, but for those who have setup their pages to inherit master collection permissions.
         *
         * @see Area::rescanSubAreaPermissions()
         *
         * @param Page $masterCollection
         *
         * @return bool
         */
        public function rescanSubAreaPermissionsMasterCollection($masterCollection)
        {
            return parent::rescanSubAreaPermissionsMasterCollection($masterCollection);
        }
        /**
         * @param Page $c
         * @param string $arHandle
         *
         * @return Area
         */
        public static function getOrCreate($c, $arHandle)
        {
            return Concrete\Core\Area\Area::getOrCreate($c, $arHandle);
        }
        /**
         * @param Page $c
         */
        public function load($c)
        {
            return parent::load($c);
        }
        /**
         * Exports the area to content format.
         *
         * @param \SimpleXMLElement $p
         * @param Page $page
         */
        public function export($p, $page)
        {
            return parent::export($p, $page);
        }
        /**
         * Specify HTML to automatically print before blocks contained within the area.
         *
         * @param string $html
         */
        public function setBlockWrapperStart($html)
        {
            return parent::setBlockWrapperStart($html);
        }
        /**
         * Set HTML that automatically prints after any blocks contained within the area.
         *
         * @param string $html
         */
        public function setBlockWrapperEnd($html)
        {
            return parent::setBlockWrapperEnd($html);
        }
        public function overridePagePermissions()
        {
            return parent::overridePagePermissions();
        }
        /**
         * Sets a custom block template for blocks of a type specified by the btHandle
         * Note, these can be stacked. For example
         * $a->setCustomTemplate('image', 'banner');
         * $a->setCustomTemplate('content', 'masthead_content');.
         *
         * @param string $btHandle handle for the block type
         * @param string $view string identifying the block template ex: 'templates/breadcrumb.php'
         */
        public function setCustomTemplate($btHandle, $view)
        {
            return parent::setCustomTemplate($btHandle, $view);
        }
        /**
         * returns an array of custom templates defined for this Area object.
         *
         * @return array
         */
        public function getAreaCustomTemplates()
        {
            return parent::getAreaCustomTemplates();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Group extends \Concrete\Core\User\Group\Group
    {
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * Takes the numeric id of a group and returns a group object.
         *
         * @param string $gID
         *
         * @return Group
         */
        public static function getByID($gID)
        {
            return Concrete\Core\User\Group\Group::getByID($gID);
        }
        /**
         * Takes the name of a group and returns a group object.
         *
         * @param string $gName
         *
         * @return Group
         */
        public static function getByName($gName)
        {
            return Concrete\Core\User\Group\Group::getByName($gName);
        }
        /**
         * @param string $gPath The group path
         *
         * @return Group
         */
        public static function getByPath($gPath)
        {
            return Concrete\Core\User\Group\Group::getByPath($gPath);
        }
        public function getGroupMembers()
        {
            return parent::getGroupMembers();
        }
        public function getGroupMemberIDs()
        {
            return parent::getGroupMemberIDs();
        }
        public function setPermissionsForObject($obj)
        {
            return parent::setPermissionsForObject($obj);
        }
        public function getGroupMembersNum()
        {
            return parent::getGroupMembersNum();
        }
        /**
         * Deletes a group.
         */
        public function delete()
        {
            return parent::delete();
        }
        public function rescanGroupPath()
        {
            return parent::rescanGroupPath();
        }
        public function rescanGroupPathRecursive()
        {
            return parent::rescanGroupPathRecursive();
        }
        public function inGroup()
        {
            return parent::inGroup();
        }
        public function getGroupDateTimeEntered($user)
        {
            return parent::getGroupDateTimeEntered($user);
        }
        public function getGroupID()
        {
            return parent::getGroupID();
        }
        public function getGroupName()
        {
            return parent::getGroupName();
        }
        public function getGroupPath()
        {
            return parent::getGroupPath();
        }
        public function getParentGroups()
        {
            return parent::getParentGroups();
        }
        public function getChildGroups()
        {
            return parent::getChildGroups();
        }
        public function getParentGroup()
        {
            return parent::getParentGroup();
        }
        public function getGroupDisplayName($includeHTML = true, $includePath = true)
        {
            return parent::getGroupDisplayName($includeHTML, $includePath);
        }
        public function getGroupDescription()
        {
            return parent::getGroupDescription();
        }
        /**
         * Gets the group start date.
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getGroupStartDate()
        {
            return parent::getGroupStartDate();
        }
        /**
         * Gets the group end date.
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getGroupEndDate()
        {
            return parent::getGroupEndDate();
        }
        public function isGroupBadge()
        {
            return parent::isGroupBadge();
        }
        public function getGroupBadgeDescription()
        {
            return parent::getGroupBadgeDescription();
        }
        public function getGroupBadgeCommunityPointValue()
        {
            return parent::getGroupBadgeCommunityPointValue();
        }
        public function getGroupBadgeImageID()
        {
            return parent::getGroupBadgeImageID();
        }
        public function isGroupAutomated()
        {
            return parent::isGroupAutomated();
        }
        public function checkGroupAutomationOnRegister()
        {
            return parent::checkGroupAutomationOnRegister();
        }
        public function checkGroupAutomationOnLogin()
        {
            return parent::checkGroupAutomationOnLogin();
        }
        public function checkGroupAutomationOnJobRun()
        {
            return parent::checkGroupAutomationOnJobRun();
        }
        public function getGroupAutomationController()
        {
            return parent::getGroupAutomationController();
        }
        public function getGroupAutomationControllerClass()
        {
            return parent::getGroupAutomationControllerClass();
        }
        public function getGroupBadgeImageObject()
        {
            return parent::getGroupBadgeImageObject();
        }
        public function isGroupExpirationEnabled()
        {
            return parent::isGroupExpirationEnabled();
        }
        public function getGroupExpirationMethod()
        {
            return parent::getGroupExpirationMethod();
        }
        public function getGroupExpirationDateTime()
        {
            return parent::getGroupExpirationDateTime();
        }
        public function getGroupExpirationAction()
        {
            return parent::getGroupExpirationAction();
        }
        public function getGroupExpirationInterval()
        {
            return parent::getGroupExpirationInterval();
        }
        public function getGroupExpirationIntervalDays()
        {
            return parent::getGroupExpirationIntervalDays();
        }
        public function getGroupExpirationIntervalHours()
        {
            return parent::getGroupExpirationIntervalHours();
        }
        public function getGroupExpirationIntervalMinutes()
        {
            return parent::getGroupExpirationIntervalMinutes();
        }
        public function isUserExpired(Concrete\Core\User\User $u)
        {
            return parent::isUserExpired($u);
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function update($gName, $gDescription)
        {
            return parent::update($gName, $gDescription);
        }
        /** Creates a new user group.
         * @param string $gName
         * @param string $gDescription
         *
         * @return Group
         */
        public static function add($gName, $gDescription, $parentGroup = false, $pkg = null, $gID = null)
        {
            return Concrete\Core\User\Group\Group::add($gName, $gDescription, $parentGroup, $pkg, $gID);
        }
        public static function getBadges()
        {
            return Concrete\Core\User\Group\Group::getBadges();
        }
        protected function getAutomationControllers($column, $excludeUser = false)
        {
            return parent::getAutomationControllers($column, $excludeUser);
        }
        public static function getAutomatedOnRegisterGroupControllers($u = false)
        {
            return Concrete\Core\User\Group\Group::getAutomatedOnRegisterGroupControllers($u);
        }
        public static function getAutomatedOnLoginGroupControllers($u = false)
        {
            return Concrete\Core\User\Group\Group::getAutomatedOnLoginGroupControllers($u);
        }
        public static function getAutomatedOnJobRunGroupControllers()
        {
            return Concrete\Core\User\Group\Group::getAutomatedOnJobRunGroupControllers();
        }
        public function clearBadgeOptions()
        {
            return parent::clearBadgeOptions();
        }
        public function clearAutomationOptions()
        {
            return parent::clearAutomationOptions();
        }
        public function removeGroupExpiration()
        {
            return parent::removeGroupExpiration();
        }
        public function setBadgeOptions($gBadgeFID, $gBadgeDescription, $gBadgeCommunityPointValue)
        {
            return parent::setBadgeOptions($gBadgeFID, $gBadgeDescription, $gBadgeCommunityPointValue);
        }
        public function setAutomationOptions($gCheckAutomationOnRegister, $gCheckAutomationOnLogin, $gCheckAutomationOnJobRun)
        {
            return parent::setAutomationOptions($gCheckAutomationOnRegister, $gCheckAutomationOnLogin, $gCheckAutomationOnJobRun);
        }
        public function setGroupExpirationByDateTime($datetime, $action)
        {
            return parent::setGroupExpirationByDateTime($datetime, $action);
        }
        public function setGroupExpirationByInterval($days, $hours, $minutes, $action)
        {
            return parent::setGroupExpirationByInterval($days, $hours, $minutes, $action);
        }
        public static function exportTranslations()
        {
            return Concrete\Core\User\Group\Group::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class GroupList extends \Concrete\Core\User\Group\GroupList
    {
        public function includeAllGroups()
        {
            return parent::includeAllGroups();
        }
        /**
         * Filters keyword fields by keywords (including name and description).
         * @param $keywords
         */
        public function filterByKeywords($keywords)
        {
            return parent::filterByKeywords($keywords);
        }
        public function filterByExpirable()
        {
            return parent::filterByExpirable();
        }
        /**
         * Only return groups the user has the ability to assign.
         */
        public function filterByAssignable()
        {
            return parent::filterByAssignable();
        }
        public function filterByUserID($uID)
        {
            return parent::filterByUserID($uID);
        }
        public function createQuery()
        {
            return parent::createQuery();
        }
        public function finalizeQuery(Doctrine\DBAL\Query\QueryBuilder $query)
        {
            return parent::finalizeQuery($query);
        }
        /**
         * The total results of the query
         * @return int
         */
        public function getTotalResults()
        {
            return parent::getTotalResults();
        }
        /**
         * Gets the pagination object for the query.
         * @return Pagination
         */
        protected function createPaginationObject()
        {
            return parent::createPaginationObject();
        }
        /**
         * @param $queryRow
         * @return \Concrete\Core\User\Group\Group
         */
        public function getResult($queryRow)
        {
            return parent::getResult($queryRow);
        }
        public function getQueryObject()
        {
            return parent::getQueryObject();
        }
        public function deliverQueryObject()
        {
            return parent::deliverQueryObject();
        }
        public function executeGetResults()
        {
            return parent::executeGetResults();
        }
        public function debugStart()
        {
            return parent::debugStart();
        }
        public function debugStop()
        {
            return parent::debugStop();
        }
        protected function executeSortBy($column, $direction = "asc")
        {
            return parent::executeSortBy($column, $direction);
        }
        protected function executeSanitizedSortBy($column, $direction = "asc")
        {
            return parent::executeSanitizedSortBy($column, $direction);
        }
        /**
         * @deprecated
         */
        public function filter($field, $value, $comparison = "=")
        {
            return parent::filter($field, $value, $comparison);
        }
        public function debug()
        {
            return parent::debug();
        }
        public function isDebugged()
        {
            return parent::isDebugged();
        }
        public function sortBy($field, $direction = "asc")
        {
            return parent::sortBy($field, $direction);
        }
        public function sanitizedSortBy($field, $direction = "asc")
        {
            return parent::sanitizedSortBy($field, $direction);
        }
        /** Returns a full array of results. */
        public function getResults()
        {
            return parent::getResults();
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function isActiveSortColumn($field)
        {
            return parent::isActiveSortColumn($field);
        }
        public function disableAutomaticSorting()
        {
            return parent::disableAutomaticSorting();
        }
        public function getSortClassName($column)
        {
            return parent::getSortClassName($column);
        }
        public function getSortURL($column, $dir = "asc", $url = false)
        {
            return parent::getSortURL($column, $dir, $url);
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function getQuerySortColumnParameter()
        {
            return parent::getQuerySortColumnParameter();
        }
        public function getQueryPaginationPageParameter()
        {
            return parent::getQueryPaginationPageParameter();
        }
        public function getQuerySortDirectionParameter()
        {
            return parent::getQuerySortDirectionParameter();
        }
        public function setItemsPerPage($itemsPerPage)
        {
            return parent::setItemsPerPage($itemsPerPage);
        }
        /**
         * @return \Concrete\Core\Search\Pagination\Pagination|\Concrete\Core\Search\Pagination\PermissionablePagination
         */
        public function getPagination()
        {
            return parent::getPagination();
        }
        /**
         *
         * @param StickyRequest $request
         */
        public function setupAutomaticSorting(Concrete\Core\Search\StickyRequest $request = null)
        {
            return parent::setupAutomaticSorting($request);
        }
        /**
         * @deprecated
         */
        public function get()
        {
            return parent::get();
        }
    }

    class GroupSet extends \Concrete\Core\User\Group\GroupSet
    {
        public static function getList()
        {
            return Concrete\Core\User\Group\GroupSet::getList();
        }
        public static function getByID($gsID)
        {
            return Concrete\Core\User\Group\GroupSet::getByID($gsID);
        }
        public static function getByName($gsName)
        {
            return Concrete\Core\User\Group\GroupSet::getByName($gsName);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\User\Group\GroupSet::getListByPackage($pkg);
        }
        public function getGroupSetID()
        {
            return parent::getGroupSetID();
        }
        public function getGroupSetName()
        {
            return parent::getGroupSetName();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /** Returns the display name for this group set (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *	Escape the result in html format (if $format is 'html').
         *	If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getGroupSetDisplayName($format = "html")
        {
            return parent::getGroupSetDisplayName($format);
        }
        public function updateGroupSetName($gsName)
        {
            return parent::updateGroupSetName($gsName);
        }
        public function addGroup(Concrete\Core\User\Group\Group $g)
        {
            return parent::addGroup($g);
        }
        public static function add($gsName, $pkg = false)
        {
            return Concrete\Core\User\Group\GroupSet::add($gsName, $pkg);
        }
        public function clearGroups()
        {
            return parent::clearGroups();
        }
        public function getGroups()
        {
            return parent::getGroups();
        }
        public function contains(Concrete\Core\User\Group\Group $g)
        {
            return parent::contains($g);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function removeGroup(Concrete\Core\User\Group\Group $g)
        {
            return parent::removeGroup($g);
        }
        public static function exportTranslations()
        {
            return Concrete\Core\User\Group\GroupSet::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class GroupSetList extends \Concrete\Core\User\Group\GroupSetList
    {
        public function get($itemsToGet = 0, $offset = 0)
        {
            return parent::get($itemsToGet, $offset);
        }
        public function getTotal()
        {
            return parent::getTotal();
        }
        public function debug($dbg = true)
        {
            return parent::debug($dbg);
        }
        protected function setQuery($query)
        {
            return parent::setQuery($query);
        }
        protected function getQuery()
        {
            return parent::getQuery();
        }
        public function addToQuery($query)
        {
            return parent::addToQuery($query);
        }
        protected function setupAutoSort()
        {
            return parent::setupAutoSort();
        }
        protected function executeBase()
        {
            return parent::executeBase();
        }
        protected function setupSortByString()
        {
            return parent::setupSortByString();
        }
        protected function setupAttributeSort()
        {
            return parent::setupAttributeSort();
        }
        /**
         * Adds a filter to this item list.
         */
        public function filter($column, $value, $comparison = "=")
        {
            return parent::filter($column, $value, $comparison);
        }
        public function getSearchResultsClass($field)
        {
            return parent::getSearchResultsClass($field);
        }
        public function sortBy($key, $dir = "asc")
        {
            return parent::sortBy($key, $dir);
        }
        public function groupBy($key)
        {
            return parent::groupBy($key);
        }
        public function having($column, $value, $comparison = "=")
        {
            return parent::having($column, $value, $comparison);
        }
        public function getSortByURL($column, $dir = "asc", $baseURL = false, $additionalVars = array())
        {
            return parent::getSortByURL($column, $dir, $baseURL, $additionalVars);
        }
        protected function setupAttributeFilters($join)
        {
            return parent::setupAttributeFilters($join);
        }
        public function filterByAttribute($column, $value, $comparison = "=")
        {
            return parent::filterByAttribute($column, $value, $comparison);
        }
        public function enableStickySearchRequest($namespace = false)
        {
            return parent::enableStickySearchRequest($namespace);
        }
        public function getQueryStringSortVariable()
        {
            return parent::getQueryStringSortVariable();
        }
        public function getQueryStringSortDirectionVariable()
        {
            return parent::getQueryStringSortDirectionVariable();
        }
        protected function getStickySearchNameSpace($namespace = "")
        {
            return parent::getStickySearchNameSpace($namespace);
        }
        public function resetSearchRequest($namespace = "")
        {
            return parent::resetSearchRequest($namespace);
        }
        public function addToSearchRequest($key, $value)
        {
            return parent::addToSearchRequest($key, $value);
        }
        public function getSearchRequest()
        {
            return parent::getSearchRequest();
        }
        public function setItemsPerPage($num)
        {
            return parent::setItemsPerPage($num);
        }
        public function getItemsPerPage()
        {
            return parent::getItemsPerPage();
        }
        public function setItems($items)
        {
            return parent::setItems($items);
        }
        protected function loadQueryStringPagingVariable()
        {
            return parent::loadQueryStringPagingVariable();
        }
        public function setNameSpace($ns)
        {
            return parent::setNameSpace($ns);
        }
        /**
         * Returns an array of object by "page"
         */
        public function getPage($page = false)
        {
            return parent::getPage($page);
        }
        protected function setCurrentPage($page = false)
        {
            return parent::setCurrentPage($page);
        }
        /**
         * Displays summary text about a list
         */
        public function displaySummary($right_content = "")
        {
            return parent::displaySummary($right_content);
        }
        public function isActiveSortColumn($column)
        {
            return parent::isActiveSortColumn($column);
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function requiresPaging()
        {
            return parent::requiresPaging();
        }
        public function getPagination($url = false, $additionalVars = array())
        {
            return parent::getPagination($url, $additionalVars);
        }
        /**
         * Gets paging that works in our new format */
        public function displayPagingV2($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPagingV2($script, $return, $additionalVars);
        }
        /**
         * Gets standard HTML to display paging */
        public function displayPaging($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPaging($script, $return, $additionalVars);
        }
        /**
         * Returns an object with properties useful for paging
         */
        public function getSummary()
        {
            return parent::getSummary();
        }
        public function getSortBy()
        {
            return parent::getSortBy();
        }
        public function getSortByDirection()
        {
            return parent::getSortByDirection();
        }
        /**
         * Sets up a multiple columns to search by. Each argument is taken "as-is" (including asc or desc) and concatenated with commas
         * Note that this is overrides any previous sortByMultiple() call, and all sortBy() calls. Alternatively, you can pass a single
         * array with multiple columns to sort by as its values.
         * e.g. $list->sortByMultiple('columna desc', 'columnb asc');
         * or $list->sortByMultiple(array('columna desc', 'columnb asc'));
         */
        public function sortByMultiple()
        {
            return parent::sortByMultiple();
        }
    }

    class GroupTree extends \Concrete\Core\Tree\Type\Group
    {
        /** Returns the standard name for this tree
         * @return string
         */
        public function getTreeName()
        {
            return parent::getTreeName();
        }
        /** Returns the display name for this tree (localized and escaped accordingly to $format)
         * @param  string $format = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getTreeDisplayName($format = "html")
        {
            return parent::getTreeDisplayName($format);
        }
        public static function get()
        {
            return Concrete\Core\Tree\Type\Group::get();
        }
        public function exportDetails(SimpleXMLElement $sx)
        {
            return parent::exportDetails($sx);
        }
        protected function deleteDetails()
        {
            return parent::deleteDetails();
        }
        public static function add()
        {
            return Concrete\Core\Tree\Type\Group::add();
        }
        protected function loadDetails()
        {
            return parent::loadDetails();
        }
        public static function ensureGroupNodes()
        {
            return Concrete\Core\Tree\Type\Group::ensureGroupNodes();
        }
        /**
         * @param \SimpleXMLElement $sx
         *
         * @return static|null
         * @abstract
         */
        public static function importDetails(SimpleXMLElement $sx)
        {
            return Concrete\Core\Tree\Tree::importDetails($sx);
        }
        public function setSelectedTreeNodeIDs($nodeIDs)
        {
            return parent::setSelectedTreeNodeIDs($nodeIDs);
        }
        public function getSelectedTreeNodeIDs()
        {
            return parent::getSelectedTreeNodeIDs();
        }
        public function getTreeTypeID()
        {
            return parent::getTreeTypeID();
        }
        public function getTreeTypeObject()
        {
            return parent::getTreeTypeObject();
        }
        public function getTreeTypeHandle()
        {
            return parent::getTreeTypeHandle();
        }
        public function export(SimpleXMLElement $sx)
        {
            return parent::export($sx);
        }
        public static function exportList(SimpleXMLElement $sx)
        {
            return Concrete\Core\Tree\Tree::exportList($sx);
        }
        public static function import(SimpleXMLElement $sx)
        {
            return Concrete\Core\Tree\Tree::import($sx);
        }
        public function getTreeID()
        {
            return parent::getTreeID();
        }
        public function getRootTreeNodeObject()
        {
            return parent::getRootTreeNodeObject();
        }
        public function getRootTreeNodeID()
        {
            return parent::getRootTreeNodeID();
        }
        /**
         * Iterates through the segments in the path, to return the node at the proper display. Mostly used for export
         * and import.
         *
         * @param $path
         */
        public function getNodeByDisplayPath($path)
        {
            return parent::getNodeByDisplayPath($path);
        }
        public function getRequestData()
        {
            return parent::getRequestData();
        }
        public function setRequest($data)
        {
            return parent::setRequest($data);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function duplicate()
        {
            return parent::duplicate();
        }
        public function getJSON()
        {
            return parent::getJSON();
        }
        protected static function create(Concrete\Core\Tree\Node\Node $rootNode)
        {
            return Concrete\Core\Tree\Tree::create($rootNode);
        }
        final public static function getByID($treeID)
        {
            return Concrete\Core\Tree\Tree::getByID($treeID);
        }
        /**
         * Export all the translations associates to every trees.
         *
         * @return Translations
         */
        public static function exportTranslations()
        {
            return Concrete\Core\Tree\Tree::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class GroupTreeNode extends \Concrete\Core\Tree\Node\Type\Group
    {
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getTreeNodeGroupID()
        {
            return parent::getTreeNodeGroupID();
        }
        public function getTreeNodeGroupObject()
        {
            return parent::getTreeNodeGroupObject();
        }
        public function getTreeNodeName()
        {
            return parent::getTreeNodeName();
        }
        public function getTreeNodeDisplayName($format = "html")
        {
            return parent::getTreeNodeDisplayName($format);
        }
        public function loadDetails()
        {
            return parent::loadDetails();
        }
        public function move(Concrete\Core\Tree\Node\Node $newParent)
        {
            return parent::move($newParent);
        }
        public static function getTreeNodeByGroupID($gID)
        {
            return Concrete\Core\Tree\Node\Type\Group::getTreeNodeByGroupID($gID);
        }
        public function deleteDetails()
        {
            return parent::deleteDetails();
        }
        public function getTreeNodeJSON()
        {
            return parent::getTreeNodeJSON();
        }
        public function setTreeNodeGroup(Concrete\Core\User\Group\Group $g)
        {
            return parent::setTreeNodeGroup($g);
        }
        public static function add($group = false, $parent = false)
        {
            return Concrete\Core\Tree\Node\Type\Group::add($group, $parent);
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function getTreeNodeID()
        {
            return parent::getTreeNodeID();
        }
        public function getTreeNodeParentID()
        {
            return parent::getTreeNodeParentID();
        }
        public function getTreeNodeParentObject()
        {
            return parent::getTreeNodeParentObject();
        }
        public function setTree(Concrete\Core\Tree\Tree $tree)
        {
            return parent::setTree($tree);
        }
        public function getTreeObject()
        {
            return parent::getTreeObject();
        }
        public function getTreeID()
        {
            return parent::getTreeID();
        }
        public function getTreeNodeTypeID()
        {
            return parent::getTreeNodeTypeID();
        }
        public function getTreeNodeTypeObject()
        {
            return parent::getTreeNodeTypeObject();
        }
        public function getTreeNodeTypeHandle()
        {
            return parent::getTreeNodeTypeHandle();
        }
        public function getChildNodes()
        {
            return parent::getChildNodes();
        }
        public function overrideParentTreeNodePermissions()
        {
            return parent::overrideParentTreeNodePermissions();
        }
        public function getTreeNodePermissionsNodeID()
        {
            return parent::getTreeNodePermissionsNodeID();
        }
        public function getTreeNodeChildCount()
        {
            return parent::getTreeNodeChildCount();
        }
        /**
         * Transforms a node to another node.
         */
        public function transformNode($treeNodeType)
        {
            return parent::transformNode($treeNodeType);
        }
        /**
         * Returns an array of all parents of this tree node.
         */
        public function getTreeNodeParentArray()
        {
            return parent::getTreeNodeParentArray();
        }
        public function selectChildrenNodesByID($nodeID)
        {
            return parent::selectChildrenNodesByID($nodeID);
        }
        public function export(SimpleXMLElement $x)
        {
            return parent::export($x);
        }
        public function duplicate($parent = false)
        {
            return parent::duplicate($parent);
        }
        public function getTreeNodeDisplayPath()
        {
            return parent::getTreeNodeDisplayPath();
        }
        protected function duplicateChildren(Concrete\Core\Tree\Node\Node $node)
        {
            return parent::duplicateChildren($node);
        }
        public function setTreeNodePermissionsToGlobal()
        {
            return parent::setTreeNodePermissionsToGlobal();
        }
        public function setTreeNodePermissionsToOverride()
        {
            return parent::setTreeNodePermissionsToOverride();
        }
        public function getAllChildNodeIDs()
        {
            return parent::getAllChildNodeIDs();
        }
        public function setTreeNodeTreeID($treeID)
        {
            return parent::setTreeNodeTreeID($treeID);
        }
        protected function rescanChildrenDisplayOrder()
        {
            return parent::rescanChildrenDisplayOrder();
        }
        public function saveChildOrder($orderedIDs)
        {
            return parent::saveChildOrder($orderedIDs);
        }
        public static function importNode(SimpleXMLElement $sx, $parent = false)
        {
            return Concrete\Core\Tree\Node\Node::importNode($sx, $parent);
        }
        public function importChildren(SimpleXMLElement $sx)
        {
            return parent::importChildren($sx);
        }
        public function populateChildren()
        {
            return parent::populateChildren();
        }
        public function populateDirectChildrenOnly()
        {
            return parent::populateDirectChildrenOnly();
        }
        public function delete()
        {
            return parent::delete();
        }
        public static function getByID($treeNodeID)
        {
            return Concrete\Core\Tree\Node\Node::getByID($treeNodeID);
        }
        /**
         * @param Translations $translations
         *
         * @internal
         */
        public function exportTranslations(Gettext\Translations $translations)
        {
            return parent::exportTranslations($translations);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Job extends \Concrete\Core\Job\Job
    {
        public function getJobHandle()
        {
            return parent::getJobHandle();
        }
        public function getJobID()
        {
            return parent::getJobID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function getJobLastStatusCode()
        {
            return parent::getJobLastStatusCode();
        }
        public function didFail()
        {
            return parent::didFail();
        }
        public function canUninstall()
        {
            return parent::canUninstall();
        }
        public function supportsQueue()
        {
            return parent::supportsQueue();
        }
        public static function jobClassLocations()
        {
            return Concrete\Core\Job\Job::jobClassLocations();
        }
        public function getJobDateLastRun()
        {
            return parent::getJobDateLastRun();
        }
        public function getJobStatus()
        {
            return parent::getJobStatus();
        }
        public function getJobLastStatusText()
        {
            return parent::getJobLastStatusText();
        }
        public static function authenticateRequest($auth)
        {
            return Concrete\Core\Job\Job::authenticateRequest($auth);
        }
        public static function generateAuth()
        {
            return Concrete\Core\Job\Job::generateAuth();
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Job\Job::exportList($xml);
        }
        /**
         * @param bool $scheduledOnly
         * @return Job[]
         */
        public static function getList($scheduledOnly = false)
        {
            return Concrete\Core\Job\Job::getList($scheduledOnly);
        }
        public function reset()
        {
            return parent::reset();
        }
        public function markStarted()
        {
            return parent::markStarted();
        }
        public function markCompleted($resultCode = 0, $resultMsg = false)
        {
            return parent::markCompleted($resultCode, $resultMsg);
        }
        public static function getByID($jID = 0)
        {
            return Concrete\Core\Job\Job::getByID($jID);
        }
        public static function getByHandle($jHandle = "")
        {
            return Concrete\Core\Job\Job::getByHandle($jHandle);
        }
        public static function getJobObjByHandle($jHandle = "", $jobData = array())
        {
            return Concrete\Core\Job\Job::getJobObjByHandle($jHandle, $jobData);
        }
        protected static function getClassName($jHandle, $pkgHandle = null)
        {
            return Concrete\Core\Job\Job::getClassName($jHandle, $pkgHandle);
        }
        public static function getAvailableList($includeConcreteDirJobs = 1)
        {
            return Concrete\Core\Job\Job::getAvailableList($includeConcreteDirJobs);
        }
        public function executeJob()
        {
            return parent::executeJob();
        }
        public function setJobStatus($jStatus = "ENABLED")
        {
            return parent::setJobStatus($jStatus);
        }
        public static function installByHandle($jHandle = "")
        {
            return Concrete\Core\Job\Job::installByHandle($jHandle);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Job\Job::getListByPackage($pkg);
        }
        public static function installByPackage($jHandle, $pkg)
        {
            return Concrete\Core\Job\Job::installByPackage($jHandle, $pkg);
        }
        public function install()
        {
            return parent::install();
        }
        public function uninstall()
        {
            return parent::uninstall();
        }
        /**
         * Removes Job log entries
         */
        public static function clearLog()
        {
            return Concrete\Core\Job\Job::clearLog();
        }
        public function isScheduledForNow()
        {
            return parent::isScheduledForNow();
        }
        public function setSchedule($scheduled, $interval, $value)
        {
            return parent::setSchedule($scheduled, $interval, $value);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class JobSet extends \Concrete\Core\Job\Set
    {
        /**
         * @return JobSet[]
         */
        public static function getList()
        {
            return Concrete\Core\Job\Set::getList();
        }
        public static function getByID($jsID)
        {
            return Concrete\Core\Job\Set::getByID($jsID);
        }
        public static function getByName($jsName)
        {
            return Concrete\Core\Job\Set::getByName($jsName);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Job\Set::getListByPackage($pkg);
        }
        public static function getDefault()
        {
            return Concrete\Core\Job\Set::getDefault();
        }
        public function getJobSetID()
        {
            return parent::getJobSetID();
        }
        public function getJobSetName()
        {
            return parent::getJobSetName();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /** Returns the display name for this job set (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *	Escape the result in html format (if $format is 'html').
         *	If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getJobSetDisplayName($format = "html")
        {
            return parent::getJobSetDisplayName($format);
        }
        public function updateJobSetName($jsName)
        {
            return parent::updateJobSetName($jsName);
        }
        public function addJob(Concrete\Core\Job\Job $j)
        {
            return parent::addJob($j);
        }
        public static function add($jsName, $pkg = false)
        {
            return Concrete\Core\Job\Set::add($jsName, $pkg);
        }
        public function clearJobs()
        {
            return parent::clearJobs();
        }
        /**
         * @return Job[]
         */
        public function getJobs()
        {
            return parent::getJobs();
        }
        public function markStarted()
        {
            return parent::markStarted();
        }
        public function contains(Concrete\Core\Job\Job $j)
        {
            return parent::contains($j);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function canDelete()
        {
            return parent::canDelete();
        }
        public function removeJob(Concrete\Core\Job\Job $j)
        {
            return parent::removeJob($j);
        }
        public function isScheduledForNow()
        {
            return parent::isScheduledForNow();
        }
        public function setSchedule($scheduled, $interval, $value)
        {
            return parent::setSchedule($scheduled, $interval, $value);
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Job\Set::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    /**
     * @deprecated
     */
    class Loader extends \Concrete\Core\Legacy\Loader
    {
        /**
         * @return \Concrete\Core\Database\Connection\Connection
         */
        public static function db()
        {
            return Concrete\Core\Legacy\Loader::db();
        }
        public static function helper($service, $pkgHandle = false)
        {
            return Concrete\Core\Legacy\Loader::helper($service, $pkgHandle);
        }
        public static function packageElement($file, $pkgHandle, $args = null)
        {
            return Concrete\Core\Legacy\Loader::packageElement($file, $pkgHandle, $args);
        }
        public static function element($_file, $args = null, $_pkgHandle = null)
        {
            return Concrete\Core\Legacy\Loader::element($_file, $args, $_pkgHandle);
        }
        public static function model($model, $pkgHandle = false)
        {
            return Concrete\Core\Legacy\Loader::model($model, $pkgHandle);
        }
        public static function library($library, $pkgHandle = false)
        {
            return Concrete\Core\Legacy\Loader::library($library, $pkgHandle);
        }
        public static function controller($item)
        {
            return Concrete\Core\Legacy\Loader::controller($item);
        }
    }

    class Localization extends \Concrete\Core\Localization\Localization
    {
        public static function getInstance()
        {
            return Concrete\Core\Localization\Localization::getInstance();
        }
        public static function changeLocale($locale)
        {
            return Concrete\Core\Localization\Localization::changeLocale($locale);
        }
        /** Returns the currently active locale
         * @return string
         * @example 'en_US'
         */
        public static function activeLocale()
        {
            return Concrete\Core\Localization\Localization::activeLocale();
        }
        /** Returns the language for the currently active locale
         * @return string
         * @example 'en'
         */
        public static function activeLanguage()
        {
            return Concrete\Core\Localization\Localization::activeLanguage();
        }
        public function setLocale($locale)
        {
            return parent::setLocale($locale);
        }
        public function getLocale()
        {
            return parent::getLocale();
        }
        public function getActiveTranslateObject()
        {
            return parent::getActiveTranslateObject();
        }
        public static function getTranslate()
        {
            return Concrete\Core\Localization\Localization::getTranslate();
        }
        public static function getAvailableInterfaceLanguages()
        {
            return Concrete\Core\Localization\Localization::getAvailableInterfaceLanguages();
        }
        /**
         * Generates a list of all available languages and returns an array like
         * [ "de_DE" => "Deutsch (Deutschland)",
         *   "en_US" => "English (United States)",
         *   "fr_FR" => "Francais (France)"]
         * The result will be sorted by the key.
         * If the $displayLocale is set, the language- and region-names will be returned in that language
         * @param string|null $displayLocale Language of the description.
         *                    Set to null to get each locale name in its own language,
         *                    set to '' to use the current locale,
         *                    set to a specific locale to get the names in that language
         * @return Array An associative Array with locale as the key and description as content
         */
        public static function getAvailableInterfaceLanguageDescriptions($displayLocale = "")
        {
            return Concrete\Core\Localization\Localization::getAvailableInterfaceLanguageDescriptions($displayLocale);
        }
        /**
         * Get the description of a locale consisting of language and region description
         * e.g. "French (France)"
         * @param string $locale Locale that should be described
         * @param string|null $displayLocale Language of the description.
         *                    Set to null to get each locale name in its own language,
         *                    set to '' to use the current locale,
         *                    set to a specific locale to get the names in that language
         * @return string Description of a language
         */
        public static function getLanguageDescription($locale, $displayLocale = "")
        {
            return Concrete\Core\Localization\Localization::getLanguageDescription($locale, $displayLocale);
        }
        /**
         * @return ZendCacheDriver
         */
        protected static function getCache()
        {
            return Concrete\Core\Localization\Localization::getCache();
        }
        /**
         * Clear the translations cache
         */
        public static function clearCache()
        {
            return Concrete\Core\Localization\Localization::clearCache();
        }
    }

    class Marketplace extends \Concrete\Core\Marketplace\Marketplace
    {
        public static function getInstance()
        {
            return Concrete\Core\Marketplace\Marketplace::getInstance();
        }
        public static function downloadRemoteFile($file)
        {
            return Concrete\Core\Marketplace\Marketplace::downloadRemoteFile($file);
        }
        /**
         * Runs through all packages on the marketplace, sees if they're installed here, and updates the available version number for them.
         */
        public static function checkPackageUpdates()
        {
            return Concrete\Core\Marketplace\Marketplace::checkPackageUpdates();
        }
        public function getAvailableMarketplaceItems($filterInstalled = true)
        {
            return parent::getAvailableMarketplaceItems($filterInstalled);
        }
        public function getConnectionError()
        {
            return parent::getConnectionError();
        }
        public function getSitePageURL()
        {
            return parent::getSitePageURL();
        }
        public function getMarketplaceFrame($width = "100%", $height = "300", $completeURL = false, $connectMethod = "view")
        {
            return parent::getMarketplaceFrame($width, $height, $completeURL, $connectMethod);
        }
        public function isConnected()
        {
            return parent::isConnected();
        }
        public function hasConnectionError()
        {
            return parent::hasConnectionError();
        }
        /**
         * @return bool|string
         *
         * @throws \Concrete\Core\File\Exception\RequestTimeoutException
         */
        public function generateSiteToken()
        {
            return parent::generateSiteToken();
        }
        public static function getSiteToken()
        {
            return Concrete\Core\Marketplace\Marketplace::getSiteToken();
        }
        public function getMarketplacePurchaseFrame($mp, $width = "100%", $height = "530")
        {
            return parent::getMarketplacePurchaseFrame($mp, $width, $height);
        }
    }

    /**
     * A package can contains related components that customize concrete5. They can br easily
     * installed and uninstall by a user.
     *
     * @property int $pkgId ID of package
     * @property string $pkgName Installed name of package
     * @property string $pkgHandle Installed handle of package. This should be provided by the ending package.
     * @property string $pkgDescription Installed description of package
     * @property bool $pkgIsInstalled True if package is installed
     * @property string $pkgVersion Version of package installed
     * @property string $pkgAvailableVersion
     */
    class Package extends \Concrete\Core\Package\Package
    {
        /** Returns the display name of a category of package items (localized and escaped accordingly to $format)
         * @param string $categoryHandle The category handle
         * @param string $format         = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public static function getPackageItemsCategoryDisplayName($categoryHandle, $format = "html")
        {
            return Concrete\Core\Package\Package::getPackageItemsCategoryDisplayName($categoryHandle, $format);
        }
        /**
         * Returns the name of an object belonging to a package.
         *
         * @param mixed $item
         *
         * @return string
         */
        public static function getItemName($item)
        {
            return Concrete\Core\Package\Package::getItemName($item);
        }
        /**
         * This is the pre-test routine that packages run through before they are installed. Any errors that come here are
         * to be returned in the form of an array so we can show the user. If it's all good we return true.
         *
         * @param string $package Package handle
         * @param bool $testForAlreadyInstalled
         *
         * @return array|bool Returns an array of errors or true if the package can be installed
         */
        public static function testForInstall($package, $testForAlreadyInstalled = true)
        {
            return Concrete\Core\Package\Package::testForInstall($package, $testForAlreadyInstalled);
        }
        /**
         * Returns a package's class.
         *
         * @param string $pkgHandle Handle of package
         *
         * @return Package
         */
        public static function getClass($pkgHandle)
        {
            return Concrete\Core\Package\Package::getClass($pkgHandle);
        }
        /**
         * Returns the version of concrete5 required by the package.
         *
         * @return string
         */
        public function getApplicationVersionRequired()
        {
            return parent::getApplicationVersionRequired();
        }
        /**
         * Returns a Package object for the given package handle, null if not found.
         *
         * @param string $pkgHandle
         *
         * @return Package
         */
        public static function getByHandle($pkgHandle)
        {
            return Concrete\Core\Package\Package::getByHandle($pkgHandle);
        }
        /**
         * Returns an array of packages that have newer versions in the local packages directory
         * than those which are in the Packages table. This means they're ready to be upgraded.
         *
         * @return Package[]
         */
        public static function getLocalUpgradeablePackages()
        {
            return Concrete\Core\Package\Package::getLocalUpgradeablePackages();
        }
        /**
         * Returns all available packages.
         *
         * @param bool $filterInstalled True to only return installed packages
         *
         * @return Package[]
         */
        public static function getAvailablePackages($filterInstalled = true)
        {
            return Concrete\Core\Package\Package::getAvailablePackages($filterInstalled);
        }
        /**
         * Returns all installed package handles.
         *
         * @return string[]
         */
        public static function getInstalledHandles()
        {
            return Concrete\Core\Package\Package::getInstalledHandles();
        }
        /**
         * Finds all packages that have an upgraded version available in the marketplace.
         *
         * @return Package[]
         */
        public static function getRemotelyUpgradeablePackages()
        {
            return Concrete\Core\Package\Package::getRemotelyUpgradeablePackages();
        }
        /**
         * Returns an array of all installed packages.
         *
         * @return Package[]
         */
        public static function getInstalledList()
        {
            return Concrete\Core\Package\Package::getInstalledList();
        }
        /**
         * Returns the path to the package's folder, relative to the install path.
         *
         * @return string
         */
        public function getRelativePath()
        {
            return parent::getRelativePath();
        }
        /**
         * Returns the package handle.
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Gets the date the package was added to the system.
         *
         * @return string date formatted like: 2009-01-01 00:00:00
         */
        public function getPackageDateInstalled()
        {
            return parent::getPackageDateInstalled();
        }
        public function getPackageVersionUpdateAvailable()
        {
            return parent::getPackageVersionUpdateAvailable();
        }
        /**
         * Returns true if the package is installed, false if not.
         *
         * @return bool
         */
        public function isPackageInstalled()
        {
            return parent::isPackageInstalled();
        }
        /**
         * Gets the contents of the package's CHANGELOG file. If no changelog is available an empty string is returned.
         *
         * @return string
         */
        public function getChangelogContents()
        {
            return parent::getChangelogContents();
        }
        public function getPackagePath()
        {
            return parent::getPackagePath();
        }
        /**
         * Returns the currently installed package version.
         * NOTE: This function only returns a value if getLocalUpgradeablePackages() has been called first!
         *
         * @return string
         */
        public function getPackageCurrentlyInstalledVersion()
        {
            return parent::getPackageCurrentlyInstalledVersion();
        }
        /**
         * @return bool
         */
        public function providesCoreExtensionAutoloaderMapping()
        {
            return parent::providesCoreExtensionAutoloaderMapping();
        }
        /**
         * Returns custom autoloader prefixes registered by the class loader.
         *
         * @return array Keys represent the namespace, not relative to the package's namespace. Values are the path, and are relative to the package directory.
         */
        public function getPackageAutoloaderRegistries()
        {
            return parent::getPackageAutoloaderRegistries();
        }
        /**
         * Returns true if the package has a post install screen.
         *
         * @return bool
         */
        public function hasInstallPostScreen()
        {
            return parent::hasInstallPostScreen();
        }
        /**
         * Returns true if the package has an install options screen.
         *
         * @return bool
         */
        public function showInstallOptionsScreen()
        {
            return parent::showInstallOptionsScreen();
        }
        public function hasInstallNotes()
        {
            return parent::hasInstallNotes();
        }
        public function allowsFullContentSwap()
        {
            return parent::allowsFullContentSwap();
        }
        /**
         * Loads package translation files into zend translate.
         *
         * @param string                                  $locale    = null The identifier of the locale to activate (used to build the language file path). If empty we'll use currently active locale.
         * @param \Zend\I18n\Translator\Translator|string $translate = 'current' The Zend Translator instance that holds the translations (set to 'current' to use the current one)
         */
        public function setupPackageLocalization($locale = null, $translate = "current")
        {
            return parent::setupPackageLocalization($locale, $translate);
        }
        /**
         * @return bool|int[] true on success, array of error codes on failure
         */
        public function testForUninstall()
        {
            return parent::testForUninstall();
        }
        /**
         * Uninstalls the package. Removes any blocks, themes, or pages associated with the package.
         */
        public function uninstall()
        {
            return parent::uninstall();
        }
        /**
         * Returns an array of package items (e.g. blocks, themes).
         *
         * @return array
         */
        public function getPackageItems()
        {
            return parent::getPackageItems();
        }
        /**
         * Destroys all the existing proxy classes for this package.
         *
         * @return bool
         */
        protected function destroyProxyClasses()
        {
            return parent::destroyProxyClasses();
        }
        /**
         * Gets a package specific entity manager.
         *
         * @return \Concrete\Core\Database\DatabaseStructureManager
         */
        public function getDatabaseStructureManager()
        {
            return parent::getDatabaseStructureManager();
        }
        /**
         * @return EntityManagerFactoryInterface
         */
        public function getEntityManagerFactory()
        {
            return parent::getEntityManagerFactory();
        }
        /**
         * Gets a package specific entity manager.
         *
         * @return \Doctrine\ORM\EntityManager
         */
        public function getEntityManager()
        {
            return parent::getEntityManager();
        }
        /**
         * Removes any existing pages, files, stacks, block and page types and installs content from the package.
         *
         * @param $options
         */
        public function swapContent($options)
        {
            return parent::swapContent($options);
        }
        /**
         * @param array $options
         *
         * @return bool
         */
        protected function validateClearSiteContents($options)
        {
            return parent::validateClearSiteContents($options);
        }
        /**
         * Returns a path to where the packages files are located.
         *
         * @return string $path
         */
        public function contentProvidesFileThumbnails()
        {
            return parent::contentProvidesFileThumbnails();
        }
        /**
         * Converts package install test errors to human-readable strings.
         *
         * @param $testResults Package install test errors
         *
         * @return array
         */
        public static function mapError($testResults)
        {
            return Concrete\Core\Package\Package::mapError($testResults);
        }
        /**
         * Returns the directory containing package entities.
         *
         * @return string
         */
        public function getPackageEntitiesPath()
        {
            return parent::getPackageEntitiesPath();
        }
        /**
         * Called to enable package specific configuration.
         */
        public function registerConfigNamespace()
        {
            return parent::registerConfigNamespace();
        }
        /**
         * Get the standard database config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getConfig()
        {
            return parent::getConfig();
        }
        /**
         * Get the standard database config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getDatabaseConfig()
        {
            return parent::getDatabaseConfig();
        }
        /**
         * Get the standard filesystem config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getFileConfig()
        {
            return parent::getFileConfig();
        }
        /**
         * Installs the package info row and installs the database. Packages installing additional content should override this method, call the parent method,
         * and use the resulting package object for further installs.
         *
         * @return Package
         */
        public function install()
        {
            return parent::install();
        }
        /**
         * Returns the translated name of the package.
         *
         * @return string
         */
        public function getPackageName()
        {
            return parent::getPackageName();
        }
        /**
         * Returns the translated package description.
         *
         * @return string
         */
        public function getPackageDescription()
        {
            return parent::getPackageDescription();
        }
        /**
         * Returns the installed package version.
         *
         * @return string
         */
        public function getPackageVersion()
        {
            return parent::getPackageVersion();
        }
        /**
         * Returns a Package object for the given package id, null if not found.
         *
         * @param int $pkgID
         *
         * @return Package
         */
        public static function getByID($pkgID)
        {
            return Concrete\Core\Package\Package::getByID($pkgID);
        }
        /**
         * Installs the packages database through doctrine entities and db.xml
         * database definitions.
         */
        public function installDatabase()
        {
            return parent::installDatabase();
        }
        public function installEntitiesDatabase()
        {
            return parent::installEntitiesDatabase();
        }
        /**
         * Installs a package's database from an XML file.
         *
         * @param string $xmlFile Path to the database XML file
         *
         * @return bool|\stdClass Returns false if the XML file could not be found
         *
         * @throws \Doctrine\DBAL\ConnectionException
         */
        public static function installDB($xmlFile)
        {
            return Concrete\Core\Package\Package::installDB($xmlFile);
        }
        /**
         * Updates the available package number in the database.
         *
         * @param string $vNum New version number
         */
        public function updateAvailableVersionNumber($vNum)
        {
            return parent::updateAvailableVersionNumber($vNum);
        }
        /**
         * Returns the package ID.
         *
         * @return int
         */
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * Updates a package's name, description, version and ID using the current class properties.
         */
        public function upgradeCoreData()
        {
            return parent::upgradeCoreData();
        }
        /**
         * Upgrades a package's database and refreshes all blocks.
         */
        public function upgrade()
        {
            return parent::upgrade();
        }
        /**
         * Updates a package's database using entities and a db.xml.
         *
         * @throws \Doctrine\DBAL\ConnectionException
         * @throws \Exception
         */
        public function upgradeDatabase()
        {
            return parent::upgradeDatabase();
        }
        /**
         * Moves the current package's directory to the trash directory renamed with the package handle and a date code.
         */
        public function backup()
        {
            return parent::backup();
        }
        /**
         * If a package was just backed up by this instance of the package object and the packages/package handle directory doesn't exist, this will restore the
         * package from the trash.
         */
        public function restore()
        {
            return parent::restore();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    /**
     * The page object in Concrete encapsulates all the functionality used by a typical page and their contents
     * including blocks, page metadata, page permissions.
     */
    class Page extends \Concrete\Core\Page\Page
    {
        /**
         * @param string $path /path/to/page
         * @param string $version ACTIVE or RECENT
         *
         * @return Page
         */
        public static function getByPath($path, $version = "RECENT")
        {
            return Concrete\Core\Page\Page::getByPath($path, $version);
        }
        /**
         * @param int $cID Collection ID of a page
         * @param string $version ACTIVE or RECENT
         *
         * @return Page
         */
        public static function getByID($cID, $version = "RECENT")
        {
            return Concrete\Core\Page\Page::getByID($cID, $version);
        }
        /**
         * @access private
         */
        protected function populatePage($cInfo, $where, $cvID)
        {
            return parent::populatePage($cInfo, $where, $cvID);
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * Return a representation of the Page object as something easily serializable.
         */
        public function getJSONObject()
        {
            return parent::getJSONObject();
        }
        /**
         * @return PageController
         */
        public function getPageController()
        {
            return parent::getPageController();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        /**
         * Is the page in edit mode.
         *
         * @return bool
         */
        public function isEditMode()
        {
            return parent::isEditMode();
        }
        /**
         * Get the package ID for a page (page thats added by a package) (returns 0 if its not in a package).
         *
         * @return int
         */
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * Get the package handle for a page (page thats added by a package).
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Returns 1 if the page is in arrange mode.
         *
         * @return bool
         */
        public function isArrangeMode()
        {
            return parent::isArrangeMode();
        }
        /**
         * Forces the page to be checked in if its checked out.
         */
        public function forceCheckIn()
        {
            return parent::forceCheckIn();
        }
        /**
         * Checks if the page is a dashboard page, returns true if it is.
         *
         * @return bool
         */
        public function isAdminArea()
        {
            return parent::isAdminArea();
        }
        /**
         * Uses a Request object to determine which page to load. queries by path and then
         * by cID.
         */
        public static function getFromRequest(Concrete\Core\Http\Request $request)
        {
            return Concrete\Core\Page\Page::getFromRequest($request);
        }
        public function processArrangement($area_id, $moved_block_id, $block_order)
        {
            return parent::processArrangement($area_id, $moved_block_id, $block_order);
        }
        /**
         * checks if the page is checked out, if it is return true.
         *
         * @return bool
         */
        public function isCheckedOut()
        {
            return parent::isCheckedOut();
        }
        /**
         * Gets the user that is editing the current page.
         * $return string $name.
         */
        public function getCollectionCheckedOutUserName()
        {
            return parent::getCollectionCheckedOutUserName();
        }
        /**
         * Checks if the page is checked out by the current user.
         *
         * @return bool
         */
        public function isCheckedOutByMe()
        {
            return parent::isCheckedOutByMe();
        }
        /**
         * Checks if the page is a single page.
         *
         * @return bool
         */
        public function isGeneratedCollection()
        {
            return parent::isGeneratedCollection();
        }
        public function assignPermissions($userOrGroup, $permissions = array(), $accessType = Concrete\Core\Permission\Key\PageKey::ACCESS_TYPE_INCLUDE)
        {
            return parent::assignPermissions($userOrGroup, $permissions, $accessType);
        }
        public function removePermissions($userOrGroup, $permissions = array())
        {
            return parent::removePermissions($userOrGroup, $permissions);
        }
        public static function getDrafts()
        {
            return Concrete\Core\Page\Page::getDrafts();
        }
        public function isPageDraft()
        {
            return parent::isPageDraft();
        }
        public function setController($controller)
        {
            return parent::setController($controller);
        }
        /**
         * @deprecated
         */
        public function getController()
        {
            return parent::getController();
        }
        /**
         * @private
         */
        public function assignPermissionSet($px)
        {
            return parent::assignPermissionSet($px);
        }
        /**
         * Make an alias to a page.
         *
         * @param Collection $c
         *
         * @return int $newCID
         */
        public function addCollectionAlias($c)
        {
            return parent::addCollectionAlias($c);
        }
        /**
         * Update the name, link, and to open in a new window for an external link.
         *
         * @param string $cName
         * @param string $cLink
         * @param bool $newWindow
         */
        public function updateCollectionAliasExternal($cName, $cLink, $newWindow = 0)
        {
            return parent::updateCollectionAliasExternal($cName, $cLink, $newWindow);
        }
        /**
         * Add a new external link.
         *
         * @param string $cName
         * @param string $cLink
         * @param bool $newWindow
         *
         * @return int $newCID
         */
        public function addCollectionAliasExternal($cName, $cLink, $newWindow = 0)
        {
            return parent::addCollectionAliasExternal($cName, $cLink, $newWindow);
        }
        /**
         * Check if a page is a single page that is in the core (/concrete directory).
         *
         * @return bool
         */
        public function isSystemPage()
        {
            return parent::isSystemPage();
        }
        /**
         * Gets the icon for a page (also fires the on_page_get_icon event).
         *
         * @return string $icon Path to the icon
         */
        public function getCollectionIcon()
        {
            return parent::getCollectionIcon();
        }
        /**
         * Remove an external link/alias.
         *
         * @return int $cIDRedir cID for the original page if the page was an alias
         */
        public function removeThisAlias()
        {
            return parent::removeThisAlias();
        }
        public function populateRecursivePages($pages, $pageRow, $cParentID, $level, $includeThisPage = true)
        {
            return parent::populateRecursivePages($pages, $pageRow, $cParentID, $level, $includeThisPage);
        }
        public function queueForDeletionSort($a, $b)
        {
            return parent::queueForDeletionSort($a, $b);
        }
        public function queueForDuplicationSort($a, $b)
        {
            return parent::queueForDuplicationSort($a, $b);
        }
        public function queueForDeletion()
        {
            return parent::queueForDeletion();
        }
        public function queueForDeletionRequest($queue = null, $includeThisPage = true)
        {
            return parent::queueForDeletionRequest($queue, $includeThisPage);
        }
        public function queueForDuplication($destination, $includeParent = true)
        {
            return parent::queueForDuplication($destination, $includeParent);
        }
        public function export($pageNode, $includePublicDate = false)
        {
            return parent::export($pageNode, $includePublicDate);
        }
        /**
         * Returns the uID for a page that is checked out.
         *
         * @return int
         */
        public function getCollectionCheckedOutUserID()
        {
            return parent::getCollectionCheckedOutUserID();
        }
        /**
         * Returns the path for the current page.
         *
         * @return string
         */
        public function getCollectionPath()
        {
            return parent::getCollectionPath();
        }
        /**
         * Returns the PagePath object for the current page.
         */
        public function getCollectionPathObject()
        {
            return parent::getCollectionPathObject();
        }
        /**
         * Adds a non-canonical page path to the current page.
         */
        public function addAdditionalPagePath($cPath, $commit = true)
        {
            return parent::addAdditionalPagePath($cPath, $commit);
        }
        /**
         * Sets the canonical page path for a page.
         */
        public function setCanonicalPagePath($cPath, $isAutoGenerated = false)
        {
            return parent::setCanonicalPagePath($cPath, $isAutoGenerated);
        }
        public function getPagePaths()
        {
            return parent::getPagePaths();
        }
        public function getAdditionalPagePaths()
        {
            return parent::getAdditionalPagePaths();
        }
        /**
         * Clears all page paths for a page.
         */
        public function clearPagePaths()
        {
            return parent::clearPagePaths();
        }
        /**
         * Returns full url for the current page.
         *
         * @return string
         */
        public function getCollectionLink($appendBaseURL = false)
        {
            return parent::getCollectionLink($appendBaseURL);
        }
        /**
         * Returns the path for a page from its cID.
         *
         * @param int cID
         *
         * @return string $path
         */
        public static function getCollectionPathFromID($cID)
        {
            return Concrete\Core\Page\Page::getCollectionPathFromID($cID);
        }
        /**
         * Returns the uID for a page ownder.
         *
         * @return int
         */
        public function getCollectionUserID()
        {
            return parent::getCollectionUserID();
        }
        /**
         * Returns the page's handle.
         *
         * @return string
         */
        public function getCollectionHandle()
        {
            return parent::getCollectionHandle();
        }
        /**
         * @deprecated
         */
        public function getCollectionTypeName()
        {
            return parent::getCollectionTypeName();
        }
        public function getPageTypeName()
        {
            return parent::getPageTypeName();
        }
        /**
         * @deprecated
         */
        public function getCollectionTypeID()
        {
            return parent::getCollectionTypeID();
        }
        /**
         * Returns the Collection Type ID.
         *
         * @return int
         */
        public function getPageTypeID()
        {
            return parent::getPageTypeID();
        }
        public function getPageTypeObject()
        {
            return parent::getPageTypeObject();
        }
        /**
         * Returns the Page Template ID.
         *
         * @return int
         */
        public function getPageTemplateID()
        {
            return parent::getPageTemplateID();
        }
        /**
         * Returns the Page Template Object.
         *
         * @return PageTemplate
         */
        public function getPageTemplateObject()
        {
            return parent::getPageTemplateObject();
        }
        /**
         * Returns the Page Template handle.
         *
         * @return string
         */
        public function getPageTemplateHandle()
        {
            return parent::getPageTemplateHandle();
        }
        /**
         * Returns the Collection Type handle.
         *
         * @return string
         */
        public function getPageTypeHandle()
        {
            return parent::getPageTypeHandle();
        }
        public function getCollectionTypeHandle()
        {
            return parent::getCollectionTypeHandle();
        }
        /**
         * Returns theme id for the collection.
         *
         * @return int
         */
        public function getCollectionThemeID()
        {
            return parent::getCollectionThemeID();
        }
        /**
         * Check if a block is an alias from a page default.
         *
         * @param Block $b
         *
         * @return bool
         */
        public function isBlockAliasedFromMasterCollection($b)
        {
            return parent::isBlockAliasedFromMasterCollection($b);
        }
        /**
         * Returns Collection's theme object.
         *
         * @return PageTheme
         */
        public function getCollectionThemeObject()
        {
            return parent::getCollectionThemeObject();
        }
        /**
         * Returns the page's name.
         *
         * @return string
         */
        public function getCollectionName()
        {
            return parent::getCollectionName();
        }
        /**
         * Returns the collection ID for the aliased page (returns 0 unless used on an actual alias).
         *
         * @return int
         */
        public function getCollectionPointerID()
        {
            return parent::getCollectionPointerID();
        }
        /**
         * Returns link for the aliased page.
         *
         * @return string
         */
        public function getCollectionPointerExternalLink()
        {
            return parent::getCollectionPointerExternalLink();
        }
        /**
         * Returns if the alias opens in a new window.
         *
         * @return bool
         */
        public function openCollectionPointerExternalLinkInNewWindow()
        {
            return parent::openCollectionPointerExternalLinkInNewWindow();
        }
        /**
         * Checks to see if the page is an alias.
         *
         * @return bool
         */
        public function isAlias()
        {
            return parent::isAlias();
        }
        /**
         * Checks if a page is an external link.
         *
         * @return bool
         */
        public function isExternalLink()
        {
            return parent::isExternalLink();
        }
        /**
         * Get the original cID of a page.
         *
         * @return int
         */
        public function getCollectionPointerOriginalID()
        {
            return parent::getCollectionPointerOriginalID();
        }
        /**
         * Get the file name of a page (single pages).
         *
         * @return string
         */
        public function getCollectionFilename()
        {
            return parent::getCollectionFilename();
        }
        /**
         * Gets the date a the current version was made public,.
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getCollectionDatePublic()
        {
            return parent::getCollectionDatePublic();
        }
        public function getCollectionDatePublicObject()
        {
            return parent::getCollectionDatePublicObject();
        }
        /**
         * Get the description of a page.
         *
         * @return string
         */
        public function getCollectionDescription()
        {
            return parent::getCollectionDescription();
        }
        /**
         * Gets the cID of the page's parent.
         *
         * @return int
         */
        public function getCollectionParentID()
        {
            return parent::getCollectionParentID();
        }
        /**
         * Get the Parent cID from a page by using a cID.
         *
         * @param int $cID
         *
         * @return int
         */
        public static function getCollectionParentIDFromChildID($cID)
        {
            return Concrete\Core\Page\Page::getCollectionParentIDFromChildID($cID);
        }
        /**
         * Returns an array of this cParentID and aliased parentIDs.
         *
         * @return array $cID
         */
        public function getCollectionParentIDs()
        {
            return parent::getCollectionParentIDs();
        }
        /**
         * Checks if a page is a page default.
         *
         * @return bool
         */
        public function isMasterCollection()
        {
            return parent::isMasterCollection();
        }
        /**
         * Gets the template permissions.
         *
         * @return string
         */
        public function overrideTemplatePermissions()
        {
            return parent::overrideTemplatePermissions();
        }
        /**
         * Gets the position of the page in the sitemap.
         *
         * @return int
         */
        public function getCollectionDisplayOrder()
        {
            return parent::getCollectionDisplayOrder();
        }
        /**
         * Set the theme for a page using the page object.
         *
         * @param PageTheme $pl
         */
        public function setTheme($pl)
        {
            return parent::setTheme($pl);
        }
        /**
         * Set the theme for a page using the page object.
         *
         * @param PageType $pl
         */
        public function setPageType(Concrete\Core\Page\Type\Type $type = null)
        {
            return parent::setPageType($type);
        }
        /**
         * Set the permissions of sub-collections added beneath this permissions to inherit from the template.
         */
        public function setPermissionsInheritanceToTemplate()
        {
            return parent::setPermissionsInheritanceToTemplate();
        }
        /**
         * Set the permissions of sub-collections added beneath this permissions to inherit from the parent.
         */
        public function setPermissionsInheritanceToOverride()
        {
            return parent::setPermissionsInheritanceToOverride();
        }
        public function getPermissionsCollectionID()
        {
            return parent::getPermissionsCollectionID();
        }
        public function getCollectionInheritance()
        {
            return parent::getCollectionInheritance();
        }
        public function getParentPermissionsCollectionID()
        {
            return parent::getParentPermissionsCollectionID();
        }
        public function getPermissionsCollectionObject()
        {
            return parent::getPermissionsCollectionObject();
        }
        /**
         * Given the current page's template and page type, we return the master page.
         */
        public function getMasterCollectionID()
        {
            return parent::getMasterCollectionID();
        }
        public function getOriginalCollectionID()
        {
            return parent::getOriginalCollectionID();
        }
        public function getNumChildren()
        {
            return parent::getNumChildren();
        }
        public function getNumChildrenDirect()
        {
            return parent::getNumChildrenDirect();
        }
        /**
         * Returns the first child of the current page, or null if there is no child.
         *
         * @param string $sortColumn
         *
         * @return Page
         */
        public function getFirstChild($sortColumn = "cDisplayOrder asc", $excludeSystemPages = false)
        {
            return parent::getFirstChild($sortColumn, $excludeSystemPages);
        }
        public function getCollectionChildrenArray($oneLevelOnly = 0)
        {
            return parent::getCollectionChildrenArray($oneLevelOnly);
        }
        /**
         * Returns the immediate children of the current page.
         */
        public function getCollectionChildren()
        {
            return parent::getCollectionChildren();
        }
        protected function _getNumChildren($cID, $oneLevelOnly = 0, $sortColumn = "cDisplayOrder asc")
        {
            return parent::_getNumChildren($cID, $oneLevelOnly, $sortColumn);
        }
        public function canMoveCopyTo($cobj)
        {
            return parent::canMoveCopyTo($cobj);
        }
        public function updateCollectionName($name)
        {
            return parent::updateCollectionName($name);
        }
        public function hasPageThemeCustomizations()
        {
            return parent::hasPageThemeCustomizations();
        }
        public function resetCustomThemeStyles()
        {
            return parent::resetCustomThemeStyles();
        }
        public function setCustomStyleObject(Concrete\Core\Page\Theme\Theme $pt, Concrete\Core\StyleCustomizer\Style\ValueList $valueList, $selectedPreset = false, $customCssRecord = false)
        {
            return parent::setCustomStyleObject($pt, $valueList, $selectedPreset, $customCssRecord);
        }
        public function getPageWrapperClass()
        {
            return parent::getPageWrapperClass();
        }
        public function writePageThemeCustomizations()
        {
            return parent::writePageThemeCustomizations();
        }
        public static function resetAllCustomStyles()
        {
            return Concrete\Core\Page\Page::resetAllCustomStyles();
        }
        public function update($data)
        {
            return parent::update($data);
        }
        public function clearPagePermissions()
        {
            return parent::clearPagePermissions();
        }
        public function inheritPermissionsFromParent()
        {
            return parent::inheritPermissionsFromParent();
        }
        public function inheritPermissionsFromDefaults()
        {
            return parent::inheritPermissionsFromDefaults();
        }
        public function setPermissionsToManualOverride()
        {
            return parent::setPermissionsToManualOverride();
        }
        public function rescanAreaPermissions()
        {
            return parent::rescanAreaPermissions();
        }
        public function setOverrideTemplatePermissions($cOverrideTemplatePermissions)
        {
            return parent::setOverrideTemplatePermissions($cOverrideTemplatePermissions);
        }
        public function updatePermissionsCollectionID($cParentIDString, $npID)
        {
            return parent::updatePermissionsCollectionID($cParentIDString, $npID);
        }
        public function acquireAreaPermissions($permissionsCollectionID)
        {
            return parent::acquireAreaPermissions($permissionsCollectionID);
        }
        public function acquirePagePermissions($permissionsCollectionID)
        {
            return parent::acquirePagePermissions($permissionsCollectionID);
        }
        public function updateGroupsSubCollection($cParentIDString)
        {
            return parent::updateGroupsSubCollection($cParentIDString);
        }
        public function addBlock($bt, $a, $data)
        {
            return parent::addBlock($bt, $a, $data);
        }
        public function move($nc)
        {
            return parent::move($nc);
        }
        public function duplicateAll($nc, $preserveUserID = false)
        {
            return parent::duplicateAll($nc, $preserveUserID);
        }
        /**
         * @access private
         **/
        protected function _duplicateAll($cParent, $cNewParent, $preserveUserID = false)
        {
            return parent::_duplicateAll($cParent, $cNewParent, $preserveUserID);
        }
        public function duplicate($nc, $preserveUserID = false)
        {
            return parent::duplicate($nc, $preserveUserID);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function moveToTrash()
        {
            return parent::moveToTrash();
        }
        public function rescanChildrenDisplayOrder()
        {
            return parent::rescanChildrenDisplayOrder();
        }
        public function getAutoGeneratedPagePathObject()
        {
            return parent::getAutoGeneratedPagePathObject();
        }
        public function getNextSubPageDisplayOrder()
        {
            return parent::getNextSubPageDisplayOrder();
        }
        /**
         * Returns the URL-slug-based path to the current page (including any suffixes) in a string format. Does so in real time.
         */
        public function generatePagePath()
        {
            return parent::generatePagePath();
        }
        /**
         * Recalculates the canonical page path for the current page, based on its current version, URL slug, etc..
         */
        public function rescanCollectionPath()
        {
            return parent::rescanCollectionPath();
        }
        /**
         * For the curret page, return the text that will be used for that pages canonical path. This happens before
         * any uniqueness checks get run.
         *
         * @return string
         */
        protected function computeCanonicalPagePath()
        {
            return parent::computeCanonicalPagePath();
        }
        public function updateDisplayOrder($do, $cID = 0)
        {
            return parent::updateDisplayOrder($do, $cID);
        }
        public function movePageDisplayOrderToTop()
        {
            return parent::movePageDisplayOrderToTop();
        }
        public function movePageDisplayOrderToBottom()
        {
            return parent::movePageDisplayOrderToBottom();
        }
        public function movePageDisplayOrderToSibling(Concrete\Core\Page\Page $c, $position = "before")
        {
            return parent::movePageDisplayOrderToSibling($c, $position);
        }
        public function rescanSystemPageStatus()
        {
            return parent::rescanSystemPageStatus();
        }
        public function isInTrash()
        {
            return parent::isInTrash();
        }
        public function moveToRoot()
        {
            return parent::moveToRoot();
        }
        public function deactivate()
        {
            return parent::deactivate();
        }
        public function activate()
        {
            return parent::activate();
        }
        public function isActive()
        {
            return parent::isActive();
        }
        public function setPageIndexScore($score)
        {
            return parent::setPageIndexScore($score);
        }
        public function getPageIndexScore()
        {
            return parent::getPageIndexScore();
        }
        public function getPageIndexContent()
        {
            return parent::getPageIndexContent();
        }
        protected function _associateMasterCollectionBlocks($newCID, $masterCID)
        {
            return parent::_associateMasterCollectionBlocks($newCID, $masterCID);
        }
        protected function _associateMasterCollectionAttributes($newCID, $masterCID)
        {
            return parent::_associateMasterCollectionAttributes($newCID, $masterCID);
        }
        /**
         * Adds the home page to the system. Typically used only by the installation program.
         *
         * @return page
         **/
        public static function addHomePage()
        {
            return Concrete\Core\Page\Page::addHomePage();
        }
        /**
         * Adds a new page of a certain type, using a passed associate array to setup value. $data may contain any or all of the following:
         * "uID": User ID of the page's owner
         * "pkgID": Package ID the page belongs to
         * "cName": The name of the page
         * "cHandle": The handle of the page as used in the path
         * "cDatePublic": The date assigned to the page.
         *
         * @param \Concrete\Core\Page\Type\Type $pt
         * @param array $data
         *
         * @return page
         **/
        public function add($pt, $data, $template = false)
        {
            return parent::add($pt, $data, $template);
        }
        protected function acquireAreaStylesFromDefaults(Concrete\Core\Page\Template $template)
        {
            return parent::acquireAreaStylesFromDefaults($template);
        }
        public function getCustomStyleObject()
        {
            return parent::getCustomStyleObject();
        }
        public function getCollectionFullPageCaching()
        {
            return parent::getCollectionFullPageCaching();
        }
        public function getCollectionFullPageCachingLifetime()
        {
            return parent::getCollectionFullPageCachingLifetime();
        }
        public function getCollectionFullPageCachingLifetimeCustomValue()
        {
            return parent::getCollectionFullPageCachingLifetimeCustomValue();
        }
        public function getCollectionFullPageCachingLifetimeValue()
        {
            return parent::getCollectionFullPageCachingLifetimeValue();
        }
        public function addStatic($data)
        {
            return parent::addStatic($data);
        }
        public static function getCurrentPage()
        {
            return Concrete\Core\Page\Page::getCurrentPage();
        }
        /**
         * Returns the total number of page views for a specific page.
         */
        public function getTotalPageViews($date = null)
        {
            return parent::getTotalPageViews($date);
        }
        public function getPageDraftTargetParentPageID()
        {
            return parent::getPageDraftTargetParentPageID();
        }
        public function setPageDraftTargetParentPageID($cParentID)
        {
            return parent::setPageDraftTargetParentPageID($cParentID);
        }
        /**
         * Gets a pages statistics.
         */
        public function getPageStatistics($limit = 20)
        {
            return parent::getPageStatistics($limit);
        }
        public static function reindexPendingPages()
        {
            return Concrete\Core\Page\Collection\Collection::reindexPendingPages();
        }
        public static function getByHandle($handle)
        {
            return Concrete\Core\Page\Collection\Collection::getByHandle($handle);
        }
        public function addCollection($data)
        {
            return parent::addCollection($data);
        }
        public static function createCollection($data)
        {
            return Concrete\Core\Page\Collection\Collection::createCollection($data);
        }
        public function loadVersionObject($cvID = "ACTIVE")
        {
            return parent::loadVersionObject($cvID);
        }
        public function getVersionToModify()
        {
            return parent::getVersionToModify();
        }
        public function getVersionObject()
        {
            return parent::getVersionObject();
        }
        public function cloneVersion($versionComments)
        {
            return parent::cloneVersion($versionComments);
        }
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        public function getNextVersionComments()
        {
            return parent::getNextVersionComments();
        }
        public function getFeatureAssignments()
        {
            return parent::getFeatureAssignments();
        }
        /**
         * Returns the value of the attribute with the handle $ak
         * of the current object.
         *
         * $displayMode makes it possible to get the correct output
         * value. When you need the raw attribute value or object, use
         * this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle');
         * </code>
         *
         * But if you need the formatted output supported by some
         * attribute, use this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle', 'display');
         * </code>
         *
         * An attribute type like "date" will then return the date in
         * the correct format just like other attributes will show
         * you a nicely formatted output and not just a simple value
         * or object.
         *
         *
         * @param string|object $akHandle
         * @param bool       $displayMode
         *
         * @return type
         */
        public function getAttribute($akHandle, $displayMode = false)
        {
            return parent::getAttribute($akHandle, $displayMode);
        }
        public function getCollectionAttributeValue($ak)
        {
            return parent::getCollectionAttributeValue($ak);
        }
        public function clearCollectionAttributes($retainAKIDs = array())
        {
            return parent::clearCollectionAttributes($retainAKIDs);
        }
        public function getVersionID()
        {
            return parent::getVersionID();
        }
        public function reindex($index = false, $actuallyDoReindex = true)
        {
            return parent::reindex($index, $actuallyDoReindex);
        }
        public function clearAttribute($ak)
        {
            return parent::clearAttribute($ak);
        }
        public function getAttributeValueObject($ak, $createIfNotFound = false)
        {
            return parent::getAttributeValueObject($ak, $createIfNotFound);
        }
        public function getSetCollectionAttributes()
        {
            return parent::getSetCollectionAttributes();
        }
        public function addAttribute($ak, $value)
        {
            return parent::addAttribute($ak, $value);
        }
        public function setAttribute($ak, $value)
        {
            return parent::setAttribute($ak, $value);
        }
        /**
         * @param string $arHandle
         *
         * @return Area
         */
        public function getArea($arHandle)
        {
            return parent::getArea($arHandle);
        }
        public function hasAliasedContent()
        {
            return parent::hasAliasedContent();
        }
        public function getCollectionDateLastModified()
        {
            return parent::getCollectionDateLastModified();
        }
        public function getCollectionDateAdded()
        {
            return parent::getCollectionDateAdded();
        }
        /**
         * Retrieves all custom style rules that should be inserted into the header on a page, whether they are defined in areas
         * or blocks.
         */
        public function outputCustomStyleHeaderItems($return = false)
        {
            return parent::outputCustomStyleHeaderItems($return);
        }
        public function getAreaCustomStyle($area, $force = false)
        {
            return parent::getAreaCustomStyle($area, $force);
        }
        public function resetAreaCustomStyle($area)
        {
            return parent::resetAreaCustomStyle($area);
        }
        public function setCustomStyleSet($area, $set)
        {
            return parent::setCustomStyleSet($area, $set);
        }
        public function relateVersionEdits($oc)
        {
            return parent::relateVersionEdits($oc);
        }
        public function rescanDisplayOrder($arHandle)
        {
            return parent::rescanDisplayOrder($arHandle);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        public function getGlobalBlocks()
        {
            return parent::getGlobalBlocks();
        }
        /**
         * List the blocks in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlocks($arHandle = false)
        {
            return parent::getBlocks($arHandle);
        }
        /**
         * List the block IDs in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlockIDs($arHandle = false)
        {
            return parent::getBlockIDs($arHandle);
        }
        public function getCollectionAreaDisplayOrder($arHandle, $ignoreVersions = false)
        {
            return parent::getCollectionAreaDisplayOrder($arHandle, $ignoreVersions);
        }
        public function addFeature(Concrete\Core\Feature\Feature $fe)
        {
            return parent::addFeature($fe);
        }
        public function markModified()
        {
            return parent::markModified();
        }
        public function duplicateCollection()
        {
            return parent::duplicateCollection();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class PageCache extends \Concrete\Core\Cache\Page\PageCache
    {
        public function deliver(Concrete\Core\Cache\Page\PageCacheRecord $record)
        {
            return parent::deliver($record);
        }
        public static function getLibrary()
        {
            return Concrete\Core\Cache\Page\PageCache::getLibrary();
        }
        /**
         * Note: can't use the User object directly because it might query the database.
         * Also can't use the Session wrapper because it starts session which triggers
         * before package autoloaders and so certain access entities stored in session
         * will break.
         */
        public function shouldCheckCache(Concrete\Core\Http\Request $req)
        {
            return parent::shouldCheckCache($req);
        }
        public function outputCacheHeaders(Concrete\Core\Page\Page $c)
        {
            return parent::outputCacheHeaders($c);
        }
        public function getCacheHeaders(Concrete\Core\Page\Page $c)
        {
            return parent::getCacheHeaders($c);
        }
        public function shouldAddToCache(Concrete\Core\Page\View\PageView $v)
        {
            return parent::shouldAddToCache($v);
        }
        public function getCacheKey($mixed)
        {
            return parent::getCacheKey($mixed);
        }
    }

    class PageController extends \Concrete\Core\Page\Controller\PageController
    {
        public function supportsPageCache()
        {
            return parent::supportsPageCache();
        }
        /**
         * Given either a path or a Page object, this is a shortcut to
         * 1. Grab the controller of THAT page.
         * 2. Grab the view of THAT controller
         * 3. Render that view.
         * 4. Exit – so we immediately stop all other output in the controller that
         * called render().
         *
         * @param @string|\Concrete\Core\Page\Page $var
         */
        public function replace($var)
        {
            return parent::replace($var);
        }
        public function getSets()
        {
            return parent::getSets();
        }
        /**
         * Given a path to a single page, this command uses the CURRENT controller and renders
         * the contents of the single page within this request. The current controller is not
         * replaced, and has already fired (since it is meant to be called from within a view() or
         * similar method).
         *
         * @param @string
         */
        public function render($path, $pkgHandle = null)
        {
            return parent::render($path, $pkgHandle);
        }
        public function getPageObject()
        {
            return parent::getPageObject();
        }
        public function flash($key, $value)
        {
            return parent::flash($key, $value);
        }
        public function getTheme()
        {
            return parent::getTheme();
        }
        public function getRequestAction()
        {
            return parent::getRequestAction();
        }
        public function getRequestActionParameters()
        {
            return parent::getRequestActionParameters();
        }
        public function getControllerActionPath()
        {
            return parent::getControllerActionPath();
        }
        public function setupRequestActionAndParameters(Concrete\Core\Http\Request $request)
        {
            return parent::setupRequestActionAndParameters($request);
        }
        public function isValidControllerTask($action, $parameters = array())
        {
            return parent::isValidControllerTask($action, $parameters);
        }
        /**
         * @access private
         *
         * @param Block $b
         * @param BlockController $controller
         */
        public function setPassThruBlockController(Concrete\Core\Block\Block $b, Concrete\Core\Block\BlockController $controller)
        {
            return parent::setPassThruBlockController($b, $controller);
        }
        public function getPassThruBlockController(Concrete\Core\Block\Block $b)
        {
            return parent::getPassThruBlockController($b);
        }
        public function validateRequest()
        {
            return parent::validateRequest();
        }
        public function setViewObject(Concrete\Core\View\AbstractView $view)
        {
            return parent::setViewObject($view);
        }
        public function setTheme($mixed)
        {
            return parent::setTheme($mixed);
        }
        public function setThemeViewTemplate($template)
        {
            return parent::setThemeViewTemplate($template);
        }
        public function getThemeViewTemplate()
        {
            return parent::getThemeViewTemplate();
        }
        public function getViewObject()
        {
            return parent::getViewObject();
        }
        public function action()
        {
            return parent::action();
        }
        public function requireAsset()
        {
            return parent::requireAsset();
        }
        /**
         * Adds an item to the view's header. This item will then be automatically printed out before the <body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addHeaderItem($item)
        {
            return parent::addHeaderItem($item);
        }
        /**
         * Adds an item to the view's footer. This item will then be automatically printed out before the </body> section of the page
         *
         * @param string $item
         * @return void
         */
        public function addFooterItem($item)
        {
            return parent::addFooterItem($item);
        }
        public function set($key, $val)
        {
            return parent::set($key, $val);
        }
        public function shouldRunControllerTask()
        {
            return parent::shouldRunControllerTask();
        }
        public function getHelperObjects()
        {
            return parent::getHelperObjects();
        }
        public function get($key = null, $defaultValue = null)
        {
            return parent::get($key, $defaultValue);
        }
        public function getTask()
        {
            return parent::getTask();
        }
        public function getAction()
        {
            return parent::getAction();
        }
        public function getParameters()
        {
            return parent::getParameters();
        }
        public function on_start()
        {
            return parent::on_start();
        }
        public function on_before_render()
        {
            return parent::on_before_render();
        }
        /**
         * @deprecated
         */
        public function isPost()
        {
            return parent::isPost();
        }
        public function post($key = null, $defaultValue = null)
        {
            return parent::post($key, $defaultValue);
        }
        public function redirect()
        {
            return parent::redirect();
        }
        public function runTask($action, $parameters)
        {
            return parent::runTask($action, $parameters);
        }
        public function runAction($action, $parameters = array())
        {
            return parent::runAction($action, $parameters);
        }
        public function request($key = null)
        {
            return parent::request($key);
        }
        /**
         * Set the application object
         *
         * @param \Concrete\Core\Application\Application $application
         */
        public function setApplication(Concrete\Core\Application\Application $application)
        {
            return parent::setApplication($application);
        }
    }

    class PageEditResponse extends \Concrete\Core\Page\EditResponse
    {
        public function setPage(Concrete\Core\Page\Page $page)
        {
            return parent::setPage($page);
        }
        public function setPages($pages)
        {
            return parent::setPages($pages);
        }
        public function getJSONObject()
        {
            return parent::getJSONObject();
        }
        public function setRedirectURL($url)
        {
            return parent::setRedirectURL($url);
        }
        public function getRedirectURL()
        {
            return parent::getRedirectURL();
        }
        public function setError($error)
        {
            return parent::setError($error);
        }
        public function setMessage($message)
        {
            return parent::setMessage($message);
        }
        public function getMessage()
        {
            return parent::getMessage();
        }
        public function setTitle($title)
        {
            return parent::setTitle($title);
        }
        public function getTitle()
        {
            return parent::getTitle();
        }
        public function getJSON()
        {
            return parent::getJSON();
        }
        public function setAdditionalDataAttribute($key, $value)
        {
            return parent::setAdditionalDataAttribute($key, $value);
        }
        public function getBaseJSONObject()
        {
            return parent::getBaseJSONObject();
        }
        public function outputJSON()
        {
            return parent::outputJSON();
        }
    }

    /**
     * An object that allows a filtered list of pages to be returned.
     */
    class PageList extends \Concrete\Core\Page\PageList
    {
        protected function getAttributeKeyClassName()
        {
            return parent::getAttributeKeyClassName();
        }
        public function setPermissionsChecker(Closure $checker)
        {
            return parent::setPermissionsChecker($checker);
        }
        public function ignorePermissions()
        {
            return parent::ignorePermissions();
        }
        public function includeAliases()
        {
            return parent::includeAliases();
        }
        public function includeInactivePages()
        {
            return parent::includeInactivePages();
        }
        public function includeSystemPages()
        {
            return parent::includeSystemPages();
        }
        public function isFulltextSearch()
        {
            return parent::isFulltextSearch();
        }
        public function setPageVersionToRetrieve($pageVersionToRetrieve)
        {
            return parent::setPageVersionToRetrieve($pageVersionToRetrieve);
        }
        public function createQuery()
        {
            return parent::createQuery();
        }
        public function finalizeQuery(Doctrine\DBAL\Query\QueryBuilder $query)
        {
            return parent::finalizeQuery($query);
        }
        public function getTotalResults()
        {
            return parent::getTotalResults();
        }
        protected function createPaginationObject()
        {
            return parent::createPaginationObject();
        }
        /**
         * @param $queryRow
         *
         * @return \Concrete\Core\File\File
         */
        public function getResult($queryRow)
        {
            return parent::getResult($queryRow);
        }
        public function checkPermissions($mixed)
        {
            return parent::checkPermissions($mixed);
        }
        /**
         * Filters by type of collection (using the handle field).
         *
         * @param mixed $ptHandle
         */
        public function filterByPageTypeHandle($ptHandle)
        {
            return parent::filterByPageTypeHandle($ptHandle);
        }
        /**
         * Filters by page template.
         *
         * @param mixed $ptHandle
         */
        public function filterByPageTemplate(Concrete\Core\Page\Template $template)
        {
            return parent::filterByPageTemplate($template);
        }
        /**
         * Filters by date added.
         *
         * @param string $date
         */
        public function filterByDateAdded($date, $comparison = "=")
        {
            return parent::filterByDateAdded($date, $comparison);
        }
        /**
         * Filter by number of children.
         *
         * @param $number
         * @param string $comparison
         */
        public function filterByNumberOfChildren($number, $comparison = ">")
        {
            return parent::filterByNumberOfChildren($number, $comparison);
        }
        /**
         * Filter by last modified date.
         *
         * @param $date
         * @param string $comparison
         */
        public function filterByDateLastModified($date, $comparison = "=")
        {
            return parent::filterByDateLastModified($date, $comparison);
        }
        /**
         * Filters by public date.
         *
         * @param string $date
         */
        public function filterByPublicDate($date, $comparison = "=")
        {
            return parent::filterByPublicDate($date, $comparison);
        }
        /**
         * Displays only those pages that have style customizations.
         */
        public function filterByPagesWithCustomStyles()
        {
            return parent::filterByPagesWithCustomStyles();
        }
        /**
         * Filters by user ID).
         *
         * @param mixed $uID
         */
        public function filterByUserID($uID)
        {
            return parent::filterByUserID($uID);
        }
        /**
         * Filters by page type ID.
         *
         * @param array | integer $cParentID
         */
        public function filterByPageTypeID($ptID)
        {
            return parent::filterByPageTypeID($ptID);
        }
        /**
         * Filters by parent ID.
         *
         * @param array | integer $cParentID
         */
        public function filterByParentID($cParentID)
        {
            return parent::filterByParentID($cParentID);
        }
        /**
         * Filters a list by page name.
         *
         * @param $name
         * @param bool $exact
         */
        public function filterByName($name, $exact = false)
        {
            return parent::filterByName($name, $exact);
        }
        /**
         * Filter a list by page path.
         *
         * @param $path
         * @param bool $includeAllChildren
         */
        public function filterByPath($path, $includeAllChildren = true)
        {
            return parent::filterByPath($path, $includeAllChildren);
        }
        /**
         * Filters keyword fields by keywords (including name, description, content, and attributes.
         *
         * @param $keywords
         */
        public function filterByKeywords($keywords)
        {
            return parent::filterByKeywords($keywords);
        }
        public function filterByFulltextKeywords($keywords)
        {
            return parent::filterByFulltextKeywords($keywords);
        }
        /**
         * Filters by topic. Doesn't look at specific attributes –instead, actually joins to the topics table.
         */
        public function filterByTopic($topic)
        {
            return parent::filterByTopic($topic);
        }
        /**
         * Sorts this list by display order.
         */
        public function sortByDisplayOrder()
        {
            return parent::sortByDisplayOrder();
        }
        /**
         * Sorts this list by display order descending.
         */
        public function sortByDisplayOrderDescending()
        {
            return parent::sortByDisplayOrderDescending();
        }
        /**
         * Sorts by ID in ascending order.
         */
        public function sortByCollectionIDAscending()
        {
            return parent::sortByCollectionIDAscending();
        }
        /**
         * Sorts this list by public date ascending order.
         */
        public function sortByPublicDate()
        {
            return parent::sortByPublicDate();
        }
        /**
         * Sorts by name in ascending order.
         */
        public function sortByName()
        {
            return parent::sortByName();
        }
        /**
         * Sorts by name in descending order.
         */
        public function sortByNameDescending()
        {
            return parent::sortByNameDescending();
        }
        /**
         * Sorts this list by public date descending order.
         */
        public function sortByPublicDateDescending()
        {
            return parent::sortByPublicDateDescending();
        }
        /**
         * Sorts by fulltext relevance (requires that the query be fulltext-based.
         */
        public function sortByRelevance()
        {
            return parent::sortByRelevance();
        }
        /**
         * @deprecated
         */
        public function filterByCollectionTypeHandle($ctHandle)
        {
            return parent::filterByCollectionTypeHandle($ctHandle);
        }
        /**
         * @deprecated
         */
        public function filterByCollectionTypeID($ctID)
        {
            return parent::filterByCollectionTypeID($ctID);
        }
        /**
         * This does nothing.
         *
         * @deprecated
         */
        public function ignoreAliases()
        {
            return parent::ignoreAliases();
        }
        /**
         * @deprecated
         */
        public function displayUnapprovedPages()
        {
            return parent::displayUnapprovedPages();
        }
        /**
         * Filters by a attribute.
         */
        public function filterByAttribute($handle, $value, $comparison = "=")
        {
            return parent::filterByAttribute($handle, $value, $comparison);
        }
        /**
         * @param StickyRequest $request
         */
        public function setupAutomaticSorting(Concrete\Core\Search\StickyRequest $request = null)
        {
            return parent::setupAutomaticSorting($request);
        }
        public function getQueryObject()
        {
            return parent::getQueryObject();
        }
        public function deliverQueryObject()
        {
            return parent::deliverQueryObject();
        }
        public function executeGetResults()
        {
            return parent::executeGetResults();
        }
        public function debugStart()
        {
            return parent::debugStart();
        }
        public function debugStop()
        {
            return parent::debugStop();
        }
        protected function executeSortBy($column, $direction = "asc")
        {
            return parent::executeSortBy($column, $direction);
        }
        protected function executeSanitizedSortBy($column, $direction = "asc")
        {
            return parent::executeSanitizedSortBy($column, $direction);
        }
        /**
         * @deprecated
         */
        public function filter($field, $value, $comparison = "=")
        {
            return parent::filter($field, $value, $comparison);
        }
        public function debug()
        {
            return parent::debug();
        }
        public function isDebugged()
        {
            return parent::isDebugged();
        }
        public function sortBy($field, $direction = "asc")
        {
            return parent::sortBy($field, $direction);
        }
        public function sanitizedSortBy($field, $direction = "asc")
        {
            return parent::sanitizedSortBy($field, $direction);
        }
        /** Returns a full array of results. */
        public function getResults()
        {
            return parent::getResults();
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function isActiveSortColumn($field)
        {
            return parent::isActiveSortColumn($field);
        }
        public function disableAutomaticSorting()
        {
            return parent::disableAutomaticSorting();
        }
        public function getSortClassName($column)
        {
            return parent::getSortClassName($column);
        }
        public function getSortURL($column, $dir = "asc", $url = false)
        {
            return parent::getSortURL($column, $dir, $url);
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function getQuerySortColumnParameter()
        {
            return parent::getQuerySortColumnParameter();
        }
        public function getQueryPaginationPageParameter()
        {
            return parent::getQueryPaginationPageParameter();
        }
        public function getQuerySortDirectionParameter()
        {
            return parent::getQuerySortDirectionParameter();
        }
        public function setItemsPerPage($itemsPerPage)
        {
            return parent::setItemsPerPage($itemsPerPage);
        }
        /**
         * @return \Concrete\Core\Search\Pagination\Pagination|\Concrete\Core\Search\Pagination\PermissionablePagination
         */
        public function getPagination()
        {
            return parent::getPagination();
        }
        /**
         * @deprecated
         */
        public function get()
        {
            return parent::get();
        }
    }

    /**
     * @Entity
     * @Table(name="PageTemplates")
     */
    class PageTemplate extends \Concrete\Core\Page\Template
    {
        public static function exportList($xml)
        {
            return Concrete\Core\Page\Template::exportList($xml);
        }
        public function export($node)
        {
            return parent::export($node);
        }
        public function getPageTemplateID()
        {
            return parent::getPageTemplateID();
        }
        public function getPageTemplateName()
        {
            return parent::getPageTemplateName();
        }
        public function getPageTemplateHandle()
        {
            return parent::getPageTemplateHandle();
        }
        public function isPageTemplateInternal()
        {
            return parent::isPageTemplateInternal();
        }
        public function getPageTemplateIcon()
        {
            return parent::getPageTemplateIcon();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /** Returns the display name for this page template (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *   Escape the result in html format (if $format is 'html').
         *   If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getPageTemplateDisplayName($format = "html")
        {
            return parent::getPageTemplateDisplayName($format);
        }
        public static function getByHandle($pTemplateHandle)
        {
            return Concrete\Core\Page\Template::getByHandle($pTemplateHandle);
        }
        public static function getByID($pTemplateID)
        {
            return Concrete\Core\Page\Template::getByID($pTemplateID);
        }
        public function delete()
        {
            return parent::delete();
        }
        protected static function sort($list)
        {
            return Concrete\Core\Page\Template::sort($list);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Page\Template::getListByPackage($pkg);
        }
        public static function getList($includeInternal = false)
        {
            return Concrete\Core\Page\Template::getList($includeInternal);
        }
        public static function add($pTemplateHandle, $pTemplateName, $pTemplateIcon = FILENAME_PAGE_TEMPLATE_DEFAULT_ICON, $pkg = null, $pTemplateIsInternal = false)
        {
            return Concrete\Core\Page\Template::add($pTemplateHandle, $pTemplateName, $pTemplateIcon, $pkg, $pTemplateIsInternal);
        }
        public function update($pTemplateHandle, $pTemplateName, $pTemplateIcon = FILENAME_PAGE_TEMPLATE_DEFAULT_ICON)
        {
            return parent::update($pTemplateHandle, $pTemplateName, $pTemplateIcon);
        }
        public function getIcons()
        {
            return parent::getIcons();
        }
        public function getPageTemplateIconImage()
        {
            return parent::getPageTemplateIconImage();
        }
    }

    /**
     * A page's theme is a pointer to a directory containing templates, CSS files and optionally PHP includes, images and JavaScript files.
     * Themes inherit down the tree when a page is added, but can also be set at the site-wide level (thereby overriding any previous choices.).
     *
     * @package Pages and Collections
     * @subpackages Themes
     */
    class PageTheme extends \Concrete\Core\Page\Theme\Theme
    {
        public static function getGlobalList()
        {
            return Concrete\Core\Page\Theme\Theme::getGlobalList();
        }
        public static function getLocalList()
        {
            return Concrete\Core\Page\Theme\Theme::getLocalList();
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Page\Theme\Theme::getListByPackage($pkg);
        }
        public static function getList($where = null)
        {
            return Concrete\Core\Page\Theme\Theme::getList($where);
        }
        public static function getInstalledHandles()
        {
            return Concrete\Core\Page\Theme\Theme::getInstalledHandles();
        }
        public function providesAsset($assetType, $assetHandle = null)
        {
            return parent::providesAsset($assetType, $assetHandle);
        }
        public function requireAsset()
        {
            return parent::requireAsset();
        }
        public static function getAvailableThemes($filterInstalled = true)
        {
            return Concrete\Core\Page\Theme\Theme::getAvailableThemes($filterInstalled);
        }
        public static function getByFileHandle($handle, $dir = DIR_FILES_THEMES, $pkgHandle = "")
        {
            return Concrete\Core\Page\Theme\Theme::getByFileHandle($handle, $dir, $pkgHandle);
        }
        /**
         * Checks the theme for a styles.xml file (which is how customizations happen.).
         *
         * @return bool
         */
        public function isThemeCustomizable()
        {
            return parent::isThemeCustomizable();
        }
        /**
         * Gets the style list object for this theme.
         *
         * @return \Concrete\Core\StyleCustomizer\StyleList
         */
        public function getThemeCustomizableStyleList()
        {
            return parent::getThemeCustomizableStyleList();
        }
        /**
         * Gets a preset for this theme by handle.
         */
        public function getThemeCustomizablePreset($handle)
        {
            return parent::getThemeCustomizablePreset($handle);
        }
        /**
         * Gets all presets available to this theme.
         */
        public function getThemeCustomizableStylePresets()
        {
            return parent::getThemeCustomizableStylePresets();
        }
        public function enablePreviewRequest()
        {
            return parent::enablePreviewRequest();
        }
        public function resetThemeCustomStyles()
        {
            return parent::resetThemeCustomStyles();
        }
        public function isThemePreviewRequest()
        {
            return parent::isThemePreviewRequest();
        }
        public function getThemeCustomizableStyleSheets()
        {
            return parent::getThemeCustomizableStyleSheets();
        }
        public function getStylesheetObject($stylesheet)
        {
            return parent::getStylesheetObject($stylesheet);
        }
        /**
         * Looks into the current CSS directory and returns a fully compiled stylesheet
         * when passed a LESS stylesheet. Also serves up custom value list values for the stylesheet if they exist.
         *
         * @param string $stylesheet The LESS stylesheet to compile
         *
         * @return string The path to the stylesheet.
         */
        public function getStylesheet($stylesheet)
        {
            return parent::getStylesheet($stylesheet);
        }
        /**
         * Returns a Custom Style Object for the theme if one exists.
         */
        public function getThemeCustomStyleObject()
        {
            return parent::getThemeCustomStyleObject();
        }
        /**
         * Returns the value list of the custom style object if one exists.
         * @return ValueList
         */
        public function getThemeCustomStyleObjectValues()
        {
            return parent::getThemeCustomStyleObjectValues();
        }
        public function setCustomStyleObject(Concrete\Core\StyleCustomizer\Style\ValueList $valueList, $selectedPreset = false, $customCssRecord = false)
        {
            return parent::setCustomStyleObject($valueList, $selectedPreset, $customCssRecord);
        }
        /**
         * @param string $pThemeHandle
         *
         * @return PageTheme
         */
        public static function getByHandle($pThemeHandle)
        {
            return Concrete\Core\Page\Theme\Theme::getByHandle($pThemeHandle);
        }
        /**
         * @param int $ptID
         *
         * @return PageTheme
         */
        public static function getByID($pThemeID)
        {
            return Concrete\Core\Page\Theme\Theme::getByID($pThemeID);
        }
        /**
         * @param string $where
         * @param array  $args
         *
         * @return \Concrete\Core\Page\Theme\Theme|null
         */
        protected static function populateThemeQuery($where, $args)
        {
            return Concrete\Core\Page\Theme\Theme::populateThemeQuery($where, $args);
        }
        public static function add($pThemeHandle, $pkg = null)
        {
            return Concrete\Core\Page\Theme\Theme::add($pThemeHandle, $pkg);
        }
        public function getFilesInTheme()
        {
            return parent::getFilesInTheme();
        }
        public function export($node)
        {
            return parent::export($node);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Page\Theme\Theme::exportList($xml);
        }
        protected static function install($dir, $pThemeHandle, $pkgID)
        {
            return Concrete\Core\Page\Theme\Theme::install($dir, $pThemeHandle, $pkgID);
        }
        public function updateThemeCustomClass()
        {
            return parent::updateThemeCustomClass();
        }
        public function getThemeID()
        {
            return parent::getThemeID();
        }
        public function getThemeName()
        {
            return parent::getThemeName();
        }
        /** Returns the display name for this theme (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *                       Escape the result in html format (if $format is 'html').
         *                       If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getThemeDisplayName($format = "html")
        {
            return parent::getThemeDisplayName($format);
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Returns whether a theme has a custom class.
         */
        public function hasCustomClass()
        {
            return parent::hasCustomClass();
        }
        public function getThemeHandle()
        {
            return parent::getThemeHandle();
        }
        public function getThemeDescription()
        {
            return parent::getThemeDescription();
        }
        public function getThemeDisplayDescription($format = "html")
        {
            return parent::getThemeDisplayDescription($format);
        }
        public function getThemeDirectory()
        {
            return parent::getThemeDirectory();
        }
        public function getThemeURL()
        {
            return parent::getThemeURL();
        }
        public function getThemeEditorCSS()
        {
            return parent::getThemeEditorCSS();
        }
        public function setThemeURL($pThemeURL)
        {
            return parent::setThemeURL($pThemeURL);
        }
        public function setThemeDirectory($pThemeDirectory)
        {
            return parent::setThemeDirectory($pThemeDirectory);
        }
        public function setThemeHandle($pThemeHandle)
        {
            return parent::setThemeHandle($pThemeHandle);
        }
        public function setStylesheetCachePath($path)
        {
            return parent::setStylesheetCachePath($path);
        }
        public function setStylesheetCacheRelativePath($path)
        {
            return parent::setStylesheetCacheRelativePath($path);
        }
        public function getStylesheetCachePath()
        {
            return parent::getStylesheetCachePath();
        }
        public function getStylesheetCacheRelativePath()
        {
            return parent::getStylesheetCacheRelativePath();
        }
        public function isUninstallable()
        {
            return parent::isUninstallable();
        }
        public function getThemeThumbnail()
        {
            return parent::getThemeThumbnail();
        }
        public function applyToSite()
        {
            return parent::applyToSite();
        }
        /**
         * @return static
         */
        public static function getSiteTheme()
        {
            return Concrete\Core\Page\Theme\Theme::getSiteTheme();
        }
        public function uninstall()
        {
            return parent::uninstall();
        }
        public function registerAssets()
        {
            return parent::registerAssets();
        }
        public function supportsGridFramework()
        {
            return parent::supportsGridFramework();
        }
        /**
         * @return GridFramework|null
         */
        public function getThemeGridFrameworkObject()
        {
            return parent::getThemeGridFrameworkObject();
        }
        public function getThemeBlockClasses()
        {
            return parent::getThemeBlockClasses();
        }
        public function getThemeAreaClasses()
        {
            return parent::getThemeAreaClasses();
        }
        public function getThemeEditorClasses()
        {
            return parent::getThemeEditorClasses();
        }
        public function getThemeDefaultBlockTemplates()
        {
            return parent::getThemeDefaultBlockTemplates();
        }
        public function getThemeResponsiveImageMap()
        {
            return parent::getThemeResponsiveImageMap();
        }
        public function getThemeGatheringGridItemMargin()
        {
            return parent::getThemeGatheringGridItemMargin();
        }
        public function getThemeGatheringGridItemWidth()
        {
            return parent::getThemeGatheringGridItemWidth();
        }
        public function getThemeGatheringGridItemHeight()
        {
            return parent::getThemeGatheringGridItemHeight();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class PageType extends \Concrete\Core\Page\Type\Type
    {
        public function getPageTypeID()
        {
            return parent::getPageTypeID();
        }
        public function getPageTypeName()
        {
            return parent::getPageTypeName();
        }
        public function getPageTypeDisplayName($format = "html")
        {
            return parent::getPageTypeDisplayName($format);
        }
        public function getPageTypeHandle()
        {
            return parent::getPageTypeHandle();
        }
        public function getPageTypePublishTargetTypeID()
        {
            return parent::getPageTypePublishTargetTypeID();
        }
        public function getPageTypePublishTargetObject()
        {
            return parent::getPageTypePublishTargetObject();
        }
        public function getPageTypeAllowedPageTemplates()
        {
            return parent::getPageTypeAllowedPageTemplates();
        }
        public function getPageTypeDefaultPageTemplateID()
        {
            return parent::getPageTypeDefaultPageTemplateID();
        }
        public function getPageTypeDefaultPageTemplateObject()
        {
            return parent::getPageTypeDefaultPageTemplateObject();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function isPageTypeFrequentlyAdded()
        {
            return parent::isPageTypeFrequentlyAdded();
        }
        public function getPageTypeDisplayOrder()
        {
            return parent::getPageTypeDisplayOrder();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function isPageTypeInternal()
        {
            return parent::isPageTypeInternal();
        }
        public function doesPageTypeLaunchInComposer()
        {
            return parent::doesPageTypeLaunchInComposer();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        protected function stripEmptyPageTypeComposerControls(Concrete\Core\Page\Page $c)
        {
            return parent::stripEmptyPageTypeComposerControls($c);
        }
        public function publish(Concrete\Core\Page\Page $c)
        {
            return parent::publish($c);
        }
        public function savePageTypeComposerForm(Concrete\Core\Page\Page $c)
        {
            return parent::savePageTypeComposerForm($c);
        }
        public function getPageTypeSelectedPageTemplateObjects()
        {
            return parent::getPageTypeSelectedPageTemplateObjects();
        }
        public static function getByDefaultsPage(Concrete\Core\Page\Page $c)
        {
            return Concrete\Core\Page\Type\Type::getByDefaultsPage($c);
        }
        public function getPageTypePageTemplateDefaultPageObject(Concrete\Core\Page\Template $template = null)
        {
            return parent::getPageTypePageTemplateDefaultPageObject($template);
        }
        public function getPageTypePageTemplateObjects()
        {
            return parent::getPageTypePageTemplateObjects();
        }
        public static function importTargets($node)
        {
            return Concrete\Core\Page\Type\Type::importTargets($node);
        }
        public static function import($node)
        {
            return Concrete\Core\Page\Type\Type::import($node);
        }
        public static function importContent($node)
        {
            return Concrete\Core\Page\Type\Type::importContent($node);
        }
        public function export($nxml)
        {
            return parent::export($nxml);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Page\Type\Type::exportList($xml);
        }
        public function rescanPageTypeComposerOutputControlObjects()
        {
            return parent::rescanPageTypeComposerOutputControlObjects();
        }
        public function getPageTypeUsageCount()
        {
            return parent::getPageTypeUsageCount();
        }
        public function duplicate($ptHandle, $ptName)
        {
            return parent::duplicate($ptHandle, $ptName);
        }
        /**
         * Add a page type.
         *
         * @param array $data {
         *     @var string          $handle              A string which can be used to identify the page type
         *     @var string          $name                A user friendly display name
         *     @var \PageTemplate   $defaultTemplate     The default template object
         *     @var string          $allowedTemplates    (A|C|X) A for all, C for selected only, X for non-selected only
         *     @var \PageTemplate[] $templates           Array or Iterator of selected templates, see `$allowedTemplates`
         *     @var bool            $internal            Is this an internal only page type? Default: `false`
         *     @var bool            $ptLaunchInComposer  Does this launch in composer? Default: `false`
         *     @var bool            $ptIsFrequentlyAdded Should this always be displayed in the pages panel? Default: `false`
         * }
         * @param bool|Package $pkg This should be false if the type is not tied to a package, or a package object
         *
         * @return static|mixed|null
         */
        public static function add($data, $pkg = false)
        {
            return Concrete\Core\Page\Type\Type::add($data, $pkg);
        }
        public function update($data)
        {
            return parent::update($data);
        }
        protected function rescanPageTypePageTemplateDefaultPages()
        {
            return parent::rescanPageTypePageTemplateDefaultPages();
        }
        public static function getList($includeInternal = false)
        {
            return Concrete\Core\Page\Type\Type::getList($includeInternal);
        }
        protected static function returnList($ptIDs)
        {
            return Concrete\Core\Page\Type\Type::returnList($ptIDs);
        }
        public static function getFrequentlyUsedList()
        {
            return Concrete\Core\Page\Type\Type::getFrequentlyUsedList();
        }
        public static function getInfrequentlyUsedList()
        {
            return Concrete\Core\Page\Type\Type::getInfrequentlyUsedList();
        }
        public static function getListByPackage(Concrete\Core\Package\Package $pkg)
        {
            return Concrete\Core\Page\Type\Type::getListByPackage($pkg);
        }
        public static function getListByDefaultPageTemplate($templateOrTemplateID)
        {
            return Concrete\Core\Page\Type\Type::getListByDefaultPageTemplate($templateOrTemplateID);
        }
        public static function getByID($ptID)
        {
            return Concrete\Core\Page\Type\Type::getByID($ptID);
        }
        public static function getByHandle($ptHandle)
        {
            return Concrete\Core\Page\Type\Type::getByHandle($ptHandle);
        }
        public function delete()
        {
            return parent::delete();
        }
        public function setConfiguredPageTypePublishTargetObject(Concrete\Core\Page\Type\PublishTarget\Configuration\Configuration $configuredTarget)
        {
            return parent::setConfiguredPageTypePublishTargetObject($configuredTarget);
        }
        public function rescanFormLayoutSetDisplayOrder()
        {
            return parent::rescanFormLayoutSetDisplayOrder();
        }
        public function addPageTypeComposerFormLayoutSet($ptComposerFormLayoutSetName, $ptComposerFormLayoutSetDescription)
        {
            return parent::addPageTypeComposerFormLayoutSet($ptComposerFormLayoutSetName, $ptComposerFormLayoutSetDescription);
        }
        /**
         * Returns true if pages of the current type are allowed beneath the passed parent page.
         *
         * @param \Concrete\Core\Page\Page $page
         */
        public function canPublishPageTypeBeneathPage(Concrete\Core\Page\Page $page)
        {
            return parent::canPublishPageTypeBeneathPage($page);
        }
        /**
         * @return \Concrete\Core\Page\Type\Validator\ValidatorInterface|null
         */
        public function getPageTypeValidatorObject()
        {
            return parent::getPageTypeValidatorObject();
        }
        public function createDraft(Concrete\Core\Page\Template $pt, $u = false)
        {
            return parent::createDraft($pt, $u);
        }
        public function renderComposerOutputForm($page = null, $targetPage = null)
        {
            return parent::renderComposerOutputForm($page, $targetPage);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class PermissionAccess extends \Concrete\Core\Permission\Access\Access
    {
        public function setPermissionKey($permissionKey)
        {
            return parent::setPermissionKey($permissionKey);
        }
        public function getPermissionObject()
        {
            return parent::getPermissionObject();
        }
        public function getPermissionObjectToCheck()
        {
            return parent::getPermissionObjectToCheck();
        }
        public function getPermissionAccessID()
        {
            return parent::getPermissionAccessID();
        }
        public function isPermissionAccessInUse()
        {
            return parent::isPermissionAccessInUse();
        }
        public function getPermissionAccessIDList()
        {
            return parent::getPermissionAccessIDList();
        }
        protected function deliverAccessListItems($q, $accessType, $filterEntities)
        {
            return parent::deliverAccessListItems($q, $accessType, $filterEntities);
        }
        public function validateAndFilterAccessEntities($accessEntities)
        {
            return parent::validateAndFilterAccessEntities($accessEntities);
        }
        public function validateAccessEntities($accessEntities)
        {
            return parent::validateAccessEntities($accessEntities);
        }
        public function validate()
        {
            return parent::validate();
        }
        public static function createByMerge($permissions)
        {
            return Concrete\Core\Permission\Access\Access::createByMerge($permissions);
        }
        public function getAccessListItems($accessType = Concrete\Core\Permission\Key\Key::ACCESS_TYPE_INCLUDE, $filterEntities = array())
        {
            return parent::getAccessListItems($accessType, $filterEntities);
        }
        protected function buildAssignmentFilterString($accessType, $filterEntities)
        {
            return parent::buildAssignmentFilterString($accessType, $filterEntities);
        }
        public function clearWorkflows()
        {
            return parent::clearWorkflows();
        }
        public function attachWorkflow(Concrete\Core\Workflow\Workflow $wf)
        {
            return parent::attachWorkflow($wf);
        }
        public function getWorkflows()
        {
            return parent::getWorkflows();
        }
        public function duplicate($newPA = false)
        {
            return parent::duplicate($newPA);
        }
        public function markAsInUse()
        {
            return parent::markAsInUse();
        }
        public function addListItem(Concrete\Core\Permission\Access\Entity\Entity $pae, $durationObject = false, $accessType = Concrete\Core\Permission\Key\Key::ACCESS_TYPE_INCLUDE)
        {
            return parent::addListItem($pae, $durationObject, $accessType);
        }
        public function removeListItem(Concrete\Core\Permission\Access\Entity\Entity $pe)
        {
            return parent::removeListItem($pe);
        }
        public function save($args = array())
        {
            return parent::save($args);
        }
        public static function create(Concrete\Core\Permission\Key\Key $pk)
        {
            return Concrete\Core\Permission\Access\Access::create($pk);
        }
        public static function getByID($paID, Concrete\Core\Permission\Key\Key $pk, $checkPA = true)
        {
            return Concrete\Core\Permission\Access\Access::getByID($paID, $pk, $checkPA);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class PermissionKey extends \Concrete\Core\Permission\Key\Key
    {
        public function getSupportedAccessTypes()
        {
            return parent::getSupportedAccessTypes();
        }
        /**
         * Returns whether a permission key can start a workflow.
         */
        public function canPermissionKeyTriggerWorkflow()
        {
            return parent::canPermissionKeyTriggerWorkflow();
        }
        /**
         * Returns whether a permission key has a custom class.
         */
        public function permissionKeyHasCustomClass()
        {
            return parent::permissionKeyHasCustomClass();
        }
        /**
         * Returns the name for this permission key.
         */
        public function getPermissionKeyName()
        {
            return parent::getPermissionKeyName();
        }
        /** Returns the display name for this permission key (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getPermissionKeyDisplayName($format = "html")
        {
            return parent::getPermissionKeyDisplayName($format);
        }
        /**
         * Returns the handle for this permission key.
         */
        public function getPermissionKeyHandle()
        {
            return parent::getPermissionKeyHandle();
        }
        /**
         * Returns the description for this permission key.
         */
        public function getPermissionKeyDescription()
        {
            return parent::getPermissionKeyDescription();
        }
        /** Returns the display description for this permission key (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display description won't be escaped.
         *
         * @return string
         */
        public function getPermissionKeyDisplayDescription($format = "html")
        {
            return parent::getPermissionKeyDisplayDescription($format);
        }
        /**
         * Returns the ID for this permission key.
         */
        public function getPermissionKeyID()
        {
            return parent::getPermissionKeyID();
        }
        public function getPermissionKeyCategoryID()
        {
            return parent::getPermissionKeyCategoryID();
        }
        public function getPermissionKeyCategoryHandle()
        {
            return parent::getPermissionKeyCategoryHandle();
        }
        public function setPermissionObject($object)
        {
            return parent::setPermissionObject($object);
        }
        public function getPermissionObjectToCheck()
        {
            return parent::getPermissionObjectToCheck();
        }
        public function getPermissionObject()
        {
            return parent::getPermissionObject();
        }
        public static function loadAll()
        {
            return Concrete\Core\Permission\Key\Key::loadAll();
        }
        protected static function load($key, $loadBy = "pkID")
        {
            return Concrete\Core\Permission\Key\Key::load($key, $loadBy);
        }
        public function hasCustomOptionsForm()
        {
            return parent::hasCustomOptionsForm();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Returns a list of all permissions of this category.
         */
        public static function getList($pkCategoryHandle, $filters = array())
        {
            return Concrete\Core\Permission\Key\Key::getList($pkCategoryHandle, $filters);
        }
        public function export($axml)
        {
            return parent::export($axml);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Permission\Key\Key::exportList($xml);
        }
        /**
         * Note, this queries both the pkgID found on the PermissionKeys table AND any permission keys of a special type
         * installed by that package, and any in categories by that package.
         */
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Permission\Key\Key::getListByPackage($pkg);
        }
        public static function import(SimpleXMLElement $pk)
        {
            return Concrete\Core\Permission\Key\Key::import($pk);
        }
        public static function getByID($pkID)
        {
            return Concrete\Core\Permission\Key\Key::getByID($pkID);
        }
        public static function getByHandle($pkHandle)
        {
            return Concrete\Core\Permission\Key\Key::getByHandle($pkHandle);
        }
        /**
         * Adds an permission key.
         */
        public static function add($pkCategoryHandle, $pkHandle, $pkName, $pkDescription, $pkCanTriggerWorkflow, $pkHasCustomClass, $pkg = false)
        {
            return Concrete\Core\Permission\Key\Key::add($pkCategoryHandle, $pkHandle, $pkName, $pkDescription, $pkCanTriggerWorkflow, $pkHasCustomClass, $pkg);
        }
        public function setPermissionKeyHasCustomClass($pkHasCustomClass)
        {
            return parent::setPermissionKeyHasCustomClass($pkHasCustomClass);
        }
        /**
         * Legacy support.
         * @access private
         */
        public function can()
        {
            return parent::can();
        }
        public function validate()
        {
            return parent::validate();
        }
        public function delete()
        {
            return parent::delete();
        }
        /**
         * A shortcut for grabbing the current assignment and passing into that object.
         */
        public function getAccessListItems()
        {
            return parent::getAccessListItems();
        }
        public function getPermissionAssignmentObject()
        {
            return parent::getPermissionAssignmentObject();
        }
        public function getPermissionAccessObject()
        {
            return parent::getPermissionAccessObject();
        }
        public function getPermissionAccessID()
        {
            return parent::getPermissionAccessID();
        }
        public function exportAccess($pxml)
        {
            return parent::exportAccess($pxml);
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Permission\Key\Key::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class PermissionKeyCategory extends \Concrete\Core\Permission\Category
    {
        public static function getByID($pkCategoryID)
        {
            return Concrete\Core\Permission\Category::getByID($pkCategoryID);
        }
        protected static function populateCategories()
        {
            return Concrete\Core\Permission\Category::populateCategories();
        }
        public static function getByHandle($pkCategoryHandle)
        {
            return Concrete\Core\Permission\Category::getByHandle($pkCategoryHandle);
        }
        public function handleExists($pkHandle)
        {
            return parent::handleExists($pkHandle);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Permission\Category::exportList($xml);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Permission\Category::getListByPackage($pkg);
        }
        public function getPermissionKeyClass()
        {
            return parent::getPermissionKeyClass();
        }
        public function getPermissionKeyByHandle($pkHandle)
        {
            return parent::getPermissionKeyByHandle($pkHandle);
        }
        public function getPermissionKeyByID($pkID)
        {
            return parent::getPermissionKeyByID($pkID);
        }
        public function getToolsURL($task = false)
        {
            return parent::getToolsURL($task);
        }
        public function getPermissionKeyCategoryID()
        {
            return parent::getPermissionKeyCategoryID();
        }
        public function getPermissionKeyCategoryHandle()
        {
            return parent::getPermissionKeyCategoryHandle();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function delete()
        {
            return parent::delete();
        }
        public function associateAccessEntityType(Concrete\Core\Permission\Access\Entity\Type $pt)
        {
            return parent::associateAccessEntityType($pt);
        }
        public function deassociateAccessEntityType(Concrete\Core\Permission\Access\Entity\Type $pt)
        {
            return parent::deassociateAccessEntityType($pt);
        }
        public function clearAccessEntityTypeCategories()
        {
            return parent::clearAccessEntityTypeCategories();
        }
        public static function getList()
        {
            return Concrete\Core\Permission\Category::getList();
        }
        public static function add($pkCategoryHandle, $pkg = false)
        {
            return Concrete\Core\Permission\Category::add($pkCategoryHandle, $pkg);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Permissions extends \Concrete\Core\Permission\Checker
    {
        /**
         * Checks to see if there is a fatal error with this particular permission call.
         */
        public function isError()
        {
            return parent::isError();
        }
        /**
         * Returns the error code if there is one
         */
        public function getError()
        {
            return parent::getError();
        }
        /**
         * Legacy
         * @private
         */
        public function getOriginalObject()
        {
            return parent::getOriginalObject();
        }
        public function getResponseObject()
        {
            return parent::getResponseObject();
        }
    }

    class Queue extends \Concrete\Core\Foundation\Queue\Queue
    {
        public static function get($name, $additionalConfig = array())
        {
            return Concrete\Core\Foundation\Queue\Queue::get($name, $additionalConfig);
        }
        public static function exists($name)
        {
            return Concrete\Core\Foundation\Queue\Queue::exists($name);
        }
    }

    class QueueableJob extends \Concrete\Core\Job\QueueableJob
    {
        public function getJobQueueBatchSize()
        {
            return parent::getJobQueueBatchSize();
        }
        public function run()
        {
            return parent::run();
        }
        public function getQueueObject()
        {
            return parent::getQueueObject();
        }
        public function reset()
        {
            return parent::reset();
        }
        public function markStarted()
        {
            return parent::markStarted();
        }
        public function markCompleted($code = 0, $message = false)
        {
            return parent::markCompleted($code, $message);
        }
        /**
         * Executejob for queueable jobs actually starts the queue, runs, and ends all in one function. This happens if we run a job in legacy mode.
         */
        public function executeJob()
        {
            return parent::executeJob();
        }
        public function getJobHandle()
        {
            return parent::getJobHandle();
        }
        public function getJobID()
        {
            return parent::getJobID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public function getJobLastStatusCode()
        {
            return parent::getJobLastStatusCode();
        }
        public function didFail()
        {
            return parent::didFail();
        }
        public function canUninstall()
        {
            return parent::canUninstall();
        }
        public function supportsQueue()
        {
            return parent::supportsQueue();
        }
        public static function jobClassLocations()
        {
            return Concrete\Core\Job\Job::jobClassLocations();
        }
        public function getJobDateLastRun()
        {
            return parent::getJobDateLastRun();
        }
        public function getJobStatus()
        {
            return parent::getJobStatus();
        }
        public function getJobLastStatusText()
        {
            return parent::getJobLastStatusText();
        }
        public static function authenticateRequest($auth)
        {
            return Concrete\Core\Job\Job::authenticateRequest($auth);
        }
        public static function generateAuth()
        {
            return Concrete\Core\Job\Job::generateAuth();
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Job\Job::exportList($xml);
        }
        /**
         * @param bool $scheduledOnly
         * @return Job[]
         */
        public static function getList($scheduledOnly = false)
        {
            return Concrete\Core\Job\Job::getList($scheduledOnly);
        }
        public static function getByID($jID = 0)
        {
            return Concrete\Core\Job\Job::getByID($jID);
        }
        public static function getByHandle($jHandle = "")
        {
            return Concrete\Core\Job\Job::getByHandle($jHandle);
        }
        public static function getJobObjByHandle($jHandle = "", $jobData = array())
        {
            return Concrete\Core\Job\Job::getJobObjByHandle($jHandle, $jobData);
        }
        protected static function getClassName($jHandle, $pkgHandle = null)
        {
            return Concrete\Core\Job\Job::getClassName($jHandle, $pkgHandle);
        }
        public static function getAvailableList($includeConcreteDirJobs = 1)
        {
            return Concrete\Core\Job\Job::getAvailableList($includeConcreteDirJobs);
        }
        public function setJobStatus($jStatus = "ENABLED")
        {
            return parent::setJobStatus($jStatus);
        }
        public static function installByHandle($jHandle = "")
        {
            return Concrete\Core\Job\Job::installByHandle($jHandle);
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Job\Job::getListByPackage($pkg);
        }
        public static function installByPackage($jHandle, $pkg)
        {
            return Concrete\Core\Job\Job::installByPackage($jHandle, $pkg);
        }
        public function install()
        {
            return parent::install();
        }
        public function uninstall()
        {
            return parent::uninstall();
        }
        /**
         * Removes Job log entries
         */
        public static function clearLog()
        {
            return Concrete\Core\Job\Job::clearLog();
        }
        public function isScheduledForNow()
        {
            return parent::isScheduledForNow();
        }
        public function setSchedule($scheduled, $interval, $value)
        {
            return parent::setSchedule($scheduled, $interval, $value);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Redirect extends \Concrete\Core\Routing\Redirect
    {
        /**
         * Actually sends a redirect
         */
        protected static function createRedirectResponse($url, $code, $headers)
        {
            return Concrete\Core\Routing\Redirect::createRedirectResponse($url, $code, $headers);
        }
        /**
         * Redirects to a concrete5 resource.
         */
        public static function to()
        {
            return Concrete\Core\Routing\Redirect::to();
        }
        /**
         * Redirect to a page
         */
        public static function page(Concrete\Core\Page\Page $c, $code = 302, $headers = array())
        {
            return Concrete\Core\Routing\Redirect::page($c, $code, $headers);
        }
        /**
         * Redirects to a URL.
         */
        public static function url($url, $code = 302, $headers = array())
        {
            return Concrete\Core\Routing\Redirect::url($url, $code, $headers);
        }
    }

    class RedirectResponse extends \Concrete\Core\Routing\RedirectResponse
    {
        public function setRequest(Concrete\Core\Http\Request $r)
        {
            return parent::setRequest($r);
        }
        public function send()
        {
            return parent::send();
        }
        /**
         * {@inheritdoc}
         */
        public static function create($url = "", $status = 302, $headers = array())
        {
            return Symfony\Component\HttpFoundation\RedirectResponse::create($url, $status, $headers);
        }
        /**
         * Returns the target URL.
         *
         * @return string target URL
         */
        public function getTargetUrl()
        {
            return parent::getTargetUrl();
        }
        /**
         * Sets the redirect target of this response.
         *
         * @param string $url The URL to redirect to
         *
         * @return RedirectResponse The current response.
         *
         * @throws \InvalidArgumentException
         */
        public function setTargetUrl($url)
        {
            return parent::setTargetUrl($url);
        }
        /**
         * Prepares the Response before it is sent to the client.
         *
         * This method tweaks the Response to ensure that it is
         * compliant with RFC 2616. Most of the changes are based on
         * the Request that is "associated" with this Response.
         *
         * @param Request $request A Request instance
         *
         * @return Response The current response.
         */
        public function prepare(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::prepare($request);
        }
        /**
         * Sends HTTP headers.
         *
         * @return Response
         */
        public function sendHeaders()
        {
            return parent::sendHeaders();
        }
        /**
         * Sends content for the current web response.
         *
         * @return Response
         */
        public function sendContent()
        {
            return parent::sendContent();
        }
        /**
         * Sets the response content.
         *
         * Valid types are strings, numbers, null, and objects that implement a __toString() method.
         *
         * @param mixed $content Content that can be cast to string
         *
         * @return Response
         *
         * @throws \UnexpectedValueException
         *
         * @api
         */
        public function setContent($content)
        {
            return parent::setContent($content);
        }
        /**
         * Gets the current response content.
         *
         * @return string Content
         *
         * @api
         */
        public function getContent()
        {
            return parent::getContent();
        }
        /**
         * Sets the HTTP protocol version (1.0 or 1.1).
         *
         * @param string $version The HTTP protocol version
         *
         * @return Response
         *
         * @api
         */
        public function setProtocolVersion($version)
        {
            return parent::setProtocolVersion($version);
        }
        /**
         * Gets the HTTP protocol version.
         *
         * @return string The HTTP protocol version
         *
         * @api
         */
        public function getProtocolVersion()
        {
            return parent::getProtocolVersion();
        }
        /**
         * Sets the response status code.
         *
         * @param int   $code HTTP status code
         * @param mixed $text HTTP status text
         *
         * If the status text is null it will be automatically populated for the known
         * status codes and left empty otherwise.
         *
         * @return Response
         *
         * @throws \InvalidArgumentException When the HTTP status code is not valid
         *
         * @api
         */
        public function setStatusCode($code, $text = null)
        {
            return parent::setStatusCode($code, $text);
        }
        /**
         * Retrieves the status code for the current web response.
         *
         * @return int Status code
         *
         * @api
         */
        public function getStatusCode()
        {
            return parent::getStatusCode();
        }
        /**
         * Sets the response charset.
         *
         * @param string $charset Character set
         *
         * @return Response
         *
         * @api
         */
        public function setCharset($charset)
        {
            return parent::setCharset($charset);
        }
        /**
         * Retrieves the response charset.
         *
         * @return string Character set
         *
         * @api
         */
        public function getCharset()
        {
            return parent::getCharset();
        }
        /**
         * Returns true if the response is worth caching under any circumstance.
         *
         * Responses marked "private" with an explicit Cache-Control directive are
         * considered uncacheable.
         *
         * Responses with neither a freshness lifetime (Expires, max-age) nor cache
         * validator (Last-Modified, ETag) are considered uncacheable.
         *
         * @return bool true if the response is worth caching, false otherwise
         *
         * @api
         */
        public function isCacheable()
        {
            return parent::isCacheable();
        }
        /**
         * Returns true if the response is "fresh".
         *
         * Fresh responses may be served from cache without any interaction with the
         * origin. A response is considered fresh when it includes a Cache-Control/max-age
         * indicator or Expires header and the calculated age is less than the freshness lifetime.
         *
         * @return bool true if the response is fresh, false otherwise
         *
         * @api
         */
        public function isFresh()
        {
            return parent::isFresh();
        }
        /**
         * Returns true if the response includes headers that can be used to validate
         * the response with the origin server using a conditional GET request.
         *
         * @return bool true if the response is validateable, false otherwise
         *
         * @api
         */
        public function isValidateable()
        {
            return parent::isValidateable();
        }
        /**
         * Marks the response as "private".
         *
         * It makes the response ineligible for serving other clients.
         *
         * @return Response
         *
         * @api
         */
        public function setPrivate()
        {
            return parent::setPrivate();
        }
        /**
         * Marks the response as "public".
         *
         * It makes the response eligible for serving other clients.
         *
         * @return Response
         *
         * @api
         */
        public function setPublic()
        {
            return parent::setPublic();
        }
        /**
         * Returns true if the response must be revalidated by caches.
         *
         * This method indicates that the response must not be served stale by a
         * cache in any circumstance without first revalidating with the origin.
         * When present, the TTL of the response should not be overridden to be
         * greater than the value provided by the origin.
         *
         * @return bool true if the response must be revalidated by a cache, false otherwise
         *
         * @api
         */
        public function mustRevalidate()
        {
            return parent::mustRevalidate();
        }
        /**
         * Returns the Date header as a DateTime instance.
         *
         * @return \DateTime A \DateTime instance
         *
         * @throws \RuntimeException When the header is not parseable
         *
         * @api
         */
        public function getDate()
        {
            return parent::getDate();
        }
        /**
         * Sets the Date header.
         *
         * @param \DateTime $date A \DateTime instance
         *
         * @return Response
         *
         * @api
         */
        public function setDate(DateTime $date)
        {
            return parent::setDate($date);
        }
        /**
         * Returns the age of the response.
         *
         * @return int The age of the response in seconds
         */
        public function getAge()
        {
            return parent::getAge();
        }
        /**
         * Marks the response stale by setting the Age header to be equal to the maximum age of the response.
         *
         * @return Response
         *
         * @api
         */
        public function expire()
        {
            return parent::expire();
        }
        /**
         * Returns the value of the Expires header as a DateTime instance.
         *
         * @return \DateTime|null A DateTime instance or null if the header does not exist
         *
         * @api
         */
        public function getExpires()
        {
            return parent::getExpires();
        }
        /**
         * Sets the Expires HTTP header with a DateTime instance.
         *
         * Passing null as value will remove the header.
         *
         * @param \DateTime|null $date A \DateTime instance or null to remove the header
         *
         * @return Response
         *
         * @api
         */
        public function setExpires(DateTime $date = null)
        {
            return parent::setExpires($date);
        }
        /**
         * Returns the number of seconds after the time specified in the response's Date
         * header when the response should no longer be considered fresh.
         *
         * First, it checks for a s-maxage directive, then a max-age directive, and then it falls
         * back on an expires header. It returns null when no maximum age can be established.
         *
         * @return int|null Number of seconds
         *
         * @api
         */
        public function getMaxAge()
        {
            return parent::getMaxAge();
        }
        /**
         * Sets the number of seconds after which the response should no longer be considered fresh.
         *
         * This methods sets the Cache-Control max-age directive.
         *
         * @param int $value Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setMaxAge($value)
        {
            return parent::setMaxAge($value);
        }
        /**
         * Sets the number of seconds after which the response should no longer be considered fresh by shared caches.
         *
         * This methods sets the Cache-Control s-maxage directive.
         *
         * @param int $value Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setSharedMaxAge($value)
        {
            return parent::setSharedMaxAge($value);
        }
        /**
         * Returns the response's time-to-live in seconds.
         *
         * It returns null when no freshness information is present in the response.
         *
         * When the responses TTL is <= 0, the response may not be served from cache without first
         * revalidating with the origin.
         *
         * @return int|null The TTL in seconds
         *
         * @api
         */
        public function getTtl()
        {
            return parent::getTtl();
        }
        /**
         * Sets the response's time-to-live for shared caches.
         *
         * This method adjusts the Cache-Control/s-maxage directive.
         *
         * @param int $seconds Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setTtl($seconds)
        {
            return parent::setTtl($seconds);
        }
        /**
         * Sets the response's time-to-live for private/client caches.
         *
         * This method adjusts the Cache-Control/max-age directive.
         *
         * @param int $seconds Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setClientTtl($seconds)
        {
            return parent::setClientTtl($seconds);
        }
        /**
         * Returns the Last-Modified HTTP header as a DateTime instance.
         *
         * @return \DateTime|null A DateTime instance or null if the header does not exist
         *
         * @throws \RuntimeException When the HTTP header is not parseable
         *
         * @api
         */
        public function getLastModified()
        {
            return parent::getLastModified();
        }
        /**
         * Sets the Last-Modified HTTP header with a DateTime instance.
         *
         * Passing null as value will remove the header.
         *
         * @param \DateTime|null $date A \DateTime instance or null to remove the header
         *
         * @return Response
         *
         * @api
         */
        public function setLastModified(DateTime $date = null)
        {
            return parent::setLastModified($date);
        }
        /**
         * Returns the literal value of the ETag HTTP header.
         *
         * @return string|null The ETag HTTP header or null if it does not exist
         *
         * @api
         */
        public function getEtag()
        {
            return parent::getEtag();
        }
        /**
         * Sets the ETag value.
         *
         * @param string|null $etag The ETag unique identifier or null to remove the header
         * @param bool        $weak Whether you want a weak ETag or not
         *
         * @return Response
         *
         * @api
         */
        public function setEtag($etag = null, $weak = false)
        {
            return parent::setEtag($etag, $weak);
        }
        /**
         * Sets the response's cache headers (validation and/or expiration).
         *
         * Available options are: etag, last_modified, max_age, s_maxage, private, and public.
         *
         * @param array $options An array of cache options
         *
         * @return Response
         *
         * @throws \InvalidArgumentException
         *
         * @api
         */
        public function setCache(array $options)
        {
            return parent::setCache($options);
        }
        /**
         * Modifies the response so that it conforms to the rules defined for a 304 status code.
         *
         * This sets the status, removes the body, and discards any headers
         * that MUST NOT be included in 304 responses.
         *
         * @return Response
         *
         * @see http://tools.ietf.org/html/rfc2616#section-10.3.5
         *
         * @api
         */
        public function setNotModified()
        {
            return parent::setNotModified();
        }
        /**
         * Returns true if the response includes a Vary header.
         *
         * @return bool true if the response includes a Vary header, false otherwise
         *
         * @api
         */
        public function hasVary()
        {
            return parent::hasVary();
        }
        /**
         * Returns an array of header names given in the Vary header.
         *
         * @return array An array of Vary names
         *
         * @api
         */
        public function getVary()
        {
            return parent::getVary();
        }
        /**
         * Sets the Vary header.
         *
         * @param string|array $headers
         * @param bool         $replace Whether to replace the actual value of not (true by default)
         *
         * @return Response
         *
         * @api
         */
        public function setVary($headers, $replace = true)
        {
            return parent::setVary($headers, $replace);
        }
        /**
         * Determines if the Response validators (ETag, Last-Modified) match
         * a conditional value specified in the Request.
         *
         * If the Response is not modified, it sets the status code to 304 and
         * removes the actual content by calling the setNotModified() method.
         *
         * @param Request $request A Request instance
         *
         * @return bool true if the Response validators match the Request, false otherwise
         *
         * @api
         */
        public function isNotModified(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::isNotModified($request);
        }
        /**
         * Is response invalid?
         *
         * @return bool
         *
         * @api
         */
        public function isInvalid()
        {
            return parent::isInvalid();
        }
        /**
         * Is response informative?
         *
         * @return bool
         *
         * @api
         */
        public function isInformational()
        {
            return parent::isInformational();
        }
        /**
         * Is response successful?
         *
         * @return bool
         *
         * @api
         */
        public function isSuccessful()
        {
            return parent::isSuccessful();
        }
        /**
         * Is the response a redirect?
         *
         * @return bool
         *
         * @api
         */
        public function isRedirection()
        {
            return parent::isRedirection();
        }
        /**
         * Is there a client error?
         *
         * @return bool
         *
         * @api
         */
        public function isClientError()
        {
            return parent::isClientError();
        }
        /**
         * Was there a server side error?
         *
         * @return bool
         *
         * @api
         */
        public function isServerError()
        {
            return parent::isServerError();
        }
        /**
         * Is the response OK?
         *
         * @return bool
         *
         * @api
         */
        public function isOk()
        {
            return parent::isOk();
        }
        /**
         * Is the response forbidden?
         *
         * @return bool
         *
         * @api
         */
        public function isForbidden()
        {
            return parent::isForbidden();
        }
        /**
         * Is the response a not found error?
         *
         * @return bool
         *
         * @api
         */
        public function isNotFound()
        {
            return parent::isNotFound();
        }
        /**
         * Is the response a redirect of some form?
         *
         * @param string $location
         *
         * @return bool
         *
         * @api
         */
        public function isRedirect($location = null)
        {
            return parent::isRedirect($location);
        }
        /**
         * Is the response empty?
         *
         * @return bool
         *
         * @api
         */
        public function isEmpty()
        {
            return parent::isEmpty();
        }
        /**
         * Cleans or flushes output buffers up to target level.
         *
         * Resulting level can be greater than target level if a non-removable buffer has been encountered.
         *
         * @param int  $targetLevel The target output buffering level
         * @param bool $flush       Whether to flush or clean the buffers
         */
        public static function closeOutputBuffers($targetLevel, $flush)
        {
            return Symfony\Component\HttpFoundation\Response::closeOutputBuffers($targetLevel, $flush);
        }
        /**
         * Checks if we need to remove Cache-Control for SSL encrypted downloads when using IE < 9.
         *
         * @link http://support.microsoft.com/kb/323308
         */
        protected function ensureIEOverSSLCompatibility(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::ensureIEOverSSLCompatibility($request);
        }
    }

    class Response extends \Concrete\Core\Http\Response
    {
        public function send()
        {
            return parent::send();
        }
        /**
         * Factory method for chainability.
         *
         * Example:
         *
         *     return Response::create($body, 200)
         *         ->setSharedMaxAge(300);
         *
         * @param mixed $content The response content, see setContent()
         * @param int   $status  The response status code
         * @param array $headers An array of response headers
         *
         * @return Response
         */
        public static function create($content = "", $status = 200, $headers = array())
        {
            return Symfony\Component\HttpFoundation\Response::create($content, $status, $headers);
        }
        /**
         * Prepares the Response before it is sent to the client.
         *
         * This method tweaks the Response to ensure that it is
         * compliant with RFC 2616. Most of the changes are based on
         * the Request that is "associated" with this Response.
         *
         * @param Request $request A Request instance
         *
         * @return Response The current response.
         */
        public function prepare(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::prepare($request);
        }
        /**
         * Sends HTTP headers.
         *
         * @return Response
         */
        public function sendHeaders()
        {
            return parent::sendHeaders();
        }
        /**
         * Sends content for the current web response.
         *
         * @return Response
         */
        public function sendContent()
        {
            return parent::sendContent();
        }
        /**
         * Sets the response content.
         *
         * Valid types are strings, numbers, null, and objects that implement a __toString() method.
         *
         * @param mixed $content Content that can be cast to string
         *
         * @return Response
         *
         * @throws \UnexpectedValueException
         *
         * @api
         */
        public function setContent($content)
        {
            return parent::setContent($content);
        }
        /**
         * Gets the current response content.
         *
         * @return string Content
         *
         * @api
         */
        public function getContent()
        {
            return parent::getContent();
        }
        /**
         * Sets the HTTP protocol version (1.0 or 1.1).
         *
         * @param string $version The HTTP protocol version
         *
         * @return Response
         *
         * @api
         */
        public function setProtocolVersion($version)
        {
            return parent::setProtocolVersion($version);
        }
        /**
         * Gets the HTTP protocol version.
         *
         * @return string The HTTP protocol version
         *
         * @api
         */
        public function getProtocolVersion()
        {
            return parent::getProtocolVersion();
        }
        /**
         * Sets the response status code.
         *
         * @param int   $code HTTP status code
         * @param mixed $text HTTP status text
         *
         * If the status text is null it will be automatically populated for the known
         * status codes and left empty otherwise.
         *
         * @return Response
         *
         * @throws \InvalidArgumentException When the HTTP status code is not valid
         *
         * @api
         */
        public function setStatusCode($code, $text = null)
        {
            return parent::setStatusCode($code, $text);
        }
        /**
         * Retrieves the status code for the current web response.
         *
         * @return int Status code
         *
         * @api
         */
        public function getStatusCode()
        {
            return parent::getStatusCode();
        }
        /**
         * Sets the response charset.
         *
         * @param string $charset Character set
         *
         * @return Response
         *
         * @api
         */
        public function setCharset($charset)
        {
            return parent::setCharset($charset);
        }
        /**
         * Retrieves the response charset.
         *
         * @return string Character set
         *
         * @api
         */
        public function getCharset()
        {
            return parent::getCharset();
        }
        /**
         * Returns true if the response is worth caching under any circumstance.
         *
         * Responses marked "private" with an explicit Cache-Control directive are
         * considered uncacheable.
         *
         * Responses with neither a freshness lifetime (Expires, max-age) nor cache
         * validator (Last-Modified, ETag) are considered uncacheable.
         *
         * @return bool true if the response is worth caching, false otherwise
         *
         * @api
         */
        public function isCacheable()
        {
            return parent::isCacheable();
        }
        /**
         * Returns true if the response is "fresh".
         *
         * Fresh responses may be served from cache without any interaction with the
         * origin. A response is considered fresh when it includes a Cache-Control/max-age
         * indicator or Expires header and the calculated age is less than the freshness lifetime.
         *
         * @return bool true if the response is fresh, false otherwise
         *
         * @api
         */
        public function isFresh()
        {
            return parent::isFresh();
        }
        /**
         * Returns true if the response includes headers that can be used to validate
         * the response with the origin server using a conditional GET request.
         *
         * @return bool true if the response is validateable, false otherwise
         *
         * @api
         */
        public function isValidateable()
        {
            return parent::isValidateable();
        }
        /**
         * Marks the response as "private".
         *
         * It makes the response ineligible for serving other clients.
         *
         * @return Response
         *
         * @api
         */
        public function setPrivate()
        {
            return parent::setPrivate();
        }
        /**
         * Marks the response as "public".
         *
         * It makes the response eligible for serving other clients.
         *
         * @return Response
         *
         * @api
         */
        public function setPublic()
        {
            return parent::setPublic();
        }
        /**
         * Returns true if the response must be revalidated by caches.
         *
         * This method indicates that the response must not be served stale by a
         * cache in any circumstance without first revalidating with the origin.
         * When present, the TTL of the response should not be overridden to be
         * greater than the value provided by the origin.
         *
         * @return bool true if the response must be revalidated by a cache, false otherwise
         *
         * @api
         */
        public function mustRevalidate()
        {
            return parent::mustRevalidate();
        }
        /**
         * Returns the Date header as a DateTime instance.
         *
         * @return \DateTime A \DateTime instance
         *
         * @throws \RuntimeException When the header is not parseable
         *
         * @api
         */
        public function getDate()
        {
            return parent::getDate();
        }
        /**
         * Sets the Date header.
         *
         * @param \DateTime $date A \DateTime instance
         *
         * @return Response
         *
         * @api
         */
        public function setDate(DateTime $date)
        {
            return parent::setDate($date);
        }
        /**
         * Returns the age of the response.
         *
         * @return int The age of the response in seconds
         */
        public function getAge()
        {
            return parent::getAge();
        }
        /**
         * Marks the response stale by setting the Age header to be equal to the maximum age of the response.
         *
         * @return Response
         *
         * @api
         */
        public function expire()
        {
            return parent::expire();
        }
        /**
         * Returns the value of the Expires header as a DateTime instance.
         *
         * @return \DateTime|null A DateTime instance or null if the header does not exist
         *
         * @api
         */
        public function getExpires()
        {
            return parent::getExpires();
        }
        /**
         * Sets the Expires HTTP header with a DateTime instance.
         *
         * Passing null as value will remove the header.
         *
         * @param \DateTime|null $date A \DateTime instance or null to remove the header
         *
         * @return Response
         *
         * @api
         */
        public function setExpires(DateTime $date = null)
        {
            return parent::setExpires($date);
        }
        /**
         * Returns the number of seconds after the time specified in the response's Date
         * header when the response should no longer be considered fresh.
         *
         * First, it checks for a s-maxage directive, then a max-age directive, and then it falls
         * back on an expires header. It returns null when no maximum age can be established.
         *
         * @return int|null Number of seconds
         *
         * @api
         */
        public function getMaxAge()
        {
            return parent::getMaxAge();
        }
        /**
         * Sets the number of seconds after which the response should no longer be considered fresh.
         *
         * This methods sets the Cache-Control max-age directive.
         *
         * @param int $value Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setMaxAge($value)
        {
            return parent::setMaxAge($value);
        }
        /**
         * Sets the number of seconds after which the response should no longer be considered fresh by shared caches.
         *
         * This methods sets the Cache-Control s-maxage directive.
         *
         * @param int $value Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setSharedMaxAge($value)
        {
            return parent::setSharedMaxAge($value);
        }
        /**
         * Returns the response's time-to-live in seconds.
         *
         * It returns null when no freshness information is present in the response.
         *
         * When the responses TTL is <= 0, the response may not be served from cache without first
         * revalidating with the origin.
         *
         * @return int|null The TTL in seconds
         *
         * @api
         */
        public function getTtl()
        {
            return parent::getTtl();
        }
        /**
         * Sets the response's time-to-live for shared caches.
         *
         * This method adjusts the Cache-Control/s-maxage directive.
         *
         * @param int $seconds Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setTtl($seconds)
        {
            return parent::setTtl($seconds);
        }
        /**
         * Sets the response's time-to-live for private/client caches.
         *
         * This method adjusts the Cache-Control/max-age directive.
         *
         * @param int $seconds Number of seconds
         *
         * @return Response
         *
         * @api
         */
        public function setClientTtl($seconds)
        {
            return parent::setClientTtl($seconds);
        }
        /**
         * Returns the Last-Modified HTTP header as a DateTime instance.
         *
         * @return \DateTime|null A DateTime instance or null if the header does not exist
         *
         * @throws \RuntimeException When the HTTP header is not parseable
         *
         * @api
         */
        public function getLastModified()
        {
            return parent::getLastModified();
        }
        /**
         * Sets the Last-Modified HTTP header with a DateTime instance.
         *
         * Passing null as value will remove the header.
         *
         * @param \DateTime|null $date A \DateTime instance or null to remove the header
         *
         * @return Response
         *
         * @api
         */
        public function setLastModified(DateTime $date = null)
        {
            return parent::setLastModified($date);
        }
        /**
         * Returns the literal value of the ETag HTTP header.
         *
         * @return string|null The ETag HTTP header or null if it does not exist
         *
         * @api
         */
        public function getEtag()
        {
            return parent::getEtag();
        }
        /**
         * Sets the ETag value.
         *
         * @param string|null $etag The ETag unique identifier or null to remove the header
         * @param bool        $weak Whether you want a weak ETag or not
         *
         * @return Response
         *
         * @api
         */
        public function setEtag($etag = null, $weak = false)
        {
            return parent::setEtag($etag, $weak);
        }
        /**
         * Sets the response's cache headers (validation and/or expiration).
         *
         * Available options are: etag, last_modified, max_age, s_maxage, private, and public.
         *
         * @param array $options An array of cache options
         *
         * @return Response
         *
         * @throws \InvalidArgumentException
         *
         * @api
         */
        public function setCache(array $options)
        {
            return parent::setCache($options);
        }
        /**
         * Modifies the response so that it conforms to the rules defined for a 304 status code.
         *
         * This sets the status, removes the body, and discards any headers
         * that MUST NOT be included in 304 responses.
         *
         * @return Response
         *
         * @see http://tools.ietf.org/html/rfc2616#section-10.3.5
         *
         * @api
         */
        public function setNotModified()
        {
            return parent::setNotModified();
        }
        /**
         * Returns true if the response includes a Vary header.
         *
         * @return bool true if the response includes a Vary header, false otherwise
         *
         * @api
         */
        public function hasVary()
        {
            return parent::hasVary();
        }
        /**
         * Returns an array of header names given in the Vary header.
         *
         * @return array An array of Vary names
         *
         * @api
         */
        public function getVary()
        {
            return parent::getVary();
        }
        /**
         * Sets the Vary header.
         *
         * @param string|array $headers
         * @param bool         $replace Whether to replace the actual value of not (true by default)
         *
         * @return Response
         *
         * @api
         */
        public function setVary($headers, $replace = true)
        {
            return parent::setVary($headers, $replace);
        }
        /**
         * Determines if the Response validators (ETag, Last-Modified) match
         * a conditional value specified in the Request.
         *
         * If the Response is not modified, it sets the status code to 304 and
         * removes the actual content by calling the setNotModified() method.
         *
         * @param Request $request A Request instance
         *
         * @return bool true if the Response validators match the Request, false otherwise
         *
         * @api
         */
        public function isNotModified(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::isNotModified($request);
        }
        /**
         * Is response invalid?
         *
         * @return bool
         *
         * @api
         */
        public function isInvalid()
        {
            return parent::isInvalid();
        }
        /**
         * Is response informative?
         *
         * @return bool
         *
         * @api
         */
        public function isInformational()
        {
            return parent::isInformational();
        }
        /**
         * Is response successful?
         *
         * @return bool
         *
         * @api
         */
        public function isSuccessful()
        {
            return parent::isSuccessful();
        }
        /**
         * Is the response a redirect?
         *
         * @return bool
         *
         * @api
         */
        public function isRedirection()
        {
            return parent::isRedirection();
        }
        /**
         * Is there a client error?
         *
         * @return bool
         *
         * @api
         */
        public function isClientError()
        {
            return parent::isClientError();
        }
        /**
         * Was there a server side error?
         *
         * @return bool
         *
         * @api
         */
        public function isServerError()
        {
            return parent::isServerError();
        }
        /**
         * Is the response OK?
         *
         * @return bool
         *
         * @api
         */
        public function isOk()
        {
            return parent::isOk();
        }
        /**
         * Is the response forbidden?
         *
         * @return bool
         *
         * @api
         */
        public function isForbidden()
        {
            return parent::isForbidden();
        }
        /**
         * Is the response a not found error?
         *
         * @return bool
         *
         * @api
         */
        public function isNotFound()
        {
            return parent::isNotFound();
        }
        /**
         * Is the response a redirect of some form?
         *
         * @param string $location
         *
         * @return bool
         *
         * @api
         */
        public function isRedirect($location = null)
        {
            return parent::isRedirect($location);
        }
        /**
         * Is the response empty?
         *
         * @return bool
         *
         * @api
         */
        public function isEmpty()
        {
            return parent::isEmpty();
        }
        /**
         * Cleans or flushes output buffers up to target level.
         *
         * Resulting level can be greater than target level if a non-removable buffer has been encountered.
         *
         * @param int  $targetLevel The target output buffering level
         * @param bool $flush       Whether to flush or clean the buffers
         */
        public static function closeOutputBuffers($targetLevel, $flush)
        {
            return Symfony\Component\HttpFoundation\Response::closeOutputBuffers($targetLevel, $flush);
        }
        /**
         * Checks if we need to remove Cache-Control for SSL encrypted downloads when using IE < 9.
         *
         * @link http://support.microsoft.com/kb/323308
         */
        protected function ensureIEOverSSLCompatibility(Symfony\Component\HttpFoundation\Request $request)
        {
            return parent::ensureIEOverSSLCompatibility($request);
        }
    }

    class Router extends \Concrete\Core\Routing\Router
    {
        /**
         * @return RequestContext
         */
        public function getContext()
        {
            return parent::getContext();
        }
        /**
         * @param RequestContext $context
         */
        public function setContext(Symfony\Component\Routing\RequestContext $context)
        {
            return parent::setContext($context);
        }
        /**
         * @return UrlGeneratorInterface
         */
        public function getGenerator()
        {
            return parent::getGenerator();
        }
        /**
         * @param $generator
         */
        public function setGenerator(Symfony\Component\Routing\Generator\UrlGeneratorInterface $generator)
        {
            return parent::setGenerator($generator);
        }
        public function getList()
        {
            return parent::getList();
        }
        public function setRequest(Concrete\Core\Http\Request $req)
        {
            return parent::setRequest($req);
        }
        /**
         * Register a symfony route with as little as a path and a callback.
         *
         * @param string $path The full path for the route
         * @param \Closure|string $callback `\Closure` or "dispatcher" or "\Namespace\Controller::action_method"
         * @param string|null $handle The route handle, if one is not provided the handle is generated from the path "/" => "_"
         * @param array $requirements The Parameter requirements, see Symfony Route constructor
         * @param array $options The route options, see Symfony Route constructor
         * @param string $host The host pattern this route requires, see Symfony Route constructor
         * @param array|string $schemes The schemes or scheme this route requires, see Symfony Route constructor
         * @param array|string $methods The HTTP methods this route requires, see see Symfony Route constructor
         * @param string $condition see Symfony Route constructor
         * @return \Symfony\Component\Routing\Route
         */
        public function register($path, $callback, $handle = null, array $requirements = array(), array $options = array(), $host = "", $schemes = array(), $methods = array(), $condition = null)
        {
            return parent::register($path, $callback, $handle, $requirements, $options, $host, $schemes, $methods, $condition);
        }
        public function registerMultiple(array $routes)
        {
            return parent::registerMultiple($routes);
        }
        public function execute(Concrete\Core\Routing\Route $route, $parameters)
        {
            return parent::execute($route, $parameters);
        }
        /**
         * Used by the theme_paths and site_theme_paths files in config/ to hard coded certain paths to various themes
         * @access public
         * @param $path string
         * @param $theme object, if null site theme is default
         * @return void
         */
        public function setThemeByRoute($path, $theme = null, $wrapper = FILENAME_THEMES_VIEW)
        {
            return parent::setThemeByRoute($path, $theme, $wrapper);
        }
        public function setThemesbyRoutes(array $routes)
        {
            return parent::setThemesbyRoutes($routes);
        }
        /**
         * This grabs the theme for a particular path, if one exists in the themePaths array
         * @param string $path
         * @return string|boolean
         */
        public function getThemeByRoute($path)
        {
            return parent::getThemeByRoute($path);
        }
        public function route($data)
        {
            return parent::route($data);
        }
    }

    /**
     *
     * SinglePage extends the page class for those instances of pages that have no type, and are special "single pages"
     * within the system.
     * @package Pages
     *
     */
    class SinglePage extends \Concrete\Core\Page\Single
    {
        public static function getThemeableCorePages()
        {
            return Concrete\Core\Page\Single::getThemeableCorePages();
        }
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Page\Single::getListByPackage($pkg);
        }
        public static function sanitizePath($path)
        {
            return Concrete\Core\Page\Single::sanitizePath($path);
        }
        public static function getPathToNode($node, $pkg)
        {
            return Concrete\Core\Page\Single::getPathToNode($node, $pkg);
        }
        public static function refresh(Concrete\Core\Page\Page $c)
        {
            return Concrete\Core\Page\Single::refresh($c);
        }
        public static function getByID($cID, $version = "RECENT")
        {
            return Concrete\Core\Page\Single::getByID($cID, $version);
        }
        public static function add($cPath, $pkg = null)
        {
            return Concrete\Core\Page\Single::add($cPath, $pkg);
        }
        public static function getList()
        {
            return Concrete\Core\Page\Single::getList();
        }
    }

    /**
     * Class Stack.
     *
     * @package Concrete\Core\Page\Stack
     */
    class Stack extends \Concrete\Core\Page\Stack\Stack
    {
        /**
         * @param string $type
         *
         * @return int
         */
        public static function mapImportTextToType($type)
        {
            return Concrete\Core\Page\Stack\Stack::mapImportTextToType($type);
        }
        /**
         * @param $stackName
         *
         * @return Stack
         */
        public static function getOrCreateGlobalArea($stackName)
        {
            return Concrete\Core\Page\Stack\Stack::getOrCreateGlobalArea($stackName);
        }
        /**
         * @param string $stackName
         * @param string $cvID
         * @param int $multilingualContentSource
         *
         * @return Page
         */
        public static function getByName($stackName, $cvID = "RECENT", $multilingualContentSource = self::MULTILINGUAL_CONTENT_SOURCE_CURRENT)
        {
            return Concrete\Core\Page\Stack\Stack::getByName($stackName, $cvID, $multilingualContentSource);
        }
        /**
         * @param int    $cID
         * @param string $cvID
         *
         * @return bool|Page
         */
        public static function getByID($cID, $cvID = "RECENT")
        {
            return Concrete\Core\Page\Stack\Stack::getByID($cID, $cvID);
        }
        /**
         * @param Stack $stack
         *
         * @return bool
         */
        protected static function isValidStack($stack)
        {
            return Concrete\Core\Page\Stack\Stack::isValidStack($stack);
        }
        protected function getMultilingualSectionFromType($type)
        {
            return parent::getMultilingualSectionFromType($type);
        }
        /**
         * @param string $stackName
         * @param int    $type
         *
         * @return Page
         */
        public static function addStack($stackName, $type = 0, $multilingualStackToReturn = self::MULTILINGUAL_CONTENT_SOURCE_CURRENT)
        {
            return Concrete\Core\Page\Stack\Stack::addStack($stackName, $type, $multilingualStackToReturn);
        }
        /**
         * @param |\Concrete\Core\Page\Collection $nc
         * @param bool $preserveUserID
         *
         * @return Stack
         */
        public function duplicate($nc = null, $preserveUserID = false)
        {
            return parent::duplicate($nc, $preserveUserID);
        }
        /**
         * @return int
         */
        public function getStackType()
        {
            return parent::getStackType();
        }
        /**
         * @param $data
         *
         * @return bool
         */
        public function update($data)
        {
            return parent::update($data);
        }
        /**
         * @return bool
         */
        public function delete()
        {
            return parent::delete();
        }
        /**
         * @return string
         */
        public function getStackName()
        {
            return parent::getStackName();
        }
        /**
         * @return bool
         */
        public function display()
        {
            return parent::display();
        }
        /**
         * @param Page $pageNode
         */
        public function export($pageNode, $includePublicDate = false)
        {
            return parent::export($pageNode, $includePublicDate);
        }
        /**
         * @return bool|string
         */
        public function getStackTypeExportText()
        {
            return parent::getStackTypeExportText();
        }
        public function getMultilingualSection()
        {
            return parent::getMultilingualSection();
        }
        public function updateMultilingualSection(Concrete\Core\Multilingual\Page\Section\Section $section)
        {
            return parent::updateMultilingualSection($section);
        }
        /**
         * @param string $path /path/to/page
         * @param string $version ACTIVE or RECENT
         *
         * @return Page
         */
        public static function getByPath($path, $version = "RECENT")
        {
            return Concrete\Core\Page\Page::getByPath($path, $version);
        }
        /**
         * @access private
         */
        protected function populatePage($cInfo, $where, $cvID)
        {
            return parent::populatePage($cInfo, $where, $cvID);
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        /**
         * Return a representation of the Page object as something easily serializable.
         */
        public function getJSONObject()
        {
            return parent::getJSONObject();
        }
        /**
         * @return PageController
         */
        public function getPageController()
        {
            return parent::getPageController();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        /**
         * Is the page in edit mode.
         *
         * @return bool
         */
        public function isEditMode()
        {
            return parent::isEditMode();
        }
        /**
         * Get the package ID for a page (page thats added by a package) (returns 0 if its not in a package).
         *
         * @return int
         */
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * Get the package handle for a page (page thats added by a package).
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Returns 1 if the page is in arrange mode.
         *
         * @return bool
         */
        public function isArrangeMode()
        {
            return parent::isArrangeMode();
        }
        /**
         * Forces the page to be checked in if its checked out.
         */
        public function forceCheckIn()
        {
            return parent::forceCheckIn();
        }
        /**
         * Checks if the page is a dashboard page, returns true if it is.
         *
         * @return bool
         */
        public function isAdminArea()
        {
            return parent::isAdminArea();
        }
        /**
         * Uses a Request object to determine which page to load. queries by path and then
         * by cID.
         */
        public static function getFromRequest(Concrete\Core\Http\Request $request)
        {
            return Concrete\Core\Page\Page::getFromRequest($request);
        }
        public function processArrangement($area_id, $moved_block_id, $block_order)
        {
            return parent::processArrangement($area_id, $moved_block_id, $block_order);
        }
        /**
         * checks if the page is checked out, if it is return true.
         *
         * @return bool
         */
        public function isCheckedOut()
        {
            return parent::isCheckedOut();
        }
        /**
         * Gets the user that is editing the current page.
         * $return string $name.
         */
        public function getCollectionCheckedOutUserName()
        {
            return parent::getCollectionCheckedOutUserName();
        }
        /**
         * Checks if the page is checked out by the current user.
         *
         * @return bool
         */
        public function isCheckedOutByMe()
        {
            return parent::isCheckedOutByMe();
        }
        /**
         * Checks if the page is a single page.
         *
         * @return bool
         */
        public function isGeneratedCollection()
        {
            return parent::isGeneratedCollection();
        }
        public function assignPermissions($userOrGroup, $permissions = array(), $accessType = Concrete\Core\Permission\Key\PageKey::ACCESS_TYPE_INCLUDE)
        {
            return parent::assignPermissions($userOrGroup, $permissions, $accessType);
        }
        public function removePermissions($userOrGroup, $permissions = array())
        {
            return parent::removePermissions($userOrGroup, $permissions);
        }
        public static function getDrafts()
        {
            return Concrete\Core\Page\Page::getDrafts();
        }
        public function isPageDraft()
        {
            return parent::isPageDraft();
        }
        public function setController($controller)
        {
            return parent::setController($controller);
        }
        /**
         * @deprecated
         */
        public function getController()
        {
            return parent::getController();
        }
        /**
         * @private
         */
        public function assignPermissionSet($px)
        {
            return parent::assignPermissionSet($px);
        }
        /**
         * Make an alias to a page.
         *
         * @param Collection $c
         *
         * @return int $newCID
         */
        public function addCollectionAlias($c)
        {
            return parent::addCollectionAlias($c);
        }
        /**
         * Update the name, link, and to open in a new window for an external link.
         *
         * @param string $cName
         * @param string $cLink
         * @param bool $newWindow
         */
        public function updateCollectionAliasExternal($cName, $cLink, $newWindow = 0)
        {
            return parent::updateCollectionAliasExternal($cName, $cLink, $newWindow);
        }
        /**
         * Add a new external link.
         *
         * @param string $cName
         * @param string $cLink
         * @param bool $newWindow
         *
         * @return int $newCID
         */
        public function addCollectionAliasExternal($cName, $cLink, $newWindow = 0)
        {
            return parent::addCollectionAliasExternal($cName, $cLink, $newWindow);
        }
        /**
         * Check if a page is a single page that is in the core (/concrete directory).
         *
         * @return bool
         */
        public function isSystemPage()
        {
            return parent::isSystemPage();
        }
        /**
         * Gets the icon for a page (also fires the on_page_get_icon event).
         *
         * @return string $icon Path to the icon
         */
        public function getCollectionIcon()
        {
            return parent::getCollectionIcon();
        }
        /**
         * Remove an external link/alias.
         *
         * @return int $cIDRedir cID for the original page if the page was an alias
         */
        public function removeThisAlias()
        {
            return parent::removeThisAlias();
        }
        public function populateRecursivePages($pages, $pageRow, $cParentID, $level, $includeThisPage = true)
        {
            return parent::populateRecursivePages($pages, $pageRow, $cParentID, $level, $includeThisPage);
        }
        public function queueForDeletionSort($a, $b)
        {
            return parent::queueForDeletionSort($a, $b);
        }
        public function queueForDuplicationSort($a, $b)
        {
            return parent::queueForDuplicationSort($a, $b);
        }
        public function queueForDeletion()
        {
            return parent::queueForDeletion();
        }
        public function queueForDeletionRequest($queue = null, $includeThisPage = true)
        {
            return parent::queueForDeletionRequest($queue, $includeThisPage);
        }
        public function queueForDuplication($destination, $includeParent = true)
        {
            return parent::queueForDuplication($destination, $includeParent);
        }
        /**
         * Returns the uID for a page that is checked out.
         *
         * @return int
         */
        public function getCollectionCheckedOutUserID()
        {
            return parent::getCollectionCheckedOutUserID();
        }
        /**
         * Returns the path for the current page.
         *
         * @return string
         */
        public function getCollectionPath()
        {
            return parent::getCollectionPath();
        }
        /**
         * Returns the PagePath object for the current page.
         */
        public function getCollectionPathObject()
        {
            return parent::getCollectionPathObject();
        }
        /**
         * Adds a non-canonical page path to the current page.
         */
        public function addAdditionalPagePath($cPath, $commit = true)
        {
            return parent::addAdditionalPagePath($cPath, $commit);
        }
        /**
         * Sets the canonical page path for a page.
         */
        public function setCanonicalPagePath($cPath, $isAutoGenerated = false)
        {
            return parent::setCanonicalPagePath($cPath, $isAutoGenerated);
        }
        public function getPagePaths()
        {
            return parent::getPagePaths();
        }
        public function getAdditionalPagePaths()
        {
            return parent::getAdditionalPagePaths();
        }
        /**
         * Clears all page paths for a page.
         */
        public function clearPagePaths()
        {
            return parent::clearPagePaths();
        }
        /**
         * Returns full url for the current page.
         *
         * @return string
         */
        public function getCollectionLink($appendBaseURL = false)
        {
            return parent::getCollectionLink($appendBaseURL);
        }
        /**
         * Returns the path for a page from its cID.
         *
         * @param int cID
         *
         * @return string $path
         */
        public static function getCollectionPathFromID($cID)
        {
            return Concrete\Core\Page\Page::getCollectionPathFromID($cID);
        }
        /**
         * Returns the uID for a page ownder.
         *
         * @return int
         */
        public function getCollectionUserID()
        {
            return parent::getCollectionUserID();
        }
        /**
         * Returns the page's handle.
         *
         * @return string
         */
        public function getCollectionHandle()
        {
            return parent::getCollectionHandle();
        }
        /**
         * @deprecated
         */
        public function getCollectionTypeName()
        {
            return parent::getCollectionTypeName();
        }
        public function getPageTypeName()
        {
            return parent::getPageTypeName();
        }
        /**
         * @deprecated
         */
        public function getCollectionTypeID()
        {
            return parent::getCollectionTypeID();
        }
        /**
         * Returns the Collection Type ID.
         *
         * @return int
         */
        public function getPageTypeID()
        {
            return parent::getPageTypeID();
        }
        public function getPageTypeObject()
        {
            return parent::getPageTypeObject();
        }
        /**
         * Returns the Page Template ID.
         *
         * @return int
         */
        public function getPageTemplateID()
        {
            return parent::getPageTemplateID();
        }
        /**
         * Returns the Page Template Object.
         *
         * @return PageTemplate
         */
        public function getPageTemplateObject()
        {
            return parent::getPageTemplateObject();
        }
        /**
         * Returns the Page Template handle.
         *
         * @return string
         */
        public function getPageTemplateHandle()
        {
            return parent::getPageTemplateHandle();
        }
        /**
         * Returns the Collection Type handle.
         *
         * @return string
         */
        public function getPageTypeHandle()
        {
            return parent::getPageTypeHandle();
        }
        public function getCollectionTypeHandle()
        {
            return parent::getCollectionTypeHandle();
        }
        /**
         * Returns theme id for the collection.
         *
         * @return int
         */
        public function getCollectionThemeID()
        {
            return parent::getCollectionThemeID();
        }
        /**
         * Check if a block is an alias from a page default.
         *
         * @param Block $b
         *
         * @return bool
         */
        public function isBlockAliasedFromMasterCollection($b)
        {
            return parent::isBlockAliasedFromMasterCollection($b);
        }
        /**
         * Returns Collection's theme object.
         *
         * @return PageTheme
         */
        public function getCollectionThemeObject()
        {
            return parent::getCollectionThemeObject();
        }
        /**
         * Returns the page's name.
         *
         * @return string
         */
        public function getCollectionName()
        {
            return parent::getCollectionName();
        }
        /**
         * Returns the collection ID for the aliased page (returns 0 unless used on an actual alias).
         *
         * @return int
         */
        public function getCollectionPointerID()
        {
            return parent::getCollectionPointerID();
        }
        /**
         * Returns link for the aliased page.
         *
         * @return string
         */
        public function getCollectionPointerExternalLink()
        {
            return parent::getCollectionPointerExternalLink();
        }
        /**
         * Returns if the alias opens in a new window.
         *
         * @return bool
         */
        public function openCollectionPointerExternalLinkInNewWindow()
        {
            return parent::openCollectionPointerExternalLinkInNewWindow();
        }
        /**
         * Checks to see if the page is an alias.
         *
         * @return bool
         */
        public function isAlias()
        {
            return parent::isAlias();
        }
        /**
         * Checks if a page is an external link.
         *
         * @return bool
         */
        public function isExternalLink()
        {
            return parent::isExternalLink();
        }
        /**
         * Get the original cID of a page.
         *
         * @return int
         */
        public function getCollectionPointerOriginalID()
        {
            return parent::getCollectionPointerOriginalID();
        }
        /**
         * Get the file name of a page (single pages).
         *
         * @return string
         */
        public function getCollectionFilename()
        {
            return parent::getCollectionFilename();
        }
        /**
         * Gets the date a the current version was made public,.
         *
         * @return string date formated like: 2009-01-01 00:00:00
         */
        public function getCollectionDatePublic()
        {
            return parent::getCollectionDatePublic();
        }
        public function getCollectionDatePublicObject()
        {
            return parent::getCollectionDatePublicObject();
        }
        /**
         * Get the description of a page.
         *
         * @return string
         */
        public function getCollectionDescription()
        {
            return parent::getCollectionDescription();
        }
        /**
         * Gets the cID of the page's parent.
         *
         * @return int
         */
        public function getCollectionParentID()
        {
            return parent::getCollectionParentID();
        }
        /**
         * Get the Parent cID from a page by using a cID.
         *
         * @param int $cID
         *
         * @return int
         */
        public static function getCollectionParentIDFromChildID($cID)
        {
            return Concrete\Core\Page\Page::getCollectionParentIDFromChildID($cID);
        }
        /**
         * Returns an array of this cParentID and aliased parentIDs.
         *
         * @return array $cID
         */
        public function getCollectionParentIDs()
        {
            return parent::getCollectionParentIDs();
        }
        /**
         * Checks if a page is a page default.
         *
         * @return bool
         */
        public function isMasterCollection()
        {
            return parent::isMasterCollection();
        }
        /**
         * Gets the template permissions.
         *
         * @return string
         */
        public function overrideTemplatePermissions()
        {
            return parent::overrideTemplatePermissions();
        }
        /**
         * Gets the position of the page in the sitemap.
         *
         * @return int
         */
        public function getCollectionDisplayOrder()
        {
            return parent::getCollectionDisplayOrder();
        }
        /**
         * Set the theme for a page using the page object.
         *
         * @param PageTheme $pl
         */
        public function setTheme($pl)
        {
            return parent::setTheme($pl);
        }
        /**
         * Set the theme for a page using the page object.
         *
         * @param PageType $pl
         */
        public function setPageType(Concrete\Core\Page\Type\Type $type = null)
        {
            return parent::setPageType($type);
        }
        /**
         * Set the permissions of sub-collections added beneath this permissions to inherit from the template.
         */
        public function setPermissionsInheritanceToTemplate()
        {
            return parent::setPermissionsInheritanceToTemplate();
        }
        /**
         * Set the permissions of sub-collections added beneath this permissions to inherit from the parent.
         */
        public function setPermissionsInheritanceToOverride()
        {
            return parent::setPermissionsInheritanceToOverride();
        }
        public function getPermissionsCollectionID()
        {
            return parent::getPermissionsCollectionID();
        }
        public function getCollectionInheritance()
        {
            return parent::getCollectionInheritance();
        }
        public function getParentPermissionsCollectionID()
        {
            return parent::getParentPermissionsCollectionID();
        }
        public function getPermissionsCollectionObject()
        {
            return parent::getPermissionsCollectionObject();
        }
        /**
         * Given the current page's template and page type, we return the master page.
         */
        public function getMasterCollectionID()
        {
            return parent::getMasterCollectionID();
        }
        public function getOriginalCollectionID()
        {
            return parent::getOriginalCollectionID();
        }
        public function getNumChildren()
        {
            return parent::getNumChildren();
        }
        public function getNumChildrenDirect()
        {
            return parent::getNumChildrenDirect();
        }
        /**
         * Returns the first child of the current page, or null if there is no child.
         *
         * @param string $sortColumn
         *
         * @return Page
         */
        public function getFirstChild($sortColumn = "cDisplayOrder asc", $excludeSystemPages = false)
        {
            return parent::getFirstChild($sortColumn, $excludeSystemPages);
        }
        public function getCollectionChildrenArray($oneLevelOnly = 0)
        {
            return parent::getCollectionChildrenArray($oneLevelOnly);
        }
        /**
         * Returns the immediate children of the current page.
         */
        public function getCollectionChildren()
        {
            return parent::getCollectionChildren();
        }
        protected function _getNumChildren($cID, $oneLevelOnly = 0, $sortColumn = "cDisplayOrder asc")
        {
            return parent::_getNumChildren($cID, $oneLevelOnly, $sortColumn);
        }
        public function canMoveCopyTo($cobj)
        {
            return parent::canMoveCopyTo($cobj);
        }
        public function updateCollectionName($name)
        {
            return parent::updateCollectionName($name);
        }
        public function hasPageThemeCustomizations()
        {
            return parent::hasPageThemeCustomizations();
        }
        public function resetCustomThemeStyles()
        {
            return parent::resetCustomThemeStyles();
        }
        public function setCustomStyleObject(Concrete\Core\Page\Theme\Theme $pt, Concrete\Core\StyleCustomizer\Style\ValueList $valueList, $selectedPreset = false, $customCssRecord = false)
        {
            return parent::setCustomStyleObject($pt, $valueList, $selectedPreset, $customCssRecord);
        }
        public function getPageWrapperClass()
        {
            return parent::getPageWrapperClass();
        }
        public function writePageThemeCustomizations()
        {
            return parent::writePageThemeCustomizations();
        }
        public static function resetAllCustomStyles()
        {
            return Concrete\Core\Page\Page::resetAllCustomStyles();
        }
        public function clearPagePermissions()
        {
            return parent::clearPagePermissions();
        }
        public function inheritPermissionsFromParent()
        {
            return parent::inheritPermissionsFromParent();
        }
        public function inheritPermissionsFromDefaults()
        {
            return parent::inheritPermissionsFromDefaults();
        }
        public function setPermissionsToManualOverride()
        {
            return parent::setPermissionsToManualOverride();
        }
        public function rescanAreaPermissions()
        {
            return parent::rescanAreaPermissions();
        }
        public function setOverrideTemplatePermissions($cOverrideTemplatePermissions)
        {
            return parent::setOverrideTemplatePermissions($cOverrideTemplatePermissions);
        }
        public function updatePermissionsCollectionID($cParentIDString, $npID)
        {
            return parent::updatePermissionsCollectionID($cParentIDString, $npID);
        }
        public function acquireAreaPermissions($permissionsCollectionID)
        {
            return parent::acquireAreaPermissions($permissionsCollectionID);
        }
        public function acquirePagePermissions($permissionsCollectionID)
        {
            return parent::acquirePagePermissions($permissionsCollectionID);
        }
        public function updateGroupsSubCollection($cParentIDString)
        {
            return parent::updateGroupsSubCollection($cParentIDString);
        }
        public function addBlock($bt, $a, $data)
        {
            return parent::addBlock($bt, $a, $data);
        }
        public function move($nc)
        {
            return parent::move($nc);
        }
        public function duplicateAll($nc, $preserveUserID = false)
        {
            return parent::duplicateAll($nc, $preserveUserID);
        }
        /**
         * @access private
         **/
        protected function _duplicateAll($cParent, $cNewParent, $preserveUserID = false)
        {
            return parent::_duplicateAll($cParent, $cNewParent, $preserveUserID);
        }
        public function moveToTrash()
        {
            return parent::moveToTrash();
        }
        public function rescanChildrenDisplayOrder()
        {
            return parent::rescanChildrenDisplayOrder();
        }
        public function getAutoGeneratedPagePathObject()
        {
            return parent::getAutoGeneratedPagePathObject();
        }
        public function getNextSubPageDisplayOrder()
        {
            return parent::getNextSubPageDisplayOrder();
        }
        /**
         * Returns the URL-slug-based path to the current page (including any suffixes) in a string format. Does so in real time.
         */
        public function generatePagePath()
        {
            return parent::generatePagePath();
        }
        /**
         * Recalculates the canonical page path for the current page, based on its current version, URL slug, etc..
         */
        public function rescanCollectionPath()
        {
            return parent::rescanCollectionPath();
        }
        /**
         * For the curret page, return the text that will be used for that pages canonical path. This happens before
         * any uniqueness checks get run.
         *
         * @return string
         */
        protected function computeCanonicalPagePath()
        {
            return parent::computeCanonicalPagePath();
        }
        public function updateDisplayOrder($do, $cID = 0)
        {
            return parent::updateDisplayOrder($do, $cID);
        }
        public function movePageDisplayOrderToTop()
        {
            return parent::movePageDisplayOrderToTop();
        }
        public function movePageDisplayOrderToBottom()
        {
            return parent::movePageDisplayOrderToBottom();
        }
        public function movePageDisplayOrderToSibling(Concrete\Core\Page\Page $c, $position = "before")
        {
            return parent::movePageDisplayOrderToSibling($c, $position);
        }
        public function rescanSystemPageStatus()
        {
            return parent::rescanSystemPageStatus();
        }
        public function isInTrash()
        {
            return parent::isInTrash();
        }
        public function moveToRoot()
        {
            return parent::moveToRoot();
        }
        public function deactivate()
        {
            return parent::deactivate();
        }
        public function activate()
        {
            return parent::activate();
        }
        public function isActive()
        {
            return parent::isActive();
        }
        public function setPageIndexScore($score)
        {
            return parent::setPageIndexScore($score);
        }
        public function getPageIndexScore()
        {
            return parent::getPageIndexScore();
        }
        public function getPageIndexContent()
        {
            return parent::getPageIndexContent();
        }
        protected function _associateMasterCollectionBlocks($newCID, $masterCID)
        {
            return parent::_associateMasterCollectionBlocks($newCID, $masterCID);
        }
        protected function _associateMasterCollectionAttributes($newCID, $masterCID)
        {
            return parent::_associateMasterCollectionAttributes($newCID, $masterCID);
        }
        /**
         * Adds the home page to the system. Typically used only by the installation program.
         *
         * @return page
         **/
        public static function addHomePage()
        {
            return Concrete\Core\Page\Page::addHomePage();
        }
        /**
         * Adds a new page of a certain type, using a passed associate array to setup value. $data may contain any or all of the following:
         * "uID": User ID of the page's owner
         * "pkgID": Package ID the page belongs to
         * "cName": The name of the page
         * "cHandle": The handle of the page as used in the path
         * "cDatePublic": The date assigned to the page.
         *
         * @param \Concrete\Core\Page\Type\Type $pt
         * @param array $data
         *
         * @return page
         **/
        public function add($pt, $data, $template = false)
        {
            return parent::add($pt, $data, $template);
        }
        protected function acquireAreaStylesFromDefaults(Concrete\Core\Page\Template $template)
        {
            return parent::acquireAreaStylesFromDefaults($template);
        }
        public function getCustomStyleObject()
        {
            return parent::getCustomStyleObject();
        }
        public function getCollectionFullPageCaching()
        {
            return parent::getCollectionFullPageCaching();
        }
        public function getCollectionFullPageCachingLifetime()
        {
            return parent::getCollectionFullPageCachingLifetime();
        }
        public function getCollectionFullPageCachingLifetimeCustomValue()
        {
            return parent::getCollectionFullPageCachingLifetimeCustomValue();
        }
        public function getCollectionFullPageCachingLifetimeValue()
        {
            return parent::getCollectionFullPageCachingLifetimeValue();
        }
        public function addStatic($data)
        {
            return parent::addStatic($data);
        }
        public static function getCurrentPage()
        {
            return Concrete\Core\Page\Page::getCurrentPage();
        }
        /**
         * Returns the total number of page views for a specific page.
         */
        public function getTotalPageViews($date = null)
        {
            return parent::getTotalPageViews($date);
        }
        public function getPageDraftTargetParentPageID()
        {
            return parent::getPageDraftTargetParentPageID();
        }
        public function setPageDraftTargetParentPageID($cParentID)
        {
            return parent::setPageDraftTargetParentPageID($cParentID);
        }
        /**
         * Gets a pages statistics.
         */
        public function getPageStatistics($limit = 20)
        {
            return parent::getPageStatistics($limit);
        }
        public static function reindexPendingPages()
        {
            return Concrete\Core\Page\Collection\Collection::reindexPendingPages();
        }
        public static function getByHandle($handle)
        {
            return Concrete\Core\Page\Collection\Collection::getByHandle($handle);
        }
        public function addCollection($data)
        {
            return parent::addCollection($data);
        }
        public static function createCollection($data)
        {
            return Concrete\Core\Page\Collection\Collection::createCollection($data);
        }
        public function loadVersionObject($cvID = "ACTIVE")
        {
            return parent::loadVersionObject($cvID);
        }
        public function getVersionToModify()
        {
            return parent::getVersionToModify();
        }
        public function getVersionObject()
        {
            return parent::getVersionObject();
        }
        public function cloneVersion($versionComments)
        {
            return parent::cloneVersion($versionComments);
        }
        public function getCollectionID()
        {
            return parent::getCollectionID();
        }
        public function getNextVersionComments()
        {
            return parent::getNextVersionComments();
        }
        public function getFeatureAssignments()
        {
            return parent::getFeatureAssignments();
        }
        /**
         * Returns the value of the attribute with the handle $ak
         * of the current object.
         *
         * $displayMode makes it possible to get the correct output
         * value. When you need the raw attribute value or object, use
         * this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle');
         * </code>
         *
         * But if you need the formatted output supported by some
         * attribute, use this:
         * <code>
         * $c = Page::getCurrentPage();
         * $attributeValue = $c->getAttribute('attribute_handle', 'display');
         * </code>
         *
         * An attribute type like "date" will then return the date in
         * the correct format just like other attributes will show
         * you a nicely formatted output and not just a simple value
         * or object.
         *
         *
         * @param string|object $akHandle
         * @param bool       $displayMode
         *
         * @return type
         */
        public function getAttribute($akHandle, $displayMode = false)
        {
            return parent::getAttribute($akHandle, $displayMode);
        }
        public function getCollectionAttributeValue($ak)
        {
            return parent::getCollectionAttributeValue($ak);
        }
        public function clearCollectionAttributes($retainAKIDs = array())
        {
            return parent::clearCollectionAttributes($retainAKIDs);
        }
        public function getVersionID()
        {
            return parent::getVersionID();
        }
        public function reindex($index = false, $actuallyDoReindex = true)
        {
            return parent::reindex($index, $actuallyDoReindex);
        }
        public function clearAttribute($ak)
        {
            return parent::clearAttribute($ak);
        }
        public function getAttributeValueObject($ak, $createIfNotFound = false)
        {
            return parent::getAttributeValueObject($ak, $createIfNotFound);
        }
        public function getSetCollectionAttributes()
        {
            return parent::getSetCollectionAttributes();
        }
        public function addAttribute($ak, $value)
        {
            return parent::addAttribute($ak, $value);
        }
        public function setAttribute($ak, $value)
        {
            return parent::setAttribute($ak, $value);
        }
        /**
         * @param string $arHandle
         *
         * @return Area
         */
        public function getArea($arHandle)
        {
            return parent::getArea($arHandle);
        }
        public function hasAliasedContent()
        {
            return parent::hasAliasedContent();
        }
        public function getCollectionDateLastModified()
        {
            return parent::getCollectionDateLastModified();
        }
        public function getCollectionDateAdded()
        {
            return parent::getCollectionDateAdded();
        }
        /**
         * Retrieves all custom style rules that should be inserted into the header on a page, whether they are defined in areas
         * or blocks.
         */
        public function outputCustomStyleHeaderItems($return = false)
        {
            return parent::outputCustomStyleHeaderItems($return);
        }
        public function getAreaCustomStyle($area, $force = false)
        {
            return parent::getAreaCustomStyle($area, $force);
        }
        public function resetAreaCustomStyle($area)
        {
            return parent::resetAreaCustomStyle($area);
        }
        public function setCustomStyleSet($area, $set)
        {
            return parent::setCustomStyleSet($area, $set);
        }
        public function relateVersionEdits($oc)
        {
            return parent::relateVersionEdits($oc);
        }
        public function rescanDisplayOrder($arHandle)
        {
            return parent::rescanDisplayOrder($arHandle);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        public function getGlobalBlocks()
        {
            return parent::getGlobalBlocks();
        }
        /**
         * List the blocks in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlocks($arHandle = false)
        {
            return parent::getBlocks($arHandle);
        }
        /**
         * List the block IDs in a collection or area within a collection.
         *
         * @param bool|string $arHandle . If specified, returns just the blocks in an area
         *
         * @return array
         */
        public function getBlockIDs($arHandle = false)
        {
            return parent::getBlockIDs($arHandle);
        }
        public function getCollectionAreaDisplayOrder($arHandle, $ignoreVersions = false)
        {
            return parent::getCollectionAreaDisplayOrder($arHandle, $ignoreVersions);
        }
        public function addFeature(Concrete\Core\Feature\Feature $fe)
        {
            return parent::addFeature($fe);
        }
        public function markModified()
        {
            return parent::markModified();
        }
        public function duplicateCollection()
        {
            return parent::duplicateCollection();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class StackList extends \Concrete\Core\Page\Stack\StackList
    {
        public function filterByGlobalAreas()
        {
            return parent::filterByGlobalAreas();
        }
        public function filterByUserAdded()
        {
            return parent::filterByUserAdded();
        }
        public function filterByStackCategory(Concrete\Core\Page\Stack\StackCategory $category)
        {
            return parent::filterByStackCategory($category);
        }
        public function filterByPageLanguage(Concrete\Core\Page\Page $page)
        {
            return parent::filterByPageLanguage($page);
        }
        public function filterByLanguageSection(Concrete\Core\Multilingual\Page\Section\Section $ms)
        {
            return parent::filterByLanguageSection($ms);
        }
        public static function export(SimpleXMLElement $x)
        {
            return Concrete\Core\Page\Stack\StackList::export($x);
        }
        public function get($itemsToGet = 0, $offset = 0)
        {
            return parent::get($itemsToGet, $offset);
        }
        public static function rescanMultilingualStacks()
        {
            return Concrete\Core\Page\Stack\StackList::rescanMultilingualStacks();
        }
        public function setViewPagePermissionKeyHandle($pkHandle)
        {
            return parent::setViewPagePermissionKeyHandle($pkHandle);
        }
        public function includeInactivePages()
        {
            return parent::includeInactivePages();
        }
        public function ignorePermissions()
        {
            return parent::ignorePermissions();
        }
        public function ignoreAliases()
        {
            return parent::ignoreAliases();
        }
        public function includeSystemPages()
        {
            return parent::includeSystemPages();
        }
        public function displayUnapprovedPages()
        {
            return parent::displayUnapprovedPages();
        }
        public function isIndexedSearch()
        {
            return parent::isIndexedSearch();
        }
        /**
         * Filters by "keywords" (which searches everything including filenames, title, tags, users who uploaded the file, tags)
         */
        public function filterByKeywords($keywords, $simple = false)
        {
            return parent::filterByKeywords($keywords, $simple);
        }
        public function filterByName($name, $exact = false)
        {
            return parent::filterByName($name, $exact);
        }
        public function filterByPath($path, $includeAllChildren = true)
        {
            return parent::filterByPath($path, $includeAllChildren);
        }
        /**
         * Sets up a list to only return items the proper user can access
         */
        public function setupPermissions()
        {
            return parent::setupPermissions();
        }
        public function sortByRelevance()
        {
            return parent::sortByRelevance();
        }
        /**
         * Sorts this list by display order
         */
        public function sortByDisplayOrder()
        {
            return parent::sortByDisplayOrder();
        }
        /**
         * Sorts this list by display order descending
         */
        public function sortByDisplayOrderDescending()
        {
            return parent::sortByDisplayOrderDescending();
        }
        public function sortByCollectionIDAscending()
        {
            return parent::sortByCollectionIDAscending();
        }
        /**
         * Sorts this list by public date ascending order
         */
        public function sortByPublicDate()
        {
            return parent::sortByPublicDate();
        }
        /**
         * Sorts this list by name
         */
        public function sortByName()
        {
            return parent::sortByName();
        }
        /**
         * Sorts this list by name descending order
         */
        public function sortByNameDescending()
        {
            return parent::sortByNameDescending();
        }
        /**
         * Sorts this list by public date descending order
         */
        public function sortByPublicDateDescending()
        {
            return parent::sortByPublicDateDescending();
        }
        /**
         * Sets the parent ID that we will grab pages from.
         * @param mixed $cParentID
         */
        public function filterByParentID($cParentID)
        {
            return parent::filterByParentID($cParentID);
        }
        /**
         * Filters by type of collection (using the ID field)
         * @param mixed $ptID
         */
        public function filterByPageTypeID($ptID)
        {
            return parent::filterByPageTypeID($ptID);
        }
        /**
         * @deprecated
         */
        public function filterByCollectionTypeID($ctID)
        {
            return parent::filterByCollectionTypeID($ctID);
        }
        /**
         * Filters by user ID of collection (using the uID field)
         * @param mixed $uID
         */
        public function filterByUserID($uID)
        {
            return parent::filterByUserID($uID);
        }
        public function filterByIsApproved($cvIsApproved)
        {
            return parent::filterByIsApproved($cvIsApproved);
        }
        public function filterByIsAlias($ia)
        {
            return parent::filterByIsAlias($ia);
        }
        /**
         * Filters by type of collection (using the handle field)
         * @param mixed $ptHandle
         */
        public function filterByPageTypeHandle($ptHandle)
        {
            return parent::filterByPageTypeHandle($ptHandle);
        }
        public function filterByCollectionTypeHandle($ctHandle)
        {
            return parent::filterByCollectionTypeHandle($ctHandle);
        }
        /**
         * Filters by date added
         * @param string $date
         */
        public function filterByDateAdded($date, $comparison = "=")
        {
            return parent::filterByDateAdded($date, $comparison);
        }
        public function filterByNumberOfChildren($num, $comparison = ">")
        {
            return parent::filterByNumberOfChildren($num, $comparison);
        }
        public function filterByDateLastModified($date, $comparison = "=")
        {
            return parent::filterByDateLastModified($date, $comparison);
        }
        /**
         * Filters by public date
         * @param string $date
         */
        public function filterByPublicDate($date, $comparison = "=")
        {
            return parent::filterByPublicDate($date, $comparison);
        }
        public function filterBySelectAttribute($akHandle, $value)
        {
            return parent::filterBySelectAttribute($akHandle, $value);
        }
        /**
         * If true, pages will be checked for permissions prior to being returned
         * @param bool $checkForPermissions
         */
        public function displayOnlyPermittedPages($checkForPermissions)
        {
            return parent::displayOnlyPermittedPages($checkForPermissions);
        }
        protected function setBaseQuery($additionalFields = "")
        {
            return parent::setBaseQuery($additionalFields);
        }
        protected function setupSystemPagesToExclude()
        {
            return parent::setupSystemPagesToExclude();
        }
        protected function loadPageID($cID, $versionOrig = "RECENT")
        {
            return parent::loadPageID($cID, $versionOrig);
        }
        public function getTotal()
        {
            return parent::getTotal();
        }
        public function debug($dbg = true)
        {
            return parent::debug($dbg);
        }
        protected function setQuery($query)
        {
            return parent::setQuery($query);
        }
        protected function getQuery()
        {
            return parent::getQuery();
        }
        public function addToQuery($query)
        {
            return parent::addToQuery($query);
        }
        protected function setupAutoSort()
        {
            return parent::setupAutoSort();
        }
        protected function executeBase()
        {
            return parent::executeBase();
        }
        protected function setupSortByString()
        {
            return parent::setupSortByString();
        }
        protected function setupAttributeSort()
        {
            return parent::setupAttributeSort();
        }
        /**
         * Adds a filter to this item list.
         */
        public function filter($column, $value, $comparison = "=")
        {
            return parent::filter($column, $value, $comparison);
        }
        public function getSearchResultsClass($field)
        {
            return parent::getSearchResultsClass($field);
        }
        public function sortBy($key, $dir = "asc")
        {
            return parent::sortBy($key, $dir);
        }
        public function groupBy($key)
        {
            return parent::groupBy($key);
        }
        public function having($column, $value, $comparison = "=")
        {
            return parent::having($column, $value, $comparison);
        }
        public function getSortByURL($column, $dir = "asc", $baseURL = false, $additionalVars = array())
        {
            return parent::getSortByURL($column, $dir, $baseURL, $additionalVars);
        }
        protected function setupAttributeFilters($join)
        {
            return parent::setupAttributeFilters($join);
        }
        public function filterByAttribute($column, $value, $comparison = "=")
        {
            return parent::filterByAttribute($column, $value, $comparison);
        }
        public function enableStickySearchRequest($namespace = false)
        {
            return parent::enableStickySearchRequest($namespace);
        }
        public function getQueryStringSortVariable()
        {
            return parent::getQueryStringSortVariable();
        }
        public function getQueryStringSortDirectionVariable()
        {
            return parent::getQueryStringSortDirectionVariable();
        }
        protected function getStickySearchNameSpace($namespace = "")
        {
            return parent::getStickySearchNameSpace($namespace);
        }
        public function resetSearchRequest($namespace = "")
        {
            return parent::resetSearchRequest($namespace);
        }
        public function addToSearchRequest($key, $value)
        {
            return parent::addToSearchRequest($key, $value);
        }
        public function getSearchRequest()
        {
            return parent::getSearchRequest();
        }
        public function setItemsPerPage($num)
        {
            return parent::setItemsPerPage($num);
        }
        public function getItemsPerPage()
        {
            return parent::getItemsPerPage();
        }
        public function setItems($items)
        {
            return parent::setItems($items);
        }
        protected function loadQueryStringPagingVariable()
        {
            return parent::loadQueryStringPagingVariable();
        }
        public function setNameSpace($ns)
        {
            return parent::setNameSpace($ns);
        }
        /**
         * Returns an array of object by "page"
         */
        public function getPage($page = false)
        {
            return parent::getPage($page);
        }
        protected function setCurrentPage($page = false)
        {
            return parent::setCurrentPage($page);
        }
        /**
         * Displays summary text about a list
         */
        public function displaySummary($right_content = "")
        {
            return parent::displaySummary($right_content);
        }
        public function isActiveSortColumn($column)
        {
            return parent::isActiveSortColumn($column);
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function requiresPaging()
        {
            return parent::requiresPaging();
        }
        public function getPagination($url = false, $additionalVars = array())
        {
            return parent::getPagination($url, $additionalVars);
        }
        /**
         * Gets paging that works in our new format */
        public function displayPagingV2($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPagingV2($script, $return, $additionalVars);
        }
        /**
         * Gets standard HTML to display paging */
        public function displayPaging($script = false, $return = false, $additionalVars = array())
        {
            return parent::displayPaging($script, $return, $additionalVars);
        }
        /**
         * Returns an object with properties useful for paging
         */
        public function getSummary()
        {
            return parent::getSummary();
        }
        public function getSortBy()
        {
            return parent::getSortBy();
        }
        public function getSortByDirection()
        {
            return parent::getSortByDirection();
        }
        /**
         * Sets up a multiple columns to search by. Each argument is taken "as-is" (including asc or desc) and concatenated with commas
         * Note that this is overrides any previous sortByMultiple() call, and all sortBy() calls. Alternatively, you can pass a single
         * array with multiple columns to sort by as its values.
         * e.g. $list->sortByMultiple('columna desc', 'columnb asc');
         * or $list->sortByMultiple(array('columna desc', 'columnb asc'));
         */
        public function sortByMultiple()
        {
            return parent::sortByMultiple();
        }
    }

    class StartingPointPackage extends \Concrete\Core\Package\StartingPointPackage
    {
        public static function hasCustomList()
        {
            return Concrete\Core\Package\StartingPointPackage::hasCustomList();
        }
        public static function getAvailableList()
        {
            return Concrete\Core\Package\StartingPointPackage::getAvailableList();
        }
        /**
         * @param string $pkgHandle
         * @return static
         */
        public static function getClass($pkgHandle)
        {
            return Concrete\Core\Package\StartingPointPackage::getClass($pkgHandle);
        }
        /**
         * @return StartingPointInstallRoutine[]
         */
        public function getInstallRoutines()
        {
            return parent::getInstallRoutines();
        }
        public function add_home_page()
        {
            return parent::add_home_page();
        }
        public function install_attributes()
        {
            return parent::install_attributes();
        }
        public function install_dashboard()
        {
            return parent::install_dashboard();
        }
        public function install_gathering()
        {
            return parent::install_gathering();
        }
        public function install_page_types()
        {
            return parent::install_page_types();
        }
        public function install_page_templates()
        {
            return parent::install_page_templates();
        }
        public function install_required_single_pages()
        {
            return parent::install_required_single_pages();
        }
        public function install_image_editor()
        {
            return parent::install_image_editor();
        }
        public function install_blocktypes()
        {
            return parent::install_blocktypes();
        }
        public function install_themes()
        {
            return parent::install_themes();
        }
        public function install_jobs()
        {
            return parent::install_jobs();
        }
        public function install_config()
        {
            return parent::install_config();
        }
        public function import_files()
        {
            return parent::import_files();
        }
        public function install_content()
        {
            return parent::install_content();
        }
        public function install_database()
        {
            return parent::install_database();
        }
        protected function indexAdditionalDatabaseFields()
        {
            return parent::indexAdditionalDatabaseFields();
        }
        public function add_users()
        {
            return parent::add_users();
        }
        public function make_directories()
        {
            return parent::make_directories();
        }
        public function finish()
        {
            return parent::finish();
        }
        public function install_permissions()
        {
            return parent::install_permissions();
        }
        public function set_site_permissions()
        {
            return parent::set_site_permissions();
        }
        /** Returns the display name of a category of package items (localized and escaped accordingly to $format)
         * @param string $categoryHandle The category handle
         * @param string $format         = 'html' Escape the result in html format (if $format is 'html'). If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public static function getPackageItemsCategoryDisplayName($categoryHandle, $format = "html")
        {
            return Concrete\Core\Package\Package::getPackageItemsCategoryDisplayName($categoryHandle, $format);
        }
        /**
         * Returns the name of an object belonging to a package.
         *
         * @param mixed $item
         *
         * @return string
         */
        public static function getItemName($item)
        {
            return Concrete\Core\Package\Package::getItemName($item);
        }
        /**
         * This is the pre-test routine that packages run through before they are installed. Any errors that come here are
         * to be returned in the form of an array so we can show the user. If it's all good we return true.
         *
         * @param string $package Package handle
         * @param bool $testForAlreadyInstalled
         *
         * @return array|bool Returns an array of errors or true if the package can be installed
         */
        public static function testForInstall($package, $testForAlreadyInstalled = true)
        {
            return Concrete\Core\Package\Package::testForInstall($package, $testForAlreadyInstalled);
        }
        /**
         * Returns the version of concrete5 required by the package.
         *
         * @return string
         */
        public function getApplicationVersionRequired()
        {
            return parent::getApplicationVersionRequired();
        }
        /**
         * Returns a Package object for the given package handle, null if not found.
         *
         * @param string $pkgHandle
         *
         * @return Package
         */
        public static function getByHandle($pkgHandle)
        {
            return Concrete\Core\Package\Package::getByHandle($pkgHandle);
        }
        /**
         * Returns an array of packages that have newer versions in the local packages directory
         * than those which are in the Packages table. This means they're ready to be upgraded.
         *
         * @return Package[]
         */
        public static function getLocalUpgradeablePackages()
        {
            return Concrete\Core\Package\Package::getLocalUpgradeablePackages();
        }
        /**
         * Returns all available packages.
         *
         * @param bool $filterInstalled True to only return installed packages
         *
         * @return Package[]
         */
        public static function getAvailablePackages($filterInstalled = true)
        {
            return Concrete\Core\Package\Package::getAvailablePackages($filterInstalled);
        }
        /**
         * Returns all installed package handles.
         *
         * @return string[]
         */
        public static function getInstalledHandles()
        {
            return Concrete\Core\Package\Package::getInstalledHandles();
        }
        /**
         * Finds all packages that have an upgraded version available in the marketplace.
         *
         * @return Package[]
         */
        public static function getRemotelyUpgradeablePackages()
        {
            return Concrete\Core\Package\Package::getRemotelyUpgradeablePackages();
        }
        /**
         * Returns an array of all installed packages.
         *
         * @return Package[]
         */
        public static function getInstalledList()
        {
            return Concrete\Core\Package\Package::getInstalledList();
        }
        /**
         * Returns the path to the package's folder, relative to the install path.
         *
         * @return string
         */
        public function getRelativePath()
        {
            return parent::getRelativePath();
        }
        /**
         * Returns the package handle.
         *
         * @return string
         */
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        /**
         * Gets the date the package was added to the system.
         *
         * @return string date formatted like: 2009-01-01 00:00:00
         */
        public function getPackageDateInstalled()
        {
            return parent::getPackageDateInstalled();
        }
        public function getPackageVersionUpdateAvailable()
        {
            return parent::getPackageVersionUpdateAvailable();
        }
        /**
         * Returns true if the package is installed, false if not.
         *
         * @return bool
         */
        public function isPackageInstalled()
        {
            return parent::isPackageInstalled();
        }
        /**
         * Gets the contents of the package's CHANGELOG file. If no changelog is available an empty string is returned.
         *
         * @return string
         */
        public function getChangelogContents()
        {
            return parent::getChangelogContents();
        }
        public function getPackagePath()
        {
            return parent::getPackagePath();
        }
        /**
         * Returns the currently installed package version.
         * NOTE: This function only returns a value if getLocalUpgradeablePackages() has been called first!
         *
         * @return string
         */
        public function getPackageCurrentlyInstalledVersion()
        {
            return parent::getPackageCurrentlyInstalledVersion();
        }
        /**
         * @return bool
         */
        public function providesCoreExtensionAutoloaderMapping()
        {
            return parent::providesCoreExtensionAutoloaderMapping();
        }
        /**
         * Returns custom autoloader prefixes registered by the class loader.
         *
         * @return array Keys represent the namespace, not relative to the package's namespace. Values are the path, and are relative to the package directory.
         */
        public function getPackageAutoloaderRegistries()
        {
            return parent::getPackageAutoloaderRegistries();
        }
        /**
         * Returns true if the package has a post install screen.
         *
         * @return bool
         */
        public function hasInstallPostScreen()
        {
            return parent::hasInstallPostScreen();
        }
        /**
         * Returns true if the package has an install options screen.
         *
         * @return bool
         */
        public function showInstallOptionsScreen()
        {
            return parent::showInstallOptionsScreen();
        }
        public function hasInstallNotes()
        {
            return parent::hasInstallNotes();
        }
        public function allowsFullContentSwap()
        {
            return parent::allowsFullContentSwap();
        }
        /**
         * Loads package translation files into zend translate.
         *
         * @param string                                  $locale    = null The identifier of the locale to activate (used to build the language file path). If empty we'll use currently active locale.
         * @param \Zend\I18n\Translator\Translator|string $translate = 'current' The Zend Translator instance that holds the translations (set to 'current' to use the current one)
         */
        public function setupPackageLocalization($locale = null, $translate = "current")
        {
            return parent::setupPackageLocalization($locale, $translate);
        }
        /**
         * @return bool|int[] true on success, array of error codes on failure
         */
        public function testForUninstall()
        {
            return parent::testForUninstall();
        }
        /**
         * Uninstalls the package. Removes any blocks, themes, or pages associated with the package.
         */
        public function uninstall()
        {
            return parent::uninstall();
        }
        /**
         * Returns an array of package items (e.g. blocks, themes).
         *
         * @return array
         */
        public function getPackageItems()
        {
            return parent::getPackageItems();
        }
        /**
         * Destroys all the existing proxy classes for this package.
         *
         * @return bool
         */
        protected function destroyProxyClasses()
        {
            return parent::destroyProxyClasses();
        }
        /**
         * Gets a package specific entity manager.
         *
         * @return \Concrete\Core\Database\DatabaseStructureManager
         */
        public function getDatabaseStructureManager()
        {
            return parent::getDatabaseStructureManager();
        }
        /**
         * @return EntityManagerFactoryInterface
         */
        public function getEntityManagerFactory()
        {
            return parent::getEntityManagerFactory();
        }
        /**
         * Gets a package specific entity manager.
         *
         * @return \Doctrine\ORM\EntityManager
         */
        public function getEntityManager()
        {
            return parent::getEntityManager();
        }
        /**
         * Removes any existing pages, files, stacks, block and page types and installs content from the package.
         *
         * @param $options
         */
        public function swapContent($options)
        {
            return parent::swapContent($options);
        }
        /**
         * @param array $options
         *
         * @return bool
         */
        protected function validateClearSiteContents($options)
        {
            return parent::validateClearSiteContents($options);
        }
        /**
         * Returns a path to where the packages files are located.
         *
         * @return string $path
         */
        public function contentProvidesFileThumbnails()
        {
            return parent::contentProvidesFileThumbnails();
        }
        /**
         * Converts package install test errors to human-readable strings.
         *
         * @param $testResults Package install test errors
         *
         * @return array
         */
        public static function mapError($testResults)
        {
            return Concrete\Core\Package\Package::mapError($testResults);
        }
        /**
         * Returns the directory containing package entities.
         *
         * @return string
         */
        public function getPackageEntitiesPath()
        {
            return parent::getPackageEntitiesPath();
        }
        /**
         * Called to enable package specific configuration.
         */
        public function registerConfigNamespace()
        {
            return parent::registerConfigNamespace();
        }
        /**
         * Get the standard database config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getConfig()
        {
            return parent::getConfig();
        }
        /**
         * Get the standard database config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getDatabaseConfig()
        {
            return parent::getDatabaseConfig();
        }
        /**
         * Get the standard filesystem config liaison.
         *
         * @return \Concrete\Core\Config\Repository\Liaison
         */
        public function getFileConfig()
        {
            return parent::getFileConfig();
        }
        /**
         * Installs the package info row and installs the database. Packages installing additional content should override this method, call the parent method,
         * and use the resulting package object for further installs.
         *
         * @return Package
         */
        public function install()
        {
            return parent::install();
        }
        /**
         * Returns the translated name of the package.
         *
         * @return string
         */
        public function getPackageName()
        {
            return parent::getPackageName();
        }
        /**
         * Returns the translated package description.
         *
         * @return string
         */
        public function getPackageDescription()
        {
            return parent::getPackageDescription();
        }
        /**
         * Returns the installed package version.
         *
         * @return string
         */
        public function getPackageVersion()
        {
            return parent::getPackageVersion();
        }
        /**
         * Returns a Package object for the given package id, null if not found.
         *
         * @param int $pkgID
         *
         * @return Package
         */
        public static function getByID($pkgID)
        {
            return Concrete\Core\Package\Package::getByID($pkgID);
        }
        /**
         * Installs the packages database through doctrine entities and db.xml
         * database definitions.
         */
        public function installDatabase()
        {
            return parent::installDatabase();
        }
        public function installEntitiesDatabase()
        {
            return parent::installEntitiesDatabase();
        }
        /**
         * Installs a package's database from an XML file.
         *
         * @param string $xmlFile Path to the database XML file
         *
         * @return bool|\stdClass Returns false if the XML file could not be found
         *
         * @throws \Doctrine\DBAL\ConnectionException
         */
        public static function installDB($xmlFile)
        {
            return Concrete\Core\Package\Package::installDB($xmlFile);
        }
        /**
         * Updates the available package number in the database.
         *
         * @param string $vNum New version number
         */
        public function updateAvailableVersionNumber($vNum)
        {
            return parent::updateAvailableVersionNumber($vNum);
        }
        /**
         * Returns the package ID.
         *
         * @return int
         */
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        /**
         * Updates a package's name, description, version and ID using the current class properties.
         */
        public function upgradeCoreData()
        {
            return parent::upgradeCoreData();
        }
        /**
         * Upgrades a package's database and refreshes all blocks.
         */
        public function upgrade()
        {
            return parent::upgrade();
        }
        /**
         * Updates a package's database using entities and a db.xml.
         *
         * @throws \Doctrine\DBAL\ConnectionException
         * @throws \Exception
         */
        public function upgradeDatabase()
        {
            return parent::upgradeDatabase();
        }
        /**
         * Moves the current package's directory to the trash directory renamed with the package handle and a date code.
         */
        public function backup()
        {
            return parent::backup();
        }
        /**
         * If a package was just backed up by this instance of the package object and the packages/package handle directory doesn't exist, this will restore the
         * package from the trash.
         */
        public function restore()
        {
            return parent::restore();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    /**
     * @deprecated
     */
    class TaskPermission extends \Concrete\Core\Legacy\TaskPermission
    {
        public function getByHandle($handle)
        {
            return parent::getByHandle($handle);
        }
        /**
         * Checks to see if there is a fatal error with this particular permission call.
         */
        public function isError()
        {
            return parent::isError();
        }
        /**
         * Returns the error code if there is one
         */
        public function getError()
        {
            return parent::getError();
        }
        /**
         * Legacy
         * @private
         */
        public function getOriginalObject()
        {
            return parent::getOriginalObject();
        }
        public function getResponseObject()
        {
            return parent::getResponseObject();
        }
    }

    class User extends \Concrete\Core\User\User
    {
        /** Return an User instance given its id (or null if it's not found)
         * @param int $uID The id of the user
         * @param bool $login = false Set to true to make the user the current one
         * @param bool $cacheItemsOnLogin = false Set to true to cache some items when $login is true
         *
         * @return User|null
         */
        public static function getByUserID($uID, $login = false, $cacheItemsOnLogin = true)
        {
            return Concrete\Core\User\User::getByUserID($uID, $login, $cacheItemsOnLogin);
        }
        /**
         * @param int $uID
         *
         * @return User
         */
        public function loginByUserID($uID)
        {
            return parent::loginByUserID($uID);
        }
        public static function isLoggedIn()
        {
            return Concrete\Core\User\User::isLoggedIn();
        }
        public function checkLogin()
        {
            return parent::checkLogin();
        }
        public function getUserInfoObject()
        {
            return parent::getUserInfoObject();
        }
        public function recordLogin()
        {
            return parent::recordLogin();
        }
        public function recordView($c)
        {
            return parent::recordView($c);
        }
        public function encryptPassword($uPassword, $salt = null)
        {
            return parent::encryptPassword($uPassword, $salt);
        }
        public function legacyEncryptPassword($uPassword)
        {
            return parent::legacyEncryptPassword($uPassword);
        }
        public function isActive()
        {
            return parent::isActive();
        }
        public function isSuperUser()
        {
            return parent::isSuperUser();
        }
        public function getLastOnline()
        {
            return parent::getLastOnline();
        }
        public function getUserName()
        {
            return parent::getUserName();
        }
        public function isRegistered()
        {
            return parent::isRegistered();
        }
        public function getUserID()
        {
            return parent::getUserID();
        }
        public function getUserTimezone()
        {
            return parent::getUserTimezone();
        }
        public function getUserSessionValidSince()
        {
            return parent::getUserSessionValidSince();
        }
        public function setAuthTypeCookie($authType)
        {
            return parent::setAuthTypeCookie($authType);
        }
        public function setLastAuthType(Concrete\Core\Authentication\AuthenticationType $at)
        {
            return parent::setLastAuthType($at);
        }
        public function getLastAuthType()
        {
            return parent::getLastAuthType();
        }
        public function unloadAuthenticationTypes()
        {
            return parent::unloadAuthenticationTypes();
        }
        public function logout($hard = true)
        {
            return parent::logout($hard);
        }
        public function invalidateSession($hard = true)
        {
            return parent::invalidateSession($hard);
        }
        public static function verifyAuthTypeCookie()
        {
            return Concrete\Core\User\User::verifyAuthTypeCookie();
        }
        public function getUserGroupObjects()
        {
            return parent::getUserGroupObjects();
        }
        public function getUserGroups()
        {
            return parent::getUserGroups();
        }
        /**
         * Sets a default language for a user record.
         */
        public function setUserDefaultLanguage($lang)
        {
            return parent::setUserDefaultLanguage($lang);
        }
        /**
         * Gets the default language for the logged-in user.
         */
        public function getUserDefaultLanguage()
        {
            return parent::getUserDefaultLanguage();
        }
        /**
         * Gets the default language for the logged-in user.
         */
        public function getLastPasswordChange()
        {
            return parent::getLastPasswordChange();
        }
        /**
         * Checks to see if the current user object is registered. If so, it queries that records
         * default language. Otherwise, it falls back to sitewide settings.
         */
        public function getUserLanguageToDisplay()
        {
            return parent::getUserLanguageToDisplay();
        }
        public function refreshUserGroups()
        {
            return parent::refreshUserGroups();
        }
        public function getUserAccessEntityObjects()
        {
            return parent::getUserAccessEntityObjects();
        }
        public function _getUserGroups($disableLogin = false)
        {
            return parent::_getUserGroups($disableLogin);
        }
        public function enterGroup($g)
        {
            return parent::enterGroup($g);
        }
        public function exitGroup($g)
        {
            return parent::exitGroup($g);
        }
        public function inGroup($g)
        {
            return parent::inGroup($g);
        }
        public function loadMasterCollectionEdit($mcID, $ocID)
        {
            return parent::loadMasterCollectionEdit($mcID, $ocID);
        }
        public function loadCollectionEdit(&$c)
        {
            return parent::loadCollectionEdit($c);
        }
        public function unloadCollectionEdit($removeCache = true)
        {
            return parent::unloadCollectionEdit($removeCache);
        }
        public function config($cfKey)
        {
            return parent::config($cfKey);
        }
        public function markPreviousFrontendPage(Concrete\Core\Page\Page $c)
        {
            return parent::markPreviousFrontendPage($c);
        }
        public function getPreviousFrontendPageID()
        {
            return parent::getPreviousFrontendPageID();
        }
        public function saveConfig($cfKey, $cfValue)
        {
            return parent::saveConfig($cfKey, $cfValue);
        }
        public function refreshCollectionEdit(&$c)
        {
            return parent::refreshCollectionEdit($c);
        }
        public function forceCollectionCheckInAll()
        {
            return parent::forceCollectionCheckInAll();
        }
        /**
         * @see PasswordHash
         *
         * @return PasswordHash
         */
        public function getUserPasswordHasher()
        {
            return parent::getUserPasswordHasher();
        }
        /**
         * Manage user session writing.
         *
         * @param bool $cache_interface
         */
        public function persist($cache_interface = true)
        {
            return parent::persist($cache_interface);
        }
        public function logIn($cache_interface = true)
        {
            return parent::logIn($cache_interface);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class UserAttributeKey extends \Concrete\Core\Attribute\Key\UserKey
    {
        public static function getDefaultIndexedSearchTable()
        {
            return Concrete\Core\Attribute\Key\UserKey::getDefaultIndexedSearchTable();
        }
        public static function getAttributes($uID, $method = "getValue")
        {
            return Concrete\Core\Attribute\Key\UserKey::getAttributes($uID, $method);
        }
        public function getAttributeKeyDisplayOrder()
        {
            return parent::getAttributeKeyDisplayOrder();
        }
        public function load($akIdentifier, $loadBy = "akID")
        {
            return parent::load($akIdentifier, $loadBy);
        }
        public function getAttributeValue($avID, $method = "getValue")
        {
            return parent::getAttributeValue($avID, $method);
        }
        public static function getByID($akID)
        {
            return Concrete\Core\Attribute\Key\UserKey::getByID($akID);
        }
        public static function getByHandle($akHandle)
        {
            return Concrete\Core\Attribute\Key\UserKey::getByHandle($akHandle);
        }
        public function export($axml, $exporttype = "full")
        {
            return parent::export($axml, $exporttype);
        }
        public static function import(SimpleXMLElement $ak)
        {
            return Concrete\Core\Attribute\Key\UserKey::import($ak);
        }
        public function isAttributeKeyDisplayedOnProfile()
        {
            return parent::isAttributeKeyDisplayedOnProfile();
        }
        public function isAttributeKeyEditableOnProfile()
        {
            return parent::isAttributeKeyEditableOnProfile();
        }
        public function isAttributeKeyRequiredOnProfile()
        {
            return parent::isAttributeKeyRequiredOnProfile();
        }
        public function isAttributeKeyEditableOnRegister()
        {
            return parent::isAttributeKeyEditableOnRegister();
        }
        public function isAttributeKeyRequiredOnRegister()
        {
            return parent::isAttributeKeyRequiredOnRegister();
        }
        public function isAttributeKeyDisplayedOnMemberList()
        {
            return parent::isAttributeKeyDisplayedOnMemberList();
        }
        public function isAttributeKeyActive()
        {
            return parent::isAttributeKeyActive();
        }
        public function activate()
        {
            return parent::activate();
        }
        public function deactivate()
        {
            return parent::deactivate();
        }
        public static function getList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getList();
        }
        protected function saveAttribute($uo, $value = false)
        {
            return parent::saveAttribute($uo, $value);
        }
        public static function add($type, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\UserKey::add($type, $args, $pkg);
        }
        public function update($args)
        {
            return parent::update($args);
        }
        public function delete()
        {
            return parent::delete();
        }
        public static function getColumnHeaderList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getColumnHeaderList();
        }
        public static function getEditableList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getEditableList();
        }
        public static function getSearchableList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getSearchableList();
        }
        public static function getSearchableIndexedList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getSearchableIndexedList();
        }
        public static function getImporterList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getImporterList();
        }
        public static function getPublicProfileList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getPublicProfileList();
        }
        public static function getRegistrationList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getRegistrationList();
        }
        public static function getMemberListList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getMemberListList();
        }
        public static function getEditableInProfileList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getEditableInProfileList();
        }
        public static function getUserAddedList()
        {
            return Concrete\Core\Attribute\Key\UserKey::getUserAddedList();
        }
        public static function updateAttributesDisplayOrder($uats)
        {
            return Concrete\Core\Attribute\Key\UserKey::updateAttributesDisplayOrder($uats);
        }
        public function getIndexedSearchTable()
        {
            return parent::getIndexedSearchTable();
        }
        public function getSearchIndexFieldDefinition()
        {
            return parent::getSearchIndexFieldDefinition();
        }
        /**
         * Returns the name for this attribute key.
         */
        public function getAttributeKeyName()
        {
            return parent::getAttributeKeyName();
        }
        /** Returns the display name for this attribute (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display name won't be escaped.
         *
         * @return string
         */
        public function getAttributeKeyDisplayName($format = "html")
        {
            return parent::getAttributeKeyDisplayName($format);
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getAttributeKeyHandle()
        {
            return parent::getAttributeKeyHandle();
        }
        /**
         * Deprecated. Going to be replaced by front end display name.
         */
        public function getAttributeKeyDisplayHandle()
        {
            return parent::getAttributeKeyDisplayHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getAttributeKeyID()
        {
            return parent::getAttributeKeyID();
        }
        public function getAttributeKeyCategoryID()
        {
            return parent::getAttributeKeyCategoryID();
        }
        /**
         * Returns whether the attribute key is searchable.
         */
        public function isAttributeKeySearchable()
        {
            return parent::isAttributeKeySearchable();
        }
        /**
         * Returns whether the attribute key is internal.
         */
        public function isAttributeKeyInternal()
        {
            return parent::isAttributeKeyInternal();
        }
        /**
         * Returns whether the attribute key is indexed as a "keyword search" field.
         */
        public function isAttributeKeyContentIndexed()
        {
            return parent::isAttributeKeyContentIndexed();
        }
        /**
         * Returns whether the attribute key is one that was automatically created by a process.
         */
        public function isAttributeKeyAutoCreated()
        {
            return parent::isAttributeKeyAutoCreated();
        }
        /**
         * Returns whether the attribute key is included in the standard search for this category.
         */
        public function isAttributeKeyColumnHeader()
        {
            return parent::isAttributeKeyColumnHeader();
        }
        /**
         * Returns whether the attribute key is one that can be edited through the frontend.
         */
        public function isAttributeKeyEditable()
        {
            return parent::isAttributeKeyEditable();
        }
        public function getComputedAttributeKeyCategoryHandle()
        {
            return parent::getComputedAttributeKeyCategoryHandle();
        }
        public function getPackageID()
        {
            return parent::getPackageID();
        }
        public function getPackageHandle()
        {
            return parent::getPackageHandle();
        }
        public static function getInstanceByID($akID)
        {
            return Concrete\Core\Attribute\Key\Key::getInstanceByID($akID);
        }
        /**
         * Returns an attribute type object.
         */
        public function getAttributeType()
        {
            return parent::getAttributeType();
        }
        /**
         * Returns the attribute type handle.
         */
        public function getAttributeTypeHandle()
        {
            return parent::getAttributeTypeHandle();
        }
        public function getAttributeKeyType()
        {
            return parent::getAttributeKeyType();
        }
        /**
         * Returns a list of all attributes of this category.
         */
        public static function getAttributeKeyList($akCategoryHandle, $filters = array())
        {
            return Concrete\Core\Attribute\Key\Key::getAttributeKeyList($akCategoryHandle, $filters);
        }
        public static function exportList($xml)
        {
            return Concrete\Core\Attribute\Key\Key::exportList($xml);
        }
        /**
         * Note, this queries both the pkgID found on the AttributeKeys table AND any attribute keys of a special type
         * installed by that package, and any in categories by that package.
         * That's because a special type, if the package is uninstalled, is going to be unusable
         * by attribute keys that still remain.
         */
        public static function getListByPackage($pkg)
        {
            return Concrete\Core\Attribute\Key\Key::getListByPackage($pkg);
        }
        /**
         * Adds an attribute key.
         */
        protected static function addAttributeKey($akCategoryHandle, $type, $args, $pkg = false)
        {
            return Concrete\Core\Attribute\Key\Key::addAttributeKey($akCategoryHandle, $type, $args, $pkg);
        }
        public function refreshCache()
        {
            return parent::refreshCache();
        }
        /**
         * Duplicates an attribute key.
         */
        public function duplicate($args = array())
        {
            return parent::duplicate($args);
        }
        public function inAttributeSet($as)
        {
            return parent::inAttributeSet($as);
        }
        public function setAttributeKeyColumnHeader($r)
        {
            return parent::setAttributeKeyColumnHeader($r);
        }
        /**
         * @param string $table
         * @param array $columnHeaders
         * @param \Concrete\Core\Attribute\Value\ValueList $attribs
         * @param mixed $rs this is a legacy parameter, not actually used anymore
         */
        public function reindex($table, $columnHeaders, $attribs, $rs = null)
        {
            return parent::reindex($table, $columnHeaders, $attribs, $rs);
        }
        public function updateSearchIndex($prevHandle = false)
        {
            return parent::updateSearchIndex($prevHandle);
        }
        public function getAttributeValueIDList()
        {
            return parent::getAttributeValueIDList();
        }
        /**
         * Adds a generic attribute record (with this type) to the AttributeValues table.
         */
        public function addAttributeValue()
        {
            return parent::addAttributeValue();
        }
        public function getAttributeKeyIconSRC()
        {
            return parent::getAttributeKeyIconSRC();
        }
        public function getController()
        {
            return parent::getController();
        }
        /**
         * Renders a view for this attribute key. If no view is default we display it's "view"
         * Valid views are "view", "form" or a custom view (if the attribute has one in its directory)
         * Additionally, an attribute does not have to have its own interface. If it doesn't, then whatever
         * is printed in the corresponding $view function in the attribute's controller is printed out.
         */
        public function render($view = "view", $value = false, $return = false)
        {
            return parent::render($view, $value, $return);
        }
        /**
         * Validates the request object to see if the current request fulfills the "requirement" portion of an attribute.
         *
         * @return bool|\Concrete\Core\Error\Error
         */
        public function validateAttributeForm()
        {
            return parent::validateAttributeForm();
        }
        public function createIndexedSearchTable()
        {
            return parent::createIndexedSearchTable();
        }
        public function setAttributeSet($as)
        {
            return parent::setAttributeSet($as);
        }
        public function clearAttributeSets()
        {
            return parent::clearAttributeSets();
        }
        public function getAttributeSets()
        {
            return parent::getAttributeSets();
        }
        /**
         * Saves an attribute using its stock form.
         */
        public function saveAttributeForm($obj)
        {
            return parent::saveAttributeForm($obj);
        }
        /**
         * Sets an attribute directly with a passed value.
         */
        public function setAttribute($obj, $value)
        {
            return parent::setAttribute($obj, $value);
        }
        /**
         * @deprecated
         */
        public function outputSearchHTML()
        {
            return parent::outputSearchHTML();
        }
        /**
         * @deprecated
         */
        public function getKeyName()
        {
            return parent::getKeyName();
        }
        /**
         * Returns the handle for this attribute key.
         */
        public function getKeyHandle()
        {
            return parent::getKeyHandle();
        }
        /**
         * Returns the ID for this attribute key.
         */
        public function getKeyID()
        {
            return parent::getKeyID();
        }
        public static function exportTranslations()
        {
            return Concrete\Core\Attribute\Key\Key::exportTranslations();
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class UserList extends \Concrete\Core\User\UserList
    {
        protected function getAttributeKeyClassName()
        {
            return parent::getAttributeKeyClassName();
        }
        /**
         * The total results of the query
         * @return int
         */
        public function getTotalResults()
        {
            return parent::getTotalResults();
        }
        /**
         * Gets the pagination object for the query.
         * @return Pagination
         */
        protected function createPaginationObject()
        {
            return parent::createPaginationObject();
        }
        /**
         * @param $queryRow
         * @return \Concrete\Core\User\UserInfo
         */
        public function getResult($queryRow)
        {
            return parent::getResult($queryRow);
        }
        /**
         * similar to get except it returns an array of userIDs
         * much faster than getting a UserInfo object for each result if all you need is the user's id
         * @return array $userIDs
         */
        public function getResultIDs()
        {
            return parent::getResultIDs();
        }
        public function createQuery()
        {
            return parent::createQuery();
        }
        public function finalizeQuery(Doctrine\DBAL\Query\QueryBuilder $query)
        {
            return parent::finalizeQuery($query);
        }
        public function includeInactiveUsers()
        {
            return parent::includeInactiveUsers();
        }
        public function includeUnvalidatedUsers()
        {
            return parent::includeUnvalidatedUsers();
        }
        /**
         * Explicitly filters by whether a user is active or not. Does this by setting "include inactive users"
         * to true, THEN filtering them in our out. Some settings here are redundant given the default settings
         * but a little duplication is ok sometimes.
         * @param $val
         */
        public function filterByIsActive($isActive)
        {
            return parent::filterByIsActive($isActive);
        }
        /**
         * Filter list by user name
         * @param $username
         */
        public function filterByUserName($username)
        {
            return parent::filterByUserName($username);
        }
        /**
         * Filter list by user name but as a like parameter
         * @param $username
         */
        public function filterByFuzzyUserName($username)
        {
            return parent::filterByFuzzyUserName($username);
        }
        /**
         * Filters keyword fields by keywords (including username, email and attributes).
         * @param $keywords
         */
        public function filterByKeywords($keywords)
        {
            return parent::filterByKeywords($keywords);
        }
        /**
         * Filters the user list for only users within the provided group.  Accepts an instance of a group object or a string group name
         * @param \Group | string $group
         * @param boolean $inGroup
         * @return void
         */
        public function filterByGroup($group = "", $inGroup = true)
        {
            return parent::filterByGroup($group, $inGroup);
        }
        /**
         * Filters by date added
         * @param string $date
         */
        public function filterByDateAdded($date, $comparison = "=")
        {
            return parent::filterByDateAdded($date, $comparison);
        }
        /**
         * Filters by Group ID
         */
        public function filterByGroupID($gID)
        {
            return parent::filterByGroupID($gID);
        }
        public function filterByNoGroup()
        {
            return parent::filterByNoGroup();
        }
        public function sortByUserID()
        {
            return parent::sortByUserID();
        }
        public function sortByUserName()
        {
            return parent::sortByUserName();
        }
        public function sortByDateAdded()
        {
            return parent::sortByDateAdded();
        }
        /**
         * Filters by a attribute.
         */
        public function filterByAttribute($handle, $value, $comparison = "=")
        {
            return parent::filterByAttribute($handle, $value, $comparison);
        }
        /**
         * @param StickyRequest $request
         */
        public function setupAutomaticSorting(Concrete\Core\Search\StickyRequest $request = null)
        {
            return parent::setupAutomaticSorting($request);
        }
        public function getQueryObject()
        {
            return parent::getQueryObject();
        }
        public function deliverQueryObject()
        {
            return parent::deliverQueryObject();
        }
        public function executeGetResults()
        {
            return parent::executeGetResults();
        }
        public function debugStart()
        {
            return parent::debugStart();
        }
        public function debugStop()
        {
            return parent::debugStop();
        }
        protected function executeSortBy($column, $direction = "asc")
        {
            return parent::executeSortBy($column, $direction);
        }
        protected function executeSanitizedSortBy($column, $direction = "asc")
        {
            return parent::executeSanitizedSortBy($column, $direction);
        }
        /**
         * @deprecated
         */
        public function filter($field, $value, $comparison = "=")
        {
            return parent::filter($field, $value, $comparison);
        }
        public function debug()
        {
            return parent::debug();
        }
        public function isDebugged()
        {
            return parent::isDebugged();
        }
        public function sortBy($field, $direction = "asc")
        {
            return parent::sortBy($field, $direction);
        }
        public function sanitizedSortBy($field, $direction = "asc")
        {
            return parent::sanitizedSortBy($field, $direction);
        }
        /** Returns a full array of results. */
        public function getResults()
        {
            return parent::getResults();
        }
        public function getActiveSortColumn()
        {
            return parent::getActiveSortColumn();
        }
        public function isActiveSortColumn($field)
        {
            return parent::isActiveSortColumn($field);
        }
        public function disableAutomaticSorting()
        {
            return parent::disableAutomaticSorting();
        }
        public function getSortClassName($column)
        {
            return parent::getSortClassName($column);
        }
        public function getSortURL($column, $dir = "asc", $url = false)
        {
            return parent::getSortURL($column, $dir, $url);
        }
        public function getActiveSortDirection()
        {
            return parent::getActiveSortDirection();
        }
        public function getQuerySortColumnParameter()
        {
            return parent::getQuerySortColumnParameter();
        }
        public function getQueryPaginationPageParameter()
        {
            return parent::getQueryPaginationPageParameter();
        }
        public function getQuerySortDirectionParameter()
        {
            return parent::getQuerySortDirectionParameter();
        }
        public function setItemsPerPage($itemsPerPage)
        {
            return parent::setItemsPerPage($itemsPerPage);
        }
        /**
         * @return \Concrete\Core\Search\Pagination\Pagination|\Concrete\Core\Search\Pagination\PermissionablePagination
         */
        public function getPagination()
        {
            return parent::getPagination();
        }
        /**
         * @deprecated
         */
        public function get()
        {
            return parent::get();
        }
    }

    class View extends \Concrete\Core\View\View
    {
        protected function constructView($path = false)
        {
            return parent::constructView($path);
        }
        public function setPackageHandle($pkgHandle)
        {
            return parent::setPackageHandle($pkgHandle);
        }
        public function getThemeDirectory()
        {
            return parent::getThemeDirectory();
        }
        public function getViewPath()
        {
            return parent::getViewPath();
        }
        /**
         * gets the relative theme path for use in templates.
         *
         * @access public
         *
         * @return string $themePath
         */
        public function getThemePath()
        {
            return parent::getThemePath();
        }
        public function getThemeHandle()
        {
            return parent::getThemeHandle();
        }
        public function setInnerContentFile($innerContentFile)
        {
            return parent::setInnerContentFile($innerContentFile);
        }
        public function setViewRootDirectoryName($directory)
        {
            return parent::setViewRootDirectoryName($directory);
        }
        public function inc($file, $args = array())
        {
            return parent::inc($file, $args);
        }
        /**
         * A shortcut to posting back to the current page with a task and optional parameters. Only works in the context of.
         *
         * @param string $action
         * @param string $task
         *
         * @return string $url
         */
        public function action($action)
        {
            return parent::action($action);
        }
        public function setViewTheme($theme)
        {
            return parent::setViewTheme($theme);
        }
        /**
         * Load all the theme-related variables for which theme to use for this request.
         */
        protected function loadViewThemeObject()
        {
            return parent::loadViewThemeObject();
        }
        /**
         * Begin the render.
         */
        public function start($state)
        {
            return parent::start($state);
        }
        public function setupRender()
        {
            return parent::setupRender();
        }
        public function startRender()
        {
            return parent::startRender();
        }
        protected function onBeforeGetContents()
        {
            return parent::onBeforeGetContents();
        }
        public function renderViewContents($scopeItems)
        {
            return parent::renderViewContents($scopeItems);
        }
        public function finishRender($contents)
        {
            return parent::finishRender($contents);
        }
        /**
         * Function responsible for outputting header items.
         *
         * @access private
         */
        public function markHeaderAssetPosition()
        {
            return parent::markHeaderAssetPosition();
        }
        /**
         * Function responsible for outputting footer items.
         *
         * @access private
         */
        public function markFooterAssetPosition()
        {
            return parent::markFooterAssetPosition();
        }
        protected function getAssetsToOutput()
        {
            return parent::getAssetsToOutput();
        }
        public function postProcessViewContents($contents)
        {
            return parent::postProcessViewContents($contents);
        }
        protected function postProcessAssets($assets)
        {
            return parent::postProcessAssets($assets);
        }
        protected function replaceEmptyAssetPlaceholders($pageContent)
        {
            return parent::replaceEmptyAssetPlaceholders($pageContent);
        }
        protected function replaceAssetPlaceholders($outputAssets, $pageContent)
        {
            return parent::replaceAssetPlaceholders($outputAssets, $pageContent);
        }
        protected function outputAssetIntoView($item)
        {
            return parent::outputAssetIntoView($item);
        }
        public static function element($_file, $args = null, $_pkgHandle = null)
        {
            return Concrete\Core\View\View::element($_file, $args, $_pkgHandle);
        }
        public function addScopeItems($items)
        {
            return parent::addScopeItems($items);
        }
        public static function getRequestInstance()
        {
            return Concrete\Core\View\AbstractView::getRequestInstance();
        }
        protected static function setRequestInstance(Concrete\Core\View\View $v)
        {
            return Concrete\Core\View\AbstractView::setRequestInstance($v);
        }
        protected static function revertRequestInstance()
        {
            return Concrete\Core\View\AbstractView::revertRequestInstance();
        }
        public function addHeaderAsset($asset)
        {
            return parent::addHeaderAsset($asset);
        }
        public function addFooterAsset($asset)
        {
            return parent::addFooterAsset($asset);
        }
        public function addOutputAsset($asset)
        {
            return parent::addOutputAsset($asset);
        }
        public function requireAsset($assetType, $assetHandle = false)
        {
            return parent::requireAsset($assetType, $assetHandle);
        }
        public function setController($controller)
        {
            return parent::setController($controller);
        }
        public function setViewTemplate($template)
        {
            return parent::setViewTemplate($template);
        }
        /**
         * Returns the value of the item in the POST array.
         *
         * @param $key
         */
        public function post($key, $defaultValue = null)
        {
            return parent::post($key, $defaultValue);
        }
        protected function onAfterGetContents()
        {
            return parent::onAfterGetContents();
        }
        public function getScopeItems()
        {
            return parent::getScopeItems();
        }
        public function render($state = false)
        {
            return parent::render($state);
        }
        /**
         * url is a utility function that is used inside a view to setup urls w/tasks and parameters.
         *
         * @deprecated
         *
         * @param string $action
         * @param string $task
         *
         * @return string $url
         */
        public static function url($action, $task = null)
        {
            return Concrete\Core\View\AbstractView::url($action, $task);
        }
        public function setThemeByPath($path, $theme = null, $wrapper = FILENAME_THEMES_VIEW)
        {
            return parent::setThemeByPath($path, $theme, $wrapper);
        }
        public function renderError($title, $error, $errorObj = null)
        {
            return parent::renderError($title, $error, $errorObj);
        }
        /**
         */
        public function addHeaderItem($item)
        {
            return parent::addHeaderItem($item);
        }
        /**
         */
        public function addFooterItem($item)
        {
            return parent::addFooterItem($item);
        }
        /**
         * @return View
         */
        public static function getInstance()
        {
            return Concrete\Core\View\AbstractView::getInstance();
        }
    }

    /**
     * @package Workflow
     * @author Andrew Embler <andrew@concrete5.org>
     * @copyright  Copyright (c) 2003-2012 concrete5. (http://www.concrete5.org)
     * @license    http://www.concrete5.org/license/     MIT License
     *
     */
    class Workflow extends \Concrete\Core\Workflow\Workflow
    {
        public function getAllowedTasks()
        {
            return parent::getAllowedTasks();
        }
        public function getWorkflowID()
        {
            return parent::getWorkflowID();
        }
        public function getWorkflowName()
        {
            return parent::getWorkflowName();
        }
        /**
         * Returns the display name for this workflow (localized and escaped accordingly to $format)
         * @param string $format = 'html'
         *    Escape the result in html format (if $format is 'html').
         *    If $format is 'text' or any other value, the display name won't be escaped.
         * @return string
         */
        public function getWorkflowDisplayName($format = "html")
        {
            return parent::getWorkflowDisplayName($format);
        }
        public function getWorkflowTypeObject()
        {
            return parent::getWorkflowTypeObject();
        }
        public function getRestrictedToPermissionKeyHandles()
        {
            return parent::getRestrictedToPermissionKeyHandles();
        }
        public function getPermissionResponseClassName()
        {
            return parent::getPermissionResponseClassName();
        }
        public function getPermissionAssignmentClassName()
        {
            return parent::getPermissionAssignmentClassName();
        }
        public function getPermissionObjectKeyCategoryHandle()
        {
            return parent::getPermissionObjectKeyCategoryHandle();
        }
        public function getPermissionObjectIdentifier()
        {
            return parent::getPermissionObjectIdentifier();
        }
        public function delete()
        {
            return parent::delete();
        }
        public function getWorkflowProgressCurrentStatusNum(Concrete\Core\Workflow\Progress\Progress $wp)
        {
            return parent::getWorkflowProgressCurrentStatusNum($wp);
        }
        public static function getList()
        {
            return Concrete\Core\Workflow\Workflow::getList();
        }
        public static function add(Concrete\Core\Workflow\Type $wt, $name)
        {
            return Concrete\Core\Workflow\Workflow::add($wt, $name);
        }
        protected function load($wfID)
        {
            return parent::load($wfID);
        }
        public static function getByID($wfID)
        {
            return Concrete\Core\Workflow\Workflow::getByID($wfID);
        }
        public function getWorkflowToolsURL($task)
        {
            return parent::getWorkflowToolsURL($task);
        }
        public function updateName($wfName)
        {
            return parent::updateName($wfName);
        }
        public function getPermissionAccessObject()
        {
            return parent::getPermissionAccessObject();
        }
        public function validateTrigger(Concrete\Core\Workflow\Request\Request $req)
        {
            return parent::validateTrigger($req);
        }
        public function loadError($error)
        {
            return parent::loadError($error);
        }
        public function isError()
        {
            return parent::isError();
        }
        public function getError()
        {
            return parent::getError();
        }
        public function setPropertiesFromArray($arr)
        {
            return parent::setPropertiesFromArray($arr);
        }
        public static function camelcase($file)
        {
            return Concrete\Core\Foundation\Object::camelcase($file);
        }
        public static function uncamelcase($string)
        {
            return Concrete\Core\Foundation\Object::uncamelcase($string);
        }
    }

    class Core extends Concrete\Core\Application\Application
    {
        /**
         * @var Concrete\Core\Application\Application
         */
        protected static $instance;
        /**
         * Turns off the lights.
         *
         * @param array $options Array of options for disabling certain things during shutdown
         *      Add `'jobs' => true` to disable scheduled jobs
         *      Add `'log_queries' => true` to disable query logging
         */
        public static function shutdown($options = array())
        {
            return static::$instance->shutdown($options);
        }
        /**
         * Utility method for clearing all application caches.
         */
        public static function clearCaches()
        {
            return static::$instance->clearCaches();
        }
        /**
         * If we have job scheduling running through the site, we check to see if it's time to go for it.
         */
        protected static function handleScheduledJobs()
        {
            return static::$instance->handleScheduledJobs();
        }
        /**
         * Returns true if concrete5 is installed, false if it has not yet been.
         */
        public static function isInstalled()
        {
            return static::$instance->isInstalled();
        }
        /**
         * Checks to see whether we should deliver a concrete5 response from the page cache.
         */
        public static function checkPageCache(Concrete\Core\Http\Request $request)
        {
            return static::$instance->checkPageCache($request);
        }
        public static function handleAutomaticUpdates()
        {
            return static::$instance->handleAutomaticUpdates();
        }
        /**
         * Register package autoloaders. Has to come BEFORE session calls.
         */
        public static function setupPackageAutoloaders()
        {
            return static::$instance->setupPackageAutoloaders();
        }
        /**
         * Run startup and localization events on any installed packages.
         */
        public static function setupPackages()
        {
            return static::$instance->setupPackages();
        }
        /**
         * Ensure we have a cache directory.
         */
        public static function setupFilesystem()
        {
            return static::$instance->setupFilesystem();
        }
        /**
         * Returns true if the app is run through the command line.
         */
        public static function isRunThroughCommandLineInterface()
        {
            return Concrete\Core\Application\Application::isRunThroughCommandLineInterface();
        }
        /**
         * Using the configuration value, determines whether we need to redirect to a URL with
         * a trailing slash or not.
         *
         * @return \Concrete\Core\Routing\RedirectResponse
         */
        public static function handleURLSlashes(Symfony\Component\HttpFoundation\Request $request)
        {
            return static::$instance->handleURLSlashes($request);
        }
        /**
         * If we have redirect to canonical host enabled, we need to honor it here.
         *
         * @return \Concrete\Core\Routing\RedirectResponse
         */
        public static function handleCanonicalURLRedirection(Symfony\Component\HttpFoundation\Request $r)
        {
            return static::$instance->handleCanonicalURLRedirection($r);
        }
        /**
         * Inspects the request and determines what to serve.
         */
        public static function dispatch(Concrete\Core\Http\Request $request)
        {
            return static::$instance->dispatch($request);
        }
        protected static function registerLegacyRoutes()
        {
            return static::$instance->registerLegacyRoutes();
        }
        protected static function getEarlyDispatchResponse()
        {
            return static::$instance->getEarlyDispatchResponse();
        }
        /**
         * Get or check the current application environment.
         *
         * @param  mixed
         *
         * @return string|bool
         */
        public static function environment()
        {
            return static::$instance->environment();
        }
        /**
         * Detect the application's current environment.
         *
         * @param  array|string|Callable  $environments
         *
         * @return string
         */
        public static function detectEnvironment($environments)
        {
            return static::$instance->detectEnvironment($environments);
        }
        /**
         * Instantiate a concrete instance of the given type.
         *
         * @param  string $concrete
         * @param  array $parameters
         * @return mixed
         *
         * @throws BindingResolutionException
         */
        public static function build($concrete, $parameters = array())
        {
            return static::$instance->build($concrete, $parameters);
        }
        /**
         * Determine if a given string is resolvable.
         *
         * @param  string  $abstract
         * @return bool
         */
        protected static function resolvable($abstract)
        {
            return static::$instance->resolvable($abstract);
        }
        /**
         * Determine if the given abstract type has been bound.
         *
         * @param  string  $abstract
         * @return bool
         */
        public static function bound($abstract)
        {
            return static::$instance->bound($abstract);
        }
        /**
         * Determine if a given string is an alias.
         *
         * @param  string  $name
         * @return bool
         */
        public static function isAlias($name)
        {
            return static::$instance->isAlias($name);
        }
        /**
         * Register a binding with the container.
         *
         * @param  string               $abstract
         * @param  Closure|string|null  $concrete
         * @param  bool                 $shared
         * @return void
         */
        public static function bind($abstract, $concrete = null, $shared = false)
        {
            return static::$instance->bind($abstract, $concrete, $shared);
        }
        /**
         * Get the Closure to be used when building a type.
         *
         * @param  string  $abstract
         * @param  string  $concrete
         * @return \Closure
         */
        protected static function getClosure($abstract, $concrete)
        {
            return static::$instance->getClosure($abstract, $concrete);
        }
        /**
         * Register a binding if it hasn't already been registered.
         *
         * @param  string               $abstract
         * @param  Closure|string|null  $concrete
         * @param  bool                 $shared
         * @return void
         */
        public static function bindIf($abstract, $concrete = null, $shared = false)
        {
            return static::$instance->bindIf($abstract, $concrete, $shared);
        }
        /**
         * Register a shared binding in the container.
         *
         * @param  string               $abstract
         * @param  Closure|string|null  $concrete
         * @return void
         */
        public static function singleton($abstract, $concrete = null)
        {
            return static::$instance->singleton($abstract, $concrete);
        }
        /**
         * Wrap a Closure such that it is shared.
         *
         * @param  Closure  $closure
         * @return Closure
         */
        public static function share(Closure $closure)
        {
            return static::$instance->share($closure);
        }
        /**
         * Bind a shared Closure into the container.
         *
         * @param  string  $abstract
         * @param  \Closure  $closure
         * @return void
         */
        public static function bindShared($abstract, Closure $closure)
        {
            return static::$instance->bindShared($abstract, $closure);
        }
        /**
         * "Extend" an abstract type in the container.
         *
         * @param  string   $abstract
         * @param  Closure  $closure
         * @return void
         *
         * @throws \InvalidArgumentException
         */
        public static function extend($abstract, Closure $closure)
        {
            return static::$instance->extend($abstract, $closure);
        }
        /**
         * Get an extender Closure for resolving a type.
         *
         * @param  string  $abstract
         * @param  \Closure  $closure
         * @return \Closure
         */
        protected static function getExtender($abstract, Closure $closure)
        {
            return static::$instance->getExtender($abstract, $closure);
        }
        /**
         * Register an existing instance as shared in the container.
         *
         * @param  string  $abstract
         * @param  mixed   $instance
         * @return void
         */
        public static function instance($abstract, $instance)
        {
            return static::$instance->instance($abstract, $instance);
        }
        /**
         * Alias a type to a shorter name.
         *
         * @param  string  $abstract
         * @param  string  $alias
         * @return void
         */
        public static function alias($abstract, $alias)
        {
            return static::$instance->alias($abstract, $alias);
        }
        /**
         * Extract the type and alias from a given definition.
         *
         * @param  array  $definition
         * @return array
         */
        protected static function extractAlias(array $definition)
        {
            return static::$instance->extractAlias($definition);
        }
        /**
         * Bind a new callback to an abstract's rebind event.
         *
         * @param  string  $abstract
         * @param  \Closure  $callback
         * @return mixed
         */
        public static function rebinding($abstract, Closure $callback)
        {
            return static::$instance->rebinding($abstract, $callback);
        }
        /**
         * Refresh an instance on the given target and method.
         *
         * @param  string  $abstract
         * @param  mixed  $target
         * @param  string  $method
         * @return mixed
         */
        public static function refresh($abstract, $target, $method)
        {
            return static::$instance->refresh($abstract, $target, $method);
        }
        /**
         * Fire the "rebound" callbacks for the given abstract type.
         *
         * @param  string  $abstract
         * @return void
         */
        protected static function rebound($abstract)
        {
            return static::$instance->rebound($abstract);
        }
        /**
         * Get the rebound callbacks for a given type.
         *
         * @param  string  $abstract
         * @return array
         */
        protected static function getReboundCallbacks($abstract)
        {
            return static::$instance->getReboundCallbacks($abstract);
        }
        /**
         * Resolve the given type from the container.
         *
         * @param  string  $abstract
         * @param  array   $parameters
         * @return mixed
         */
        public static function make($abstract, $parameters = array())
        {
            return static::$instance->make($abstract, $parameters);
        }
        /**
         * Get the concrete type for a given abstract.
         *
         * @param  string  $abstract
         * @return mixed   $concrete
         */
        protected static function getConcrete($abstract)
        {
            return static::$instance->getConcrete($abstract);
        }
        /**
         * Determine if the given abstract has a leading slash.
         *
         * @param  string  $abstract
         * @return bool
         */
        protected static function missingLeadingSlash($abstract)
        {
            return static::$instance->missingLeadingSlash($abstract);
        }
        /**
         * Resolve all of the dependencies from the ReflectionParameters.
         *
         * @param  array  $parameters
         * @param  array  $primitives
         * @return array
         */
        protected static function getDependencies($parameters, array $primitives = array())
        {
            return static::$instance->getDependencies($parameters, $primitives);
        }
        /**
         * Resolve a non-class hinted dependency.
         *
         * @param  ReflectionParameter  $parameter
         * @return mixed
         *
         * @throws BindingResolutionException
         */
        protected static function resolveNonClass(ReflectionParameter $parameter)
        {
            return static::$instance->resolveNonClass($parameter);
        }
        /**
         * Resolve a class based dependency from the container.
         *
         * @param  \ReflectionParameter  $parameter
         * @return mixed
         *
         * @throws BindingResolutionException
         */
        protected static function resolveClass(ReflectionParameter $parameter)
        {
            return static::$instance->resolveClass($parameter);
        }
        /**
         * If extra parameters are passed by numeric ID, rekey them by argument name.
         *
         * @param  array  $dependencies
         * @param  array  $parameters
         * @param  array
         * @return array
         */
        protected static function keyParametersByArgument(array $dependencies, array $parameters)
        {
            return static::$instance->keyParametersByArgument($dependencies, $parameters);
        }
        /**
         * Register a new resolving callback.
         *
         * @param  string  $abstract
         * @param  \Closure  $callback
         * @return void
         */
        public static function resolving($abstract, Closure $callback)
        {
            return static::$instance->resolving($abstract, $callback);
        }
        /**
         * Register a new resolving callback for all types.
         *
         * @param  \Closure  $callback
         * @return void
         */
        public static function resolvingAny(Closure $callback)
        {
            return static::$instance->resolvingAny($callback);
        }
        /**
         * Fire all of the resolving callbacks.
         *
         * @param  mixed  $object
         * @return void
         */
        protected static function fireResolvingCallbacks($abstract, $object)
        {
            return static::$instance->fireResolvingCallbacks($abstract, $object);
        }
        /**
         * Fire an array of callbacks with an object.
         *
         * @param  mixed  $object
         * @param  array  $callbacks
         */
        protected static function fireCallbackArray($object, array $callbacks)
        {
            return static::$instance->fireCallbackArray($object, $callbacks);
        }
        /**
         * Determine if a given type is shared.
         *
         * @param  string  $abstract
         * @return bool
         */
        public static function isShared($abstract)
        {
            return static::$instance->isShared($abstract);
        }
        /**
         * Determine if the given concrete is buildable.
         *
         * @param  mixed   $concrete
         * @param  string  $abstract
         * @return bool
         */
        protected static function isBuildable($concrete, $abstract)
        {
            return static::$instance->isBuildable($concrete, $abstract);
        }
        /**
         * Get the alias for an abstract if available.
         *
         * @param  string  $abstract
         * @return string
         */
        protected static function getAlias($abstract)
        {
            return static::$instance->getAlias($abstract);
        }
        /**
         * Get the container's bindings.
         *
         * @return array
         */
        public static function getBindings()
        {
            return static::$instance->getBindings();
        }
        /**
         * Drop all of the stale instances and aliases.
         *
         * @param  string  $abstract
         * @return void
         */
        protected static function dropStaleInstances($abstract)
        {
            return static::$instance->dropStaleInstances($abstract);
        }
        /**
         * Remove a resolved instance from the instance cache.
         *
         * @param  string  $abstract
         * @return void
         */
        public static function forgetInstance($abstract)
        {
            return static::$instance->forgetInstance($abstract);
        }
        /**
         * Clear all of the instances from the container.
         *
         * @return void
         */
        public static function forgetInstances()
        {
            return static::$instance->forgetInstances();
        }
        /**
         * Determine if a given offset exists.
         *
         * @param  string  $key
         * @return bool
         */
        public static function offsetExists($key)
        {
            return static::$instance->offsetExists($key);
        }
        /**
         * Get the value at a given offset.
         *
         * @param  string  $key
         * @return mixed
         */
        public static function offsetGet($key)
        {
            return static::$instance->offsetGet($key);
        }
        /**
         * Set the value at a given offset.
         *
         * @param  string  $key
         * @param  mixed   $value
         * @return void
         */
        public static function offsetSet($key, $value)
        {
            return static::$instance->offsetSet($key, $value);
        }
        /**
         * Unset the value at a given offset.
         *
         * @param  string  $key
         * @return void
         */
        public static function offsetUnset($key)
        {
            return static::$instance->offsetUnset($key);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Application::getFacadeAccessor();
        }
        public static function getApplicationRelativePath()
        {
            return Concrete\Core\Support\Facade\Application::getApplicationRelativePath();
        }
        public static function getApplicationURL($asObject = false)
        {
            return Concrete\Core\Support\Facade\Application::getApplicationURL($asObject);
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Session extends Symfony\Component\HttpFoundation\Session\Session
    {
        /**
         * @var Symfony\Component\HttpFoundation\Session\Session
         */
        protected static $instance;
        /**
         * {@inheritdoc}
         */
        public static function start()
        {
            return static::$instance->start();
        }
        /**
         * {@inheritdoc}
         */
        public static function has($name)
        {
            return static::$instance->has($name);
        }
        /**
         * {@inheritdoc}
         */
        public static function get($name, $default = null)
        {
            return static::$instance->get($name, $default);
        }
        /**
         * {@inheritdoc}
         */
        public static function set($name, $value)
        {
            return static::$instance->set($name, $value);
        }
        /**
         * {@inheritdoc}
         */
        public static function all()
        {
            return static::$instance->all();
        }
        /**
         * {@inheritdoc}
         */
        public static function replace(array $attributes)
        {
            return static::$instance->replace($attributes);
        }
        /**
         * {@inheritdoc}
         */
        public static function remove($name)
        {
            return static::$instance->remove($name);
        }
        /**
         * {@inheritdoc}
         */
        public static function clear()
        {
            return static::$instance->clear();
        }
        /**
         * {@inheritdoc}
         */
        public static function isStarted()
        {
            return static::$instance->isStarted();
        }
        /**
         * Returns an iterator for attributes.
         *
         * @return \ArrayIterator An \ArrayIterator instance
         */
        public static function getIterator()
        {
            return static::$instance->getIterator();
        }
        /**
         * Returns the number of attributes.
         *
         * @return int The number of attributes
         */
        public static function count()
        {
            return static::$instance->count();
        }
        /**
         * {@inheritdoc}
         */
        public static function invalidate($lifetime = null)
        {
            return static::$instance->invalidate($lifetime);
        }
        /**
         * {@inheritdoc}
         */
        public static function migrate($destroy = false, $lifetime = null)
        {
            return static::$instance->migrate($destroy, $lifetime);
        }
        /**
         * {@inheritdoc}
         */
        public static function save()
        {
            return static::$instance->save();
        }
        /**
         * {@inheritdoc}
         */
        public static function getId()
        {
            return static::$instance->getId();
        }
        /**
         * {@inheritdoc}
         */
        public static function setId($id)
        {
            return static::$instance->setId($id);
        }
        /**
         * {@inheritdoc}
         */
        public static function getName()
        {
            return static::$instance->getName();
        }
        /**
         * {@inheritdoc}
         */
        public static function setName($name)
        {
            return static::$instance->setName($name);
        }
        /**
         * {@inheritdoc}
         */
        public static function getMetadataBag()
        {
            return static::$instance->getMetadataBag();
        }
        /**
         * {@inheritdoc}
         */
        public static function registerBag(Symfony\Component\HttpFoundation\Session\SessionBagInterface $bag)
        {
            return static::$instance->registerBag($bag);
        }
        /**
         * {@inheritdoc}
         */
        public static function getBag($name)
        {
            return static::$instance->getBag($name);
        }
        /**
         * Gets the flashbag interface.
         *
         * @return FlashBagInterface
         */
        public static function getFlashBag()
        {
            return static::$instance->getFlashBag();
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Session::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Database extends Concrete\Core\Database\DatabaseManager
    {
        /**
         * @var Concrete\Core\Database\DatabaseManager
         */
        protected static $instance;
        /**
         * Legacy entry point
         *
         * @deprecated
         * @return \Concrete\Core\Database\Connection\Connection
         */
        public static function getActiveConnection()
        {
            return static::$instance->getActiveConnection();
        }
        /**
         * Legacy entry point
         *
         * @deprecated
         * @return \Concrete\Core\Database\Connection\Connection
         */
        public static function get()
        {
            return static::$instance->get();
        }
        /**
         * Get a database connection instance.
         *
         * @param  string $name
         * @return \Concrete\Core\Database\Connection\Connection
         */
        public static function connection($name = null)
        {
            return static::$instance->connection($name);
        }
        /**
         * Disconnect from the given database and remove from local cache.
         *
         * @param  string $name
         * @return void
         */
        public static function purge($name = null)
        {
            return static::$instance->purge($name);
        }
        /**
         * Disconnect from the given database.
         *
         * @param  string $name
         * @return void
         */
        public static function disconnect($name = null)
        {
            return static::$instance->disconnect($name);
        }
        /**
         * Reconnect to the given database.
         *
         * @param  string $name
         * @return \Concrete\Core\Database\Connection\Connection
         */
        public static function reconnect($name = null)
        {
            return static::$instance->reconnect($name);
        }
        /**
         * Refresh the PDO connections on a given connection.
         *
         * @param  string $name
         * @return Connection
         */
        protected static function refreshPdoConnections($name)
        {
            return static::$instance->refreshPdoConnections($name);
        }
        /**
         * Make the database connection instance.
         *
         * @param  string $name
         * @return Connection
         */
        protected static function makeConnection($name)
        {
            return static::$instance->makeConnection($name);
        }
        /**
         * Prepare the database connection instance.
         *
         * @param Connection $connection
         * @return Connection
         */
        protected static function prepare($connection)
        {
            return static::$instance->prepare($connection);
        }
        /**
         * Get the configuration for a connection.
         *
         * @param  string $name
         * @return array
         *
         * @throws \InvalidArgumentException
         */
        protected static function getConfig($name)
        {
            return static::$instance->getConfig($name);
        }
        /**
         * Get the default connection name.
         *
         * @return string
         */
        public static function getDefaultConnection()
        {
            return static::$instance->getDefaultConnection();
        }
        /**
         * Set the default connection name.
         *
         * @param  string $name
         * @return void
         */
        public static function setDefaultConnection($name)
        {
            return static::$instance->setDefaultConnection($name);
        }
        /**
         * Register an extension connection resolver.
         *
         * @param  string   $name
         * @param  callable $resolver
         * @return void
         */
        public static function extend($name, $resolver)
        {
            return static::$instance->extend($name, $resolver);
        }
        /**
         * Return all of the created connections.
         *
         * @return \Concrete\Core\Database\Connection\Connection[]
         */
        public static function getConnections()
        {
            return static::$instance->getConnections();
        }
        /**
         * @return \Concrete\Core\Database\Connection\ConnectionFactory
         */
        public static function getFactory()
        {
            return static::$instance->getFactory();
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Database::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class ORM extends Concrete\Core\Database\DatabaseManagerORM
    {
        /**
         * @var Concrete\Core\Database\DatabaseManagerORM
         */
        protected static $instance;
        /**
         * Return all of the available entity managers.
         *
         * @return \Doctrine\ORM\EntityManager[]
         */
        public static function getEntityManagers()
        {
            return static::$instance->getEntityManagers();
        }
        /**
         * Gets a context specific entity manager. Allows easier management of
         * entities where different settings than the core settings are needed
         * for the EntityManager object.
         *
         * @param  mixed $context
         * @param  string $connectionName
         * @return \Doctrine\ORM\EntityManager
         */
        public static function entityManager($context = null, $connectionName = null)
        {
            return static::$instance->entityManager($context, $connectionName);
        }
        /**
         * Makes a new entity manager instance for the given context
         * (e.g. a package) or if no context object is given, for the application
         * context. The options for the context are:
         * - A package object, results in a package specific entity manager
         * - The string 'core', results in a core specific entity manager
         * - Null or omitted context, results in an application specific entity
         *   manager
         *
         * @param  Connection $connection
         * @param  mixed      $context
         * @return \Doctrine\ORM\EntityManager
         */
        public static function makeEntityManager(Concrete\Core\Database\Connection\Connection $connection, $context = null)
        {
            return Concrete\Core\Database\DatabaseManagerORM::makeEntityManager($connection, $context);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\DatabaseORM::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Events extends Symfony\Component\EventDispatcher\EventDispatcher
    {
        /**
         * @var Symfony\Component\EventDispatcher\EventDispatcher
         */
        protected static $instance;
        /**
         * @see EventDispatcherInterface::dispatch()
         *
         * @api
         */
        public static function dispatch($eventName, Symfony\Component\EventDispatcher\Event $event = null)
        {
            return static::$instance->dispatch($eventName, $event);
        }
        /**
         * @see EventDispatcherInterface::getListeners()
         */
        public static function getListeners($eventName = null)
        {
            return static::$instance->getListeners($eventName);
        }
        /**
         * @see EventDispatcherInterface::hasListeners()
         */
        public static function hasListeners($eventName = null)
        {
            return static::$instance->hasListeners($eventName);
        }
        /**
         * @see EventDispatcherInterface::addListener()
         *
         * @api
         */
        public static function addListener($eventName, $listener, $priority = 0)
        {
            return static::$instance->addListener($eventName, $listener, $priority);
        }
        /**
         * @see EventDispatcherInterface::removeListener()
         */
        public static function removeListener($eventName, $listener)
        {
            return static::$instance->removeListener($eventName, $listener);
        }
        /**
         * @see EventDispatcherInterface::addSubscriber()
         *
         * @api
         */
        public static function addSubscriber(Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber)
        {
            return static::$instance->addSubscriber($subscriber);
        }
        /**
         * @see EventDispatcherInterface::removeSubscriber()
         */
        public static function removeSubscriber(Symfony\Component\EventDispatcher\EventSubscriberInterface $subscriber)
        {
            return static::$instance->removeSubscriber($subscriber);
        }
        /**
         * Triggers the listeners of an event.
         *
         * This method can be overridden to add functionality that is executed
         * for each listener.
         *
         * @param callable[] $listeners The event listeners.
         * @param string     $eventName The name of the event to dispatch.
         * @param Event      $event     The event object to pass to the event handlers/listeners.
         */
        protected static function doDispatch($listeners, $eventName, Symfony\Component\EventDispatcher\Event $event)
        {
            return static::$instance->doDispatch($listeners, $eventName, $event);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Events::getFacadeAccessor();
        }
        public static function fire($eventName, $event = null)
        {
            return Concrete\Core\Support\Facade\Events::fire($eventName, $event);
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Route extends Concrete\Core\Routing\Router
    {
        /**
         * @var Concrete\Core\Routing\Router
         */
        protected static $instance;
        /**
         * @return RequestContext
         */
        public static function getContext()
        {
            return static::$instance->getContext();
        }
        /**
         * @param RequestContext $context
         */
        public static function setContext(Symfony\Component\Routing\RequestContext $context)
        {
            return static::$instance->setContext($context);
        }
        /**
         * @return UrlGeneratorInterface
         */
        public static function getGenerator()
        {
            return static::$instance->getGenerator();
        }
        /**
         * @param $generator
         */
        public static function setGenerator(Symfony\Component\Routing\Generator\UrlGeneratorInterface $generator)
        {
            return static::$instance->setGenerator($generator);
        }
        public static function getList()
        {
            return static::$instance->getList();
        }
        public static function setRequest(Concrete\Core\Http\Request $req)
        {
            return static::$instance->setRequest($req);
        }
        /**
         * Register a symfony route with as little as a path and a callback.
         *
         * @param string $path The full path for the route
         * @param \Closure|string $callback `\Closure` or "dispatcher" or "\Namespace\Controller::action_method"
         * @param string|null $handle The route handle, if one is not provided the handle is generated from the path "/" => "_"
         * @param array $requirements The Parameter requirements, see Symfony Route constructor
         * @param array $options The route options, see Symfony Route constructor
         * @param string $host The host pattern this route requires, see Symfony Route constructor
         * @param array|string $schemes The schemes or scheme this route requires, see Symfony Route constructor
         * @param array|string $methods The HTTP methods this route requires, see see Symfony Route constructor
         * @param string $condition see Symfony Route constructor
         * @return \Symfony\Component\Routing\Route
         */
        public static function register($path, $callback, $handle = null, array $requirements = array(), array $options = array(), $host = "", $schemes = array(), $methods = array(), $condition = null)
        {
            return static::$instance->register($path, $callback, $handle, $requirements, $options, $host, $schemes, $methods, $condition);
        }
        public static function registerMultiple(array $routes)
        {
            return static::$instance->registerMultiple($routes);
        }
        public static function execute(Concrete\Core\Routing\Route $route, $parameters)
        {
            return static::$instance->execute($route, $parameters);
        }
        /**
         * Used by the theme_paths and site_theme_paths files in config/ to hard coded certain paths to various themes
         * @access public
         * @param $path string
         * @param $theme object, if null site theme is default
         * @return void
         */
        public static function setThemeByRoute($path, $theme = null, $wrapper = FILENAME_THEMES_VIEW)
        {
            return static::$instance->setThemeByRoute($path, $theme, $wrapper);
        }
        public static function setThemesbyRoutes(array $routes)
        {
            return static::$instance->setThemesbyRoutes($routes);
        }
        /**
         * This grabs the theme for a particular path, if one exists in the themePaths array
         * @param string $path
         * @return string|boolean
         */
        public static function getThemeByRoute($path)
        {
            return static::$instance->getThemeByRoute($path);
        }
        public static function route($data)
        {
            return static::$instance->route($data);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Route::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class UserInfo extends Concrete\Core\User\UserInfoFactory
    {
        /**
         * @var Concrete\Core\User\UserInfoFactory
         */
        protected static $instance;
        /**
         * Returns the UserInfo object for a give user's uID.
         *
         * @param int $uID
         *
         * @return UserInfo|null
         */
        public static function getByID($uID)
        {
            return static::$instance->getByID($uID);
        }
        /**
         * Returns the UserInfo object for a give user's username.
         *
         * @param string $uName
         *
         * @return UserInfo|null
         */
        public static function getByName($uName)
        {
            return static::$instance->getByName($uName);
        }
        /**
         * @deprecated
         */
        public static function getByUserName($uName)
        {
            return static::$instance->getByUserName($uName);
        }
        /**
         * Returns the UserInfo object for a give user's email address.
         *
         * @param string $uEmail
         *
         * @return UserInfo|null
         */
        public static function getByEmail($uEmail)
        {
            return static::$instance->getByEmail($uEmail);
        }
        /**
         * @param string $uHash
         * @param bool $unredeemedHashesOnly
         *
         * @return UserInfo|null
         */
        public static function getByValidationHash($uHash, $unredeemedHashesOnly = true)
        {
            return static::$instance->getByValidationHash($uHash, $unredeemedHashesOnly);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\UserInfoFactory::getFacadeAccessor();
        }
        /**
         * @deprecated
         */
        public static function add($data)
        {
            return Concrete\Core\Support\Facade\UserInfoFactory::add($data);
        }
        /**
         * @deprecated
         */
        public static function addSuperUser($uPasswordEncrypted, $uEmail)
        {
            return Concrete\Core\Support\Facade\UserInfoFactory::addSuperUser($uPasswordEncrypted, $uEmail);
        }
        /**
         * @deprecated
         */
        public static function register($data)
        {
            return Concrete\Core\Support\Facade\UserInfoFactory::register($data);
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Log extends Concrete\Core\Logging\Logger
    {
        /**
         * @var Concrete\Core\Logging\Logger
         */
        protected static $instance;
        /**
         * Initially called - this sets up the log writer to use the concrete5
         * Logs database table (this is the default setting.)
         */
        public static function addDatabaseHandler($logLevel = Monolog\Logger::DEBUG)
        {
            return static::$instance->addDatabaseHandler($logLevel);
        }
        /**
         * When given a PSR-3 standard log level, returns the
         * internal code for that level.
         */
        public static function getLevelCode($level)
        {
            return Concrete\Core\Logging\Logger::getLevelCode($level);
        }
        /**
         * Returns an array of handlers. Mostly for testing.
         */
        public static function getHandlers()
        {
            return static::$instance->getHandlers();
        }
        /**
         * Returns a list of channels that have been used. Requires the database
         *  handler
         */
        public static function getChannels()
        {
            return static::$instance->getChannels();
        }
        /**
         * Clears all log entries. Requires the database handler.
         */
        public static function clearAll()
        {
            return Concrete\Core\Logging\Logger::clearAll();
        }
        /**
         * Clears log entries by channel. Requires the database handler.
         */
        public static function clearByChannel($channel)
        {
            return Concrete\Core\Logging\Logger::clearByChannel($channel);
        }
        /**
         * Gets the name of the logging level.
         *
         * @param  integer $level
         * @return string
         */
        public static function getLevelDisplayName($level)
        {
            return Concrete\Core\Logging\Logger::getLevelDisplayName($level);
        }
        public static function getChannelDisplayName($channel)
        {
            return Concrete\Core\Logging\Logger::getChannelDisplayName($channel);
        }
        /**
         * @return string
         */
        public static function getName()
        {
            return static::$instance->getName();
        }
        /**
         * Pushes a handler on to the stack.
         *
         * @param HandlerInterface $handler
         * @return $this
         */
        public static function pushHandler(Monolog\Handler\HandlerInterface $handler)
        {
            return static::$instance->pushHandler($handler);
        }
        /**
         * Pops a handler from the stack
         *
         * @return HandlerInterface
         */
        public static function popHandler()
        {
            return static::$instance->popHandler();
        }
        /**
         * Set handlers, replacing all existing ones.
         *
         * If a map is passed, keys will be ignored.
         *
         * @param HandlerInterface[] $handlers
         * @return $this
         */
        public static function setHandlers(array $handlers)
        {
            return static::$instance->setHandlers($handlers);
        }
        /**
         * Adds a processor on to the stack.
         *
         * @param callable $callback
         * @return $this
         */
        public static function pushProcessor($callback)
        {
            return static::$instance->pushProcessor($callback);
        }
        /**
         * Removes the processor on top of the stack and returns it.
         *
         * @return callable
         */
        public static function popProcessor()
        {
            return static::$instance->popProcessor();
        }
        /**
         * @return callable[]
         */
        public static function getProcessors()
        {
            return static::$instance->getProcessors();
        }
        /**
         * Adds a log record.
         *
         * @param  integer $level   The logging level
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addRecord($level, $message, array $context = array())
        {
            return static::$instance->addRecord($level, $message, $context);
        }
        /**
         * Adds a log record at the DEBUG level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addDebug($message, array $context = array())
        {
            return static::$instance->addDebug($message, $context);
        }
        /**
         * Adds a log record at the INFO level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addInfo($message, array $context = array())
        {
            return static::$instance->addInfo($message, $context);
        }
        /**
         * Adds a log record at the NOTICE level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addNotice($message, array $context = array())
        {
            return static::$instance->addNotice($message, $context);
        }
        /**
         * Adds a log record at the WARNING level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addWarning($message, array $context = array())
        {
            return static::$instance->addWarning($message, $context);
        }
        /**
         * Adds a log record at the ERROR level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addError($message, array $context = array())
        {
            return static::$instance->addError($message, $context);
        }
        /**
         * Adds a log record at the CRITICAL level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addCritical($message, array $context = array())
        {
            return static::$instance->addCritical($message, $context);
        }
        /**
         * Adds a log record at the ALERT level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addAlert($message, array $context = array())
        {
            return static::$instance->addAlert($message, $context);
        }
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function addEmergency($message, array $context = array())
        {
            return static::$instance->addEmergency($message, $context);
        }
        /**
         * Gets all supported logging levels.
         *
         * @return array Assoc array with human-readable level names => level codes.
         */
        public static function getLevels()
        {
            return Monolog\Logger::getLevels();
        }
        /**
         * Gets the name of the logging level.
         *
         * @param  integer $level
         * @return string
         */
        public static function getLevelName($level)
        {
            return Monolog\Logger::getLevelName($level);
        }
        /**
         * Converts PSR-3 levels to Monolog ones if necessary
         *
         * @param string|int Level number (monolog) or name (PSR-3)
         * @return int
         */
        public static function toMonologLevel($level)
        {
            return Monolog\Logger::toMonologLevel($level);
        }
        /**
         * Checks whether the Logger has a handler that listens on the given level
         *
         * @param  integer $level
         * @return Boolean
         */
        public static function isHandling($level)
        {
            return static::$instance->isHandling($level);
        }
        /**
         * Adds a log record at an arbitrary level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  mixed   $level   The log level
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function log($level, $message, array $context = array())
        {
            return static::$instance->log($level, $message, $context);
        }
        /**
         * Adds a log record at the DEBUG level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function debug($message, array $context = array())
        {
            return static::$instance->debug($message, $context);
        }
        /**
         * Adds a log record at the INFO level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function info($message, array $context = array())
        {
            return static::$instance->info($message, $context);
        }
        /**
         * Adds a log record at the NOTICE level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function notice($message, array $context = array())
        {
            return static::$instance->notice($message, $context);
        }
        /**
         * Adds a log record at the WARNING level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function warn($message, array $context = array())
        {
            return static::$instance->warn($message, $context);
        }
        /**
         * Adds a log record at the WARNING level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function warning($message, array $context = array())
        {
            return static::$instance->warning($message, $context);
        }
        /**
         * Adds a log record at the ERROR level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function err($message, array $context = array())
        {
            return static::$instance->err($message, $context);
        }
        /**
         * Adds a log record at the ERROR level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function error($message, array $context = array())
        {
            return static::$instance->error($message, $context);
        }
        /**
         * Adds a log record at the CRITICAL level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function crit($message, array $context = array())
        {
            return static::$instance->crit($message, $context);
        }
        /**
         * Adds a log record at the CRITICAL level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function critical($message, array $context = array())
        {
            return static::$instance->critical($message, $context);
        }
        /**
         * Adds a log record at the ALERT level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function alert($message, array $context = array())
        {
            return static::$instance->alert($message, $context);
        }
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function emerg($message, array $context = array())
        {
            return static::$instance->emerg($message, $context);
        }
        /**
         * Adds a log record at the EMERGENCY level.
         *
         * This method allows for compatibility with common interfaces.
         *
         * @param  string  $message The log message
         * @param  array   $context The log context
         * @return Boolean Whether the record has been processed
         */
        public static function emergency($message, array $context = array())
        {
            return static::$instance->emergency($message, $context);
        }
        /**
         * Set the timezone to be used for the timestamp of log records.
         *
         * This is stored globally for all Logger instances
         *
         * @param \DateTimeZone $tz Timezone object
         */
        public static function setTimezone(DateTimeZone $tz)
        {
            return Monolog\Logger::setTimezone($tz);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Log::getFacadeAccessor();
        }
        /**
         * @deprecated
         */
        public static function addEntry($entry)
        {
            return Concrete\Core\Support\Facade\Log::addEntry($entry);
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Image extends Imagine\Gd\Imagine
    {
        /**
         * @var Imagine\Gd\Imagine
         */
        protected static $instance;
        /**
         * {@inheritdoc}
         */
        public static function create(Imagine\Image\BoxInterface $size, Imagine\Image\Palette\Color\ColorInterface $color = null)
        {
            return static::$instance->create($size, $color);
        }
        /**
         * {@inheritdoc}
         */
        public static function open($path)
        {
            return static::$instance->open($path);
        }
        /**
         * {@inheritdoc}
         */
        public static function load($string)
        {
            return static::$instance->load($string);
        }
        /**
         * {@inheritdoc}
         */
        public static function read($resource)
        {
            return static::$instance->read($resource);
        }
        /**
         * {@inheritdoc}
         */
        public static function font($file, $size, Imagine\Image\Palette\Color\ColorInterface $color)
        {
            return static::$instance->font($file, $size, $color);
        }
        /**
         * @param MetadataReaderInterface $metadataReader
         *
         * @return ImagineInterface
         */
        public static function setMetadataReader(Imagine\Image\Metadata\MetadataReaderInterface $metadataReader)
        {
            return static::$instance->setMetadataReader($metadataReader);
        }
        /**
         * @return MetadataReaderInterface
         */
        public static function getMetadataReader()
        {
            return static::$instance->getMetadataReader();
        }
        /**
         * Checks a path that could be used with ImagineInterface::open and returns
         * a proper string.
         *
         * @param string|object $path
         *
         * @return string
         *
         * @throws InvalidArgumentException In case the given path is invalid.
         */
        protected static function checkPath($path)
        {
            return static::$instance->checkPath($path);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Image::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class Config extends Concrete\Core\Config\Repository\Repository
    {
        /**
         * @var Concrete\Core\Config\Repository\Repository
         */
        protected static $instance;
        /**
         * Clear specific key
         *
         * @param string $key
         */
        public static function clear($key)
        {
            return static::$instance->clear($key);
        }
        /**
         * Save a key
         *
         * @param $key
         * @param $value
         * @return bool
         */
        public static function save($key, $value)
        {
            return static::$instance->save($key, $value);
        }
        /**
         * Register a package for cascading configuration.
         *
         * @param  string $package
         * @param  string $hint
         * @param  string $namespace
         * @return void
         */
        public static function package($package, $hint, $namespace = null)
        {
            return static::$instance->package($package, $hint, $namespace);
        }
        protected static function getPackageNamespace($package, $namespace)
        {
            return static::$instance->getPackageNamespace($package, $namespace);
        }
        public static function clearCache()
        {
            return static::$instance->clearCache();
        }
        public static function clearNamespace($namespace)
        {
            return static::$instance->clearNamespace($namespace);
        }
        /**
         * @return SaverInterface
         */
        public static function getSaver()
        {
            return static::$instance->getSaver();
        }
        /**
         * Set the saver instance
         *
         * @param \Concrete\Core\Config\SaverInterface $saver
         */
        public static function setSaver(Concrete\Core\Config\SaverInterface $saver)
        {
            return static::$instance->setSaver($saver);
        }
        protected static function parsePackageSegments($key, $namespace, $item)
        {
            return static::$instance->parsePackageSegments($key, $namespace, $item);
        }
        /**
         * Determine if the given configuration value exists.
         *
         * @param  string  $key
         * @return bool
         */
        public static function has($key)
        {
            return static::$instance->has($key);
        }
        /**
         * Determine if a configuration group exists.
         *
         * @param  string  $key
         * @return bool
         */
        public static function hasGroup($key)
        {
            return static::$instance->hasGroup($key);
        }
        /**
         * Get the specified configuration value.
         *
         * @param  string  $key
         * @param  mixed   $default
         * @return mixed
         */
        public static function get($key, $default = null)
        {
            return static::$instance->get($key, $default);
        }
        /**
         * Set a given configuration value.
         *
         * @param  string  $key
         * @param  mixed   $value
         * @return void
         */
        public static function set($key, $value)
        {
            return static::$instance->set($key, $value);
        }
        /**
         * Load the configuration group for the key.
         *
         * @param  string  $group
         * @param  string  $namespace
         * @param  string  $collection
         * @return void
         */
        protected static function load($group, $namespace, $collection)
        {
            return static::$instance->load($group, $namespace, $collection);
        }
        /**
         * Call the after load callback for a namespace.
         *
         * @param  string  $namespace
         * @param  string  $group
         * @param  array   $items
         * @return array
         */
        protected static function callAfterLoad($namespace, $group, $items)
        {
            return static::$instance->callAfterLoad($namespace, $group, $items);
        }
        /**
         * Parse an array of namespaced segments.
         *
         * @param  string  $key
         * @return array
         */
        protected static function parseNamespacedSegments($key)
        {
            return static::$instance->parseNamespacedSegments($key);
        }
        /**
         * Register an after load callback for a given namespace.
         *
         * @param  string   $namespace
         * @param  \Closure  $callback
         * @return void
         */
        public static function afterLoading($namespace, Closure $callback)
        {
            return static::$instance->afterLoading($namespace, $callback);
        }
        /**
         * Get the collection identifier.
         *
         * @param  string  $group
         * @param  string  $namespace
         * @return string
         */
        protected static function getCollection($group, $namespace = null)
        {
            return static::$instance->getCollection($group, $namespace);
        }
        /**
         * Add a new namespace to the loader.
         *
         * @param  string  $namespace
         * @param  string  $hint
         * @return void
         */
        public static function addNamespace($namespace, $hint)
        {
            return static::$instance->addNamespace($namespace, $hint);
        }
        /**
         * Returns all registered namespaces with the config
         * loader.
         *
         * @return array
         */
        public static function getNamespaces()
        {
            return static::$instance->getNamespaces();
        }
        /**
         * Get the loader implementation.
         *
         * @return \Illuminate\Config\LoaderInterface
         */
        public static function getLoader()
        {
            return static::$instance->getLoader();
        }
        /**
         * Set the loader implementation.
         *
         * @param \Illuminate\Config\LoaderInterface  $loader
         * @return void
         */
        public static function setLoader(Illuminate\Config\LoaderInterface $loader)
        {
            return static::$instance->setLoader($loader);
        }
        /**
         * Get the current configuration environment.
         *
         * @return string
         */
        public static function getEnvironment()
        {
            return static::$instance->getEnvironment();
        }
        /**
         * Get the after load callback array.
         *
         * @return array
         */
        public static function getAfterLoadCallbacks()
        {
            return static::$instance->getAfterLoadCallbacks();
        }
        /**
         * Get all of the configuration items.
         *
         * @return array
         */
        public static function getItems()
        {
            return static::$instance->getItems();
        }
        /**
         * Determine if the given configuration option exists.
         *
         * @param  string  $key
         * @return bool
         */
        public static function offsetExists($key)
        {
            return static::$instance->offsetExists($key);
        }
        /**
         * Get a configuration option.
         *
         * @param  string  $key
         * @return mixed
         */
        public static function offsetGet($key)
        {
            return static::$instance->offsetGet($key);
        }
        /**
         * Set a configuration option.
         *
         * @param  string  $key
         * @param  mixed  $value
         * @return void
         */
        public static function offsetSet($key, $value)
        {
            return static::$instance->offsetSet($key, $value);
        }
        /**
         * Unset a configuration option.
         *
         * @param  string  $key
         * @return void
         */
        public static function offsetUnset($key)
        {
            return static::$instance->offsetUnset($key);
        }
        /**
         * Parse a key into namespace, group, and item.
         *
         * @param  string  $key
         * @return array
         */
        public static function parseKey($key)
        {
            return static::$instance->parseKey($key);
        }
        /**
         * Parse an array of basic segments.
         *
         * @param  array  $segments
         * @return array
         */
        protected static function parseBasicSegments(array $segments)
        {
            return static::$instance->parseBasicSegments($segments);
        }
        /**
         * Set the parsed value of a key.
         *
         * @param  string  $key
         * @param  array   $parsed
         * @return void
         */
        public static function setParsedKey($key, $parsed)
        {
            return static::$instance->setParsedKey($key, $parsed);
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Config::getFacadeAccessor();
        }
        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeRoot();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }

    class URL extends Concrete\Core\Url\Resolver\Manager\ResolverManager
    {
        /**
         * @var Concrete\Core\Url\Resolver\Manager\ResolverManager
         */
        protected static $instance;
        /**
         * {@inheritdoc}
         */
        public static function addResolver($handle, Concrete\Core\Url\Resolver\UrlResolverInterface $resolver, $priority = 512)
        {
            return static::$instance->addResolver($handle, $resolver, $priority);
        }
        /**
         * {@inheritdoc}
         */
        public static function getDefaultResolver()
        {
            return static::$instance->getDefaultResolver();
        }
        /**
         * {@inheritdoc}
         */
        public static function getResolver($handle)
        {
            return static::$instance->getResolver($handle);
        }
        /**
         * @return array
         */
        public static function getResolvers()
        {
            return static::$instance->getResolvers();
        }
        /**
         * {@inheritdoc}
         */
        public static function resolve(array $args)
        {
            return static::$instance->resolve($args);
        }
        /**
         * @return \Concrete\Core\Url\Resolver\Manager\ResolverManagerInterface
         */
        public static function getFacadeRoot()
        {
            return Concrete\Core\Support\Facade\Url::getFacadeRoot();
        }
        public static function getFacadeAccessor()
        {
            return Concrete\Core\Support\Facade\Url::getFacadeAccessor();
        }
        /**
         * Resolve a URL from data
         *
         * Working core examples for example.com:
         * \Url::to('/some/path', 'some_action', $some_variable = 2)
         *     http://example.com/some/path/some_action/2/
         *
         * \Url::to($page_object = \Page::getByPath('blog'), 'action')
         *     http://example.com/blog/action/
         *
         * @return \League\URL\URLInterface
         */
        public static function to()
        {
            return Concrete\Core\Support\Facade\Url::to();
        }
        /**
         * This method is only here as a legacy decorator, use url::to
         *
         * @return \League\URL\URLInterface
         * @deprecated
         */
        public static function route($data)
        {
            return Concrete\Core\Support\Facade\Url::route($data);
        }
        /**
         * This method is only here as a legacy decorator, use `\URL::to($page)`
         *
         * @return \League\URL\URLInterface
         * @deprecated
         */
        public static function page()
        {
            return Concrete\Core\Support\Facade\Url::page();
        }
        /**
         * Resolve the facade root instance from the container.
         *
         * @param  string $name
         * @return mixed
         */
        protected static function resolveFacadeInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::resolveFacadeInstance($name);
        }
        /**
         * Clear a resolved facade instance.
         *
         * @param  string  $name
         * @return void
         */
        public static function clearResolvedInstance($name)
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstance($name);
        }
        /**
         * Clear all of the resolved instances.
         *
         * @return void
         */
        public static function clearResolvedInstances()
        {
            return Concrete\Core\Support\Facade\Facade::clearResolvedInstances();
        }
        /**
         * Get the application instance behind the facade.
         *
         * @return \Concrete\Core\Application\Application
         */
        public static function getFacadeApplication()
        {
            return Concrete\Core\Support\Facade\Facade::getFacadeApplication();
        }
        /**
         * Set the application instance.
         *
         * @param  \Concrete\Core\Application\Application $app
         * @return void
         */
        public static function setFacadeApplication($app)
        {
            return Concrete\Core\Support\Facade\Facade::setFacadeApplication($app);
        }
    }
}
