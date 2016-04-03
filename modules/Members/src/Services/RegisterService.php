<?php
/**
 * @author: galicher
 * Date: 03/04/16
 * Time: 16:24
 */

namespace Modules\Members\Services;


class RegisterService
{
    public function sendEmailConfirmation($email, $token)
    {

        mail(
            $email,
            'Confirmation de votre compte',
            'Afin de valider votre compte merci de cliquer sur ce lien ' . $_SERVER['HTTP_REFERER'] . 'index.php?module=members&action=confirm&token=' . $token
        );
    }
}