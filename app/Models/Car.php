<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name','make_id','model','chassis_no','price','condition','year','mileage','engine',
        'cylinder','exterior_color','interior_color','category_id','fuel_type','transmission',
        'description','air_conditioning','power_window','power_mirror','central_locking','airbag',
        'anti_theft_system','power_steering','anti_brake_system','tv','country_id','type_id',
        'trip_speedometer',
        'speedometer_light',
        'front_headlights_button',
        'vehicle_assist',
        'eco_mode_engine',
        'hd_navigation',
        'handle_right',
        'aux',
        'alloy_wheels',
        'new_tires_sport',
        'car_navigation',
        'back_monitor_camera',
        'fresh_interior',
        'neat_clean_seats',
        'dvd_options',
        'remote_entry',
        'discharged_lamp',
        'aluminum_foil',
        'drive_system',
        'power_outlet',
        'video_input',
        'tyres_condition',
        'exterior_and_interior_condition',
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
