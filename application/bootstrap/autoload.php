<?php 

use Symfony\Component\ClassLoader\MapClassLoader;

defined('C5_EXECUTE') or die('Access Denied.');

/**
 * ----------------------------------------------------------------------------
 * Load all composer autoload items.
 * ----------------------------------------------------------------------------
 */
if (!@include(DIR_BASE_CORE . '/' . DIRNAME_VENDOR . '/autoload.php')) {
    die('Third party libraries not installed. Make sure that composer has required libraries in the concrete/ directory.');
}

$mapping = array(
    //'Concrete\\Core\\Sharing\\SocialNetwork\\ServiceList' => DIR_APPLICATION . '/src/Core/Sharing/SocialNetwork/ServiceList.php',
    'Concrete\\Single_Pages\\Dashboard\\Sitemap\\Full' => DIR_APPLICATION . '/single_pages/dashboard/sitemap/full.php'
);
 
 ///application/single_pages/dashboard/sitemap/full.php
 
$loader = new MapClassLoader($mapping);
$loader->register();