<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    private static $productColor;

    public static function newProductColor ($colors, $id) {
        foreach ( $colors as $color) {
            self::$productColor = new ProductColor();
            self::$productColor->product_id = $id;
            self::$productColor->color_id = $color;
            self::$productColor->save();
        }
    }
}
