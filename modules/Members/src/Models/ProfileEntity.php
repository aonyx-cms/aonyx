<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 18/05/16
 * Time: 14:13
 */

namespace Modules\Members\Models;

/**
 * Class ProfileEntity
 * @package Modules\Members\Models
 */
class ProfileEntity
{
    /**
     * @var null
     */
    protected $_iIdUser = null;
    protected $_sTemplate = null;
    protected $_sFirstName = null;
    protected $_sLastName = null;
    protected $_sNationnality = null;
    protected $_sAvatar = null;
    protected $_sSignature = null;
    protected $_iRightsLevel = null;
    protected $_sWebsite = null;
    protected $_iConnectionStatus = null;
    protected $_bBanishment = null;
    protected $_sBirthDate = null;
    protected $_iNumberOfMessages = null;
    protected $_sSex = null;

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
     * @return null
     */
    public function getIdUser()
    {
        return $this->_iIdUser;
    }

    /**
     * @param null $iIdUser
     * @return ProfileEntity
     */
    public function setIdUser($iIdUser)
    {
        $this->_iIdUser = $iIdUser;
        return $this;
    }

    /**
     * @return null
     */
    public function getTemplate()
    {
        return $this->_sTemplate;
    }

    /**
     * @param null $sTemplate
     * @return ProfileEntity
     */
    public function setTemplate($sTemplate)
    {
        $this->_sTemplate = $sTemplate;
        return $this;
    }

    /**
     * @return null
     */
    public function getFirstName()
    {
        return $this->_sFirstName;
    }

    /**
     * @param null $sFirstName
     * @return ProfileEntity
     */
    public function setFirstName($sFirstName)
    {
        $this->_sFirstName = $sFirstName;
        return $this;
    }

    /**
     * @return null
     */
    public function getLastName()
    {
        return $this->_sLastName;
    }

    /**
     * @param null $sLastName
     * @return ProfileEntity
     */
    public function setLastName($sLastName)
    {
        $this->_sLastName = $sLastName;
        return $this;
    }

    /**
     * @return null
     */
    public function getNationnality()
    {
        return $this->_sNationnality;
    }

    /**
     * @param null $sNationnality
     * @return ProfileEntity
     */
    public function setNationnality($sNationnality)
    {
        $this->_sNationnality = $sNationnality;
        return $this;
    }

    /**
     * @return null
     */
    public function getAvatar()
    {
        return $this->_sAvatar;
    }

    /**
     * @param null $sAvatar
     * @return ProfileEntity
     */
    public function setAvatar($sAvatar)
    {
        $this->_sAvatar = $sAvatar;
        return $this;
    }

    /**
     * @return null
     */
    public function getSignature()
    {
        return $this->_sSignature;
    }

    /**
     * @param null $sSignature
     * @return ProfileEntity
     */
    public function setSignature($sSignature)
    {
        $this->_sSignature = $sSignature;
        return $this;
    }

    /**
     * @return null
     */
    public function getRightsLevel()
    {
        return $this->_iRightsLevel;
    }

    /**
     * @param null $iRightsLevel
     * @return ProfileEntity
     */
    public function setRightsLevel($iRightsLevel)
    {
        $this->_iRightsLevel = $iRightsLevel;
        return $this;
    }

    /**
     * @return null
     */
    public function getWebsite()
    {
        return $this->_sWebsite;
    }

    /**
     * @param null $sWebsite
     * @return ProfileEntity
     */
    public function setWebsite($sWebsite)
    {
        $this->_sWebsite = $sWebsite;
        return $this;
    }

    /**
     * @return null
     */
    public function getConnectionStatus()
    {
        return $this->_iConnectionStatus;
    }

    /**
     * @param null $iConnectionStatus
     * @return ProfileEntity
     */
    public function setConnectionStatus($iConnectionStatus)
    {
        $this->_iConnectionStatus = $iConnectionStatus;
        return $this;
    }

    /**
     * @return null
     */
    public function getBanishment()
    {
        return $this->_bBanishment;
    }

    /**
     * @param null $bBanishment
     * @return ProfileEntity
     */
    public function setBanishment($bBanishment)
    {
        $this->_bBanishment = $bBanishment;
        return $this;
    }

    /**
     * @return null
     */
    public function getBirthDate()
    {
        return $this->_sBirthDate;
    }

    /**
     * @param null $sBirthDate
     * @return ProfileEntity
     */
    public function setBirthDate($sBirthDate)
    {
        $this->_sBirthDate = $sBirthDate;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumberOfMessages()
    {
        return $this->_iNumberOfMessages;
    }

    /**
     * @param null $iNumberOfMessages
     * @return ProfileEntity
     */
    public function setNumberOfMessages($iNumberOfMessages)
    {
        $this->_iNumberOfMessages = $iNumberOfMessages;
        return $this;
    }

    /**
     * @return null
     */
    public function getSex()
    {
        return $this->_sSex;
    }

    /**
     * @param null $sSex
     * @return ProfileEntity
     */
    public function setSex($sSex)
    {
        $this->_sSex = $sSex;
        return $this;
    }



}