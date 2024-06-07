<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirDrop extends Model
{
    protected $table = 'air_drop';
    protected $fillable = [
        'logo',
        'heading',
        'sub_heading'
    ];

}