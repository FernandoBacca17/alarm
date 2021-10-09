<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'imei_code',
        'bt_code_ph',
        'bt_code_mt',
        'number_moto',
        'membresia'
    ];
}
