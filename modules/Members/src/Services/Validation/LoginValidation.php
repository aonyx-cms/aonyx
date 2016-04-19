<?php
/**
 * @author: galicher
 * Date: 26/03/16
 * Time: 19:32
 */

namespace Modules\Members\Services;

use Aonyx\Abstracts\AbstractMembersValidation;

/**
 * Class LoginValidation
 * @package Modules\Members\Services
 */
class LoginValidation extends AbstractMembersValidation
{

    /**
     * @param array $aData
     * @return array
     */
    private function _setRequiredFields(array $aData)
    {
        $aReturn = [
            'email' => $aData['email'],
            'password' => $aData['password'],
        ];
        return $aReturn;
    }

    /**
     * @param array $aData
     * @return bool
     */
    public function isValid(array $aData)
    {
        if(!empty($aData)) {

            //@todo : supprimer les paramètres
            $this->requiredFields($this->_setRequiredFields($aData)); // Vérifie que tout les champs requis soit renseigné
            $this->validEmail($aData['email']); // Vérifie si le format d'email est valide
            $this->isFetchEmail(); // Si l'email existe
            $this->isFetchPasswordMatching(); // Si le password existe

            if(null == $this->getErrors()) {
                return true;
            }
        }

        // Sinon on retourne faux et on execute pas la suite
        return false;
    }

}