<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    private $productImage, $image, $imageName,  $extension, $directory;

    private static function getImageUrl($request)
    {
        self::$image = $request->file("image");
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = rand(0, 500000).'.'.self::$extension;
        self::$directory = 'upload/product-other-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }

    public static function newProductImage ($images, $id) {
        foreach ($images as $image ) {
            self::$productImage = new ProductImage();
            self::$productImage->product_id = $id;
            self::$productImage->image = self::getImageUrl($image);
            self::$productImage->save();
        }
    }
}
