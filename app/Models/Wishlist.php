<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'user_wishlist';
    protected $fillable = [
        'user_id',
        'item_id',
        'table_name'
    ];

}