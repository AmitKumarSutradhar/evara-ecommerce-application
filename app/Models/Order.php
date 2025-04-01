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

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public static function updateOrder($request, $id)
    {
        self::$order = Order::find($id);

        if ($request->order_status === 'pending') {
            self::$order->order_status          = $request->order_status;
            self::$order->delivery_address      = $request->delivery_address;
            self::$order->delivery_status       = $request->order_status;
            self::$order->payment_status        = $request->order_status;
            self::$order->courier_id            = $request->courier_id;
        } elseif ($request->order_status === 'processing') {
            self::$order->order_status          = $request->order_status;
            self::$order->delivery_address      = $request->delivery_address;
            self::$order->delivery_status       = $request->order_status;
            self::$order->payment_status        = $request->order_status;
            self::$order->courier_id            = $request->courier_id;
        } elseif ($request->order_status === 'completed') {
            self::$order->order_status          = $request->order_status;
            self::$order->delivery_status       = $request->order_status;
            self::$order->payment_status        = $request->order_status;
            self::$order->payment_date          = date('Y-m-d');
            self::$order->payment_timestamp     = strtotime(date('Y-m-d'));
            self::$order->payment_amount        = self::$order->order_total;
        }elseif ($request->order_status === 'cancel') {
            self::$order->order_status          = $request->order_status;
            self::$order->delivery_status       = $request->order_status;
            self::$order->payment_status        = $request->order_status;
        }

        self::$order->save();
    }
}
