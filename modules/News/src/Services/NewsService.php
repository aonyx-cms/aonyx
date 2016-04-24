<?php
/**
 * @author: Damien Galicher (Inso-61)
 * Date: 23/04/16
 * Time: 23:51
 */

namespace Modules\News\Services;


use Modules\News\Models\NewsRepository;

class NewsService
{

    private $_oNewsRepository = null;

    /**
     * Initialise le repo. News
     * NewsService constructor.
     */
    public function __construct()
    {
        $this->_oNewsRepository = new NewsRepository();
    }

    /**
     * Récupère la liste des news
     * @return array
     */
    public function getListNews()
    {
        return $this->_oNewsRepository->getListNews(0, 5);
    }

    public function getNews()
    {
        return $this->_oNewsRepository->getNewsById((int) (isset($_GET['id']) ? $_GET['id'] : null));
    }


}