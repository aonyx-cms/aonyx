<?php
/**
 * @author: galicher
 * Date: 22/03/16
 * Time: 21:12
 */

namespace Modules\Members\Models;


class UserEntity
{
    protected $_errors;
    protected $_username;
    protected $_email;
    protected $_password;
    protected $_token;

    /**
     * Constructeur avec hydratation des donnees en paramètres
     * @param array $valeurs
     */

    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->hydrate($valeurs);
        }
    }

    /**
     * Méthode d'hydratation auto
     * @param $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set' . ucfirst($attribut);

            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * @param mixed $errors
     * @return UserEntity
     */
    public function setErrors($errors)
    {
        $this->_errors = $errors;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     * @return UserEntity
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     * @return UserEntity
     */
    public function setEmail($email)
    {
        $this->_email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     * @return UserEntity
     */
    public function setPassword($password)
    {
        $this->_password = crypt($password, $password);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->_token;
    }

    /**
     * @param mixed $token
     * @return UserEntity
     */
    public function setToken($token)
    {
        $this->_token = $token;
        return $this;
    }


}