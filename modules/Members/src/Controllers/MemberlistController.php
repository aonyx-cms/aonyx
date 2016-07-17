<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 17/05/16
 * Time: 11:31
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;
use Modules\Members\Models\UserEntity;

class MemberlistController extends AbstractController
{

    public function indexAction() {

        $this->setConfig('services', 'Members');

        $this->setServices($this->getConfig(), array(
            'profileService'
        ));

        $oProfile = $this->getServices()['profileService']; // Service du profil

        $this->render([
            'users' => $oProfile->getUsers(),
        ],
            'modules/Members/src/Views/memberlist/index.php'
        );
    }
}