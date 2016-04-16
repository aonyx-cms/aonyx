<!-- Static navbar -->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php echo $config->getNameSite(); ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Accueil</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?module=news">News</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace membres <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?module=members&action=login">Se connecter</a></li>
                        <li><a href="index.php?module=members&action=register">S'enregistrer</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Votre espace</li>
                        <li><a href="index.php?module=members">Accueil</a></li>
                        <li><a href="index.php?module=members&action=profile">Profil</a></li>
                        <li><a href="#">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>