<?php

namespace App\Http\Controllers;

use App\AudioPredmet;
use App\Snimak;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AudioController extends Controller
{
    function showAudioSubjects(){
        $audioPredmeti = AudioPredmet::dohvatiAudioPredmete();
        $smerovi = AudioPredmet::dohvatiSmerove();
        $godine = AudioPredmet::dohvatiGodine();
        //dd($audioPredmeti);
        //dd($smerovi);
        //dd($godine);
        return view('audio-layout', compact('audioPredmeti','smerovi', 'godine'));
    }

    function showAudioSubjectMenu(Request $request,$nazivSmera, $godina, $nazivPredmeta){
        $sifPredmeta = $request->query('id');
        $audioPredmet = AudioPredmet::dohvatiPredmet($sifPredmeta);
        $godinaPredmeta = $godina;
        //$godinaPredmeta = $audioPredmet->dohvatiGodinuNaKojojJePredmet()->Godina;
        //$nazivSmera = $audioPredmet->dohvatiNazivSmera()->Naziv;
        $kategorijeSnimaka = $audioPredmet->dohvatiKategorije();
        $skolskeGodine = $audioPredmet->dohvatiSkolskeGodine();
        return view('subject-audio-layout', compact('sifPredmeta','nazivPredmeta','godinaPredmeta', 'nazivSmera','kategorijeSnimaka', 'skolskeGodine'));
    }

    function getYearClasses(){
        $sifPredmeta = $_GET['sifPredmeta'];
        $godinaOd = $_GET['godinaOd'];
        $godinaDo = $_GET['godinaDo'];
        $vrsta = $_GET['vrsta'];
        $audioPredmet = AudioPredmet::dohvatiPredmet($sifPredmeta);
        $grupeCasova = $audioPredmet->dohvatiGrupeCasova($vrsta, $godinaOd, $godinaDo);
        $snimci = $audioPredmet->dohvatiCasoveISnimke($vrsta, $godinaOd, $godinaDo);
        return compact('snimci','grupeCasova');
    }

    function showAudioPlayer(Request $request, $nazivSmera,$godina,$nazivPredmeta, $vrsta, $skolskaGodina, $brojDvocasa, $brojCasa){
        //dd($nazivSmera,$godina,$nazivPredmeta,$vrsta,$skolskaGodina,$brojDvocasa,$brojCasa);
        $sifSnimka = $request->query('id');
        $snimak = Snimak::dohvatiSnimak($sifSnimka);
        return view('audio-player',compact('snimak'));
    }

    function getPlaybackName(Request $request){
        $sifSnimka = $request->query('sifSnimka');
        $snimak = Snimak::dohvatiSnimak($sifSnimka);
        $podaciPredmet = $snimak->dohvatiPodatkeOPredmetu();
        $nazivPredmeta = $podaciPredmet->Naziv;
        if($snimak->pripadaDvocasu == true){
            $dvocasTrocas = 'dvocas';
        }
        else{
            $dvocasTrocas = 'trocas';
        }

        if($snimak->vrsta == 'P'){
            $vrsta = 'Predavanje';
        }
        else if($snimak->vrsta == 'V'){
            $vrsta = 'Vezbe';
        }
        else {
            $vrsta = 'Lab';
        }
        $playbackName = $nazivPredmeta . ' - ' . $vrsta .  ' (' . $snimak->GodinaOd . '-' . $snimak->GodinaDo . '), ' . $snimak->brojDvocasa . '. ' . $dvocasTrocas . ' (cas ' . $snimak->cas . ')';
        return $playbackName;
    }

    function getAudioFile(Request $request){
        $sifSnimka = $request->query('sifSnimka');
        $snimak = Snimak::dohvatiSnimak($sifSnimka);
        $nazivSmera = $snimak->dohvatiNazivSmera()->Naziv;
        $podaciPredmet = $snimak->dohvatiPodatkeOPredmetu();
        $godinaPredmeta = $podaciPredmet->Godina;
        $nazivPredmeta = $podaciPredmet->Naziv;

        if($snimak->pripadaDvocasu == true){
            $dvocasTrocas = 'dvocas';
        }
        else{
            $dvocasTrocas = 'trocas';
        }

        if($snimak->vrsta == 'P'){
            $vrsta = 'Predavanja';
        }
        else if($snimak->vrsta == 'V'){
            $vrsta = 'Vezbe';
        }
        else {
            $vrsta = 'Lab';
        }

        $path = 'Audio predavanja\\' . $nazivSmera . '\\' .  $godinaPredmeta . '. godina' . '\\' . $nazivPredmeta . '\\' . $snimak->GodinaOd . '-' . $snimak->GodinaDo . '\\' . $vrsta . '\\' . $snimak->brojDvocasa . '. ' . $dvocasTrocas . '\\' . $snimak->cas . '.' . $snimak->format;
        $spath = storage_path() . "\\" . $path;
        $abuffer = readfile( $spath  );
        return $abuffer;
    }

}
