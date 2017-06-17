<?php

namespace App\Router;

use App\Helper\IsUserAdminHelper;
use BuildIt\Router\Router;

/**
 * Class AppRouter
 * @package App\Router
 */
class AppRouter extends Router
{
    /**
     * Propriété dans laquelle l'instance de la classe est stockée.
     */
    private static $instance = null;

    /**
     * AppRouter constructor.
     * @param string $url
     * @param string $controllersPath
     * @param string $adminControllersPath
     */
    protected function __construct($url, $controllersPath, $adminControllersPath)
    {
        parent::__construct($url, $controllersPath, $adminControllersPath);
    }

    /**
     * Fonction qui retourne toujours la même instance de AppRouter.
     * @param string $url
     * @param string $controllersPath
     * @param string $adminControllersPath
     * @return AppRouter
     */
    public static function getInstance($url, $controllersPath, $adminControllersPath)
    {
        if (is_null(self::$instance)) {
            self::$instance = new AppRouter($url, $controllersPath, $adminControllersPath);
        }
        return self::$instance;
    }

    /**
     * @inheritdoc
     */
    public function notFoundCallable()
    {
        header('Location: ' . WEB_ROOT . '/404');
        exit();
    }

    /**
     * @inheritdoc
     * @return bool
     */
    public function isUserAdminCallable()
    {
        return IsUserAdminHelper::isUserAdmin();
    }
}