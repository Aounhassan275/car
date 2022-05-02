<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    public static function read()
    {
        return (New static)::where('status',true)->get();
    } 
    public static function unread()
    {
        return (New static)::where('status',false)->get();
    } 
}
