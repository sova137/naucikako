<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/19/2016
 * Time: 8:46 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profesor extends Model{
    protected $table='profesor';
    protected $primaryKey='sifProfesora';
    protected $fillable=['user_id'];
    public static function predajuSortirano($predmet){
        return DB::select(
            "select pro.*,pre.sifPredaje,pre.Opis_oglasa 
              from profesor pro, predaje pre
               where pro.sifProfesora=pre.sifProfesora and pre.sifPredmeta = $predmet->sifPredmeta
               order by brojPreporuka / ( pro.brojCasova*1.0) DESC"
        );
    }

    public static function odUsera($user){
        return Profesor::where('user_id',$user->id)->first();
    }


    public  function getFullSubjects()
    {
        $sifProfesora = ($this)->sifProfesora;
        return DB::select(
            "select f.Naziv as f,s.Naziv as s,prd.Naziv as p,pre.Opis_oglasa as o,pre.sifPredmeta as sifPredm
              from predmet prd, predaje pre, smer s, fakultet f
               where prd.sifPredmeta=pre.sifPredmeta 
               and s.sifSmera = prd.sifSmera
               and s.sifFakulteta = f.sifFakulteta
               and pre.sifProfesora = $sifProfesora
               order by f,s,p,o,sifPredm"
        );

    }

    public static function addNewRow($email){
        $user = User::dohvatiUseraSaEmailom($email);
        $profesor = Profesor::create([
            'user_id' => $user->id
        ]);
        $profesor->save();
    }


    //kad uporedjujes sa NULL mora IS, a ne jednako
    public function pristigliZahtevi(){
        return DB::select("
            select f.Naziv as faks , s.Naziv as sm, prd.Godina as god, prd.Naziv as prd, z.*
            from zahtev z, predaje pre, fakultet f, smer s,predmet prd
            where z.sifPredaje = pre.sifPredaje
            and pre.sifProfesora = $this->sifProfesora
            and pre.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and z.prihvacen IS NULL 
            order by z.created_at DESC
        ");
    }

    public function prihvaceniZahtevi(){
        return DB::select("
            select f.Naziv as faks , s.Naziv as sm, prd.Godina as god, prd.Naziv as prd, z.*
            from zahtev z, predaje pre, fakultet f, smer s,predmet prd
            where z.sifPredaje = pre.sifPredaje
            and pre.sifProfesora = $this->sifProfesora
            and pre.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and z.prihvacen = 1
            order by z.confirmed, z.created_at DESC
        ");
    }

    public function odbijeniZahtevi(){
        return DB::select("
            select f.Naziv as faks , s.Naziv as sm, prd.Godina as god, prd.Naziv as prd, z.*
            from zahtev z, predaje pre, fakultet f, smer s,predmet prd
            where z.sifPredaje = pre.sifPredaje
            and pre.sifProfesora = $this->sifProfesora
            and pre.sifPredmeta = prd.sifPredmeta
            and prd.sifSmera = s.sifSmera
            and s.sifFakulteta = f.sifFakulteta
            and z.prihvacen = 0
            order by z.created_at DESC
        ");
    }
    public function getSubjectList(){
        return DB::select(
            "select pred.*
             from predaje pre,predmet pred
             where $this->sifProfesora=pre.sifProfesora and pre.sifPredmeta=pred.sifPredmeta"
        );
    }
    public function getJobDescription($sifPredmeta){
        return Predaje::select('Opis_oglasa')->where('sifProfesora',($this)->sifProfesora)->where('sifPredmeta',$sifPredmeta)->first();
    }
}