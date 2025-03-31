<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    private static $order;

    public static function newOrder($customer, $request)
    {
       self::$order                    = new Order();
       self::$order->customer_id       = $customer->id;
       self::$order->order_total       = Cart::total();
       self::$order->tax_total         = Cart::tax();
       self::$order->shipping_total    = 60;
       self::$order->order_date        = date('Y-m-d');
       self::$order->order_timestamp   = strtotime(date('Y-m-d'));
       self::$order->delivery_address  = $request->delivery_address;
       self::$order->payment_method    = $request->payment_method;
       self::$order->save();

       return self::$order;
    }
}
