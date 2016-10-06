<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 10/5/2016
 * Time: 12:26 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use DB;
class ZahtevBezProfesora extends Model
{
    protected $table='zahtev_bez_profesora';
    protected $primaryKey='sifZahteva';
    protected $fillable = ['email','telefon','Opis_zahteva','ip','sifPredmeta'];

    public static function sviZahtevi(){

        return DB::select("
            select f.Naziv as faks , s.Naziv as sm, prd.Godina as god, prd.Naziv as prd, z.*
            from zahtev_bez_profesora z, fakultet f, smer s,predmet prd
            where z.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and z.prihvacen = 0 
            order by z.created_at DESC
        ");

    }

    public function dohvatiPodatkeZaMejl(){
        return DB::select("
            select f.Naziv as faks,s.Naziv as sm, prd.Naziv as pred,prd.Godina as god, u.firstname as ime, u.lastname as prezime, u.email as profMejl,pro.telefon as tel,u.avatar as slika
            from zahtev_bez_profesora z, fakultet f, smer s, predmet prd, profesor pro, users u
            where z.sifZahteva = $this->sifZahteva
            and z.sifProfesora = pro.sifProfesora
            and z.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and u.id = pro.user_id
        ")[0];
    }
}