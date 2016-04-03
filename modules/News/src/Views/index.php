<div class="panel panel-default">
    <div class="panel-body">
        <p><a href="index.php?module=news&action=admin">Accéder à l'espace d'administration</a></p>

        <?php

        if (isset($_GET['id']))
        {
            $entity = (object) $return['news'];

            echo '<p>Par <em>', $entity->auteur, '</em>, le ', $entity->dateAjout, '</p>', "\n",
            '<h2>', $entity->titre, '</h2>', "\n",
            '<p>', nl2br($entity->contenu), '</p>', "\n";

            if ($entity->dateAjout != $entity->dateModif)
            {
                echo '<p style="text-align: right;"><small><em>Modifiée le ', $entity->dateModif, '</em></small></p>';
            }






        } else {

            echo '<h2 style="text-align:center">Liste des 5 dernières news</h2>';
            foreach($return['listNews'] as $value) {
                $entity = (object) $value;

                if (strlen($entity->contenu) <= 200)
                {
                    $contenu = $entity->contenu;
                }
                else
                {
                    $debut = substr($entity->contenu, 0, 200);
                    $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                    $contenu = $debut;
                }



                echo '<h4><a href="?module=news&id=', $entity->id, '">', $entity->titre, '</a></h4>', "\n",
                '<p>', nl2br($contenu), '</p>';
            }
        }


        ?>
    </div>
</div>


