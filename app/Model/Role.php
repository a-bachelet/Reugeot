<?php

namespace App\Model;

use BuildIt\Model\Model;

/**
 * Class Role
 * @package App\Model
 */
class Role extends Model
{
    /**
     * Nom du rôle.
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
