<?php
namespace Modules\News\Models;
/**
 * Class News
 *
 * classe représentant une news
 * @author : galicher
 */
class NewsEntity
{

    protected $erreurs = [];
    protected $id;
    protected $auteur;
    protected $titre;
    protected $contenu;
    protected $dateAjout;
    protected $dateModif;


    /**
     * Constantes relatives aux erreurs
     */

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;

    /**
     * Constructeur avec hydratation des donnees en paramètres
     * @param array $valeurs
     */

    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->hydrate($valeurs);
        }
    }

    /**
     * Méthode d'hydratation auto
     * @param $donnees
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
     * Methode pour savoir si la news est nouvelle
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    public function isValid()
    {
        $return = true;

        if('' == $this->getAuteur() || '' == $this->getTitre() || '' == $this->getContenu()) {
            $return = false;
        }

        return $return;
    }

    /**
     * @return array
     */
    public function getErreurs()
    {
        return $this->erreurs;
    }

    /**
     * @param array $erreurs
     * @return News
     */
    public function setErreurs($erreurs)
    {
        $this->erreurs = $erreurs;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return News
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     * @return News
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return News
     */
    public function setTitre($titre)
    {
        $titre = (string) $titre;

        if ('' == $titre) {
            $this->erreurs[] = self::CONTENU_INVALIDE;
        } else {
            $this->titre = $titre;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     * @return News
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }

    /**
     * @param DateTime $dateModif
     * @return $this
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param DateTime $dateAjout
     * @return $this
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
        return $this;
    }
}