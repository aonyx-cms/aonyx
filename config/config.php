<?php
namespace Config;
use Aonyx\Classes\Errors;

/**
 * @author: galicher
 * Date: 17/03/16
 * Time: 21:23
 */
class Config
{

    private $sNameSite;
    private $sTemplate;

    /**
     *
     */
    public function fetchConfigSite()
    {
        $db = Database::connect();

        $sql = 'SELECT * FROM config';

        $requete = $db->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Site');

        $array = $requete->fetchAll();

        $this->hydrate($array[0]);
    }

    /**
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $attribut => $valeur)
        {
            $methode = 'set' . ucfirst($attribut);

            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Config constructor.
     * @param array $valeurs
     */
    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->hydrate($valeurs);
        }

        if (!file_exists('vendor/aonyx-cms/aonyx-core/Classes/Application.php')) {

            echo 'Les dépendances de Aonyx ne sont pas installés.<br /> Installez <a href="https://getcomposer.org/" target="_blank">composer</a> et effectuez un <strong>php composer.phar install</strong>';
            exit;
        }
        // Include classes
        include_once 'vendor/aonyx-cms/aonyx-core/Classes/Errors.php';

    }

    /**
     * @return mixed
     */
    public function getNameSite()
    {
        return $this->sNameSite;
    }

    /**
     * @param mixed $sNameSite
     * @return Config
     */
    public function setNameSite($sNameSite)
    {
        $this->sNameSite = $sNameSite;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->sTemplate;
    }

    /**
     * @param mixed $sTemplate
     * @return Config
     */
    public function setTemplate($sTemplate)
    {
        $this->sTemplate = $sTemplate;
        return $this;
    }

    public function referer()
    {
        //@todo : definir le protocol par défaut
        return 'http://' . $_SERVER['HTTP_HOST'];
    }

}