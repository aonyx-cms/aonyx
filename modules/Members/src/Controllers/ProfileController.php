<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 17/05/16
 * Time: 11:33
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;
use Modules\Members\Models\ProfileEntity;
use Modules\Members\Models\UserEntity;

class ProfileController extends AbstractController
{

    public function indexAction() {
        
        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'sessionService'
        ));

        $oSession = $this->getServices()['sessionService'];

        if(!$oSession->isConnected()) {

            $this->redirect('members');
        }

        $this->render([], 'modules/Members/src/Views/profile/index.php');
    }
    
    public function editAction() {
        
        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService',
            'sessionService'
        ));
        
        $oProfile = $this->getServices()['profileService']; // Service du profil
        $oSession = $this->getServices()['sessionService']; // Service de la session
        
        // Vérifie que l'utilisateur soit connecté sinon on le redirige au début
        if (!$oSession->isConnected()) {
            
            $this->redirect('members');
        }
        
        // Vérifie si on édite bien le profile de l'utilisateur qui est connecté
        // sinon on le redirige sur la zone membre
        if (!$oProfile->isUser()) {
            
            $this->redirect('members');
        }

        // Retourne la vue d'édition du profil
        $oUserEntity = new UserEntity($oProfile->getProfileUser());
        
        if (!$oUserEntity) {
            
            $this->redirect('account');
        }
        
        $oProfileEntity = new ProfileEntity($oProfile->getProfileUser());

        // Affiche la vue
        $this->render([
            'user' => $oUserEntity,
            'profile' => $oProfileEntity
        ],

            'modules/Members/src/Views/profile/edit.php'
        );
    }
    
    public function passwordAction() {
        
        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService',
            'sessionService'
        ));

        $oProfile = $this->getServices()['profileService']; // Service du profil
        $oSession = $this->getServices()['sessionService']; // Service de la session

        // Vérifie que l'utilisateur soit connecté sinon on le redirige au début
        if (!$oSession->isConnected()) {

            $this->redirect('members');
        }

        // Vérifie si on édite bien le profile de l'utilisateur qui est connecté
        // sinon on le redirige sur la zone membre
        if (!$oProfile->isUser()) {

            $this->redirect('members');
        }
        
        $this->render([
            
        ],
            'modules/Members/src/Views/profile/password.php'
        );
    }
    
    public function imageAction() {

        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService',
            'sessionService'
        ));

        $oProfile = $this->getServices()['profileService']; // Service du profil
        $oSession = $this->getServices()['sessionService']; // Service de la session

        // Vérifie que l'utilisateur soit connecté sinon on le redirige au début
        if (!$oSession->isConnected()) {

            $this->redirect('members');
        }

        // Vérifie si on édite bien le profile de l'utilisateur qui est connecté
        // sinon on le redirige sur la zone membre
        if (!$oProfile->isUser()) {

            $this->redirect('members');
        }
        
        $this->render([
            
        ],
            'modules/Members/src/Views/profile/image.php'
        );
    }

    public function showAction() {

        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService'
        ));

        // Recup infos (service)
        $oProfile = $this->getServices()['profileService'];

        // Vérifie qu'on a un profil, que le GET ne soit pas null
        if (!$oProfile->hasProfile()) {

            $this->redirect('members');
        }

        // Vérifie que l'utilisateur qu'on séléctionne avec le GET est bien existant
        if (!$oProfile->getProfileUser()) {

            $this->redirect('members');
        }

        // Récupère les infos de l'utilisateur selectionné
        // 2 entity, car pour avoir les infos complètes
        $oUserEntity = new UserEntity($oProfile->getProfileUser());
        $oProfileEntity = new ProfileEntity($oProfile->getProfileUser());
        
        // Affiche la vue
        $this->render([
            'user' => $oUserEntity,
            'profile' => $oProfileEntity
        ], 
            'modules/Members/src/Views/profile/index.php'
        );

    }
    
}