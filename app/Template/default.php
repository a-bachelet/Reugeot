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
                    <?php if (!isset($_SESSION['auth'])): ?>
                        <!-- Anonymous account Actions -->
                        <div class="navbar-right">
                            <button type="button" class="btn navbar-btn btn-success" data-toggle="modal" data-target="#loginModal">Connexion</button>
                            <button type="button" class="btn navbar-btn btn-primary" data-toggle="modal" data-target="#registerModal">S'inscrire</button>
                        </div>
                    <?php else: ?>
                        <!-- Logged account Actions -->
                        <div class="navbar-right">
                            <a href="<?= WEB_ROOT; ?>/mon-compte" class="btn navbar-btn btn-primary">Mon Compte</a>
                            <a href="<?= WEB_ROOT; ?>/deconnexion" class="btn navbar-btn btn-danger">Déconnexion</a>
                        </div>
                    <?php endif; ?>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Page Content -->
        <?= $content ?>

        <?php require('default/login-modal.inc.php'); ?>
        <?php require('default/register-modal.inc.php'); ?>

        <script src="<?= ASSETS; ?>/js/jquery.min.js"></script>
        <script src="<?= ASSETS; ?>/js/bootstrap.min.js"></script>
        <script src="<?= ASSETS; ?>/js/icheck.min.js"></script>
        <script src="<?= ASSETS; ?>/js/jquery.fs.selecter.min.js"></script>
        <script src="<?= ASSETS; ?>/js/jquery.fs.stepper.min.js"></script>
        <script src="<?= ASSETS; ?>/js/app.js"></script>

    </body>

</html>
