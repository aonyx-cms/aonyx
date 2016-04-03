<?php
namespace Aonyx\Interfaces;
use Aonyx\Abstracts\AbstractManager;

/**
 * @author: galicher
 * Date: 17/03/16
 * Time: 19:03
 */

interface InterfaceController
{
    // Retourne les valeurs sur la vue qui est appellé
    public function render(array $return = [], $path);

    // Récupere les services qui effectue des actions pour les controllers
    public function getService();

    // Récupere les services globals
    public function getServiceConfig();

    // Recupère les fichiers de configuration
    public function getConfig();

    public function setService(array $service, $select);

    public function setServiceConfig(array $options);

    public function setConfig($config, $module);

}