<?php

namespace App\Helper;

/**
 * Class IsUserAdminHelper
 * @package App\Helper
 */
class IsUserAdminHelper
{
    /**
     * Retourne true si l'utilisateur est connecté et a le rôle ROLE_ADMIN, sinon retourne false.
     * @return bool
     */
    public static function isUserAdmin() {
        return isset($_SESSION['auth']) && $_SESSION['auth']['role'] === 'ROLE_ADMIN';
    }
}
