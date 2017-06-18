<?php

namespace App\Controller;

use App\Helper\FlashMessageHelper;
use App\Model\User;
use App\Repository\UserRepository;

class AccountController extends AppController
{
    public function index()
    {
        $this->authVerify();

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

    public function uploadProfilePic() {

    }

    private function authVerify() {
        if (isset($_SESSION['auth']) && isset($_SESSION['auth']['id'])) {

        } else {
            FlashMessageHelper::add('danger', 'Vous devez être connecté pour accéder à cette page.');
            RedirectController::redirect('home');
        }
    }
}