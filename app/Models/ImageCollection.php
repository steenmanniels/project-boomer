<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCollection extends Model
{
    protected $fillable = ['occasion_id'];

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
}
