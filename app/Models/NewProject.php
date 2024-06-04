<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewProject extends Model
{
    protected $table = 'new_project';
    protected $fillable = [
        'logo',
        'project',
        'category',
        'total_raise',
        'round',
        'investors',
    ];

}