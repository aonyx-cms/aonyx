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
        global $database;

        $db = new \PDO('mysql:host=' . $database['host'] . ';dbname=' . $database['basename'], $database['username'], $database['password']);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}