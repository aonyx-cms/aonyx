<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/templates/base-bootstrap/favicon.ico">

    <title><?php echo $config->getNameSite(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/templates/base-bootstrap/style/css/bootstrap.css" rel="stylesheet">
    <link href="/templates/base-bootstrap/style/css/base-bootstrap.css" rel="stylesheet">
    <script src="/vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#tinymce'
        });
    </script>
</head>

<body>
<script src="/templates/base-bootstrap/style/js/jquery.js"></script>

<?php include 'templates/base-bootstrap/Views/navbar.php'; ?>
<div class="container">