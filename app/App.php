<?php

namespace App;
use App\Helper\RememberTokenHelper;
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

            // Acceuil
            $router->get('/administration', 'Home#index', true);

            // Utilisateurs
            $router->get('/administration/utilisateurs', 'User#index', true);
            $router->get('/administration/utilisateurs/:id', 'User#details', true)->param('id', '[0-9]+');
            $router->get('/administration/utilisateurs/:id/supprimer', 'User#delete', true)->param('id', '[0-9]+');

            // Véhicules
            $router->get('/administration/vehicules', 'Vehicle#index', true);
            $router->get('/administration/vehicules/:id', 'Vehicle#details', true)->param('id', '[0-9]+');
            $router->get('/administration/vehicules/ajouter', 'Vehicle#addGet', true);
            $router->post('/administration/vehicules/ajouter', 'Vehicle#addPost', true);
            $router->get('/administration/vehicules/:id/editer','Vehicle#editGet', true)->param('id', '[0-9]+');
            $router->post('/administration/vehicules/:id/editer', 'Vehicle#editPost', true)->param('id', '[0-9]+');
            $router->get('/administration/vehicules/:id/supprimer', 'Vehicle#delete', true)->param('id', '[0-9]+');

            // Véhicules Catégories
            $router->get('/administration/vehicules-categories', 'VehicleCategory#index', true);
            $router->get('/administration/vehicules-categories/ajouter', 'VehicleCategory#addGet', true);
            $router->post('/administration/vehicules-categories/ajouter', 'VehicleCategory#addPost', true);
            $router->get('/administration/vehicules-categories/:id/editer','VehicleCategory#editGet', true)->param('id', '[0-9]+');
            $router->post('/administration/vehicules-categories/:id/editer', 'VehicleCategory#editPost', true)->param('id', '[0-9]+');
            $router->get('/administration/vehicules-categories/:id/supprimer', 'VehicleCategory#delete', true)->param('id', '[0-9]+');

            // Véhicules Marques
            $router->get('/administration/vehicules-marques', 'VehicleBrand#index', true);
            $router->get('/administration/vehicules-marques/ajouter', 'VehicleBrand#addGet', true);
            $router->post('/administration/vehicules-marques/ajouter', 'VehicleBrand#addPost', true);
            $router->get('/administration/vehicules-marques/:id/editer','VehicleBrand#editGet', true)->param('id', '[0-9]+');
            $router->post('/administration/vehicules-marques/:id/editer', 'VehicleBrand#editPost', true)->param('id', '[0-9]+');
            $router->get('/administration/vehicules-marques/:id/supprimer', 'VehicleBrand#delete', true)->param('id', '[0-9]+');

        // Routes Redirigées
        $router->get('/', 'Redirect#home', false);

        // Routes Erreurs
        $router->get('/404', 'Error#err404', false);

        // Démarrage Routeur
        $router->dispatch();
    }
}
