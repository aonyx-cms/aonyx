<?php
/**
 * @author: galicher
 * Date: 20/03/16
 * Time: 22:20
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;
use Modules\Members\Models\UserRepository;

class MembersController extends AbstractController
{

    public function indexAction()
    {
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question : ici le service RegisterService
        $this->setService($this->getConfig(), 'session');

        // Récupère le service de login
        $oService = $this->getService();

        $this->render(
            [],
            'modules/Members/src/Views/index.php'
        );
    }

    public function loginAction()
    {
        // Charge le fichier de config services.config.php dans le dossier config de Members
        $this->setConfig('services', 'Members');

        // Set les services en question
        $this->setValidation($this->getConfig(), 'loginValidation');
        $this->setService($this->getConfig(), 'sessionService');

        // Récupère le service de login
        $oSession = $this->getService();

        if(isset($_POST)) {

        }

        $this->render(
            [],
            'modules/Members/src/Views/login.php'
        );
    }

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

        $oUserRepository = new UserRepository();
        $oUserRepository->init($this->getDatabase());

        if(isset($_POST)) {

            //Validateur : si c'est valide
            if($oValidation->isValid($_POST)) {

                //Nouvel enregistrement en base
                $oUserRepository->createUser();

                //Envoi d'un mail a celui renseigné pour valider token
                $oService->sendEmailConfirmation($_POST['email'], $_POST['token']);
                
                //Rend la vue si valide
                $this->render(
                    [
                        'email' => $_POST['email'],
                    ],
                    'modules/Members/src/Views/confirm.php'
                );
            } else {

                // Rend la vue si n'est pas valide
                $this->render(
                    [
                        'errors' => $oValidation->getErrors(), // Pour afficher les erreurs
                        //'success' => $oValidation->getSuccess(), // Pour afficher les success
                        'token' => $oValidation->getToken(), // Récupère le token généré automatiquement
                        'users' => $oUserRepository->getUsers(), // Liste des utilisateurs
                    ],
                    'modules/Members/src/Views/register.php'
                );
            }
        }

    }

    public function forgetAction()
    {
        $this->render(
            [],
            'modules/Members/src/Views/forget.php'
        );
    }

    public function accountAction()
    {
        $this->render(
            [],
            'modules/Members/src/Views/account.php'
        );
    }
}