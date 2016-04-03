<?php
namespace Config;

class Autoloader {

    static function register(){
        spl_autoload_register(array(__CLASS__, 'config'));
    }

    static function config($class_name){
        $class_name = str_replace('Config\\', '', $class_name);
        if(file_exists('config/' . strtolower($class_name) . '.php'))
            require 'config/' . strtolower($class_name) . '.php';
    }

}
