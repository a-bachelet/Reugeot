<?php

namespace App\Controller;
use App\Form\LoginForm;
use App\Helper\FlashMessageHelper;
use App\Model\User;
use App\Repository\UserRepository;

/**
 * Class AuthController
 * @package App\Controller
 */
class AuthController extends AppController
{
    /**
     * Fonction appelée lors d'une tentative de connexion.
     */
    public function login()
    {
        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new LoginForm();
        $form->handleValues($_POST);

        if (!$form->isValid()) {
            FlashMessageHelper::add('error', 'Identifiants incorrects.');
            RedirectController::redirect('home');
        }

        $repo = new UserRepository();

        /** @var User $user **/
        $user = $repo->findBy(['email' => $_POST['email']])[0];

        if (empty($user)) {
            FlashMessageHelper::add('error', 'Identifiants incorrects.');
            RedirectController::redirect('home');
        }

        if (sha1($_POST['password']) !== $user->getPassword()) {
            FlashMessageHelper::add('error', 'Identifiants incorrects.');
            RedirectController::redirect('home');
        }

        $_SESSION['auth'] = [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ];

        FlashMessageHelper::add('success', 'Vous êtes maintenant connecté.');
        RedirectController::redirect('home');
    }

    /**
     * Fonction appelée lors d'une tentative de déconnexion.
     */
    public function logout()
    {
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            FlashMessageHelper::add('success', 'Vous êtes maintenant déconnecté.');
        }
        RedirectController::redirect('home');
    }
}
