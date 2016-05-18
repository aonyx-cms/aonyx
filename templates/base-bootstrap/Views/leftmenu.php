<div class="col-md-3">

    <!-- Block Espace membre -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Espace Membre</h3>
        </div>
        <div class="panel-body">
            <?php if (!isset($_SESSION['auth'])) { ?>
                <form method="post" action="<?php echo $config->referer(); ?>/members/login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adresse email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Adresse email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Se souvenir de moi
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Connexion</button>
                </form>
                <ul>
                    <li><a href="<?php echo $config->referer(); ?>/members/register">S'enregistrer</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/login">Se connecter</a></li>
                </ul>
            <?php } else { ?>
                Bonjour <?php echo $_SESSION['auth']; ?>
                <ul>
                    <li><a href="<?php echo $config->referer(); ?>/members/profile/show/<?php echo $_SESSION['auth_id']; ?>">Profil</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/memberlist">Liste des membres</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/messages">Messages</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/friends">Ami(e)s</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/account">Espace membre</a></li>
                    <li><a href="<?php echo $config->referer(); ?>/members/logout">Se déconnecter</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>

    <!-- Block Statistiques -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Statistiques</h3>
        </div>
        <div class="panel-body">
            Ici se trouverons les stats de fréquentation (utilisateurs connectés et visiteurs).
        </div>
    </div>
</div>