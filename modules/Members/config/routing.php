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
     * Routes d'actions du modules Members
     */
    // For example : module name
    'index' => [
        // namespace
        'namespace' => '\Modules\Members\Controllers\MembersController',
        // function
        'action' => 'indexAction'
    ],
    'login' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
        'action' => 'loginAction'
    ],
    'logout' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
        'action' => 'logoutAction'
    ],
    'register' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
        'action' => 'registerAction'
    ],
    'forget' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
        'action' => 'forgetAction'
    ],
    'account' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
        'action' => 'accountAction'
    ],

    /**
     * Routes des controllers Ajax
     */
    'ajax_validation_username' => [
        'namespace' => '\Modules\Members\Controllers\AjaxMembersController',
        'action' => 'getUsername'
    ],

    'ajax_validation_email' => [
        'namespace' => '\Modules\Members\Controllers\AjaxMembersController',
        'action' => 'getEmail'
    ]

];

/**
 * GET "autre chose"
 */
$childRoutes = [

];