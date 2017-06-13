<?php

namespace App\Controller;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AppController
{
    /**
     * Fonction appelée lors de l'arrivée sur la page d'accueil.
     */
    public function index()
    {
        $this->render('default', 'home.index', [
            'page_name' => 'home',
            'page_title' => 'Reugeot - Accueil'
        ]);
    }
}
