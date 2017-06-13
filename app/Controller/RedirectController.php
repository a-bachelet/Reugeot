<?php

namespace App\Controller;

/**
 * Class RedirectController
 * @package App\Controller
 */
class RedirectController extends AppController
{
    /**
     * Fonction appelée lors d'une redirection sur la page d'accueil.
     */
    public function home()
    {
        header('Location: ./accueil');
        exit(0);
    }
}
