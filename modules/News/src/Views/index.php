<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
<div class="col-md-12" id="middle">
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

                echo '<p><h4><a href="' . $config->referer() . '/news/show/', $entity->id, '">', $entity->titre, '</a></h4>', "\n",
                '<p>', nl2br($contenu), '</p></p>';
            }
            ?>
        </div>
    </div>
</div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?>