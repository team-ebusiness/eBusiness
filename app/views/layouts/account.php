<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->siteTitle(); ?></title>

    <?= $this->content('head'); ?>

    <style>
        img.background {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            -webkit-filter: blur(5px);
            filter: blur(5px);
            background-blend-mode: darken;
        }
    </style>

    <link rel='stylesheet' href="<?= PROOT ?>css/custom.css" media="screen" title="no title" charset="utf-8">
    <link rel='stylesheet' href="<?= PROOT ?>css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">

    <script src="<?= PROOT ?>js/jquery-2.2.4.min.js" charset="utf-8"></script>
    <script src="<?= PROOT ?>js/bootstrap.min.js" charset="utf-8"></script>
</head>

<body style="background: rgba(34,35,52,1)">
<!--change background image here-->
<!--<img class="background" src="https://www.experionglobal.com/wp-content/uploads/2017/01/Digital-marketplace-for-Indian-e-commerce-startup.png" alt="">-->
<?= $this->content('body') ?>
</body>

</html>
