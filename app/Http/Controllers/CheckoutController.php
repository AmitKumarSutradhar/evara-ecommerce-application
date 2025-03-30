<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $this->order->order_total       = Cart::total();
        $this->order->tax_total         = Cart::tax();
        $this->order->shipping_total    = 60;
        $this->order->order_date        = date('Y-m-d');
        $this->order->order_timestamp   = strtotime(date('Y-m-d'));
        $this->order->delivery_address  = $request->delivery_address;
        $this->order->payment_method    = $request->payment_method;
        $this->order->save();

        foreach(Cart::content() as $item) 
        {
            $this->orederDetail                 = new OrderDetail();
            $this->orederDetail->order_id       = $this->order->id;
            $this->orederDetail->product_id     = $item->id;
            $this->orederDetail->product_name   = $item->name;
            $this->orederDetail->product_color  = $item->options->color;
            $this->orederDetail->product_size   = $item->options->size;
            $this->orederDetail->product_price  = $item->price;
            $this->orederDetail->product_qty    = $item->qty;
            $this->orederDetail->save();

            Cart::remove($item->rowId);
        }

        return redirect('/complete-order')->with('message', 'Congratulations. Your order post successfully.');
        
    }

    public function completeOrder() 
    {
        return view('website.checkout.complete-order');
    }
}
