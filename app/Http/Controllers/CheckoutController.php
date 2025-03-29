<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer, $order, $orederDetail;
    public function index()
    {
        // return Cart::content();
        return view("website.checkout.index",[
            'products' => Cart::content(),
        ]);
    }
    public function newOrder(Request $request)
    {
        // return $request;
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = bcrypt($request->password);
        $this->customer->save();

        $this->order                    = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->order_total       = 0;
        $this->order->tax_total         = 0;
        $this->order->shipping_total    = 0;
        $this->order->order_date        = date('Y-m-d');
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->delivery_address  = $request->delivery_address;
        $this->order->payment_method    = $request->payment_method;
        $this->order->save();
        
    }
}
