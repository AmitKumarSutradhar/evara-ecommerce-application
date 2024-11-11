<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private  static $subCategory, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request){
        self::$image                = $request->file('image');
        self::$imageName            = self::$image->getClientOriginalName();
        self::$directory            = "/uploads/sub-category-images";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl             = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request){
//        if ($request->file('image')){
//            self::$imageUrl =  self::getImageUrl($request);
//        } else{
//            self::$imageUrl = '';
//        }

        self::$imageUrl = $request->file('image') ?  self::getImageUrl($request) : '';

        self::$subCategory                  = new SubCategory();
        self::$subCategory->category_id     = $request->category_id;
        self::$subCategory->name            = $request->name;
        self::$subCategory->description     = $request->description;
        self::$subCategory->image           = self::$imageUrl;
        self::$subCategory->status          = $request->status;
        self::$subCategory->save();
    }
}
