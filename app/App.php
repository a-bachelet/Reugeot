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

        $router->get('/', function(){echo 'Home';}, false);
        $router->get('/admin', function(){echo 'Admin';}, true);
        $router->get('/404', function(){echo '404';}, false);

        $router->dispatch();
    }
}
