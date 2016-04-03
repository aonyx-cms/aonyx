<?php
namespace Modules\News\Models;
/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 13:47
 */
use Modules\News\Factory\AbstractNews;

class NewsRepository extends AbstractNews
{
    /**
     * Attribut contenant l'instance représentant la BDD.
     * @type PDO
     */
    protected $db;

    /**
     * Constructeur étant chargé d'enregistrer l'instance de PDO dans l'attribut $db.
     * NewsRepository constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @param NewsEntity $news
     * @return null
     */
    protected function add(NewsEntity $news)
    {
        $requete = $this->db->prepare('INSERT INTO news VALUES(:id, :auteur, :titre, :contenu, NOW(), NOW())');

        $requete->bindValue(':id', null);
        $requete->bindValue(':titre', $news->getTitre());
        $requete->bindValue(':auteur', $news->getAuteur());
        $requete->bindValue(':contenu', $news->getContenu());

        $requete->execute();
    }

    /**
     * @see NewsManager::count()
     */
    public function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    /**
     * @see NewsManager::delete()
     */
    public function delete($id)
    {
        $this->db->exec('DELETE FROM news WHERE id = '.(int) $id);
    }

    /**
     * @param int $debut
     * @param int $limite
     * @return array
     */
    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news ORDER BY id DESC';

        // On vérifie l'intégrité des paramètres fournis.
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->db->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'News');

        return $requete->fetchAll();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getUnique($id)
    {
        $requete = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'News');

        return $requete->fetch();
    }

    /**
     * @param NewsEntity $news
     */
    protected function update(NewsEntity $news)
    {
        $requete = $this->db->prepare('UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');

        $entity = new NewsEntity();

        $requete->bindValue(':titre', $entity->getTitre());
        $requete->bindValue(':auteur', $entity->getAuteur());
        $requete->bindValue(':contenu', $entity->getContenu());
        $requete->bindValue(':id', $entity->getId(), \PDO::PARAM_INT);

        $requete->execute();
    }

}