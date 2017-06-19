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

    public static function hasError($formId) {
        if (isset($_SESSION['form_errors'])) {
            return isset($_SESSION['form_errors'][$formId]);
        } else {
            return false;
        }
    }

    public static function display($formId)
    {
        if (isset($_SESSION['form_errors'])) {
            $errors = $_SESSION['form_errors'];
            unset($_SESSION['form_errors']);
            if (isset($errors[$formId])) {
                return $errors[$formId];
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
}
