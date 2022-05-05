<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded=[];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveSettingImage($value,'/front/setting/');
    }
}
