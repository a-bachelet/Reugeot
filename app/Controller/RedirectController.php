<?php

namespace App\Controller;

class RedirectController extends AppController
{
    public function home()
    {
        header('Location: ./accueil');
        exit(0);
    }
}
