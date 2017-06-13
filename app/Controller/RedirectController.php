<?php

namespace App\Controller;

/**
 * Class RedirectController
 * @package App\Controller
 */
class RedirectController extends AppController
{
    /**
     * Fonction statique permettant de rediriger un utilisateur depuis une autre fonction.
     * @param string $route
     */
    public static function redirect($route)
    {
        self::$route();
    }

    /**
     * Fonction appelée lors d'une redirection sur la page d'accueil.
     */
    public function home()
    {
        header('Location: ./accueil');
        exit(0);
    }
}
