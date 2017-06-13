<?php

namespace App\Controller;

/**
 * Class ErrorController
 * @package App\Controller
 */
class ErrorController extends AppController
{
    /**
     * Fonction appelée lors d'une erreur 404.
     */
    public function err404()
    {
        $this->render('default', 'error.404', [
            'page_name' => '404',
            'page_title' => 'Reugeot - Erreur 404'
        ]);
    }
}
