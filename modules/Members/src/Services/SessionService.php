<?php
/**
 * @author: galicher
 * Date: 26/03/16
 * Time: 21:37
 */

namespace Modules\Members\Services;


use Config\Session;

class SessionService
{
    /**
     * Connexion User
     * Ecriture de la SESSION
     */
    public function connect() {

        if (isset($_POST['email']) && isset($_POST['password']))
        {
            Session::write('auth', $_POST['email']);
        }
    }

    /**
     * Détermine si l'utilisateur est connecté ou pas
     * @return bool
     */
    public function isConnected() {

        if (Session::read('auth')) {

            return true;
        }
    }
}