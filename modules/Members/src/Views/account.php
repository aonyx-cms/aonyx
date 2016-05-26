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
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Espace membre</h3>
            </div>
            <div class="panel-body">
                Bonjour <strong><?php echo \Config\Session::read('auth_username'); ?></strong> !
                <div class="col-sm-12">
                    <div class="col-sm-4"><a href="<?php echo $config->referer(); ?>/members/profile/edit/<?php echo \Config\Session::read('auth_id'); ?>">Modifier mon profil</a></div>
                    <div class="col-sm-4"><a href="<?php echo $config->referer(); ?>/members/messages">Messagerie interne</a></div>
                    <div class="col-sm-4"><a href="<?php echo $config->referer(); ?>/members/friends">Ma liste d'ami(e)s</a></div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"><a href="<?php echo $config->referer(); ?>/members/logout">Déconnexion</a></div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php'; ?>
</div> <!-- /container -->
<div class="footer"><?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?></div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/javascripts_global.php'; ?>
</body>
</html>
