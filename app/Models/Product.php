<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     ''
    // ];

    private $product, $image, $imageName,  $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image = $request->file("image");
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$extension;
        self::$directory = 'upload/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newProduct($request)
    {
        if($request->file('image')){
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = 'upload/product.jpg';
        }

        self::$product = new Product();
        self::$product->category_id             = $request->category_id;
        self::$product->sub_category_id         = $request->sub_category_id;
        self::$product->brand_id                = $request->brand_id;
        self::$product->unit_id                 = $request->unit_id;
        self::$product->name                    = $request->name;
        self::$product->code                    = $request->code;
        self::$product->short_description       = $request->short_description;
        self::$product->long_description        = $request->long_description;
        self::$product->image                   = self::$imageUrl;
        self::$product->regular_price           = $request->regular_price;
        self::$product->selling_price           = $request->selling_price;
        self::$product->stock_amount            = $request->stock_amount;
        self::$product->status                  = $request->status;
        self::$product->save();

        return self::$product->save();
    }
}
