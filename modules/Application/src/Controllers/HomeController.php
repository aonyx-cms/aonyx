<?php
/**
 * @author: Damien Galicher (Inso-61)
 * Date: 17/04/16
 * Time: 18:53
 */

namespace Modules\Application\Controllers;

use Aonyx\Abstracts\AbstractController;

class HomeController extends AbstractController
{
    public function indexAction() {

        $this->render([], 'modules/Application/src/Views/index.php');
    }
}