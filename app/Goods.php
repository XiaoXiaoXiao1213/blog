<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = [
    'Go_name',
    'brand',
    'characteristic',
    'specifications',
    'mclassi',
    'bclassi',
    'sclassi',
    'pic1',
    'pic2',
    'pic3'
    ];
  
}
