<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technical_consulting extends Model
{
     protected $fillable = [
        'Coo_name',
        'Coo_address',
        'user_name',
        'user_phone',
        'email',
        'Goods_name',
        'contect',
        'email2'
    ];
}
