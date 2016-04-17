<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:15
 */

/**
 * Autoload
 */
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

    // todo : créer une classe Aonyx pour gérer cela
    if(!array_key_exists($_GET['action'],$routes)) {
        // todo : créer classe d'erreur Aonyx
        header("HTTP/1.0 404 Not Found");
        header( "refresh:5;url=/" );
        echo '<div class="alert alert-danger" role="alert"><strong>404 Error :</strong> No route action</div><br />You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
    } else {

        $call = new $routes[$_GET['action']]['namespace'];
        $call->$routes[$_GET['action']]['action']();
    }

} else {

    $call = new \Modules\Application\Controllers\HomeController();
    // todo : a loger en abstract
    $call->indexAction();
}
