<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    private static $color,$image,$imageName,$directory,$imageUrl;
    private static function getImageUrl($request)
    {
        self::$image            =       $request->file('image');
        self::$imageName        =       self::$image->getClientOriginalName();
        self::$directory        =       "upload/color-images/";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl         =       self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newColor($request)
    {
        self::$imageUrl         =       $request->file('image')?self::getImageUrl($request): '';
        self::$color            =       new Color();
        self::saveBasicInfo(self::$color,$request,self::$imageUrl);
    }

   
   
    
    public static function updateColor($request,$color)
    {
        if($request->file('image'))
        {
            if(file_exists($color->image))
            {
                unlink($color->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $color->image;
        }

        self::saveBasicInfo($color,$request,self::$imageUrl);
    }


    private static function saveBasicInfo($color,$request,$imageUrl)
    {
        $color->name                =       $request->name;
        $color->description         =       $request->description;
        $color->image               =       self::$imageUrl;
        $color->status              =       $request->status;
        $color->save();
    }

  

    public static function deleteColor($color)
    {
        if(file_exists($color->image))
        {
            unlink($color->image);
        }
        $color->delete();
        
    }
}
