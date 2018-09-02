<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class connection extends Model
{
    protected $fillable = [
        'name',
        'email',
        'say'
    ];
}
