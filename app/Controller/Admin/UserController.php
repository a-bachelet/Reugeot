<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\RedirectController;
use App\Database\AppDatabase;
use App\Helper\FlashMessageHelper;
use App\Model\User;
use App\Repository\UserRepository;

class UserController extends AppController
{
    public function index()
    {
        $userRepo = new UserRepository();
        $userCount = $userRepo->count();
        $userByPage = 5;
        $pageCount = ceil($userCount/$userByPage);
        $viewedPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        if ($viewedPage < 1 || $viewedPage > $pageCount) {
            $viewedPage = 1;
        }
        $offset = ($viewedPage - 1) * $userByPage;
        $limit = $userByPage;
        /** @var User[] $users **/
        $users = $userRepo->findBetween($offset, $limit, 'DESC');

        $this->render('admin', 'admin.user.index', [
            'page_name' => 'adminUserIndex',
            'page_title' => 'Administration - Utilisateurs',
            'users' => $users,
            'viewedPage' => intval($viewedPage),
            'pageCount' => intval($pageCount)
        ]);
    }

    public function details($id) {
        $userRepo = new UserRepository();
        /** @var User $user **/
        $user = $userRepo->find($id);
        if (is_null($user->getId())) {
            FlashMessageHelper::add('danger', 'Cet utilisateur n\'existe pas.');
            RedirectController::redirect('adminUser');
        } else {
            $this->render('admin', 'admin.user.details', [
                'page_name' => 'adminUserDetails',
                'page_title' => 'Administration - Utilisateurs',
                'user' => $user
            ]);
        }
    }

    public function delete($id) {
        $userRepo = new UserRepository();
        /** @var User $user **/
        $user = $userRepo->find($id);
        if (is_null($user->getId())) {
            FlashMessageHelper::add('danger', 'Cet utilisateur n\'esxiste pas.');
            RedirectController::redirect('adminUser');
        }
        $query = 'DELETE FROM users WHERE id = :id';
        $db = AppDatabase::getInstance();
        try {
            $db->query($query, false, ['id' => $user->getId()]);
            FlashMessageHelper::add('success', 'L\'utilisateur ' . $user->getId() . ' a bien été supprimée.');
            RedirectController::redirect('adminUser');
        } catch(\Exception $e) {
            FlashMessageHelper::add('danger', 'Une erreur s\'est produite lors de la suppression.');
            RedirectController::redirect('adminUser');
        }
    }
}
