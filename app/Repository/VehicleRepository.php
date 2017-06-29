<?php

namespace App\Repository;

use App\Model\Vehicle;

class VehicleRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'vehicles';

    /**
     * @inheritdoc
     */
    protected $model = Vehicle::class;
}
