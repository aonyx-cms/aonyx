<?php
namespace Modules\News\Models;
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 13:47
 */
use Aonyx\Classes\DbManager;
use Config\Database;

/**
 * Class NewsRepository
 * @package Modules\News\Models
 */
class NewsRepository extends DbManager
{

    private $_oDb = null;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->_oDb = Database::connect();
        $this->setDb($this->_oDb);
    }

    /**
     * @param NewsEntity $news
     */
    protected function addNews(NewsEntity $news)
    {
        return $this->insert("news", "'', (?), (?), (?), NOW(), NOW()", array(
            null,
            $news->getUser(),
            $news->getTitre(),
            $news->getContenu(),
        ));
    }

    /**
     *
     */
    public function countNews()
    {
        return $this->count('COUNT(*)', 'news');
    }

    /**
     * @param $id
     */
    public function deleteNews($id)
    {
        return $this->delete('news', (int) $id);
    }

    /**
     * @param int $debut
     * @param int $limite
     */
    public function getListNews($debut = -1, $limite = -1)
    {
        return $this->fetchAll('id, id_user, titre, contenu, dateAjout, dateModif', 'news', 'ORDER BY id DESC', $debut, $limite, 'News');
    }

    /**
     * @param $id_news
     * @return mixed
     */
    public function getNewsByAuthor($id_news)
    {
        // exemple de jointure pour la news 4 :
        // SELECT * FROM users LEFT JOIN news ON news.id_user = users.id WHERE news.id = 4

        return $this->leftJoin('*', 'users LEFT JOIN news', 'news.id_user = users.id', 'news.id = (?)',
            array(
                $id_news
            ),
        'News');
    }

    /**
     * @param NewsEntity $news
     */
    protected function updateNews(NewsEntity $news)
    {
        return $this->update('news', 'id_user = (?), titre = (?), contenu = (?), dateModif = (?)', 'id = (?)',
            array(
                $news->getUser(),
                $news->getTitre(),
                $news->getContenu(),
                new \DateTime(),
                $news->getId(),
            )
        );
    }

}
