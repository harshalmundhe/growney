<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnusualActivity extends Model
{
    protected $table = 'unusual_activity';
    protected $fillable = [
        'logo',
        'project',
        'activities'
    ];

}