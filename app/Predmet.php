<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Smer;
class Predmet extends Model
{
    protected $table = 'predmet'; //

    public static function saNazivom($nazivPredmeta, $smer, $godina)
    {
        return Predmet::where('Naziv', $nazivPredmeta)->where('sifSmera', $smer->sifSmera)->where('Godina', $godina)->first();
    }

}