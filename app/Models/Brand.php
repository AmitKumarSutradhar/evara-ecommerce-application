<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private  static $brand, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request){
        self::$image                = $request->file('image');
        self::$imageName            = self::$image->getClientOriginalName();
        self::$directory            = "/uploads/brand-images";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl             = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newBrand($request){
        self::$imageUrl = $request->file('image') ?  self::getImageUrl($request) : '';

        self::$brand                  = new Brand();
        self::saveBasicInfo(self::$brand, $request, self::$imageUrl);
    }

    public static function updateBrand($request, $brand){
        if($request->file('image')){
            if (file_exists($brand->image)){
                unlink($brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $brand->image;
        }

        self::$imageUrl = $request->file('image') ?  self::getImageUrl($request) : '';

        self::saveBasicInfo($brand, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($brand, $request, $imageUrl){
        $brand->name            = $request->name;
        $brand->description     = $request->description;
        $brand->image           = $imageUrl;
        $brand->status          = $request->status;
        $brand->save();
    }

    public static function deleteBrand($brand){
        if (file_exists($brand->image)){
            unlink($brand->image);
        }
        $brand->delete();
    }
}
