<?php

namespace App\Controller;

use App\Helper\FlashMessageHelper;
use App\Helper\IsAuthenticatedHelper;
use App\Model\User;
use App\Repository\UserRepository;

class AccountController extends AppController
{
    public function index()
    {
        IsAuthenticatedHelper::verifyAuth();

        $userRepo = new UserRepository();
        /** @var User $user **/
        $user = $userRepo->find($_SESSION['auth']['id']);
        if (empty($user)) {
            FlashMessageHelper::add('danger', 'Votre session est erronée et a été supprimée.');
            RedirectController::redirect('logout');
        }

        $this->render('default', 'account.index', [
            'page_name' => 'account-index',
            'page_title' => 'Reugeot - Mon Compte',
            'user' => $user
        ]);
    }

    public function uploadProfilePic()
    {
    }
}