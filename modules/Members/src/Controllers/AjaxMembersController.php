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

    public function getUsername()
    {
        $response = null;

        if(isset($_POST['attachment']) && '' != $_POST['attachment']) {

            $oRepository = new UserRepository();
            $oRepository->init($this->getDatabase());

            if($_POST['attachment'] == $oRepository->fetchUserByUsername($_POST['attachment'])['username']) {

                $response = '<br /><div class="alert alert-danger">Cet identifiant est déjà pris !</div>';
            } else {

                $response = '<br /><div class="alert alert-success">Cet identifiant est disponible !</div>';
            }

        }

        echo $response;
    }

    public function getEmail()
    {
        $response = null;

        if(isset($_POST['attachment']) && '' != $_POST['attachment']) {

            $oRepository = new UserRepository();
            $oRepository->init($this->getDatabase());

            if($_POST['attachment'] == $oRepository->fetchUserByEmail($_POST['attachment'])['email']) {

                $response = '<br /><div class="alert alert-danger">Cet e-mail est déjà pris !</div>';
            } else {

                $response = '<br /><div class="alert alert-success">Cet e-mail est disponible !</div>';
            }

        }

        echo $response;
    }
}
