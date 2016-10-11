<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Oceni extends Model
{
    protected $table='oceni';
    protected $primaryKey='sifOceni';
    protected $fillable=['sifProfesora', 'sifPredmeta', 'email', 'confirmation_code'];


    public static function whereConfirmationCode($confirmationCode){
        return Oceni::where('confirmation_code',$confirmationCode);
    }

    public function zvezdiceVecDate(){
        $ocene = DB::select("
            select * from oceni
            where sifOceni <> $this->sifOceni
            and email = '$this->email'
            and $this->sifProfesora = sifProfesora
        ");
        if( $ocene != null){
            return 1;
        }
        else return 0;
    }

    public static function isAlreadyRated($zahtev){
        if($zahtev->vecPrihvacenZaPredmetIProfesora() != null){
            return 1;
        }
        else{
            return ($zahtev->proveriZahtev());
        }
    }

}
