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
        //todo : fichier de config db externe de type array
        $db = new \PDO('mysql:host=localhost;dbname=cms', 'root', 'root');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}