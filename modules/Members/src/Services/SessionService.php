<?php
/**
 * @author: galicher
 * Date: 26/03/16
 * Time: 21:37
 */

namespace Modules\Members\Services;


class SessionService
{

    //todo : créer un service d'authentification
    public function createSession() {

        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $_SESSION['email'] = $_POST['email'];
        }

    }
}