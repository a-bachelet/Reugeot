<?php

namespace App\Form;

use BuildIt\Form\Form;
use BuildIt\Form\Validator\EmailValidator;
use BuildIt\Form\Validator\NotBlankValidator;

/**
 * Class LoginForm
 * @package App\Form
 */
class LoginForm extends Form
{
    /**
     * LoginForm constructor.
     */
    public function __construct()
    {
        $this->add('email', [new NotBlankValidator(), new EmailValidator()]);
        $this->add('password', [new NotBlankValidator()]);
        $this->add('remember', []);
    }
}
