<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $this->getConfig()->getNameSite(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="public/default/style/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<script src="public/default/style/js/jquery.js"></script>

<div class="container">

<?php include 'public/default/navbar.php'; ?>

<div class="col-md-3">

    <!-- Block Espace membre -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Espace Membre</h3>
        </div>
        <div class="panel-body">
            <?php if (!isset($_SESSION['email'])) { ?>
            <form method="post" action="index.php?module=members&action=login">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Adresse email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Se souvenir de moi
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Connexion</button>
            </form>
            <ul>
                <li><a href="index.php?module=members&action=register">S'enregistrer</a></li>
                <li><a href="index.php?module=members&action=login">Se connecter</a></li>
            </ul>
            <?php } else { ?>
            Bonjour <?php echo $_SESSION['email']; ?>
                <ul>
                    <li><a href="index.php?module=members&action=account">Espace membre</a></li>
                    <li><a href="index.php?module=members&action=logout">Se déconnecter</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>

    <!-- Block Statistiques -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Statistiques</h3>
        </div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
</div>
<div class="col-md-6">