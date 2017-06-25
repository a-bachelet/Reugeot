<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\NotBlankValidator;

class VehicleCategoryForm extends Form
{
    /**
     * VehicleCategoryForm constructor.
     */
    public function __construct()
    {
        $this->add('name', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
    }
}