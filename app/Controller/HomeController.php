<?php

namespace App\Controller;

class HomeController extends AppController
{
    public function index()
    {
        $this->render('default', 'home.index', [
            'page_name' => 'home',
            'page_title' => 'Reugeot - Accueil'
        ]);
    }
}
