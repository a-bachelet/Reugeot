<?php

namespace App\Repository;

use App\Model\Role;

/**
 * Class RoleRepository
 * @package App\Repository
 */
class RoleRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'roles';

    /**
     * @inheritdoc
     */
    protected $model = Role::class;
}
