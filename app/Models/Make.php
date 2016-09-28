<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class make extends Model
{
    //
    protected $fillable = [
        'make_id',
        'name',
        'country'
    ];
}
