<?php

namespace App\Helpers;

use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function saveAImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }    
    public static function saveRImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function savePImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function saveCImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function saveTImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function saveCountryImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function saveCarImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }
    public static function saveBImage($imagefile,$path)
    {
        $originalImage=$imagefile;
        $myImage = Image::make($originalImage);
        $myImage->resize(1024,1024);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.'.$originalImage->getClientOriginalExtension();
        $myImage->save($originalPath.$filename);
        return $path.$filename;
    }

    public static function saveImageFromApi($base64Image,$path){

        $originalImage=base64_decode(str_replace('data:image/png;base64,', '', $base64Image));

        $myImage = Image::make($originalImage);
        $myImage->resize(1024,768);
        $originalPath = public_path().$path;
        $filename = rand(0,100).time().'.png';
        $myImage->save($originalPath.$filename);

        return $path.$filename;
    }

    public function deleteImage($path){
        $image_path = public_path().$path;
        unlink($image_path);
    }


    // composer require intervention/image

    // in config/app.php add to $providers
    // Intervention\Image\ImageServiceProvider::class
    // add to aliases
    // 'Image' => Intervention\Image\Facades\Image::class

}
