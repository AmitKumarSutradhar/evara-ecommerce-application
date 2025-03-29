<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private static $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Cart::content();
        return view('website.cart.index', [
            'products' => Cart::content(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        self::$product =     Product::findOrFail($request->id);

        Cart::add([
            'id'            => $request->id,
            'name'          => self::$product->name,
            'qty'           =>  $request->qty,
            'price'         => self::$product->selling_price,
            'options'       =>
            [
                'image'     => self::$product->image,
                'code'      => self::$product->code,
                'size'      => $request->size,
                'color'     => $request->color,
            ]
        ]);

        return redirect()->route('cart.index')->with('message', 'Item added to cart successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('message', 'Item remove from cart successfully.');
    }
}
