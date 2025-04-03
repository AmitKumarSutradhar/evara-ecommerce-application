<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orederDetail, $orderDetails;

    public static function newOrderDetail($order)
    {
        foreach (Cart::content() as $item) {
            self::$orederDetail                 = new OrderDetail();
            self::$orederDetail->order_id       = $order->id;
            self::$orederDetail->product_id     = $item->id;
            self::$orederDetail->product_name   = $item->name;
            self::$orederDetail->product_color  = $item->options->color;
            self::$orederDetail->product_size   = $item->options->size;
            self::$orederDetail->product_price  = $item->price;
            self::$orederDetail->product_qty    = $item->qty;
            self::$orederDetail->save();

            Cart::remove($item->rowId);
        }
    }

    public static function deleteOrderDetail($id)
    {
        self::$orderDetails = OrderDetail::where('order_id', $id)->get(); 
        foreach (self::$orderDetails as $orderDetail) {
            $orderDetail->delete();
        }
    }
}
 