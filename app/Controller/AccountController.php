<?php

namespace App\Controller;

use App\Database\AppDatabase;
use App\Form\ChangePasswordForm;
use App\Helper\FlashMessageHelper;
use App\Helper\FormErrorHelper;
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

        $this->render('default', 'account.index.index', [
            'page_name' => 'account-index',
            'page_title' => 'Reugeot - Mon Compte',
            'user' => $user
        ]);
    }

    public function uploadProfilePic()
    {
        IsAuthenticatedHelper::verifyAuth();

        $return = ['error' => false, 'message' => "L'image a bien été modifiée."];

        if (isset($_FILES['profile_pic'])) {
            $image_name = $_FILES['profile_pic']['name'];
            $types = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg'];
            $guessedExtension = explode('.', $image_name);
            $guessedExtension = end($guessedExtension);
            if (isset($types[$guessedExtension])) {
                $tmp = $_FILES['profile_pic']['tmp_name'];
                $infos = getimagesize($tmp);
                if ($infos['mime'] === $types[$guessedExtension]) {

                    $src = imagecreatefromjpeg($tmp);
                    list($width, $height) = $infos;

                    $newWidth = 200;
                    $newHeight = 200;

                    $tmp = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    imagejpeg($tmp, FOLDER_ROOT . '/web/uploads/profile_pics/' . $_SESSION['auth']['id'] . '.' . $guessedExtension);

                    imagedestroy($src);
                    imagedestroy($tmp);

                } else {
                    $return = ['error' => true, 'message' => "Le type MIME du fichier est incorrect."];
                }
            } else {
                $return = ['error' => true, 'message' => "L'extension .$guessedExtension n'est pas acceptée."];
            }
        } else {
            $return = ['error' => true, 'message' => "Aucun fichier n'a été envoyé."];
        }

        echo utf8_encode(json_encode($return));
        exit();
    }

    public function changePassword()
    {
        IsAuthenticatedHelper::verifyAuth();

        foreach ($_POST as $k => $v) {
            $_POST[$k] = htmlspecialchars($v);
        }

        $form = new ChangePasswordForm();
        $form->handleValues($_POST);

        if ($form->isValid()) {

            $userRepo = new UserRepository();
            /** @var User $user **/
            $user = $userRepo->find($_SESSION['auth']['id']);

            $errors = [];

            if ($user->getPassword() === sha1($_POST['password'])) {
                if ($_POST['new_password'] === $_POST['new_password_repeat']) {
                    $password = sha1($_POST['new_password']);
                    $query = ('UPDATE users SET password = :password WHERE id = :id');
                    $db = AppDatabase::getInstance();
                    $db->query($query, false, ['id' => $user->getId(), 'password' => $password]);
                    FlashMessageHelper::add('success', 'Votre mot de passe a bien été modifié !');
                } else {
                    $errors = [
                        'new_password' => ['', 'Les deux mots de passe ne correspondent pas !'],
                        'new_password_repeat' => ['', 'Les deux mots de passe ne correspondent pas !']
                    ];
                    FormErrorHelper::add('passwordForm', $errors);
                    RedirectController::redirect('account');
                }
            } else {
                $errors = ['password' => ['', 'Votre mot de passe est incorrect.']];
            }
            FormErrorHelper::add('passwordForm', $errors);
            RedirectController::redirect('account');

        } else {
            FormErrorHelper::add('passwordForm', $form->getErrors());
            RedirectController::redirect('account');
        }
    }
}