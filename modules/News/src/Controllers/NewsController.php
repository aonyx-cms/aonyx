<?php
/**
 * @author: galicher
 * Date: 14/03/16
 * Time: 22:41
 */

namespace Modules\News\Controllers;

use Aonyx\Abstracts\AbstractController;
use Modules\News\Models\NewsRepository;

class NewsController extends AbstractController
{
    public function indexAction()
    {
        //todo : pas de repo dans le controller, faire un service
        $oNewsManager = new NewsRepository($this->getDatabase());

        $listNews = $oNewsManager->getList(0, 5);
        $news = $oNewsManager->getUnique((int) (isset($_GET['id']) ? $_GET['id'] : null));

        $this->render(
            [
                'listNews' => $listNews,
                'news' => $news
            ],
            'modules/News/src/Views/index.php'
        );
    }

    public function adminAction()
    {
        //todo : pas de repo dans le controller, faire un service
        $oNewsManager = new NewsRepository($this->getDatabase());
        $aNewsList = $oNewsManager->getList();

        $this->render(
            [
                'manager' => $oNewsManager,
                'newsList' => $aNewsList,
            ],
            'modules/News/src/Views/admin.php'
        );
    }
}