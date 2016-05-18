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

if(isset($_GET['child'])) {

    if(!array_key_exists($_GET['child'],$routes)) {

        \Aonyx\Classes\Errors::noRouteAction();
    } else {

        $call = new $routes[$_GET['child']]['namespace'];
        $call->{$routes[$_GET['child']]['action']}();
    }

} else {

    $call = new \Modules\Application\Controllers\HomeController();
    $call->indexAction();
}
