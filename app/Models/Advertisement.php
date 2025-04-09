<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    private static $advertisement, $imageUrl;

    public static function newAadvertisement ($request) {
        if($request->file('image')){
            self::$imageUrl = imageUpload($request->file('image'), 'uploads/advertisement/');
        } else {
            self::$imageUrl =  'uploads/no-image.jpg';
        }

        self::$advertisement                        = new Advertisement();
        self::$advertisement->product_id            = $request->product_id;
        self::$advertisement->title                 = $request->title;
        self::$advertisement->sub_title             = $request->sub_title;
        self::$advertisement->position              = $request->position;
        self::$advertisement->offer_price           = $request->offer_price;
        self::$advertisement->discount              = $request->discount;
        self::$advertisement->image                 = self::$imageUrl;
        self::$advertisement->status                = $request->status;
        self::$advertisement->save();
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
