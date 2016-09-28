<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable = [
        'kenteken',
        'merk',
        'model',
        'type',
        'kenteken',
        'kenteken_kleur',
        'soort_voertuig',
        'voertuig_staat',
        'intern_id',
        'meldcode',
        'kilometer_stand',
        'nap',
        'check_apk',
        'apk_datum',
        'deel1_datum',
        'check_afwijkend_bouwjaar',
        'afwijkend_bouwjaar'
    ];

    public function imageCollection()
    {
        return $this->hasOne('App\Models\ImageCollection');
    }
}
