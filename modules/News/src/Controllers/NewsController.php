<?php
/**
 * @author: galicher
 * Date: 14/03/16
 * Time: 22:41
 */

namespace Modules\News\Controllers;

use Aonyx\Abstracts\AbstractController;

class NewsController extends AbstractController
{
    /**
     * Affiche la liste des news
     */
    public function indexAction()
    {
        $this->setConfig('services', 'News');

        $this->setServices($this->getConfig(), array(
            'newsService',
        ));

        $oNews = $this->getServices()['newsService'];

        $this->render(
            [
                'news' => $oNews->getListNews(),
            ],
            'modules/News/src/Views/index.php'
        );
    }

    /**
     * Afficher une news en particulier
     */
    public function showAction()
    {
        $this->setConfig('services', 'News');

        $this->setServices($this->getConfig(), array(
            'newsService',
        ));

        // Service des news
        $oNews = $this->getServices()['newsService'];

        // Si l'id existe on récupère la news
        if($oNews->getNews()) {

            $this->render(
                 [
                    'news' => $oNews->getNews(),
                 ],
                    'modules/News/src/Views/show.php'
            );
        } else {

            $this->redirect('news'); // sinon on redirect vers la liste
        }
    }

    /**
     * Editer une news
     */
    public function editAction()
    {
        // ... Concevoir les droits utilisateurs & l'admin
    }

    /**
     * Créer une news
     */
    public function createAction()
    {
        // ... Concevoir les droits utilisateurs & l'admin
    }

    /**
     * Supprimer une news
     */
    public function deleteAction()
    {
        // ... Concevoir les droits utilisateurs & l'admin
    }

}