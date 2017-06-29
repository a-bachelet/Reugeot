<?php

namespace App\Model;

use BuildIt\Model\Model;

class VehicleBrand extends Model
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
