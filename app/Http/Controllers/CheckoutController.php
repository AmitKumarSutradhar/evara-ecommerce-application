<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orederDetail, $sslCommerzPayment;
    public function index()
    {
        $this->customer = '';
        if (Session::get("customer_id")) {
            $this->customer = Customer::findOrFail(Session::get("customer_id"));
        }

        return view("website.checkout.index", [
            'products' => Cart::content(),
            'customer' =>  $this->customer,
        ]);
    }
    public function newOrder(Request $request)
    {
        // return $request;
        $this->customer = Customer::where('email', $request->email)->orWhere('mobile', $request->mobile)->first();


        if (!$this->customer) {
            $this->customer = Customer::newCustomer($request);
        }

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        if ($request->payment_method == 'cod') {
            $this->order = Order::newOrder($this->customer, $request);
            OrderDetail::newOrderDetail($this->order);
            return redirect('/complete-order')->with('message', 'Congratulations!!! Your order post successfully.');
        } elseif ($request->payment_method == 'sslcommerz') {
            $this->sslCommerzPayment = new SslCommerzPaymentController();
            $this->sslCommerzPayment->index($request, $this->customer);
        }
    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
