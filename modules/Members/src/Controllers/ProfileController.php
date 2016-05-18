<?php
/**
 * Created by PhpStorm.
 * User: galicher
 * Date: 17/05/16
 * Time: 11:33
 */

namespace Modules\Members\Controllers;


use Aonyx\Abstracts\AbstractController;

class ProfileController extends AbstractController
{

    public function indexAction() {

        $this->render([], 'modules/Members/src/Views/profile/index.php');
    }
    
    public function editAction() {
        
        echo 'test';
    }
    
    public function showAction() {
    
        echo 'test';
    }
    
}