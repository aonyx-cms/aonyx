<?php
include_once 'install.php';

if (isset($_GET['install'])) {

    if (isset($_POST['hostname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['basename'])) {

        $install = new install();

            if($install->isValid()) {

                if($install->connect()) {
                    $install->buildDatabase();
                    $install->showSuccess();
                }

            } else {

                $install->showErrors();
            }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aonyx installation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <form method="post" action="index.php?install">
            <h1>Aonyx installation</h1>
            <h2>Configuration de MySQL</h2>
            <div class="input-group">
                <label>Serveur (par défaut : localhost) :</label>
                <input type="text" name="hostname" value="localhost" autocomplete="off">
            </div>
            <div class="input-group">
                <label>Nom de l'utilisateur de la base de données :</label>
                <input type="text" name="username" placeholder="nom d'utilisateur de la base de données" autocomplete="off" autofocus>
            </div>
            <div class="input-group">
                <label>Nom de la base de données (sera crée si elle existe pas) :</label>
                <input type="text" name="basename" placeholder="nom de la base de données" autocomplete="off">
            </div>
            <div class="input-group">
                <label>Mot de passe :</label>
                <input type="password" name="password" autocomplete="off">
            </div>
            <div class="input-group">
                <input type="reset" class="btn btn-default" value="Annuler"><input type="submit" class="btn btn-primary" value="Valider">
            </div>
        </form>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>