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
            <form method="post">
                <div class="form-group">
                    <label for="pseudo">Choisir un identifiant</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Identifiant" autofocus>
                    <div id="ajax-username"></div>
                    <?php
                    if(isset($errors->username)) {
                        echo '<br /><div class="alert alert-' . $errors->username[0] . '" role="alert">' . $errors->username[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Choisir une adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <div id="ajax-email"></div>
                    <?php
                    if(isset($errors->email)) {
                        echo '<br /><div class="alert alert-' . $errors->email[0] . '" role="alert">' . $errors->email[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="password">Choisir un mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php
                    if(isset($errors->password)) {
                        echo '<br /><div class="alert alert-' . $errors->password[0] . '" role="alert">' . $errors->password[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmation password">
                    <?php
                    if(isset($errors->confirmPassword)) {
                        echo '<br /><div class="alert alert-' . $errors->confirmPassword[0] . '" role="alert">' . $errors->confirmPassword[1] . '</div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="Captcha">Merci de recopier </label>
                    <img src="/modules/Members/config/captcha.php" alt="" />
                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="">
                    <?php
                    if(isset($errors->captcha)) {
                        echo '<br /><div class="alert alert-' . $errors->captcha[0] . '" role="alert">' . $errors->captcha[1] . '</div>';
                    }
                    ?>
                </div>
                <input type="hidden" name="token" value="<?php echo $token->scalar; ?>" />
                <button type="submit" class="btn btn-default">S'inscrire</button>
            </form>
        </div>
    </div>

<script src="/modules/Members/src/Views/js/register/validation.js"></script>
</div>
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>
