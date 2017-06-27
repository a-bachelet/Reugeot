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
     * @param array $params
     */
    public static function redirect($route, $params = [])
    {
        self::$route($params);
    }

    /**
     * Fonction appelée lors d'une redirection vers la page 404 Not Found.
     */
    public function err404()
    {
        header('Location: ' . WEB_ROOT . '/404');
        exit(0);
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

    public function adminUser() {
        header('Location: ' . WEB_ROOT . '/administration/utilisateurs');
        exit(0);
    }

    public function adminVehicle()
    {
        header('Location: ' . WEB_ROOT . '/administration/vehicules');
        exit(0);
    }

    public function adminVehicleCategory()
    {
        header('Location: ' . WEB_ROOT . '/administration/vehicules-categories');
        exit(0);
    }

    public function adminVehicleCategoryAdd()
    {
        header('Location: ' . WEB_ROOT . '/administration/vehicules-categories/ajouter');
        exit(0);
    }

    public function adminVehicleCategoryEdit($params)
    {
        $id = $params['id'];
        header('Location: ' . WEB_ROOT . '/administration/vehicules-categories/' . $id . '/editer');
        exit(0);
    }

    public function adminVehicleBrand()
    {
        header('Location: ' . WEB_ROOT . '/administration/vehicules-marques');
        exit(0);
    }

    public function adminVehicleBrandAdd()
    {
        header('Location: ' . WEB_ROOT . '/administration/vehicules-marques/ajouter');
        exit(0);
    }

    public function adminVehicleBrandEdit($params)
    {
        $id = $params['id'];
        header('Location: ' . WEB_ROOT . '/administration/vehicules-marques/' . $id . '/editer');
        exit(0);
    }

    public function vehicles()
    {
        header('Location: ' . WEB_ROOT . '/vehicules');
        exit(0);
    }
}
