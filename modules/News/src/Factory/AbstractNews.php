<?php
namespace Modules\News\Factory;

use Modules\News\Models\NewsEntity;

/**
 * @author: galicher
 * Date: 13/03/16
 * Time: 13:34
 */
//todo : nommer autrement , peut reservir pour autre chose, article ou livre d'or par ex.
abstract class AbstractNews
{
    /**
     * Methode permettant d'ajouter une news
     * @param News $news
     * @return mixed
     */
    abstract protected function add(NewsEntity $news);

    /**
     * Méthode renvoyant le nombre de news total
     * @return int
     */
    abstract public function count();

    /**
     * Methode permettant de delete une news
     * @param $id
     * @return int
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de news
     * @param int $debut La première news a selectionner
     * @param int $limite Le nombre de news a selectionner
     * @return array La liste des news. Chaque entrées est une instance de News.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant une news précise.
     * @param $id int
     * @return News
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant d'enregistrer une news.
     * @param News $news
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(NewsEntity $news) {
        //todo : validator
        if ($news->isValid())
        {
            $news->isNew() ? $this->add($news) : $this->update($news);
        } else {
            throw new \RuntimeException('La news doit être valide pour être enregistrée');
        }
    }

    /**
     * Méthode permettant de modifier une news.
     * @param News $news
     * @return void
     */
    abstract protected function update(NewsEntity $news);

}