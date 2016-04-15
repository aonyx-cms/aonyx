<?php
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 14:02
 */

/**
 * Pile d'autoload
 */
include_once "config/autoload.php";
use Config\Autoloader;
use Config\Session;

Autoloader::register();
Session::getInstance();

include_once "config/routing.php";

/**
 * Config du site
 */
use Config\Config;
$config = new Config();
$config->fetchConfigSite();

/**
 * Templates
 */
use Config\Template;
$template = new Template($config->getTemplate(), $modules, $config);
$template->body();






