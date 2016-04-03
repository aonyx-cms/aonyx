<?php
/**
 * @author: galicher
 * Date: 21/03/16
 * Time: 23:07
 */

$config = [
    // Validation
    'registerValidation' => [
        'module' => 'Members',
        'class' => 'RegisterValidation',
        'namespace' => 'Modules\Members\Services\RegisterValidation'
    ],
    'loginValidation' => [
        'module' => 'Members',
        'class' => 'LoginValidation',
        'namespace' => 'Modules\Members\Services\LoginValidation'
    ],

    //Services
    'sessionService' => [
        'module' => 'Members',
        'class' => 'SessionService',
        'namespace' => 'Modules\Members\Services\SessionService'
    ],
    'registerService' => [
        'module' => 'Members',
        'class' => 'RegisterService',
        'namespace' => 'Modules\Members\Services\RegisterService'
    ]
];