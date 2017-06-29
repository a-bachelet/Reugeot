<?php

namespace App\Helper;

use App\Controller\RedirectController;

class IsAuthenticatedHelper
{
    public static function verifyAuth()
    {
        if (!(isset($_SESSION['auth']) && isset($_SESSION['auth']['id']))) {
            FlashMessageHelper::add('danger', 'Vous devez être connecté pour accéder à cette page.');
            RedirectController::redirect('home');
        }
    }
}
