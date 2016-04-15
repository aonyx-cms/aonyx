<?php
/**
 * @author: Damien Galicher (Inso-61)
 * Date: 14/04/16
 * Time: 19:07
 */

namespace Config;


class Session
{

    static $instance;

    static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct(){
        session_start();
    }

    static function setFlash($key, $message){
        $_SESSION['flash'][$key] = $message;
    }

    static function hasFlashes(){
        return isset($_SESSION['flash']);
    }

    static function getFlashes(){
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    static function write($key, $value){
        $_SESSION[$key] = $value;
    }

    static function read($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    static function delete($key) {
        unset($_SESSION[$key]);
    }
}