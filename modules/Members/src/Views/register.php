<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">S'enregistrer</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="index.php?module=members&action=register">
            <div class="form-group">
                <label for="pseudo">Choisir un identifiant</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant" autofocus>
                <div id="ajax-username"></div>
                <?php
                if(isset($return['errors']['username'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['username'][0] . '" role="alert">' . $return['errors']['username'][1] . '</div>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="email">Choisir une adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <div id="ajax-email"></div>
                <?php
                if(isset($return['errors']['email'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['email'][0] . '" role="alert">' . $return['errors']['email'][1] . '</div>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="password">Choisir un mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?php
                if(isset($return['errors']['password'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['password'][0] . '" role="alert">' . $return['errors']['password'][1] . '</div>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirmer le mot de passe</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmation password">
                <?php
                if(isset($return['errors']['confirmPassword'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['confirmPassword'][0] . '" role="alert">' . $return['errors']['confirmPassword'][1] . '</div>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="Captcha">Merci de recopier </label>
                <img src="modules/Members/config/captcha.php" alt="" />
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="">
                <?php
                if(isset($return['errors']['captcha'])) {
                    echo '<br /><div class="alert alert-' . $return['errors']['captcha'][0] . '" role="alert">' . $return['errors']['captcha'][1] . '</div>';
                }
                ?>
            </div>
            <input type="hidden" name="token" value="<?php echo $return['token']; ?>" />
            <button type="submit" class="btn btn-default">S'inscrire</button>
        </form>
    </div>
</div>

<script src="modules/Members/src/Views/js/register/validation.js"></script>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?>
