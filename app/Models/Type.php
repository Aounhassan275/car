<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveTImage($value,'/uploaded_images/type/');
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
