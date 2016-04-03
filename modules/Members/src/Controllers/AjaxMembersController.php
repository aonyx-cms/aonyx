<?php
/**
 * @author: galicher
 * Date: 24/03/16
 * Time: 22:09
 */

namespace Modules\Members\Controllers;


class AjaxMembersController
{

    public function ajaxValid()
    {
        $return = 'azerty';

        if(isset($_POST['username'])) {

            if($_POST['username'] == $return)
            {
                $response = 'error';
            }
        }

        // todo : le probleme c'est que la reponse ajax recupère le code html en entier et pas seulement le retour json
        echo json_encode(array('flashe' => $response));
    }
}
