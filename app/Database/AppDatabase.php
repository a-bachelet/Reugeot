<?php

namespace App\Database;

use BuildIt\Database\Database;

/**
 * Class AppDatabase
 * @package App\Database
 */
class AppDatabase extends Database
{
    /**
     * Propriété dans laquelle l'instance de la classe est stockée.
     */
    private static $instance = null;

    /**
     * AppDatabase constructor.
     */
    protected function __construct()
    {
        $this->config = require(FOLDER_ROOT . '/config/database.php');
        parent::__construct();
    }

    /**
     * Fonction qui retourne toujours la même instance de AppDatabase.
     * @return AppDatabase
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new AppDatabase();
        }
        return self::$instance;
    }
}
