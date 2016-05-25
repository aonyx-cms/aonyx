<?php
include_once 'templates/' . $config->getTemplate() . '/Views/header.php';
include_once 'templates/' . $config->getTemplate() . '/Views/leftmenu.php';
?>
<div class="col-md-6" id="middle">
    <div class="panel panel-default">
        <div class="panel-heading">Modifier mon profil <?php echo $user->getUsername(); ?></div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-5">
                    <img src="<?php echo $profile->getAvatar(); ?>" class="thumbnail" border="0" width="171" height="180" alt="Image personnelle">
                </div>
                <div class="col-md-7">
                    <div class="input-group">
                        <input class="form-control" type="text" value="<?php echo $profile->getFirstName(); ?>" placeholder="Prénom" autofocus/>
                        <input class="form-control" type="text" value="<?php echo $profile->getLastName(); ?>" placeholder="Nom">
                    </div>
                    <div class="input-group">
                        Localisation :
                        <select class="form-control">
                            <option>TEST</option>
                            <option selected><?php echo $profile->getNationality(); ?></option>
                        </select>
                    </div>
                    <div class="input-group">
                        Genre : <input class="form-control" type="text" value="<?php echo $profile->getSex(); ?>" placeholder="Sexe">
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <h2>Informations complémentaires :</h2>
                <div class="input-group">
                    Template utilisé sur le site : <input class="form-control" type="text" value="<?php echo $profile->getTemplate(); ?>" placeholder="">
                </div>
                <div class="input-group">
                    Rang utilisateur : <input class="form-control" type="text" value="<?php echo $profile->getRightsLevel(); ?>" placeholder="">
                </div>
                <div class="input-group">
                    Site web perso. : <input class="form-control" type="text" value="<?php echo $profile->getWebsite(); ?>" placeholder="">
                </div>
                <div class="input-group">
                    Date de naissance : <input class="form-control" type="text" value="<?php echo $profile->getBirthDate(); ?>" placeholder="">
                </div>
                <div class="input-group">
                    Signature : <textarea id="tinymce"><?php echo $profile->getSignature(); ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'templates/' . $config->getTemplate() . '/Views/rightmenu.php';
include_once 'templates/' . $config->getTemplate() . '/Views/footer.php';
?>
