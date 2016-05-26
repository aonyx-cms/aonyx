<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:15
 */

use Modules\Members\Autoloader;
use Aonyx\Classes\Module;

/**
 * Autoload
 */
require_once 'vendor/aonyx-cms/aonyx-core/Core/AbstractAutoload.php';
require_once 'modules/Members/config/autoload.php';

Autoloader::register();

require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/Members/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

$module = new Module();
$module->getAction($routes, 'Members');
