<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\EmailValidator;
use BuildIt\Form\Validator\MaxLengthValidator;
use BuildIt\Form\Validator\MinLengthValidator;
use BuildIt\Form\Validator\NotBlankValidator;

class RegisterForm extends Form
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
        $this->add('password', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(8, 'Ce champ doit contenir au moins 8 caractères !')
        ]);
        $this->add('password_repeat', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(8, 'Ce champ doit contenir au moins 8 caractères !')
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
    }
}
