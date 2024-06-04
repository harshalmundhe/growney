<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewListing extends Model
{
    protected $table = 'new_listing';
    protected $fillable = [
        'logo',
        'name',
        'created_on',
        'investors',
        'category',
        'network',
        'max_supply'
    ];

}