<?php

namespace App;
use App\Router\AppRouter;

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * Fonction d'initialisation de l'application
     */
    public static function init()
    {
        // Implémentation du routeur.
        $url = '/' . $_GET['url'];
        $controllersPath = 'App\\Controller\\';
        $adminControllersPath = 'App\\Controller\\Admin\\';

        $router = AppRouter::getInstance($url, $controllersPath, $adminControllersPath);

        // Routes Pages
        $router->get('/accueil', 'Home#index', false);

        // Routes Authentification
        $router->post('/connexion', 'Auth#login', false);
        $router->get('/deconnexion', 'Auth#logout', false);

        // Routes Administration
        $router->get('/dump', 'Dump#dump', true);
        $router->post('/dump', 'Dump#dump', true);

        // Routes Redirigées
        $router->get('/', 'Redirect#home', false);

        // Routes Erreurs
        $router->get('/404', 'Error#err404', false);

        $router->dispatch();
    }
}
