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
     */
    public function connect() {

        if (isset($_POST['email']) && isset($_POST['password']))
        {
            Session::write('email', $_POST['email']);
        }

    }
}