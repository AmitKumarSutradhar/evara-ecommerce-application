<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function login(Request $request)
    {
        return view('wbsite.customer.login');
    }

    public function loginCheck(Request $request)
    {
        return $request;
    }

    public function newCustomer(Request $request)
    {
        return $request;
    }
}
