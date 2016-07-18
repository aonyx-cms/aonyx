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
            <div class="panel-body">
                <?php
                echo '<h2>Liste des 5 dernières news</h2>';

                foreach($news as $value) {
                    $entity = (object)$value;

                    if (strlen($entity->contenu) <= 200) {
                        $contenu = $entity->contenu;
                    } else {
                        $debut = substr($entity->contenu, 0, 200);
                        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                        $contenu = $debut;
                    }

                    echo '<p><h4><a href="' . $config->referer() . '/news/index/show/', $entity->id, '">', $entity->titre, '</a></h4>', "\n",
                    '<p>', nl2br($contenu), '</p></p>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php'; ?>
</div> <!-- /container -->
<div class="footer"><?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?></div>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/javascripts_global.php'; ?>
</body>
</html>
