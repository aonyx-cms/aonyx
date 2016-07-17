<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 18/05/16
 * Time: 16:21
 */

namespace Modules\Members\Models;

use Config\Database;
use Aonyx\Classes\DbManager;

/**
 * Class ProfileRepository
 * @package Modules\Members\Models
 */
class ProfileRepository extends DbManager
{

    /**
     * @var null|\PDO
     */
    private $_oDb = null;

    /**
     * ProfileRepository constructor.
     */
    public function __construct()
    {
        $this->_oDb = Database::connect();
        $this->setDb($this->_oDb);
    }
    
    public function fetchAllUsers() 
    {

        return $this->fetchAll('*', 'users LEFT JOIN users_profile', ' ON users_profile.id_user = users.id', null, null, 'UserProfile');
    }

    /**
     * Fait une jointure du user et son profil
     * @param $id_user
     * @return mixed
     */
    public function fetchProfileUser($id_user)
    {
        return $this->leftJoin('*', 'users LEFT JOIN users_profile', 'users_profile.id_user = users.id', 'users_profile.id_user = (?)',
            array(
                $id_user
            ),
            'UserProfile');
    }

}