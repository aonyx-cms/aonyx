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
    // Members Controller ....
    'index' => [
        'namespace' => '\Modules\Members\Controllers\MembersController',
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
    // Profile Controller ....
    'profile' => [
        'namespace' => '\Modules\Members\Controllers\ProfileController',
        'action' => 'indexAction'
    ],
    'profile/show' => [
        'namespace' => '\Modules\Members\Controllers\ProfileController',
        'action' => 'showAction'
    ],
    'profile/edit' => [
        'namespace' => '\Modules\Members\Controllers\ProfileController',
        'action' => 'editAction'
    ],
    // Memberlist Controller ....
    'memberlist' => [
        'namespace' => '\Modules\Members\Controllers\MemberlistController',
        'action' => 'indexAction'
    ],
    // Friends Controller ....
    'friends' => [
        'namespace' => '\Modules\Members\Controllers\FriendsController',
        'action' => 'indexAction'
    ],
    // Messaging Controller ....
    'messages' => [
        'namespace' => '\Modules\Members\Controllers\MessagingController',
        'action' => 'indexAction'
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