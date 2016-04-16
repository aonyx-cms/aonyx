<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">Espace membre</h3>
    </div>
    <div class="panel-body">
        Bonjour <strong><?php echo $_SESSION['auth']; ?></strong> !
    </div>
</div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?>
