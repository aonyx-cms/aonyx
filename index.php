<?php
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 14:02
 */

/**
 * Démarre une session d'office pour l'objet session
 */
session_start();

/**
 * Pile d'autoload
 */
include_once "config/autoload.php";
use Config\Autoloader;
Autoloader::register();
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






