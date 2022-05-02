<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $fillable = [
        'image','car_id'
    ];
    public function cars()
    {
        return $this->belongsTo(Car::class,'car_id');
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveCarImage($value,'/uploaded_images/cars/');
    }
}
