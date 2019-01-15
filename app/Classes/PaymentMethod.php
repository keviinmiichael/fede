<?php

namespace App\Classes;

class PaymentMethod
{
    public static $values = [
        ['key' => 'payMP', 'label' => 'Mercado Pago'],
        ['key' => 'payOther', 'label' => 'Efectivo / Depósito']
    ];

    public static function getLabel($key)
    {
        $label = '';
        foreach (self::$values as $value) {
            if ($value['key'] == $key) {
                $label = $value['label'];
            }
        }
        return $label;
    }

    public static function getKey($label)
    {
        $key = '';
        foreach (self::$values as $value) {
            if ($value['label'] == $label) {
                $key = $value['key'];
            }
        }
        return $key;
    }
}
