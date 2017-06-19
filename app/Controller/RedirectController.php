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
        header('Location: ' . WEB_ROOT . '/accueil');
        exit(0);
    }

    /**
     * Fonction appelée lors d'une redirection vers la page de déconnexion.
     */
    public function logout()
    {
        header('Location: ' . WEB_ROOT . '/deconnexion');
        exit(0);
    }

    /**
     * Fonction appelée lors d'une redirection vers la page Mon compte.
     */
    public function account()
    {
        header('Location: ' . WEB_ROOT . '/mon-compte');
        exit(0);
    }
}
