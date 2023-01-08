<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->siteTitle(); ?></title>

    <?= $this->content('head'); ?>

<!--    <link rel='stylesheet' href="--><?//= PROOT ?><!--css/custom.css?v=--><?php //echo time(); ?><!--" media="all" type="text/css">-->
    <link rel='stylesheet' href="<?= PROOT ?>css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">

    <script src="<?= PROOT ?>js/jquery-2.2.4.min.js" charset="utf-8"></script>
    <script src="<?= PROOT ?>js/bootstrap.min.js" charset="utf-8"></script>
</head>

<body style="background: rgba(34,35,52,1)">
<?php require_once 'app/views/layouts/header.php';?>
<?= $this->content('body') ?>
</body>

</html>
