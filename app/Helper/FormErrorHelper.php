<?php

namespace App\Helper;

class FormErrorHelper
{
    public static function add($formId, $errors = [])
    {
        if (!isset($_SESSION['form_errors'])) {
            $_SESSION['form_errors'] = [];
        }

        $_SESSION['form_errors'][$formId] = $errors;
    }

    public static function display($formId)
    {
        if (isset($_SESSION['form_errors'])) {
            if (isset($_SESSION['form_errors'][$formId])) {
                return $_SESSION['form_errors'][$formId];
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
}
