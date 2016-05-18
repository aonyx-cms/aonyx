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
            <div class="col-sm-12">
                <div class="col-sm-4"><a href="<?php echo $config->referer(); ?>/members/profile/edit/<?php echo $_SESSION['auth_id']; ?>">Modifier mon profil</a></div>
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
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>
