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
    public function indexAction()
    {
        $this->setConfig('services', 'News');

        $this->setServices($this->getConfig(), array(
            'newsService',
        ));

        $oNews = $this->getServices()['newsService'];

        $this->render(
            [
                'listNews' => $oNews->getListNews(),
                'news' => $oNews->getNews(),
            ],
            'modules/News/src/Views/index.php'
        );
    }

    //@todo : Pour l'admin créer un nouveau module (ATTENTION : crée le système de droits des utilisateurs (lien avec le module Members).
//    public function adminAction()
//    {
//        $oNewsManager = new NewsRepository($this->getDatabase());
//        $aNewsList = $oNewsManager->getList();
//
//        $this->render(
//            [
//                'manager' => $oNewsManager,
//                'newsList' => $aNewsList,
//            ],
//            'modules/News/src/Views/admin.php'
//        );
//    }
}