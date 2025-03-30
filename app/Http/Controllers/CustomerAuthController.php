<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerAuthController extends Controller
{
    private $customer, $orders;
    public function login(Request $request)
    {
        return view('website.customer.login');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->orWhere('mobile', $request->mobile)->first();

        if ($this->customer) {
            if (password_verify($request->password, $this->customer->password)) {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/my-dashboard');
            } else {
                return back()->with('message', 'Your password is not valid!');
            }
        } else {
            return back()->with('message', 'Your email or mobile is not valid!');
        }
    }

    public function newCustomer(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->mobile = $request->mobile;
        $this->customer->password = bcrypt($request->password);
        $this->customer->save();

        return redirect('/my-dashboard');
    }

    public function dashboard(Request $request)
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->get();
        return view('website.customer.dashboard', [
            'orders' => $this->orders,
        ]);
    }

    public function logout(Request $request)
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
