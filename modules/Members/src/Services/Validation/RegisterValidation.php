<?php
/**
 * @author: galicher
 * Date: 21/03/16
 * Time: 22:51
 */

namespace Modules\Members\Services;


use Aonyx\Abstracts\AbstractRegisterValidation;

/**
 * Class RegisterService
 * @package Modules\Members\Services
 */
class RegisterValidation extends AbstractRegisterValidation
{
    /**
     * Fonction de validation qui vérifie que tout soit ok pour passer le form
     * @param $aPost
     * @return bool
     */
    public function isValid($aPost)
    {

        if($aPost) {

            // On défini les champs obligatoire
            $aRequiredField = [
                'username' => $aPost['username'],
                'email' => $aPost['email'],
                'password' => $aPost['password'],
                'confirmPassword' => $aPost['confirmPassword'],
                'captcha' => $aPost['captcha'],
                'token' => $aPost['token']
            ];

            $this->requiredFields($aRequiredField); // Vérifie que tout les champs requis soit renseigné
            $this->validUsername($aPost['username']); // Vérifie si le username est valide
            $this->isAlpha($aPost['username']); // Vérifie si c'est bien alphanumérique
            //$this->isUniq($aPost['username']); // Vérifie si il existe pas déjà
            $this->validEmail($aPost['email']); // Vérifie si le format d'email est valide
            //$this->isUniq($aPost['email']); // Vérifie si l'email existe pas déjà
            $this->passwordMatching(md5($aPost['password']), md5($aPost['confirmPassword'])); // Vérifie si les champs password et passwordConfirm matches
            $this->captcha($aPost['captcha']); // Vérifie si le captcha correspond bien à celui généré en session

            // Si il n'y a pas d'erreur et que tout va bien on retourne vrai pour passer à la suite
            if(null == $this->getErrors()) {
                return true;
            }
        }

        // Sinon on retourne faux et on execute pas la suite
        return false;
    }

    /**
     * Crée un token pour la validation de l'inscription
     * @return string
     */
    public function getToken()
    {
        $length = 37;
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";

        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

}