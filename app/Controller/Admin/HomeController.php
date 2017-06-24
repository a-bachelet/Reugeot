<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class HomeController extends AppController
{
    public function index()
    {
        $this->render('admin', 'admin.home.index', [
            'page_name' => 'adminHomeIndex',
            'page_title' => 'Administration - Accueil'
        ]);
    }
}
