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
            'profileService'
        ));

        $oProfile = $this->getServices()['profileService'];

        // 3 sous action
        // - Edition infos profil
        // - Edition avatar et signature
        // - Edition de mot de passe

        // Retourne la vue d'édition du profil
        $oUserEntity = new UserEntity($oProfile->getProfileUser());
        $oProfileEntity = new ProfileEntity($oProfile->getProfileUser());

        // Affiche la vue
        $this->render([
            'user' => $oUserEntity,
            'profile' => $oProfileEntity
        ],

            'modules/Members/src/Views/profile/edit.php'
        );
    }

    public function showAction() {

        //todo: prendre en compte un show sans id de renseigné
        
        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService'
        ));

        // Recup infos (service)
        $oProfile = $this->getServices()['profileService'];

        if (!$oProfile->hasProfile()) {

            $this->redirect('members');
        }

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