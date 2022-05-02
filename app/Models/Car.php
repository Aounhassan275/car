<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name','make_id','model','chassis_no','price','condition','year','mileage','engine',
        'cylinder','exterior_color','interior_color','category_id','fuel_type','transmission',
        'description','air_conditioning','power_window','power_mirror','central_locking','airbag',
        'anti_theft_system','power_steering','anti_brake_system','tv','country_id','type_id'
    ];
    public function make()
    {
        return $this->belongsTo(CarModel::class,'make_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
