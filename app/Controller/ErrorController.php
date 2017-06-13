<?php

namespace App\Controller;

class ErrorController extends AppController
{
    public function err404()
    {
        $this->render('default', 'error.404', [
            'page_name' => '404',
            'page_title' => 'Reugeot - Erreur 404'
        ]);
    }
}
