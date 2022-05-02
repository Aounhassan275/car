<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name','image'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveCountryImage($value,'/uploaded_images/country/');
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
