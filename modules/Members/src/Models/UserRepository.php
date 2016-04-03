<?php
/**
 * @author: galicher
 * Date: 22/03/16
 * Time: 21:59
 */

namespace Modules\Members\Models;

use Aonyx\Classes\DbManager;

class UserRepository extends DbManager
{

    public function init($db)
    {
        $this->setDb($db);
    }

    public function createUser()
    {

        //Création de l'entité
        $entity = new UserEntity();
        $entity->hydrate($_POST);

        //Set l'objet PDO
        $this->setDb($this->getDb());

        //Insertion en base de données
        $this->insert("users", "'', (?), (?), (?), NOW(), (?), (?)", array(
            $entity->getUsername(),
            $entity->getEmail(),
            $entity->getPassword(),
            $entity->getToken(),
            false,
        ));
    }

    public function getUsers()
    {

        // Récupère la liste des utilisateurs
        return $this->fetchAll('username', 'users', null, null, null, 'Users');
    }



}