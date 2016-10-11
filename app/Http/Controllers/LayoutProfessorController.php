<?php

namespace App\Http\Controllers;
use App\User;
use App\Zahtev;
use App\Profesor;
use App\ZahtevBezProfesora;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LayoutProfessorController extends Controller
{
    public function showView(Request $request,$id){ //Poziva se iz ROUTES-a
        $sifraProfesora=$id;
        $profesor=Profesor::find($sifraProfesora);
        $predmeti=$profesor->getSubjectList();
        return view("layout-professor-profile",compact('profesor','predmeti'));
    }
    public function getSubjectList(){
        return DB::select(
            "select pred.*
             from predaje pre,predmet pred
             where $this->sifProfesora=pre.sifProfesora and pre.sifPredmeta=pred.sifPredmeta"
        );
    }
    public function showDescription(){ //Vraca opis oglasa predmeta
        $sifProfesora=$_GET['sifProfesora'];
        $sifPredmeta=$_GET['sifPredmeta'];
        $profesor=Profesor::find($sifProfesora);
        $jobDescription=$profesor->getJobDescription($sifPredmeta);
        return $jobDescription->Opis_oglasa;
    }

    //u slucaju da je javni zahtev treba pristupiti drugoj tabeli
    public function getUserAttributes(){//Ova metoda ce vracati podatke o korisniku
        $javniZahtev = $_GET['javniZahtev'];
       $sifZahteva=$_GET['sifZahteva'];

       if(!$javniZahtev) {
           $zahtev = Zahtev::find($sifZahteva);
       }
       else{
           $zahtev = ZahtevBezProfesora::find($sifZahteva);
       }
       $podaci = $zahtev->dohvatiPodatkeZaMejl();
       return compact('podaci');
    }


}