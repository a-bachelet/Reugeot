<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Site Web de l'entreprise Reugeot">
        <meta name="author" content="Bachelet Alexis (app.bachelet@gmail.com)">

        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            .flashes {
                position: absolute;
                top: 55px;
                right: 0;
                z-index: 999999;
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
                    <a class="navbar-brand" href="./accueil">Reugeot</a>
                </div>
                <!-- Navigation Content -->
                <div id="navbar" class="navbar-collapse collapse">
                    <?php if (!isset($_SESSION['auth'])): ?>
                        <!-- Anonymous account Actions -->
                        <div class="navbar-right">
                            <button type="button" class="btn navbar-btn btn-success" data-toggle="modal" data-target="#loginModal">Connexion</button>
                            <a href="#" class="btn navbar-btn btn-primary">Inscription</a>
                        </div>
                    <?php else: ?>
                        <!-- Logged account Actions -->
                        <div class="navbar-right">
                            <a href="#" class="btn navbar-btn btn-primary">Mon Compte</a>
                            <a href="./deconnexion" class="btn navbar-btn btn-danger">Déconnexion</a>
                        </div>
                    <?php endif; ?>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Page Content -->
        <?= $content ?>

        <!-- Login Modal -->
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Connexion :</h4>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm" class="form-horizontal" method="POST" action="./connexion">
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Mot de Passe</label>
                                <div class="col-sm-9">
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Mot de Passe">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="hidden" value="'off'">
                                            <input name="remember" type="checkbox"> Se souvenir de moi
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" form="loginForm">Connexion</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/app.js"></script>

    </body>

</html>
