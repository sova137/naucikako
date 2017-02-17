<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Snimak extends Model
{
    protected $table='snimak';//
    protected $primaryKey='sifSnimka';

    public static function dohvatiSnimak($sifSnimka){
        return Snimak::where('sifSnimka',$sifSnimka)->first();
    }

    public function dohvatiPodatkeOPredmetu(){
        return DB::select("
          select p.Godina,p.Naziv from predmet p 
          where $this->sifPredmeta = p.sifPredmeta
        ")[0];
    }

    public function dohvatiNazivSmera(){
        return DB::select("
          select s.Naziv from predmet p, smer s 
          where $this->sifPredmeta = p.sifPredmeta
          and p.sifSmera = s.sifSmera
        ")[0];
    }
}
