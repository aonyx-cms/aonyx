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
                    echo '<p><a href="' . $config->referer() . '/news">Retour à la liste des news</a></p><p>Par <em>' . $news->username . '</em>, le ' . $news->dateAjout . '</p>', "\n",
                    '<h2>' . $news->titre . '</h2>', "\n",
                    '<p>' . nl2br($news->contenu) . '</p>', "\n";

                    if ($news->dateAjout != $news->dateModif)
                    {
                        echo '<p style="text-align: right;"><small><em>Modifiée le ' . $news->dateModif . '</em></small></p>';
                    }
                ?>
            </div>
        </div>
    </div>
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>