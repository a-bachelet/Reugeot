<?php

namespace App\Repository;

use App\Model\VehicleBrand;

class VehicleBrandRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'vehicle_brands';

    /**
     * @inheritdoc
     */
    protected $model = VehicleBrand::class;
}
