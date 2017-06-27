<?php

namespace App\Repository;

use App\Model\Bill;

class BillRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'bills';

    /**
     * @inheritdoc
     */
    protected $model = Bill::class;
}
