<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'image','description','blog_category_id','view'
    ];
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveBImage($value,'/front/blog/');
    }
    public function category(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }  
}
