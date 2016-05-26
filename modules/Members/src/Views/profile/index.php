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
            <div class="panel-heading">Profil de <?php echo $user->getUsername(); ?></div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-5">
                            <img src="<?php echo $profile->getAvatar(); ?>" class="thumbnail" border="0" width="171" height="180" alt="Image personnelle">
                    </div>
                    <div class="col-md-7">
                        <h3><?php echo $profile->getFirstName(); ?> <?php echo $profile->getLastName(); ?></h3>
                        <p><strong>Localisation :</strong> <?php echo $profile->getNationality(); ?></p>
                        <p><strong>Genre :</strong> <?php echo $profile->getSex(); ?></p>
                        <p><strong>En ligne :</strong> <?php echo $profile->getConnectionStatus(); ?></p>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h2>Informations complémentaires :</h2>
                    <p><strong>Template utilisé sur le site :</strong> <?php echo $profile->getTemplate(); ?></p>
                    <p><strong>Rang utilisateur :</strong> <?php echo $profile->getRightsLevel(); ?></p>
                    <p><strong>Site web perso. :</strong> <?php echo $profile->getWebsite(); ?></p>
                    <p><strong>Date de naissance :</strong> <?php echo $profile->getBirthDate(); ?></p>
                    <p><strong>Nombre de messages postés sur le site :</strong> <?php echo $profile->getNumberOfMessages(); ?></p>
                    <p><div class="well well-sm"><?php echo $profile->getSignature(); ?></div></p>
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

