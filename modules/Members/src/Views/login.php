<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
    <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Se connecter</h3>
    </div>
    <div class="panel-body">
        <form method="post">
            <div class="form-group">
                <label for="email">Adresse Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" autofocus>
                <?php
                if(isset($return['errors']['email'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['email'][0] . '" role="alert">' . $return['errors']['email'][1] . '</div>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <?php
                if(isset($return['errors']['password'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['password'][0] . '" role="alert">' . $return['errors']['password'][1] . '</div>';
                }
                ?>
            </div>
            <div class="checkbox">
                <label>
                    <input name="remember" type="checkbox"> Se souvenir de moi ?
                </label>
            </div>
            <button type="submit" class="btn btn-default">Me connecter</button>
        </form>
    </div>
</div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?>
