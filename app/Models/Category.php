<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private  static $category, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image                = $request->file('image');
        self::$imageName            = self::$image->getClientOriginalName();
        self::$directory            = "uploads/category/";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl             = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$imageUrl             = $request->file('image') ? self::getImageUrl($request) :  '';

        self::$category             = new Category();
        self::saveCategoryinfo(self::$category, $request, self::$imageUrl);
    }

    public static function updateCategoryInfo($request, $category)
    {
        if ($request->file('image')) {
            if (file_exists($category->image)) {
                unlink($category->image);
            }
            self::$imageUrl         = self::getImageUrl($request);
        } else {
            self::$imageUrl         = $category->image;
        }

        self::saveCategoryinfo($category, $request, self::$imageUrl);
    }

    public static function saveCategoryinfo($category, $request, $imageUrl)
    {
        $category->name             = $request->name;
        $category->description      = $request->description;
        $category->image            = $imageUrl;
        $category->status           = $request->status;
        $category->save();
    }
}
