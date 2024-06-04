<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdoIeo extends Model
{
    protected $table = 'ido_ieo';
    protected $fillable = [
        'logo',
        'project',
        'backed_by',
        'partners',
        'coin_token_sale_partner',
        'audits',
    ];

}