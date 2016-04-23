<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:15
 */

/**
 * Autoload
 */
require_once 'vendor/Aonyx/Core/AbstractAutoload.php';
require_once 'modules/Application/config/autoload.php';
\Modules\Application\Autoloader::register();
require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/Application/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

if(isset($_GET['action'])) {

    if(!array_key_exists($_GET['action'],$routes)) {

        \Aonyx\Classes\Errors::noRouteAction();
    } else {

        $call = new $routes[$_GET['action']]['namespace'];
        $call->$routes[$_GET['action']]['action']();
    }

} else {

    $call = new \Modules\Application\Controllers\HomeController();
    $call->indexAction();
}
