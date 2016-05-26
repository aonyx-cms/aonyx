<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/meta.php'; ?>
    <link rel="icon" href="/templates/base-bootstrap/favicon.ico">
    <title><?php echo $config->getNameSite(); ?></title>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/css_global.php'; ?>
    <script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
<div class="container">
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/leftmenu.php'; ?>
    <div class="col-md-6" id="middle">
        <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Se connecter</h3>
        </div>
        <div class="panel-body">
            <form method="post">
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" autofocus>
                    <?php
                    if(isset($errors->email)) {
                        echo '<br /><div class="alert alert-' . $errors->email[0] . '" role="alert">' . $errors->email[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <?php
                    if(isset($errors->password)) {
                        echo '<br /><div class="alert alert-' . $errors->password[0] . '" role="alert">' . $errors->password[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox"> Se souvenir de moi ?
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Me connecter</button>
            </form>
        </div>
        </div>
    </div>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php'; ?>
</div> <!-- /container -->
<div class="footer"><?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?></div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/javascripts_global.php'; ?>
</body>
</html>

