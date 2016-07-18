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
    // News Controller .....
    'index' => [
        'namespace' => '\Modules\News\Controllers\NewsController',
        'action' => 'indexAction'
    ],
    'index/show' => [
        'namespace' => '\Modules\News\Controllers\NewsController',
        'action' => 'showAction'
    ],
];

