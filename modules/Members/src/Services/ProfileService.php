<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 18/05/16
 * Time: 16:29
 */

namespace Modules\Members\Services;

use Config\Session;
use Modules\Members\Models\ProfileRepository;

/**
 * Class ProfileService
 * @package Modules\Members\Services
 */
class ProfileService
{

    /**
     * @var ProfileRepository|null
     */
    private $_oProfileRepository = null;

    /**
     * ProfileService constructor.
     */
    public function __construct()
    {
        $this->_oProfileRepository = new ProfileRepository();
    }

    /**
     * Récupère tout les utilisateurs
     * @return mixed
     */
    public function getUsers() {
    
        return $this->_oProfileRepository->fetchAllUsers();
    }
    
    /**
     * Fetch le profil de l'utilisateur
     * @return mixed
     */
    public function getProfileUser() {

        return $this->_oProfileRepository->fetchProfileUser($_GET['id']);
    }
    
    /**
     * Vérifie qu'il est bien l'utilisateur connecté
     * @return bool
     */
    public function isUser() {

        $bReturn = false;

        if (Session::read('auth_id') == $_GET['id']) {

            $bReturn = true;
        }

        return $bReturn;
    }

    /**
     * Vérifie qu'on a un profil
     * @return bool
     */
    public function hasProfile() {

        $bReturn = false;

        if(isset($_GET['id'])) {

            $bReturn = true;
        }

        return $bReturn;
    }

}