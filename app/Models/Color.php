<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    private  static $color;

    public static function newColor($request){
        self::$color                  = new Color();
        self::saveBasicInfo(self::$color, $request);
    }

    public static function updateColor($request, $color){

        self::saveBasicInfo($color, $request);
    }

    private static function saveBasicInfo($color, $request){
        $color->name            = $request->name;
        $color->description     = $request->description;
        $color->status          = $request->status;
        $color->save();
    }

    public static function deleteColor($color){
        $color->delete();
    }
}
