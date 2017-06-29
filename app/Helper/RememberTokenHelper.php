<?php

namespace App\Helper;

use App\Model\User;
use App\Repository\UserRepository;

/**
 * Class RememberTokenHelper
 * @package App\Helper
 */
class RememberTokenHelper
{
    /**
     * Affecte un cookie 'remember' à l'utilisateur $user permetttant une connexion persistante.
     * @param User $user
     */
    public static function setToken(User $user) {
        $token = self::generateToken($user);
        setcookie('remember', $token . '-' . $user->getId(), time() + 3600 *24 * 3, '/', WEB_DOMAIN, false, true);
    }

    /**
     * Supprime le cookie 'remember' stocké dans le navigateur, permettant de tuer la connexion persistante.
     */
    public static function removeToken() {
        setcookie('remember', '', time() - 3600 *24 * 3, '/', WEB_DOMAIN, false, true);
    }

    /**
     * Vérifie si le cookie $cookie contient un token de connexion persistante valide.
     * @param string $cookie
     * @return array
     */
    public static function isTokenValid($cookie) {
        $cookie = explode('-', $cookie);
        $dirtyToken = $cookie[0];
        $userId = $cookie[1];
        $userRepo = new UserRepository();
        /** @var User $user **/
        $user = $userRepo->find($userId);

        if (empty($user)) {
            return ['valid' => false, 'user' => null];
        }

        $cleanToken = self::generateToken($user);

        if ($dirtyToken !== $cleanToken) {
            return ['valid' => false, 'user' => null];
        }

        return ['valid' => true, 'user' => $user];
    }

    /**
     * Reconnecte l'utilisateur $user en remplissant sa session avec ses informations.
     * @param User $user
     */
    public static function reconnect(User $user) {
        $_SESSION['auth'] = [
            'id' => $user->getId(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()->getName(),
            'professional' => $user->isProfessional()
        ];

        $_SESSION['panier'] = [];
        $_SESSION['panier']['vehicules']= [];
    }

    /**
     * Génère un nouveau token de connexion persistante.
     * @param User $user
     * @return string
     */
    private function generateToken(User $user) {
        $a = md5($user->getFirstName());
        $b = md5($user->getLastName());
        $c = md5($user->getPassword());
        $d = md5($_SERVER['REMOTE_ADDR']);
        $token = sha1($a.$b.$c.$d);
        return $token;
    }
}
