<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    private static $productColor, $productColors;

    public static function newProductColor ($colors, $id) {
        foreach ( $colors as $color) {
            self::$productColor = new ProductColor();
            self::$productColor->product_id = $id;
            self::$productColor->color_id = $color;
            self::$productColor->save();
        }
    }

    public function color (){
        return $this->belongsTo(Color::class);
    }

    public static function updateProductColor($colors, $id){
        self::$productColors = ProductColor::where('product_id', $id)->get();

        foreach(self::$productColors as $productColor){
            $productColor->delete();
        }

        self::newProductColor($colors, $id);
    }
}
