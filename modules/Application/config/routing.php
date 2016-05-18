<?php
/**
 * @author: galicher
 * Date: 15/03/16
 * Time: 22:10
 */

/**
 * GET action
 */
$routes = [
    /**
     * Routes d'actions du modules Application
     */
    // Home ...
    'index' => [
        'namespace' => '\Modules\Application\Controllers\HomeController',
        'action' => 'indexAction'
    ],
    // Stats ...
    'stats' => [
        'namespace' => '\Modules\Application\Controllers\StatistiquesController',
        'action' => 'indexAction'
    ],

];

/**
 * GET "autre chose"
 */
$childRoutes = [

];