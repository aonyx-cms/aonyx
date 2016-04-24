<?php

/**
 * @author: Damien Galicher (Inso-61)
 * Date: 24/04/16
 * Time: 18:56
 */
class install
{

    private $_aSuccess;
    private $_aErrors;

    private $_oDb;

    public function connect()
    {

        $db = new \PDO('mysql:host=' . $_POST['hostname'] . ';dbname=' . $_POST['basename'], $_POST['username'], $_POST['password']);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->_oDb = $db;
        return $db;
    }

    public function showSuccess()
    {
        return $this->_aSuccess;
    }

    public function showErrors()
    {
        return $this->_aErrors;
    }

    public function isValid()
    {
        return ($this->connect() ? $this->_aSuccess[] = ['mysql' => 'Impossible de se connecter à la base de données'] : $this->_aErrors[] = ['mysql' => 'Connexion MySQL OK !']);
        return ($this->buildDatabase() ? $this->_aSuccess[] = ['buildDatabase' => 'Schéma de base de données crée'] : $this->_aErrors[] = ['buildDatabase' => 'Requête échoué !']);

    }

    public function buildDatabase()
    {
        $bReturn = null;

        $bReturn &= ($this->_oDb->query($this->_createTableConfig()) ? $this->_aSuccess[] = ['request' => 'Création de la table \'config\' réussie !'] : false);
        $bReturn &= ($this->_oDb->query($this->_createTableUsers()) ? $this->_aSuccess[] = ['request' => 'Création de la table \'users\' réussie !'] : false);
        $bReturn &= ($this->_oDb->query($this->_createTableUsersProfile()) ? $this->_aSuccess[] = ['request' => 'Création de la table \'users_profile\' réussie !'] : false);
        $bReturn &= ($this->_oDb->query($this->_createTableNews()) ? $this->_aSuccess[] = ['request' => 'Création de la table \'news\' réussie !'] : false);

        return $bReturn;
    }

    private function _createTableConfig()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `config` (
                `nameSite` varchar(255) NOT NULL,
                `template` varchar(255) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
                INSERT INTO `config` (`nameSite`, `template`) VALUES
                (\'Aonyx\', \'base-bootstrap\');";
        return $sql;
    }

    private function _createTableNews()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `news` (
                `id` int(11) NOT NULL,
                `titre` varchar(100) NOT NULL,
                `contenu` text NOT NULL,
                `dateAjout` datetime NOT NULL,
                `dateModif` datetime NOT NULL,
                `id_user` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `news_users_id_fk` (`id_user`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                INSERT INTO `news` (`id`, `titre`, `contenu`, `dateAjout`, `dateModif`, `id_user`) VALUES
                    (3, 'News de test1', 'Voici une news de test pour permettre de faire un exemple de contenu.', '2016-03-23 00:00:00', '2016-03-26 00:00:00', 2),
                    (4, 'News de test2', 'Ma super news, voici ma seconde news, je teste le contenu.', '2016-03-13 14:34:34', '2016-03-13 14:34:39', 2),
                    (6, 'News de test3', 'Ma super news, voici ma troisieme news, je teste le contenu.', '2016-03-13 14:34:34', '2016-03-13 14:34:39', 1);";
        return $sql;

    }

    private function _createTableUsersProfile()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `users_profile` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `id_user` int(11) DEFAULT NULL,
          `template` varchar(255) DEFAULT NULL,
          `first_name` varchar(255) DEFAULT NULL,
          `last_name` varchar(255) DEFAULT NULL,
          `nationality` varchar(255) DEFAULT NULL,
          `avatar` varchar(255) DEFAULT NULL,
          `signature` text,
          `rights_level` int(11) DEFAULT NULL,
          `website` varchar(255) DEFAULT NULL,
          `connection_status` int(11) DEFAULT NULL,
          `banishment` tinyint(1) DEFAULT NULL,
          `birth_date` datetime DEFAULT NULL,
          `number_of_messages` bigint(20) DEFAULT NULL,
          `sex` varchar(255) DEFAULT NULL,
          PRIMARY KEY (`id`),
          KEY `users_profile_users_id_fk` (`id_user`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
        return $sql;

    }

    private function _createTableUsers()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `users` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(255) NOT NULL,
              `email` varchar(255) NOT NULL,
              `password` varchar(255) NOT NULL,
              `date_creation` date NOT NULL,
              `token` varchar(255) NOT NULL,
              `enabled` int(11) NOT NULL,
              `remember_token` varchar(255) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
            INSERT INTO `users` (`id`, `username`, `email`, `password`, `date_creation`, `token`, `enabled`, `remember_token`) VALUES
        (1, 'azerty', 'azerty@azerty.fr', '12IbR.gJ8wcpc', '2016-04-18', 'FJi8t24OCyABzM3nV2xVCaQh3lxs725NFKguw', 0, ''),
        (2, 'qwerty', 'qwerty@azerty.fr', '12IbR.gJ8wcpc', '2016-04-24', 'sUJR34QQOUEvoU3xk8ZACIS5hQ7AB1ogu8lO2', 0, '');";
        return $sql;
    }

    private function constraints()
    {
        $sql = "ALTER TABLE `news`
        ADD CONSTRAINT `news_users_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

        ALTER TABLE `users_profile`
        ADD CONSTRAINT `users_profile_users_id_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);";
        return $sql;
    }

}