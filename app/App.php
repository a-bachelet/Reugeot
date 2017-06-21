<?php

namespace App;
use App\Helper\RememberTokenHelper;
use App\Model\User;
use App\Repository\UserRepository;
use App\Router\AppRouter;

/**
 * Class App
 * @package App
 */
class App
{
    /**
     * Fonction d'initialisation de l'application.
     */
    public static function init()
    {
        // Auto Log de l'utilisateur si présence du token de type remember me
        if (!isset($_SESSION['auth']) && isset($_COOKIE['remember'])) {
            $valid = RememberTokenHelper::isTokenValid($_COOKIE['remember']);
            if ($valid['valid']) {
                RememberTokenHelper::reconnect($valid['user']);
            }
        }

        // Implémentation du routeur
        $url = '/' . $_GET['url'];
        $controllersPath = 'App\\Controller\\';
        $adminControllersPath = 'App\\Controller\\Admin\\';

        $router = AppRouter::getInstance($url, $controllersPath, $adminControllersPath);

        // Routes Pages
        $router->get('/accueil', 'Home#index', false);

        // Routes Authentification
        $router->post('/inscription', 'Auth#register', false);
        $router->get('/activation', 'Auth#activate', false);
        $router->post('/connexion', 'Auth#login', false);
        $router->get('/deconnexion', 'Auth#logout', false);

        // Routes Mon Compte
        $router->get('/mon-compte', 'Account#index', false);
        $router->post('/mon-compte/profile-pic', 'Account#uploadProfilePic', false);
        $router->post('/mon-compte/change-mot-de-passe', 'Account#changePassword', false);
        $router->post('/mon-compte/change-informations', 'Account#changeInfos', false);

        // Routes Administration
        $router->get('/admin/test', 'Test#test', true);

        // Routes Redirigées
        $router->get('/', 'Redirect#home', false);

        // Routes Erreurs
        $router->get('/404', 'Error#err404', false);

        // Démarrage Routeur
        $router->dispatch();
    }
}
