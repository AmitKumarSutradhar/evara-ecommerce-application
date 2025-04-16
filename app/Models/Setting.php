<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    private static $setting, $imageUrl;

    public static function newSetting($request)
    {
        self::$setting                              = new Setting();
        self::$setting->compnay_name                = $request->compnay_name;
        self::$setting->slogun                      = $request->slogun;
        self::$setting->contact_phone               = $request->contact_phone;
        self::$setting->support_phone               = $request->support_phone;
        self::$setting->office_hour                 = $request->office_hour;
        self::$setting->facebook_url                = $request->facebook_url;
        self::$setting->x_url                       = $request->x_url;
        self::$setting->linkedin_url                = $request->linkedin_url;
        self::$setting->youtube_url                 = $request->youtube_url;
        self::$setting->instagram_url               = $request->instagram_url;
        self::$setting->google_map_api_url          = $request->google_map_api_url;
        self::$setting->adnriod_app_image           = $request->file('adnriod_app_image') ? imageUpload($request->file('adnriod_app_image'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->adnriod_app_url             = $request->adnriod_app_url;
        self::$setting->ios_app_image               = $request->file('ios_app_image') ? imageUpload($request->file('ios_app_image'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->ios_app_url                 = $request->file('ios_app_url') ? imageUpload($request->file('ios_app_url'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->company_address             = $request->company_address;
        self::$setting->logo                        = $request->file('logo') ? imageUpload($request->file('logo'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->logo_tranparent             = $request->file('logo_tranparent') ? imageUpload($request->file('logo_tranparent'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->favicon                     = $request->file('favicon') ? imageUpload($request->file('favicon'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->favicon                     = $request->site_title;
        self::$setting->payment_methods_image       = $request->file('payment_methods_image') ? imageUpload($request->file('payment_methods_image'), 'uploads/setting/') : 'uploads/no-image.jpg';
        self::$setting->save();
    }

    public static function updateSetting($request, $setting)
    {
        $setting->compnay_name                = $request->compnay_name;
        $setting->slogun                      = $request->slogun;
        $setting->contact_phone               = $request->contact_phone;
        $setting->support_phone               = $request->support_phone;
        $setting->office_hour                 = $request->office_hour;
        $setting->facebook_url                = $request->facebook_url;
        $setting->x_url                       = $request->x_url;
        $setting->linkedin_url                = $request->linkedin_url;
        $setting->youtube_url                 = $request->youtube_url;
        $setting->instagram_url               = $request->instagram_url;
        $setting->google_map_api_url          = $request->google_map_api_url;
        $setting->adnriod_app_image           = $request->file('adnriod_app_image') ? imageUpload($request->file('adnriod_app_image'), 'uploads/setting/') : $setting->adnriod_app_image;
        $setting->adnriod_app_url             = $request->adnriod_app_url;
        $setting->ios_app_image               = $request->file('ios_app_image') ? imageUpload($request->file('ios_app_image'), 'uploads/setting/') : $setting->ios_app_image;
        $setting->ios_app_url                 = $request->ios_app_url;
        $setting->company_address             = $request->company_address;
        $setting->logo                        = $request->file('logo') ? imageUpload($request->file('logo'), 'uploads/setting/') : $setting->logo;
        $setting->logo_tranparent             = $request->file('logo_tranparent') ? imageUpload($request->file('logo_tranparent'), 'uploads/setting/') : $setting->logo_tranparent;
        $setting->favicon                     = $request->file('favicon') ? imageUpload($request->file('favicon'), 'uploads/setting/') : $setting->favicon;
        $setting->favicon                     = $request->site_title;
        $setting->payment_methods_image       = $request->file('payment_methods_image') ? imageUpload($request->file('payment_methods_image'), 'uploads/setting/') : $setting->payment_methods_image;
        $setting->save();
    }
}
