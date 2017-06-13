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
        </style>

        <title><?= $params['page_title'] ?></title>

    </head>

    <body>

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
                    <!-- Sign In Form -->
                    <form class="navbar-form navbar-right">
                        <div class="form-group">
                            <input type="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Mot de Passe" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Connexion</button>
                        <button type="button" class="btn btn-primary">Inscription</button>
                    </form>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Page Content -->
        <?= $content ?>

        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>

    </body>

</html>
