<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\MinLengthValidator;
use BuildIt\Form\Validator\NotBlankValidator;

/**
 * Class ChangePasswordForm
 * @package App\Form
 */
class ChangePasswordForm extends Form
{
    /**
     * ChangePasswordForm constructor.
     */
    public function __construct()
    {
        $this->add('password', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(8, 'Ce champ doit contenir au moins 8 caractères !')
        ]);
        $this->add('new_password', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(8, 'Ce champ doit contenir au moins 8 caractères !')
        ]);
        $this->add('new_password_repeat', [
            new NotBlankValidator('Ce champ ne doit pas être vide !'),
            new MinLengthValidator(8, 'Ce champ doit contenir au moins 8 caractères !')
        ]);
    }
}
