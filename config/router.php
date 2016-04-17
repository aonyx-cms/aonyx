<?php
/**
 * @author: galicher
 * Date: 17/03/16
 * Time: 21:43
 */

namespace Config;

/**
 * Class Router
 * @package Config
 */
class Router
{
    private $_aRouting = array();

    /**
     * Routing constructor.
     * @param $sTemplate
     * @param array $aRouting
     */
    public function __construct($sTemplate, array $aRouting)
    {
        $this->_aRouting = $aRouting;
    }

    /**
     * Temporise le résultat
     * Vérifie que les clés soient bien renseignés dans le fichier de routing
     * afin d'effectuer un include du module en toute sécurité sinon on renvoie
     * un 404 avec une redirection vers la racine du site
     * @return string
     */
    public function body() {

        ob_start();
        if(isset($_GET['module'])) {

            // Vérifie l'existence de la clé dans le routing
            // si ça matche pas on renvoie une erreur 404 et on redirige
            if(!array_key_exists(ucfirst($_GET['module']),$this->_aRouting)) {

                header("HTTP/1.0 404 Not Found");
                header( "refresh:5;url=/" );
                echo '<strong>404 :</strong> No route module match found. <br />You\'ll be redirected in about 5 secs. If not, click <a href="index.php">here</a>.';
            }

            // vérification de l'existence des modules
            if(file_exists('modules/' . ucfirst($_GET['module']) . '/' . ucfirst($_GET['module']) . '.php'))
            {
                // Appelle le fichier du module qui va appeller les actions à faire par leurs controller
                include_once 'modules/' . ucfirst($_GET['module']) . '/' . ucfirst($_GET['module']) . '.php';
            }
        } else {
            // Appelle le controller par default de démarrage
            include_once 'modules/Application/Application.php';
        }

        $content = ob_get_clean();
        return $content;
    }
}
