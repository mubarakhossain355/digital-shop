<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    private static $unit,$image,$imageName,$directory,$imageUrl;

    
    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "upload/unit-images/";
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;


    }

    public static function newUnit($request)
    {
        self::$imageUrl = $request->file('image')?self::getImageUrl($request):' ';
        self::$unit     = new Unit();
        self::saveBasicInfo(self::$unit,$request,self::$imageUrl);
    }
   
    
    public static function updateUnit($request,$unit)
    {
        if($request->file('image'))
        {
            if(file_exists($unit->image))
            {
                unlink($unit->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $unit->image;
        }

        self::saveBasicInfo($unit,$request,self::$imageUrl);
    }

  
    private static function saveBasicInfo($unit,$request,$imageUrl)
    {
        $unit->name         = $request->name;
        $unit->description  = $request->description;
        $unit->image        = self::$imageUrl;
        $unit->status       = $request->status;
        $unit->save();

    }

  

    public static function deleteUnit($unit)
    {
        if(file_exists($unit->image))
        {
            unlink($unit->image);
        }
        $unit->delete();
        
    }
}
