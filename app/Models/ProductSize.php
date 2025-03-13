<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    private $productSize;

    private static function newProductSize ($sizes, $id) {
        foreach ( $sizes as $size) {
            self::$productSize = new ProductSize();
            self::$productSize->product_id = $id;
            self::$productSize->size_id = $size;
            self::$productSize->save();
        }
    }
}
