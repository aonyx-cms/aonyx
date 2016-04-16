<?php
/**
 * @author: galicher
 * Date: 24/03/16
 * Time: 22:09
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;
use Modules\Members\Models\UserRepository;

class AjaxMembersController extends AbstractController
{
    const USER_ALREADY = 'Cet identifiant est déjà pris !';
    const USER_AVAILABLE = 'Cet identifiant est disponible !';
    const EMAIL_ALREADY = 'Cet e-mail est déjà pris !';
    const EMAIL_AVAILABLE = 'Cet e-mail est disponible !';

    //@todo : appliquer les règles de validation RegisterValidation pour toutes les méthodes
    public function getUsername()
    {
        $response = null;

        if(isset($_POST['attachment']) && '' != $_POST['attachment']) {

            $oRepository = new UserRepository();

            if($_POST['attachment'] == $oRepository->fetchUserByUsername($_POST['attachment'])['username']) {

                $response = '<br /><div class="alert alert-danger">' . self::USER_ALREADY . '</div>';
            } else {

                $response = '<br /><div class="alert alert-success">' . self::USER_AVAILABLE . '</div>';
            }

        }

        echo $response;
    }

    public function getEmail()
    {
        $response = null;

        if(isset($_POST['attachment']) && '' != $_POST['attachment']) {

            $oRepository = new UserRepository();

            if($_POST['attachment'] == $oRepository->fetchUserByEmail($_POST['attachment'])['email']) {

                $response = '<br /><div class="alert alert-danger">' . self::EMAIL_ALREADY . '</div>';
            } else {

                $response = '<br /><div class="alert alert-success">' . self::EMAIL_AVAILABLE . '</div>';
            }

        }

        echo $response;
    }
}
