<?php

namespace App\Http\Controllers;
use App\User;
use App\Zahtev;
use App\Profesor;
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

    public function getUserAttributes(){//Ova metoda ce vracati podatke o korisniku
       $sifZahteva=$_GET['sifZahteva'];
       $zahtev = Zahtev::find($sifZahteva);
       $podaci = $zahtev->dohvatiPodatkeZaMejl();
       return compact('podaci');
    }
}