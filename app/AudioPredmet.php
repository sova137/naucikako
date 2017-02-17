<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class AudioPredmet extends Model
{
    protected $table='audio_predmet';//
    protected $primaryKey='sifPredmeta';

    public static function dohvatiAudioPredmete()
    {
        return DB::select("
            select ap.sifPredmeta, p.Naziv as nazivPredmeta, p.sifSmera, p.Godina, s.Naziv as nazivSmera from audio_predmet ap, predmet p, smer s
            where ap.sifPredmeta = p.sifPredmeta
            and p.sifSmera = s.sifSmera
            order by p.sifSmera, p.Godina, p.Naziv
        ");
    }

    public static function dohvatiSmerove()
    {
        return DB::select("
            select p.sifSmera, s.Naziv from audio_predmet ap, predmet p, smer s
            where ap.sifPredmeta = p.sifPredmeta
            and s.sifSmera = p.sifSmera
            group by p.sifSmera, s.Naziv
        ");
    }

    public static function dohvatiGodine()
    {
        return DB::select("
            select p.sifSmera,s.Naziv, p.Godina from audio_predmet ap, predmet p, smer s
            where ap.sifPredmeta = p.sifPredmeta
            and s.sifSmera = p.sifSmera
            group by p.sifSmera,s.Naziv, p.Godina
        ");
    }

    public static function dohvatiPredmet($sifPredmeta){
        return AudioPredmet::where('sifPredmeta',$sifPredmeta)->first();
    }

    public function dohvatiGodinuNaKojojJePredmet(){
        return DB::select("
          select p.Godina from predmet p 
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

    public function dohvatiKategorije(){
        return DB::select("
           select s.vrsta from snimak s 
           where $this->sifPredmeta = s.sifPredmeta
           group by s.vrsta
        ");
    }

    public function dohvatiSkolskeGodine(){
        return DB::select("
           select s.vrsta, s.GodinaOd, s.GodinaDo from  snimak s 
           where $this->sifPredmeta = s.sifPredmeta
           group by s.vrsta, s.GodinaOd, s.GodinaDo
        ");
    }

    public function dohvatiGrupeCasova($vrsta, $godinaOd, $godinaDo){
        return DB::select("
           select s.brojDvocasa, s.pripadaDvocasu from snimak s 
           where $this->sifPredmeta = s.sifPredmeta
           and '$vrsta' = s.vrsta
           and '$godinaOd' = s.GodinaOd
           and '$godinaDo' = s.GodinaDo
           group by s.brojDvocasa, s.pripadaDvocasu
        ");
    }

    public function dohvatiCasoveISnimke($vrsta, $godinaOd, $godinaDo){
        return DB::select("
           select * from snimak s 
           where $this->sifPredmeta = s.sifPredmeta
           and '$vrsta' = s.vrsta
           and '$godinaOd' = s.GodinaOd
           and '$godinaDo' = s.GodinaDo
        ");
    }
}
