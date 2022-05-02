<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = [
        'name','category_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
