<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EcoSystem extends Model
{
    protected $table = 'eco_system';
    protected $fillable = [
        'logo',
        'project',
        'name',
        'share'
    ];

}