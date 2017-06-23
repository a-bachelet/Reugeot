<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Site Web de l'entreprise Reugeot">
    <meta name="author" content="Bachelet Alexis (app.bachelet@gmail.com)">

    <link rel="stylesheet" href="<?= ASSETS; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>/css/bootflat.css">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
        .flashes {
            position: absolute;
            top: 55px;
            right: 5px;
            z-index: 10;
        }
        .checkbox > label {
            padding-left: 0;
        }
    </style>

    <title><?= $params['page_title'] ?></title>

</head>

<body>

<!-- Flash Messages -->
<div class="flashes">
    <?php foreach(\App\Helper\FlashMessageHelper::display() as $flash): ?>
        <div class="alert alert-<?= $flash['type']; ?> alert-dismissible flash" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
            <?= $flash['message']; ?>
        </div>
    <?php endforeach; ?>
</div>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <!-- Navigation Header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= WEB_ROOT; ?>/accueil">Reugeot</a>
        </div>

        <!-- Navigation Content -->
        <div id="navbar" class="navbar-collapse collapse">

            <!-- Navigation Links -->
            <?php require('common/navbar-links.php'); ?>

            <!-- Logged account Actions -->
            <div class="nav navbar-nav navbar-right">
                <a href="<?= WEB_ROOT; ?>/mon-compte" class="btn navbar-btn btn-primary">Mon Compte</a>
                <a href="<?= WEB_ROOT; ?>/deconnexion" class="btn navbar-btn btn-danger">Déconnexion</a>
            </div>

        </div>

    </div>
</nav>

<!-- Page Content -->
<div class="jumbotron">
    <div class="container">
        <h1>Administration</h1>
    </div>
</div>
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <div class="list-group">
                <a href="<?= WEB_ROOT . '/administration' ?>" class="list-group-item <?php if (strpos($params['page_name'], 'adminHome') !== false) {echo 'active';} ?>">
                    <span class="glyphicon glyphicon-cog"></span> Accueil
                </a>
            </div>
        </div>

        <div class="col-md-9">
            <?= $content ?>
        </div>

    </div>

</div>

<script src="<?= ASSETS; ?>/js/jquery.min.js"></script>
<script src="<?= ASSETS; ?>/js/bootstrap.min.js"></script>
<script src="<?= ASSETS; ?>/js/icheck.min.js"></script>
<script src="<?= ASSETS; ?>/js/jquery.fs.selecter.min.js"></script>
<script src="<?= ASSETS; ?>/js/jquery.fs.stepper.min.js"></script>
<script src="<?= ASSETS; ?>/js/app.js"></script>

</body>

</html>
