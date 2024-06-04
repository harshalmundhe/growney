<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingRound extends Model
{
    protected $table = 'funding_round';
    protected $fillable = [
        'logo',
        'project',
        'created_on',
        'rounds',
        'partners',
        'investors',
        'raised',
        'category',
    ];

}