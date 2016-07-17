<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/meta.php'; ?>
    <link rel="icon" href="/templates/base-bootstrap/favicon.ico">
    <title><?php echo $config->getNameSite(); ?></title>
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/css_global.php'; ?>
    <script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
</head>
<body>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/header.php'; ?>
<div class="container">
    <?php include_once 'templates/' . $config->getTemplate() . '/Views/leftmenu.php'; ?>
    <div class="col-md-9" id="middle">
        <div class="panel panel-default">
            <div class="panel-heading">Liste des membres</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Avatar</th>
                            <th>Nom d'utilisateur</th>
                            <th>E-mail</th>
                            <th>Rang/Groupe</th>
                            <th>Date d'inscription</th>
                            <th>Dernière connexion</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($users as $user) { ?>
                        <tr>
                            <td><img src="<?php echo $user['avatar']; ?>" border="0" alt="Avatar" width="25" height="25" /></td>
                            <td><a href="<?php echo $config->referer(); ?>/members/profile/show/<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['rights_level']; ?></td>
                            <td><?php echo $user['date_creation']; ?></td>
                            <td><?php ?></td>
                            <td><?php ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /container -->
<div class="footer"><?php include_once 'templates/' . $config->getTemplate() . '/Views/footer.php'; ?></div>
<?php include_once 'templates/' . $config->getTemplate() . '/Views/javascripts_global.php'; ?>
</body>
</html>

