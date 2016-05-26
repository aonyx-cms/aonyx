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
    <div class="col-md-9" id="middle">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Aonyx CMS System</h3>
            </div>
            <div class="panel-body">
                <p>Bienvenue sur cette nouvelle installation de Aonyx CMS !</p>
                <p>Ceci est le module Application</p>
            </div>
        </div>
    </div>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php'; ?>
</div> <!-- /container -->
<div class="footer"><?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?></div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/javascripts_global.php'; ?>
</body>
</html>
