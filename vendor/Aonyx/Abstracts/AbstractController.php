<?php
namespace Aonyx\Abstracts;

use Aonyx\Classes\DbManager;
use Aonyx\Interfaces\InterfaceController;
use Config\Database;

/**
 * @author: galicher
 * Date: 17/03/16
 * Time: 19:00
 */

abstract class AbstractController implements InterfaceController
{
    //@todo : constant pour les réponses

    protected $_oService;
    protected $_oServiceConfig;
    protected $_oConfig;
    protected $_oManager;
    protected $_oValidation;

    //@todo : commenter les méthodes

    public function getDatabase()
    {
        // Retourne l'objet PDO
        return Database::connect();
    }

    public function redirect($module, $action = null)
    {
        if(null == $module) {
            throw new \Exception('Redirect Error : no module specified !');
        }

        if (null != $action) {

            header('location:index.php?module=' . $module . '&action=' . $action);
        } else {

            header('location:index.php?module=' . $module);
        }
    }

    public function render(array $return = [], $path)
    {
        // Transmission des variables à la vue
        foreach($return as $variableOut => $variableIn) {
            ${$variableOut} = $variableIn;
        }

        // Rend la vue
        if(file_exists($path)) {
            include_once $path;
        } else {
            throw new \Exception('Render Error : ' . $path . ' n\'existe pas !');
        }
    }

    public function setServiceConfig(array $options)
    {
        foreach($options as $className => $methodAction) {

            // Parcours le dossier pour trouver le service recherché
            include 'services/' . $className . '.php';
            // Instancie le nouvel objet
            $className = new $className;

            if(null != $methodAction) {
                $className->$methodAction();
            }
            // Retourne l'objet
            $this->_oServiceConfig = $className;
            return $this;
        }
    }

    public function setService(array $service, $select)
    {
        //todo: controlles
            // Parcours le dossier pour trouver le service recherché
            include_once 'modules/' . $service[$select]['module'] . '/src/Services/' . $service[$select]['class'] . '.php';
            // Instancie le nouvel objet
            $className = new $service[$select]['namespace'];

            $this->_oService = $className;
            return $this;
    }

    public function setValidation(array $service, $select)
    {
        //todo: controlles
        // Parcours le dossier pour trouver le service de validation recherché
        include_once 'modules/' . $service[$select]['module'] . '/src/Services/Validation/' . $service[$select]['class'] . '.php';
        // Instancie le nouvel objet
        $className = new $service[$select]['namespace'];

        $this->_oValidation = $className;
        return $this;
    }

    public function setConfig($config, $module = null)
    {
        // si le module n'est pas égal à rien
        if(null != $module) {

            // vérifie si le fichier existe bel et bien
            if(!file_exists('modules/' . $module . '/config/' . $config . '.config.php')) {
                die('Erreur de config : modules/' . $module . '/config/' . $config . '.config.php introuvable !');
            }
            // si ca passe on inclus le fichier de config
            include_once 'modules/' . $module . '/config/' . $config . '.config.php';
            $this->_oConfig = $config;
            return $this;
        } else {

            // vérifie si le fichier existe bel et bien
            if(!file_exists('config/' . $config . '.config.php')) {
                die('Erreur de config : config/' . $config . '.config.php introuvable !');
            }
            // si ca passe on inclus le fichier de config
            include_once 'config/' . $config . '.config.php';
            $this->_oConfig = $config;
            return $this;
        }

    }

    public function getService()
    {
        return $this->_oService;
    }

    public function getValidation()
    {
        return $this->_oValidation;
    }

    public function getServiceConfig()
    {
        return $this->_oServiceConfig;
    }

    public function getConfig()
    {
        return $this->_oConfig;
    }

    public function getServiceManager()
    {
        return new DbManager();
    }

}
