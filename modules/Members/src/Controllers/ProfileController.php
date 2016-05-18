<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 17/05/16
 * Time: 11:33
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;

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

//        die('dans le index, la route est '. $_GET['child']);
        $this->render([], 'modules/Members/src/Views/profile/index.php');
    }
    
    public function editAction() {
        
        // 3 sous action
        // - Edition infos profil
        // - Edition avatar et signature
        // - Edition de mot de passe
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
        var_dump($oProfile->getProfileUser());

        // Affiche la vue
        $this->render([], 'modules/Members/src/Views/profile/index.php');

    }

    // .... Les sous-actions du edit

    public function profileEditAction() {

    }

    public function imagesEditAction() {

    }

    public function passwordEditAction() {

    }
    
}