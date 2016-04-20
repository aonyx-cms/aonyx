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
        $this->setServices($this->getConfig(), array('sessionService'));

        // Récupère le service de login
        $oSession = $this->getServices()['sessionService'];

        $oSession->hasCookie();

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
        $this->setServices($this->getConfig(), array(
            'sessionService',
            'loginValidation'
        ));

        // Validation
        $oValidation = $this->getServices()['loginValidation'];

        // Récupère le service de login
        $oSession = $this->getServices()['sessionService'];

        $oSession->hasCookie();

        // Si utilisateur connecté
        if($oSession->isConnected()) {

            $this->redirect('members', 'account'); // Redirection sur la page d'espace membre
        }

        if(isset($_POST)) {

            // Si le form est valide
            if($oValidation->isValid($_POST)) {

                // Si se souvenir de moi est coché alors on crée un cookie
                if($oSession->isRemembered()) {

                    $oSession->remember();
                }

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
        $this->setServices($this->getConfig(), array(
            'registerService',
            'sessionService',
            'registerValidation'
        ));

        // Récupère les services
        $oValidation = $this->getServices()['registerValidation']; // Validation
        $oRegisterService = $this->getServices()['registerService']; // Service Register
        $oSessionService = $this->getServices()['sessionService']; // Service Session

        // Si l'utilisateur est connecté
        if($oSessionService->isConnected()) {

            $this->redirect('members', 'account'); // Redirection sur la page d'espace membre
        }

        if(isset($_POST)) {

            //Validateur : si le form est valide
            if($oValidation->isValid($_POST)) {

                // Créer un nouvel utilisateur
                $oRegisterService->newUser();

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
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question : ici le service SessionService
        $this->setServices($this->getConfig(), array('sessionService'));

        // Récupère le service de login
        $oSession = $this->getServices()['sessionService'];

        // Unset la session
        $oSession->disconnect();

        // Redirection sur l'index
        $this->redirect('members');
    }
}