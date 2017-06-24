<?php

namespace App\Controller;
use App\Database\AppDatabase;
use App\Form\LoginForm;
use App\Form\RegisterForm;
use App\Form\RegisterProfessionalForm;
use App\Helper\FlashMessageHelper;
use App\Helper\RememberTokenHelper;
use App\Model\Role;
use App\Model\User;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;

/**
 * Class AuthController
 * @package App\Controller
 */
class AuthController extends AppController
{
    /**
     * Fonction appelée lors de l'inscription d'un utilisateur.
     */
    public function register() {

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new RegisterForm();
        $professional_check = false;

        if (isset($_POST['professional']) && $_POST['professional'] === 'on') {
            $form = new RegisterProfessionalForm();
            $professional_check = true;
        }

        unset ($_POST['professional']);

        $form->handleValues($_POST);

        if ($form->isValid()) {

            if ($_POST['password'] === $_POST['password_repeat']) {

                $roleRepo = new RoleRepository();
                /** @var Role $role **/
                $role = $roleRepo->findBy(['name' => 'ROLE_USER'])[0];

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $password = sha1($_POST['password']);
                $activation_token = sha1(uniqid().md5($first_name).md5($last_name));
                $role_id = $role->getId();
                $home_phone = $_POST['home_phone'];
                $cell_phone = $_POST['cell_phone'];
                $address = $_POST['address'];
                $zip_code = $_POST['zip_code'];
                $city = $_POST['city'];
                $professional = 0;
                $company_name = '';
                $company_phone = '';
                $company_website = '';
                $company_email = '';

                if ($professional_check) {
                    $role = $roleRepo->findBy(['name' => 'ROLE_PROFESSIONAL'])[0];
                    $role_id = $role->getId();
                    $professional = 1;
                    $company_name = $_POST['company_name'];
                    $company_phone = $_POST['company_phone'];
                    $company_website = $_POST['company_website'];
                    $company_email = $_POST['company_email'];
                }

                $query = "INSERT INTO users (first_name, last_name, email, password, activation_token, role_id, home_phone, cell_phone, address, zip_code, city, professional, company_name, company_phone, company_website, company_email, profile_pic) VALUES (:first_name, :last_name, :email, :password, :activation_token, :role_id, :home_phone, :cell_phone, :address, :zip_code, :city, :professional, :company_name, :company_phone, :company_website, :company_email, :profile_pic)";

                $db = AppDatabase::getInstance();

                try {
                    $db->query($query, false, [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $email,
                        'password' => $password,
                        'activation_token' => $activation_token,
                        'role_id' => intval($role_id),
                        'home_phone' => $home_phone,
                        'cell_phone' => $cell_phone,
                        'address' => $address,
                        'zip_code' => $zip_code,
                        'city' => $city,
                        'professional' => intval($professional),
                        'company_name' => $company_name,
                        'company_phone' => $company_phone,
                        'company_website' => $company_website,
                        'company_email' => $company_email,
                        'profile_pic' => ''
                    ]);

                    $id = intval($db->getLastInsertedId());

                    $query = "UPDATE users SET profile_pic = :profile_pic WHERE id = :id";
                    $db->query($query, false, ['id' => $id, 'profile_pic' => '/uploads/profile_pics/' . $id . '.jpg']);

                    $mail_content = "
                        <h1>Confirmation d'inscription sur le site web de Reugeot.</h1>
                        <p>Nous vous remercions pour cette inscription et espérons que notre site vous plaise.</p>
                        <p>Pour confirmer votre inscription veuillez cliquer <a href='" . WEB_ROOT . "/activation?token=$activation_token" . "'>ici</a>.</p>
                    ";

                    mail($email, 'Reugeot - Confirmation d\'inscription', utf8_decode($mail_content));

                    FlashMessageHelper::add('success', 'Votre inscription s\'est bien déroulée, merci de vérifier vos emails afin d\'activer votre compte.');
                    RedirectController::redirect('home');

                } catch (\PDOException $e) {
                    FlashMessageHelper::add('danger', 'Une erreur s\'est produite lors de votre inscription.');
                    RedirectController::redirect('home');
                }

            }

        }

        FlashMessageHelper::add('danger', 'Des erreurs sont présentes dans le formulaire d\'inscription.');
        RedirectController::redirect('home');
    }

    /**
     * Fonction appelée lors de l'activation d'un compte.
     **/
    public function activate() {
        if (isset($_GET['token'])) {
            $_GET['token'] = htmlspecialchars($_GET['token']);

            $userRepo = new UserRepository();
            /** @var User $user **/
            $user = $userRepo->findBy(['activation_token' => $_GET['token']])[0];

            if (!empty($user)) {
                try {
                    $db = AppDatabase::getInstance();
                    $query = "UPDATE users SET activation_token = '' WHERE activation_token = :activation_token";
                    $db->query($query, false, ['activation_token' => $_GET['token']]);

                    $_SESSION['auth'] = [
                        'id' => $user->getId(),
                        'first_name' => $user->getFirstName(),
                        'last_name' => $user->getLastName(),
                        'email' => $user->getEmail(),
                        'role' => $user->getRole()->getName(),
                        'professional' => $user->isProfessional()
                    ];

                    FlashMessageHelper::add('success', 'Votre compte a bien été activé. Vous êtes désormais connecté.');
                    RedirectController::redirect('home');

                } catch (\Exception $e) {

                }
            }
        }

        FlashMessageHelper::add('danger', 'Le token d\'activation est erroné !');
        RedirectController::redirect('home');
    }

    /**
     * Fonction appelée lors d'une tentative de connexion.
     */
    public function login()
    {
        if (!isset($_SESSION['auth'])) {
            foreach ($_POST as $k => $v) {
                $_POST[$k] = htmlspecialchars($v);
            }

            $form = new LoginForm();
            $form->handleValues($_POST);

            if (!$form->isValid()) {
                FlashMessageHelper::add('danger', 'Identifiants incorrects.');
                RedirectController::redirect('home');
            }

            $repo = new UserRepository();

            /** @var User $user **/
            $user = $repo->findBy(['email' => $_POST['email']])[0];

            if (empty($user)) {
                FlashMessageHelper::add('danger', 'Identifiants incorrects.');
                RedirectController::redirect('home');
            }

            if (sha1($_POST['password']) !== $user->getPassword()) {
                FlashMessageHelper::add('danger', 'Identifiants incorrects.');
                RedirectController::redirect('home');
            }

            if ($user->getActivationToken() !== '') {
                FlashMessageHelper::add('warning', 'Votre compte n\'est pas activé. Vérifiez vos mails !');
                RedirectController::redirect('home');
            }

            $_SESSION['auth'] = [
                'id' => $user->getId(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()->getName(),
                'professional' => $user->isProfessional()
            ];

            if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
                RememberTokenHelper::setToken($user);
            }

            FlashMessageHelper::add('success', 'Vous êtes maintenant connecté.');
            RedirectController::redirect('home');
        } else {
            FlashMessageHelper::add('success', 'Vous êtes déjà connecté.');
            RedirectController::redirect('home');
        }
    }

    /**
     * Fonction appelée lors d'une tentative de déconnexion.
     */
    public function logout()
    {
        RememberTokenHelper::removeToken();
        if (isset($_SESSION['auth'])) {
            unset($_SESSION['auth']);
            FlashMessageHelper::add('success', 'Vous êtes maintenant déconnecté.');
        }
        RedirectController::redirect('home');
    }
}
