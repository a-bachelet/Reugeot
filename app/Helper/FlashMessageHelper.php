<?php

namespace App\Helper;

/**
 * Class FlashMessageHelper
 * @package App\Helper
 */
class FlashMessageHelper
{
    /**
     * Adds a flash message $message of type $type in the session flash messages array.
     * @param string $type
     * @param string $message
     */
    public static function add($type, $message)
    {
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = [];
        }
        $_SESSION['flash'][] = [
            'type' => $type,
            'message' => $message
        ];
    }

    /**
     * Returns the session flash messages array.
     * @return array
     */
    public static function display()
    {
        $flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
        unset($_SESSION['flash']);
        return $flash;
    }
}
