<?php
/**
 * @author: galicher
 * Date: 03/04/16
 * Time: 16:24
 */

namespace Modules\Members\Services;


use Modules\Members\Models\UserRepository;

class RegisterService
{

    private $_oUserRepository = null;

    /**
     * RegisterService constructor.
     * Initialise le repo. User
     */
    public function __construct()
    {
        $this->_oUserRepository = new UserRepository();
    }

    /**
     * Nouvel utilisateur et envoi d'un mail
     */
    public function newUser()
    {
        $this->_oUserRepository->createUser();
        $this->sendMail();
    }

    /**
     * Envoie un mail
     * @param null $email
     * @param null $token
     */
    public function sendMail($email = null, $token = null)
    {
        mail(
            (null != $email ? $email : $_POST['email']),
            'Confirmation de votre compte',
            'Afin de valider votre compte merci de cliquer sur ce lien ' . $_SERVER['HTTP_REFERER'] . 'members/confirm/token=' . (null != $token ? $token : $_POST['token'])
        );
    }
}