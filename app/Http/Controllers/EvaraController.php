<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EvaraController extends Controller
{
    private $product;

    public function index()
    {
        return view('website.home.index', [
            'featuredProducts' => Product::where('featured_status', 1)->limit(8)->get(),
        ]);
    }

    public function category()
    {
        return view('website.category.index');
    }

    public function productDetail($id)
    {
        $this->product = Product::findOrFail($id);
        return view('website.product.index', [
            'product'               => $this->product,
            'realated_product'      => Product::where('category_id', $this->product->category_id)->latest(),
        ]);
    }
}
