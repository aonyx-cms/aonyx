<?php
namespace Config;
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 13:49
 */
class Database
{

    public static function connect()
    {
        $db = null;
        
        if(getenv('ENVIRONMENT') == 'prod') {

            global $database_prod;

            $db = new \PDO('mysql:host=' . $database_prod['host'] . ';dbname=' . $database_prod['basename'], $database_prod['username'], $database_prod['password']);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        if(getenv('ENVIRONMENT') == 'dev') {

            global $database_dev;

            $db = new \PDO('mysql:host=' . $database_dev['host'] . ';dbname=' . $database_dev['basename'], $database_dev['username'], $database_dev['password']);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        if(null == getenv('ENVIRONMENT')) {

            die('La variable d\'environnement n\'est pas définie !');
        }

        return $db;
    }

}