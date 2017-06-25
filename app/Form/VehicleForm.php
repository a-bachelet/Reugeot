<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\MinLengthValidator;
use BuildIt\Form\Validator\NotBlankValidator;

class VehicleForm extends Form
{
    public function __construct()
    {
        $this->add('model', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('vehicle_category', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('vehicle_brand', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('price_without_taxes', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('professional', []);
        $this->add('active', []);
    }
}
