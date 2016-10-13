<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 4:42 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use DB;
class Zahtev extends Model
{
    protected $table='zahtev';//
    protected $primaryKey='sifZahteva';
    protected $fillable=['email','sifPredaje','telefon','Opis_zahteva','ip','Godina'];

    public static function whereConfirmationCode($confirmationCode){
        return Zahtev::where('confirmation_code',$confirmationCode);
    }

    public function dohvatiPodatkeZaMejl(){
        return DB::select("
            select f.Naziv as faks,s.Naziv as sm, prd.Naziv as pred,prd.Godina as god, u.firstname as ime, u.lastname as prezime, u.email as profMejl,pro.telefon as tel,u.avatar as slika
            from zahtev z, fakultet f, smer s, predmet prd, profesor pro, predaje pre,users u
            where z.sifPredaje = pre.sifPredaje
            and z.sifZahteva = $this->sifZahteva
            and pre.sifProfesora = pro.sifProfesora
            and pre.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and u.id = pro.user_id
        ")[0];
    }



    public function getPredaje(){
        return Predaje::where('sifPredaje',$this->sifPredaje)->first();
    }

    public function vecPrihvacenZaPredmetIProfesora()
    {
        return Zahtev::where('prihvacen', 1)->where('sifPredaje', $this->sifPredaje)->where('email', $this->email)->where('sifZahteva','<>',$this->sifZahteva)->first();
    }

    public function proveriZahtev(){
        $predaje = Predaje::select('sifPredmeta','sifProfesora')->where('sifPredaje',$this->sifPredaje)->first();

        if( ZahtevBezProfesora::where('sifProfesora',$predaje->sifProfesora)->where('sifPredmeta',$predaje->sifPredmeta)->where('email', $this->email)->first() != null){
            return 1;
        }
        else return 0;
    }
}