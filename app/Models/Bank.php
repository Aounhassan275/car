<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'payee_name','bank_name','account_number','bank_address','swift_code'
    ];
}
