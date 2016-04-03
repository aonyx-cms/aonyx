<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:15
 */

/**
 * Autoload
 */
require_once 'modules/Members/config/autoload.php';
\Modules\Members\Autoloader::register();
require_once 'config/database.php';

/**
 * Routing actions
 */
include_once 'modules/Members/config/routing.php';

/**
 * On appelle suivant le GET l'action du controller
 */

if(isset($_GET['action'])) {

    // todo : créer une classe Aonyx pour gérer cela
    if(!isset($routes[$_GET['action']])) {
        // todo : créer classe d'erreur Aonyx
        echo '<div class="alert alert-danger" role="alert"><strong>404 Error :</strong> No route action</div>';
        die;
    }

    $call = new $routes[$_GET['action']]['namespace'];
    $call->$routes[$_GET['action']]['action']();

} else {

    $call = new \Modules\Members\Controllers\MembersController();
    // todo : a loger en abstract
    $call->indexAction();
}
