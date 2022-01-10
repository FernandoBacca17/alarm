<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_switch',
        'state_sys',
        'latitude',
        'longitude',
        'speed',
        'device_id'
    ];
}
