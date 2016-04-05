<?php
/**
 * @author: galicher
 * Date: 21/03/16
 * Time: 22:51
 */

namespace Modules\Members\Services;

use Aonyx\Abstracts\AbstractMembersValidation;
use Aonyx\Classes\Application;

/**
 * Class RegisterService
 * @package Modules\Members\Services
 */
class RegisterValidation extends AbstractMembersValidation
{
    private $_oApp;

    /**
     * Set les champs requis
     * @param array $aData
     * @return array
     */
    private function _setRequiredFields(array $aData)
    {
        $aReturn = [
            'username' => $aData['username'],
            'email' => $aData['email'],
            'password' => $aData['password'],
            'confirmPassword' => $aData['confirmPassword'],
            'captcha' => $aData['captcha'],
            'token' => $aData['token']
        ];
        return $aReturn;
    }

    /**
     * Récupère un token pour la validation de l'inscription
     * @return $this
     */
    public function getToken()
    {
        $this->_oApp = new Application();
        return $this->_oApp->generateToken(37);
    }

    /**
     * Fonction de validation qui vérifie que tout soit ok pour passer le form
     * @param $aData
     * @return bool
     */
    public function isValid(array $aData)
    {

        if(!empty($aData)) {

            $this->requiredFields($this->_setRequiredFields($aData)); // Vérifie que tout les champs requis soit renseigné
            $this->validUsername($aData['username']); // Vérifie si le username est valide
            $this->isAlpha($aData['username']); // Vérifie si c'est bien alphanumérique
            //$this->isUniq($aData['username']); // Vérifie si il existe pas déjà
            $this->validEmail($aData['email']); // Vérifie si le format d'email est valide
            //$this->isUniq($aData['email']); // Vérifie si l'email existe pas déjà
            $this->passwordMatching(md5($aData['password']), md5($aData['confirmPassword'])); // Vérifie si les champs password et passwordConfirm matches
            $this->captcha($aData['captcha']); // Vérifie si le captcha correspond bien à celui généré en session

            // Si il n'y a pas d'erreur et que tout va bien on retourne vrai pour passer à la suite
            if(null == $this->getErrors()) {
                return true;
            }
        }

        // Sinon on retourne faux et on execute pas la suite
        return false;
    }


}