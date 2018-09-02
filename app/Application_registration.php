<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application_registration extends Model
{
    protected $fillable = [
    'coo_name',
    'coo_address',
    'user_name',
    'user_phone',
    'Co_categories',
    'Co_profile',
    'Co_file',
    'Bu_content',
    'Bu_nature',
    'Ca_composition'
    ];
}
