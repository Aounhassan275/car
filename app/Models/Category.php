<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveCImage($value,'/uploaded_images/category/');
    }
    public function models()
    {
        return $this->hasMany(CarModel::class);
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
