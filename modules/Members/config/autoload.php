<?php
namespace Modules\Members;

class Autoloader {

//todo : créer un abstract

    static function register(){
        spl_autoload_register(array(__CLASS__, 'factory'));
        spl_autoload_register(array(__CLASS__, 'models'));
        spl_autoload_register(array(__CLASS__, 'controllers'));
        // Essentials
        spl_autoload_register(array(__CLASS__, 'aonyxEssentialsAbstracts'));
        spl_autoload_register(array(__CLASS__, 'aonyxEssentialsInterface'));
        spl_autoload_register(array(__CLASS__, 'aonyxEssentialsClasses'));
    }


    static function factory($class_name){
        $class_name = str_replace('Modules\\Members\\Factory\\', '', $class_name);
        if(file_exists('modules/Members/src/Factory/' . $class_name . '.php'))
            require 'modules/Members/src/Factory/' . $class_name . '.php';
    }


    static function controllers($class_name){
        $class_name = str_replace('Modules\\Members\\Controllers\\', '', $class_name);
        if(file_exists('modules/Members/src/Controllers/' . $class_name . '.php'))
            require 'modules/Members/src/Controllers/' . $class_name . '.php';
    }


    static function models($class_name){
        $class_name = str_replace('Modules\\Members\\Models\\', '', $class_name);
        if(file_exists('modules/Members/src/Models/' . $class_name . '.php'))
            require 'modules/Members/src/Models/' . $class_name . '.php';
    }

    /**
     * Essentiels au bon fonctionnement du CMS
     */
    static function aonyxEssentialsAbstracts($class_name){
        $class_name = str_replace('Aonyx\\Abstracts\\', '', $class_name);
        if(file_exists('vendor/Aonyx/Abstracts/' . $class_name . '.php'))
            require 'vendor/Aonyx/Abstracts/' . $class_name . '.php';
    }

    static function aonyxEssentialsInterface($class_name){
        $class_name = str_replace('Aonyx\\Interfaces\\', '', $class_name);
        if(file_exists('vendor/Aonyx/Interfaces/' . $class_name . '.php'))
            require 'vendor/Aonyx/Interfaces/' . $class_name . '.php';
    }

    static function aonyxEssentialsClasses($class_name){
        $class_name = str_replace('Aonyx\\Classes\\', '', $class_name);
        if(file_exists('vendor/Aonyx/Classes/' . $class_name . '.php'))
            require 'vendor/Aonyx/Classes/' . $class_name . '.php';
    }

}
