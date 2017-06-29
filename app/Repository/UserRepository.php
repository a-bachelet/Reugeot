<?php

namespace App\Repository;

use App\Model\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'users';

    /**
     * @inheritdoc
     */
    protected $model = User::class;
}
