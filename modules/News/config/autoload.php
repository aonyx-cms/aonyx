<?php
namespace Modules\News;

class Autoloader {

//todo : créer un abstract

    static function register(){
        spl_autoload_register(array(__CLASS__, 'factory'));
        spl_autoload_register(array(__CLASS__, 'models'));
        spl_autoload_register(array(__CLASS__, 'controllers'));
        // Essentials
        spl_autoload_register(array(__CLASS__, 'aonyxEssentialsAbstracts'));
        spl_autoload_register(array(__CLASS__, 'aonyxEssentialsInterface'));
    }


    static function factory($class_name){
        $class_name = str_replace('Modules\\News\\Factory\\', '', $class_name);
        if(file_exists('modules/News/src/Factory/' . $class_name . '.php'))
            require 'modules/News/src/Factory/' . $class_name . '.php';
    }


    static function controllers($class_name){
        $class_name = str_replace('Modules\\News\\Controllers\\', '', $class_name);
        if(file_exists('modules/News/src/Controllers/' . $class_name . '.php'))
            require 'modules/News/src/Controllers/' . $class_name . '.php';
    }


    static function models($class_name){
        $class_name = str_replace('Modules\\News\\Models\\', '', $class_name);
        if(file_exists('modules/News/src/Models/' . $class_name . '.php'))
            require 'modules/News/src/Models/' . $class_name . '.php';
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



}
