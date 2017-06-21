<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\EmailValidator;
use BuildIt\Form\Validator\MaxLengthValidator;
use BuildIt\Form\Validator\MinLengthValidator;
use BuildIt\Form\Validator\NotBlankValidator;

class InformationProfessionalForm extends Form
{
    public function __construct()
    {
        $this->add('first_name', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(3, 'Ce champ doit contenir au moins 3 caractères !')
        ]);
        $this->add('last_name', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(3, 'Ce champ doit contenir au moins 3 caractères !')
        ]);
        $this->add('email', [
            new EmailValidator('Ce champ doit contenir un email valide !')
        ]);
        $this->add('home_phone', []);
        $this->add('home_phone', []);
        $this->add('address', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('zip_code', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(5, 'Ce champ doit contenir au moins 5 caractères !'),
            new MaxLengthValidator(5, 'Ce champ ne doit pas contenir plus de 5 caractères !')
        ]);
        $this->add('city', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('company_name', [
            new NotBlankValidator('Ce champ ne doit pas être vide !')
        ]);
        $this->add('company_phone', []);
        $this->add('company_website', []);
        $this->add('company_email', []);
    }
}
