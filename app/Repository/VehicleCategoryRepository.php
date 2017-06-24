<?php

namespace App\Repository;

use App\Model\VehicleCategory;

class VehicleCategoryRepository extends AppRepository
{
    /**
     * @inheritdoc
     */
    protected $table = 'vehicle_categories';

    /**
     * @inheritdoc
     */
    protected $model = VehicleCategory::class;
}
