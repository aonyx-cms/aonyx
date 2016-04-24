<?php
include_once 'templates/' . $config->getTemplate() . '/Views/header.php';
include_once 'templates/' . $config->getTemplate() . '/Views/leftmenu.php';
?>
<div class="col-md-6" id="middle">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Espace membre</h3>
        </div>
        <div class="panel-body">
            Bonjour <strong><?php echo $_SESSION['auth']; ?></strong> !
        </div>
    </div>
</div>
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>
