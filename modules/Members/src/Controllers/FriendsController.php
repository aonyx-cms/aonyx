<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 17/05/16
 * Time: 11:32
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;

class FriendsController extends AbstractController
{

    public function indexAction() {

        $this->render([], 'modules/Members/src/Views/friends/index.php');
    }
}