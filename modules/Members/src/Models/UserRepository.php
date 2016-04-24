<?php
/**
 * @author: galicher
 * Date: 22/03/16
 * Time: 21:59
 */

namespace Modules\Members\Models;

use Aonyx\Classes\DbManager;
use Config\Database;

class UserRepository extends DbManager
{

    private $_oDb = null;

    public function __construct()
    {
        $this->_oDb = Database::connect();
        $this->setDb($this->_oDb);
    }

    /**
     *
     */
    public function createUser()
    {

        //Création de l'entité
        $entity = new UserEntity();
        $entity->hydrate($_POST);

        //Set l'objet PDO
        $this->setDb($this->getDb());

        //Insertion en base de données
        $this->insert("users", "'', (?), (?), (?), NOW(), (?), (?), (?)", array(
            $entity->getUsername(),
            $entity->getEmail(),
            $entity->getPassword(),
            $entity->getToken(),
            false,
            null
        ));
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        // Récupère la liste des utilisateurs
        return $this->fetchAll('username', 'users', null, null, null, 'Users');
    }

    /**
     * @param null $specificPost
     * @return mixed
     */
    public function fetchUserByEmail($specificPost = null) {
        return $this->fetch('*', 'users', 'email = (?)', array((null != $specificPost ? $specificPost : $_POST['email'])), 'Users');
    }

    /**
     * @param null $specificPost
     * @return mixed
     */
    public function fetchUserById($specificPost = null) {
        return $this->fetch('*', 'users', 'id = (?)', array((null != $specificPost ? $specificPost : $_POST['id'])), 'Users');
    }

    /**
     * @param null $specificPost
     * @return mixed
     */
    public function fetchUserByUsername($specificPost = null) {
        return $this->fetch('*', 'users', 'username = (?)', array((null != $specificPost ? $specificPost : $_POST['username'])), 'Users');
    }
}