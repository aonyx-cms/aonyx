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
        'namespace' => 'Modules\Members\Services\RegisterValidation',
        'src' => 'Validation/'
    ],
    'loginValidation' => [
        'module' => 'Members',
        'class' => 'LoginValidation',
        'namespace' => 'Modules\Members\Services\LoginValidation',
        'src' => 'Validation/'
    ],

    //Services
    'sessionService' => [
        'module' => 'Members',
        'class' => 'SessionService',
        'namespace' => 'Modules\Members\Services\SessionService',
        'src' => null
    ],
    'registerService' => [
        'module' => 'Members',
        'class' => 'RegisterService',
        'namespace' => 'Modules\Members\Services\RegisterService',
        'src' => null
    ]
];