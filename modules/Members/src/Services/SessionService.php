<?php
/**
 * @author: galicher
 * Date: 26/03/16
 * Time: 21:37
 */

namespace Modules\Members\Services;


use Aonyx\Classes\Application;
use Config\Session;
use Modules\Members\Models\UserRepository;

class SessionService
{
    private $_oUserRepository = null;
    private $_oApp = null;

    public function __construct()
    {
        $this->_oUserRepository = new UserRepository();
        $this->_oApp = new Application();
    }

    /**
     * Connexion User
     * Ecriture de la SESSION
     */
    public function connect($specificPost = null) {

        // Par rapport a un post sans param
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $aUser = $this->_oUserRepository->fetchUserByEmail($_POST['email']);

            //Set
            Session::write('auth', $_POST['email']);
            Session::write('auth_id', $aUser['id']);
            Session::write('auth_username', $aUser['username']);
            Session::write('auth_email', $aUser['email']);
            Session::write('auth_date_creation', $aUser['date_creation']);
            Session::write('auth_token', $aUser['token']);
            Session::write('auth_enabled', $aUser['enabled']);
            Session::write('auth_remember_token', $aUser['remember_token']);
        }

        // Si on justifie un user en particulier
        if (isset($specificPost)) {

            //Set
            Session::write('auth', $specificPost['email']);
            Session::write('auth_id', $specificPost['id']);
            Session::write('auth_username', $specificPost['username']);
            Session::write('auth_email', $specificPost['email']);
            Session::write('auth_date_creation', $specificPost['date_creation']);
            Session::write('auth_token', $specificPost['token']);
            Session::write('auth_enabled', $specificPost['enabled']);
            Session::write('auth_remember_token', $specificPost['remember_token']);
        }
    }

    /**
     * Deconnexion User
     */
    public function disconnect() {

        // Efface le token pour le cookie
        $aUser = $this->_oUserRepository->fetchUserByEmail(Session::read('auth'));

        $this->_oUserRepository->update('users', 'remember_token = ?', 'id = ?',
            array(
                '',
                $aUser['id'],
            )
        );

        // Destruction du cookie
        setcookie('remember', NULL, -1);

        // Unset des données en session
        Session::delete('auth');
        Session::delete('auth_username');
        Session::delete('auth_email');
        Session::delete('auth_date_creation');
        Session::delete('auth_token');
        Session::delete('auth_enabled');
        Session::delete('auth_remember_token');
    }

    /**
     * Se souvenir de moi
     * crée un cookie
     */
    public function remember() {

        // Crée un token unique
        $aUser = $this->_oUserRepository->fetchUserByEmail($_POST['email']);
        $sRememberToken = $this->_oApp->generateToken(37);

        // Enregistre le token (se souvenir) pour l'utilisateur
        $this->_oUserRepository->update('users', 'remember_token = ?', 'id = ?',
            array(
                $sRememberToken,
                $aUser['id'],
            )
        );

        // Crée un nouveau cookie pour l'utilisateur et crypte une partie du token
        setcookie('remember', $aUser['id'] . '//' . $sRememberToken . sha1($aUser['id'] . 'azertyuiopqsdfghjklmwxcvbn9876543210'), time() + 60 * 60 * 24 * 7);
    }

    /**
     * Détermine si l'utilisateur est connecté ou pas
     * @return bool
     */
    public function isConnected() {

        $bReturn = false;

        if (Session::read('auth')) {

            $bReturn = true;
        }

        return $bReturn;
    }

    /**
     * Détermine si on a cocher la case Se souvenir de moi
     * @return bool
     */
    public function isRemembered() {

        $bReturn = false;

        if(array_key_exists('remember', $_POST)) {

            $bReturn = true;
        }

        return $bReturn;
    }

    /**
     * Détermine si le cookie existe
     */
    public function hasCookie() {

        // Si il existe un cookie et que l'utilisateur n'est pas connecté
        if(isset($_COOKIE['remember']) && !$this->isConnected()) {

            // Retrouve l'id
            $sRememberToken = $_COOKIE['remember'];
            $aParts = explode('//', $sRememberToken);
            $sUserId = $aParts[0];

            // Fait un fetch avec l'id du token
            $aUser = $this->_oUserRepository->fetchUserById($sUserId);

            // Si l'id retrouvé correspond à un utilisateur
            if($aUser) {

                // Ce qui est attendu
                $expected = $sUserId . '//' . $aUser['remember_token'] . sha1($sUserId . 'azertyuiopqsdfghjklmwxcvbn9876543210');

                // Si ce qui est attendu correspond bien au token
                if ($expected == $sRememberToken) {

                    // On connecte automatiquement l'utilisateur à son compte
                    $this->connect($aUser);

                    // Crée le cookie
                    setcookie('remember', $sRememberToken, time() + 60 * 60 * 24 * 7);
                } else {

                    setcookie('remember', null, -1);
                }
            } else {

                setcookie('remember', null, -1);
            }
        }
    }

}