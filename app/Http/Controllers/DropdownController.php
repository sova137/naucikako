<?php

namespace App\Http\Controllers;
use App\Fakultet;
use App\Smer;
use App\Predmet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

//find() -> find a model with its primary key

class DropdownController extends Controller
{
   public function smerovi(){
       $nazivFaksa = $_GET['faks'];
       $fakultet = Fakultet::saNazivom($nazivFaksa);

       //ovo zove fakultet->smerovi() odnosno hasMany tamo
       $smerovi = $fakultet->smerovi; // nemoj slucajno smerovi() sa ovim zagradama! u hasMany namesti parametre!!!!
       return $smerovi;
   } //

    public function godine(){
        $nazivFaksa = $_GET['faks'];
        $nazivSmera = $_GET['smer'];


        $smer = Smer::saNazivom($nazivSmera,$nazivFaksa);
        $godine = $smer->godine(); // vraca kolekciju
    //get() vraca kolekciju koja mora da bude povratna vrednost
        return $godine;
    }

    public function predmeti(){
        $nazivFaksa = $_GET['faks'];
        $nazivSmera = $_GET['smer'];
        $godina = $_GET['godina'];

        $smer = Smer::saNazivom($nazivSmera,$nazivFaksa);

        switch($godina){
            case "I":   $godinaArapski=1;   break;
            case "II":  $godinaArapski=2;   break;
            case "III": $godinaArapski=3;   break;
            case "IV":  $godinaArapski=4;   break;
        }

        $predmeti = $smer->predmeti($godinaArapski); // vraca kolekciju

        return $predmeti;
    }

}
