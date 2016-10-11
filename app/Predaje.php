<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/19/2016
 * Time: 8:51 PM
 */
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
class Predaje extends Model{
    protected $table='predaje'; //
    protected $primaryKey='sifPredaje';
    protected $fillable=['sifProfesora','sifPredmeta','Opis_oglasa'];

    public static function addNewRow($sifProfesora,$sifPredmeta,$Opis_oglasa, $SMScheck)
    {
        $predaje = Predaje::where('sifProfesora', $sifProfesora)->where('sifPredmeta', $sifPredmeta)->first();
        $returnMessage="";

        if (empty ($predaje)) {
            $predaje = Predaje::create([
                'sifProfesora' => $sifProfesora,
                'sifPredmeta' => $sifPredmeta,
                'Opis_oglasa' => $Opis_oglasa
            ]);
            $predaje->SMS = $SMScheck;
            $predaje->save();

            $returnMessage = "<script> alert('Uspešno ste dodali oglas! \\n Možete ga izmeniti u rubrici \"Moji predmeti\"'); </script>";
        }else {
            $returnMessage = "<script> alert('Vaš oglas za ovaj predmet već postoji. \\n Možete ga izmeniti u rubrici \"Moji predmeti\"'); </script>";
        }

        echo $returnMessage;
    }

    public static function deleteRow($sifProfesora, $sifPredmeta)
    {
        Predaje::where('sifProfesora', $sifProfesora)->where('sifPredmeta', $sifPredmeta)->delete();
    }

    public static function updateRow($sifProfesora, $sifPredmeta, $opis,$SMScheck){
        $predaje = Predaje::where('sifProfesora', $sifProfesora)->where('sifPredmeta', $sifPredmeta)->update(array('Opis_oglasa' => $opis,'SMS' => $SMScheck));
    }

    public function getProfesor(){
        return Profesor::where('sifProfesora',$this->sifProfesora)->first();
    }
}