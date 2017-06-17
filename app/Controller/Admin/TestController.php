<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Class DumpController
 * @package App\Controller\Admin
 */
class TestController extends AppController
{
    /**
     * Fonction permettant les tests durant le développement.
     */
    public function test()
    {
        $session = $_SESSION;
        $cookie = $_COOKIE;
        $get = $_GET;
        $post = $_POST;
        $files = $_FILES;
        $this->render('default', 'admin.test', [
            'page_name' => 'dump',
            'page_title' => 'Reugeot - Dump',
            'session' => $session,
            'cookie' => $cookie,
            'get' => $get,
            'post' => $post,
            'files' => $files
        ]);
    }
}
