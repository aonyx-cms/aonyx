<?php
/**
 * @author: galicher
 * Date: 15/03/16
 * Time: 21:58
 */

/**
 * Autoload
 */
require_once 'vendor/aonyx-cms/aonyx-core/Core/AbstractAutoload.php';
require_once 'modules/News/config/autoload.php';
\Modules\News\Autoloader::register();
require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/News/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

if(isset($_GET['child'])) {

    if(!array_key_exists($_GET['child'],$routes)) {

        // Si l'action n'existe pas on bloque
        \Aonyx\Classes\Errors::noRouteAction();
    } else {

        // Sinon on appelle le child demandée
        $call = new $routes[$_GET['child']]['namespace'];

        // Si une action existe
        if (isset($_GET['action'])) {

            $call->{$routes[$_GET['child'].'/'.$_GET['action']]['action']}();
        } else {

            $call->{$routes[$_GET['child']]['action']}();
        }
    }

} else {

    $call = new \Modules\News\Controllers\NewsController();
    $call->indexAction();
}

