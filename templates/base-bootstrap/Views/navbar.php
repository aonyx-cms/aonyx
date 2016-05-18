<div class="aonyx-masthead">
    <div class="container">
        <nav class="aonyx-nav">
            <a class="aonyx-title-item" href="/"><?php echo $config->getNameSite(); ?></a>
            <a class="aonyx-nav-item" href="<?php echo $config->referer(); ?>/news">News</a>
            <?php if(!\Config\Session::read('auth')) { ?>
                <a class="aonyx-nav-item" href="<?php echo $config->referer(); ?>/members/login">Se connecter</a>
                <a class="aonyx-nav-item" href="<?php echo $config->referer(); ?>/members/register">S'enregistrer</a>
            <?php } else { ?>
                <a class="aonyx-nav-item" href="<?php echo $config->referer(); ?>/members/account">Mon compte</a>
                <a class="aonyx-nav-item" href="<?php echo $config->referer(); ?>/members/logout">Déconnexion [ <strong><?php echo \Config\Session::read('auth_username') ?></strong> ]</a>
            <?php } ?>
        </nav>
    </div>
</div>
