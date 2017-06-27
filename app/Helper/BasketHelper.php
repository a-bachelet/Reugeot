<?php

namespace App\Helper;

class BasketHelper
{
    public static function count()
    {
        $quantity = 0;

        foreach ($_SESSION['panier'] as $basket_cat) {
            foreach ($basket_cat as $product) {
                $quentity += $product['quantity'];
            }
        }

        return intval($quantity);
    }
}
