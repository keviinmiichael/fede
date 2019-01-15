<?php

namespace App\Classes;

class Discount
{
    public static function total($decimals = 2, $decimalPoint = ',', $thousandSeperator = '.')
    {
        if (session()->has('coupon_id') && $total = \Cart::subtotal(2, '.', '')) {
            $coupon = \App\Coupon::find(session()->get('coupon_id'));
            $total = ($coupon->type_id == \App\CouponType::PERCENTAJE)
                ? $total - ceil($total * $coupon->discount / 100)
                : $total - $coupon->discount
            ;
        } else {
            $total = 0;
        }
        return number_format($total, $decimals, $decimalPoint, $thousandSeperator);
    }

    public static function itemDiscount($item)
    {
        $total = $item->price;
        if (session()->has('coupon_id')) {
            $coupon = \App\Coupon::find(session()->get('coupon_id'));
            $total = ($coupon->type_id == \App\CouponType::PERCENTAJE)
                ? $total - ceil($total * $coupon->discount / 100)
                : $total - $coupon->discount
            ;
        }
        return $total;
    }
}
