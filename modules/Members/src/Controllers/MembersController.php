<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:20
 */

namespace Modules\Members\Controllers;

use Aonyx\Abstracts\AbstractController;
use Config\Session;

/**
 * Class MembersController
 * @package Modules\Members\Controllers
 */
class MembersController extends AbstractController
{

    /**
     * Action sur l'index du module Members
     * @throws \Exception
     */
    public function indexAction()
    {
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question : ici le service SessionService
        $this->setService($this->getConfig(), 'sessionService');

        // Récupère le service de login
        $oSession = $this->getService();

        // Vérifie si l'utilisateur est connecté
        if($oSession->isConnected()) {

            $this->redirect('members', 'account'); // Redirection sur la page d'espace membre
        } else {

            $this->redirect('members', 'login'); // Redirection sur la page de login
        }
    }

    /**
     * Action de connexion d'un utilisateur
     * @throws \Exception
     */
    public function loginAction()
    {
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question
        $this->setValidation($this->getConfig(), 'loginValidation');
        $this->setService($this->getConfig(), 'sessionService');

        // Validation
        $oValidation = $this->getValidation();

        // Récupère le service de login
        $oSession = $this->getService();

        // Si utilisateur connecté
        if($oSession->isConnected()) {

            $this->redirect('members', 'account'); // Redirection sur la page d'espace membre
        }

        if(isset($_POST)) {
            // Si le form est valide
            if($oValidation->isValid($_POST)) {
                // On connecte l'utilisateur
                $oSession->connect();
                // Rend la vue de l'espace membre
                $this->render(
                    [],
                    'modules/Members/src/Views/account.php'
                );

            } else {
                // Sinon rend la vue de Login avec les erreurs
                $this->render(
                    [
                        'errors' => $oValidation->getErrors(), // Pour afficher les erreurs
                    ],
                    'modules/Members/src/Views/login.php'
                );
            }
        }

    }

    /**
     * Actions d'enregistrement d'un nouveau membre
     * @throws \Exception
     */
    public function registerAction()
    {
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question
        $this->setValidation($this->getConfig(), 'registerValidation'); // Service de validation
        $this->setService($this->getConfig(), 'registerService'); // Register Service

        // Récupère le service & la validation
        $oValidation = $this->getValidation();
        $oService = $this->getService();

        // Si l'utilisateur est connecté
        //@todo: dans l'attente de modif (set plusieurs services) dans l'abstract
        if(Session::read('auth')) {

            $this->redirect('members', 'account'); // Redirection sur la page d'espace membre
        }

        if(isset($_POST)) {

            //Validateur : si le form est valide
            if($oValidation->isValid($_POST)) {

                // Créer un nouvel utilisateur
                $oService->newUser();

                // Rend la vue de confirmation si valide
                $this->render(
                    [
                        'email' => $_POST['email'],
                    ],
                    'modules/Members/src/Views/confirm.php'
                );
            } else {

                // Rend la vue Register si n'est pas valide avec les erreurs. Genere un token aléatoire
                $this->render(
                    [
                        'errors' => $oValidation->getErrors(), // Pour afficher les erreurs
                        'token' => $oValidation->getToken(), // Récupère le token généré automatiquement
                    ],
                    'modules/Members/src/Views/register.php'
                );
            }
        }

    }

    /**
     * Action mot de passe oublié
     * @throws \Exception
     */
    public function forgetAction()
    {
        $this->render(
            [],
            'modules/Members/src/Views/forget.php'
        );
    }

    /**
     * Action sur la page d'espace membre
     * @throws \Exception
     */
    public function accountAction()
    {
        $this->render(
            [],
            'modules/Members/src/Views/account.php'
        );
    }

    /**
     * Action de déconnexion
     * @throws \Exception
     */
    public function logoutAction()
    {
        // Unset l'utilisateur en cours
        Session::delete('auth');
        // Redirection sur l'index
        $this->redirect('members');
    }
}