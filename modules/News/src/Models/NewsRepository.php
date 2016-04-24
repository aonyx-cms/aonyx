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
            $news->getAuteur(),
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
        return $this->fetchAll('id, auteur, titre, contenu, dateAjout, dateModif', 'news', 'ORDER BY id DESC', $debut, $limite, 'News');
    }

    /**
     * @param $id
     */
    public function getNews($id)
    {
        return $this->fetch('id, auteur, titre, contenu, dateAjout, dateModif', 'news', 'id = (?)', array((int) $id,), 'News');
    }

    /**
     * @param NewsEntity $news
     */
    protected function updateNews(NewsEntity $news)
    {
        return $this->update('news', 'auteur = (?), titre = (?), contenu = (?), dateModif = (?)', 'id = (?)',
            array(
                $news->getAuteur(),
                $news->getTitre(),
                $news->getContenu(),
                new \DateTime(),
                $news->getId(),
            )
        );
    }

}