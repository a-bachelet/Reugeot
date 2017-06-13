<?php

namespace App\Repository;

use App\Database\AppDatabase;
use BuildIt\Repository\Repository;

/**
 * Class AppRepository
 * @package App\Repository
 */
abstract class AppRepository extends Repository
{
    /**
     * AppRepository constructor.
     */
    public function __construct()
    {
        $this->db = AppDatabase::getInstance();
    }
}