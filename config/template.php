<?php
/**
 * @author: galicher
 * Date: 17/03/16
 * Time: 21:43
 */

namespace Config;


class Template
{

    private $template;
    private $routing = array();
    private $config;

    /**
     * template constructor.
     * @param $template
     */
    public function __construct($template, array $routing, $config)
    {

        $this->setTemplate($template);
        $this->setRouting($routing);
        $this->setConfig($config);
    }

    /**
     *
     */
    public function body() {
        ob_start();
        include_once 'public/' . $this->getTemplate() . '/header/index.php';
        include_once 'public/' . $this->getTemplate() . '/top.php';

        /**
         * Appel des pages
         */

        if(isset($_GET['module'])) {

            // vérification de l'existence de la route
            $this->getRouting($_GET['module']);

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


        include_once 'public/' . $this->getTemplate() . '/bottom.php';
        include_once 'public/' . $this->getTemplate() . '/footer/index.php';
        $content = ob_get_clean();
        echo $content;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRouting($get)
    {
        if(!isset($this->routing[ucfirst($get)])) {
            // todo : classe d'erreur Aonyx
            die('No matching route for '. $get);
        } else {
            return $this->routing[ucfirst($get)];
        }
    }

    /**
     * @param mixed $routing
     * @return Template
     */
    public function setRouting($routing)
    {
        $this->routing = $routing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     * @return Template
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
}
