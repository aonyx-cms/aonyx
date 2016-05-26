<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:15
 */

use Aonyx\Classes\Module;
use Modules\Application\Autoloader;

/**
 * Autoload
 */
require_once 'vendor/aonyx-cms/aonyx-core/Core/AbstractAutoload.php';
require_once 'modules/Application/config/autoload.php';
Autoloader::register();
require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/Application/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

$module = new Module();
$module->getAction($routes, 'Application');