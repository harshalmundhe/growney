<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotNews extends Model
{
    protected $table = 'hot_news';
    protected $fillable = [
        'logo',
        'heading',
        'sub_heading'
    ];

}