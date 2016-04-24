<?php
include_once 'templates/' . $config->getTemplate() . '/Views/header.php';
include_once 'templates/' . $config->getTemplate() . '/Views/leftmenu.php';
?>
<div class="col-md-6" id="middle">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">S'enregistrer</h3>
        </div>
        <div class="panel-body">
        Merci ! Votre compte à bien été enregistré !<br />
        Un mail de confirmation a été envoyé à l'adresse indiqué <strong><?php echo $email->scalar ?></strong> afin de valider votre compte !
        </div>
    </div>
</div>
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>
