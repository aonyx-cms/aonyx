<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 18/05/16
 * Time: 16:29
 */

namespace Modules\Members\Services;

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
     * @return mixed
     */
    public function getProfileUser() {
        
        return $this->_oProfileRepository->fetchProfileUser($_GET['id']);
    }

    /**
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