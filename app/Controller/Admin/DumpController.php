<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Class DumpController
 * @package App\Controller\Admin
 */
class DumpController extends AppController
{
    /**
     * Fonction affichant les variables globales sous forme visuelle.
     */
    public function dump()
    {
        $session = $_SESSION;
        $cookie = $_COOKIE;
        $get = $_GET;
        $post = $_POST;
        $this->render('default', 'admin.dump', [
            'page_name' => 'dump',
            'page_title' => 'Reugeot - Dump',
            'session' => $session,
            'cookie' => $cookie,
            'get' => $get,
            'post' => $post
        ]);
    }
}
