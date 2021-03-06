<?php
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 14:02
 */
use Config\Autoloader;
use Config\Session;
use Config\Config;
use Config\Router;

/**
 * Pile d'autoload
 */
include_once "config/autoload.php";


Autoloader::register();
Session::getInstance();
include_once "config/routing.php";

/**
 * Vérifie si parameters.php existe
 * Sinon lance l'installation
 */
if (!file_exists('config/parameters.php')) {

    header('location:install/index.php');
}

/**
 * Config du site
 */
include_once "config/parameters.php";
$config = new Config();
$config->fetchConfigSite();

/**
 * Construction du site
 */
$page = new Router($config->getTemplate(), $modules);
echo $page->body();
