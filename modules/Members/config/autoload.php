<?php
namespace Modules\Members;

use Aonyx\Core\AbstractAutoload;

class Autoloader extends AbstractAutoload {

    const MODULE = 'Members';

    const FOLDER_FACTORY = 'Factory';
    const FOLDER_CONTROLLERS = 'Controllers';
    const FOLDER_MODELS = 'Models';

    static function register(){
        spl_autoload_register(array(__CLASS__, self::FUNCTION_FACTORY));
        spl_autoload_register(array(__CLASS__, self::FUNCTION_MODELS));
        spl_autoload_register(array(__CLASS__, self::FUNCTION_CONTROLLERS));
        self::registerCoreAonyx();

    }

    static function factory($class_name){
        $class_name = str_replace('Modules\\' . self::MODULE . '\\' . self::FOLDER_FACTORY . '\\', '', $class_name);
        if(file_exists('modules/' . self::MODULE . '/src/' . self::FOLDER_FACTORY . '/' . $class_name . '.php'))
            require 'modules/' . self::MODULE . '/src/' . self::FOLDER_FACTORY . '/' . $class_name . '.php';
    }

    static function controllers($class_name){
        $class_name = str_replace('Modules\\' . self::MODULE . '\\' . self::FOLDER_CONTROLLERS . '\\', '', $class_name);
        if(file_exists('modules/' . self::MODULE . '/src/' . self::FOLDER_CONTROLLERS . '/' . $class_name . '.php'))
            require 'modules/' . self::MODULE . '/src/' . self::FOLDER_CONTROLLERS . '/' . $class_name . '.php';
    }

    static function models($class_name){
        $class_name = str_replace('Modules\\' . self::MODULE . '\\' . self::FOLDER_MODELS . '\\', '', $class_name);
        if(file_exists('modules/' . self::MODULE . '/src/' . self::FOLDER_MODELS . '/' . $class_name . '.php'))
            require 'modules/' . self::MODULE . '/src/' . self::FOLDER_MODELS . '/' . $class_name . '.php';
    }

}
