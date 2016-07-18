<?php
/**
 * @author: galicher
 * Date: 15/03/16
 * Time: 21:58
 */

use Aonyx\Classes\Module;
use Modules\News\Autoloader;

/**
 * Autoload
 */
require_once 'vendor/aonyx-cms/aonyx-core/Core/AbstractAutoload.php';
require_once 'modules/News/config/autoload.php';

Autoloader::register();

require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/News/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

$module = new Module();
$module->getAction($routes, 'News');