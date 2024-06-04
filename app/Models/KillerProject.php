<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KillerProject extends Model
{
    protected $table = 'killer_project';
    protected $fillable = [
        'logo',
        'project',
        'activities'
    ];

}