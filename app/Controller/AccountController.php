<?php

namespace App\Controller;

use App\Form\ChangePasswordForm;
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

        } else {
            
        }
    }
}