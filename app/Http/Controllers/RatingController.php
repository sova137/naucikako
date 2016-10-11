<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use Auth;
use App\Profesor;
use App\Oceni;
use Illuminate\Support\Str;
use App\Zahtev;
use App\ZahtevBezProfesora;
use App\Predaje;
class RatingController extends Controller
{
    public function posaljiAnketu(){

        $zahtev = json_decode( $_POST['zahtev']);
        $user = Auth::user();

        $confirmation_code = hash_hmac('sha256', Str::random(40), config('app.key'));


        if($zahtev->javni == 0){
            $z = Zahtev::find($zahtev->sifZaht);
        }
        else{
            $z = ZahtevBezProfesora::find($zahtev->sifZaht);
        }

        $profesor = Profesor::odUsera($user);

       $profesor->dodajCas($zahtev->email,$zahtev->sifPredmeta,$zahtev->javni,$z);


        $oceni = Oceni::create([
            'sifProfesora' => $profesor->sifProfesora,
            'sifPredmeta' =>$zahtev->sifPredmeta,
            'email' => $zahtev->email,
            'confirmation_code' => $confirmation_code
        ]);



        $z->ocenjen = 0;
        $z->save();

        $oceni->save();

        $data= [
            'ime' => $user->firstname,
            'prezime' => $user->lastname,
            'faks' =>$zahtev->faks,
            'smer' => $zahtev->sm,
            'godina' => $zahtev->god,
            'predmet' => $zahtev->prd,
            'sifZahteva' => $zahtev->sifZaht,
            'javni' => $zahtev->javni,
            'key' => $confirmation_code,
            'sifOceni' =>$oceni->sifOceni
        ];


        Mail::queue('rating-email', $data, function($msg)  use ($zahtev,$data){
            $msg->to("$zahtev->email")->subject("Anketa za zahtev : " . $data['faks'] . "->" . $data['smer'] .  '->' . $data['godina'] . '->' . $data['predmet']);
        });


        return "Uspesno ste poslali anketu korisniku na mejl. Anketa ce biti dostupna korisniku nakon sat vremena.";
    }


    public function rate(Request $request,$javni,$sifZahteva,$sifOceni, $confirmation_code){

        if( ! $confirmation_code)
        {
            return redirect('/login');
        }

        $oceni = Oceni::whereConfirmationCode($confirmation_code)->first();

        if ( ! $oceni)
        {
            return redirect('/register');
        }

        if( $oceni->confirmed == 1){
            return redirect('/register');
        }

        if(!$javni){
            $zahtev = Zahtev::find($sifZahteva);
        }
        else{
            $zahtev = ZahtevBezProfesora::find($sifZahteva);
        }

        if( $oceni->zvezdiceVecDate($sifOceni) != null){
            $zvezdiceDate = 1;
        }
        else{
            $zvezdiceDate = 0;
        }

        return view('ocenjivanje',compact('oceni', 'zahtev', 'zvezdiceDate','javni'));
    }

    public function zabeleziPreporuku(){

        $oceni = json_decode($_POST['oceni']);
        $zahtev = json_decode( $_POST['zahtev']);
        $javni = $_POST['javni'];

        $oceni = Oceni::find($oceni->sifOceni); // da bi moglo da se sacuva mora ovako da se uzme oceni objekat
        if($javni == 0){

            $zahtev = Zahtev::find($zahtev->sifZahteva);

            $predaje = Predaje::find($zahtev->sifPredaje);

            $predaje->brojPreporuka++;
            $predaje->save();
        }
        $profesor = Profesor::find($oceni->sifProfesora);
        $profesor->brojPreporuka++;
        $profesor->save();

        $oceni->preporucen = 1;
        $oceni->save();
    }

    public function zavrsiAnketu(Request $request){

        $sifOceni = $request->query('sifOceni');
        $javni = $request->query('javni');
        $sifZahteva = $request->query('sifZahteva');
        if( isset($_POST['zvezdice'] )){
            $zvezdice = $_POST['zvezdice'];
        }
        else $zvezdice = - 1;

        $oceni = Oceni::find($sifOceni);

        if($zvezdice != -1){
            $oceni->zvezdice += $zvezdice;
            $profesor = Profesor::find($oceni->sifProfesora);
            $profesor->zvezdice += $zvezdice;
            $profesor->save();
        }


        $oceni->confirmation_code = null;
        $oceni->confirmed = 1;
        $oceni->save();

        if($javni == 0){
            $zahtev = Zahtev::find($sifZahteva);
        }
        else{
            $zahtev = ZahtevBezProfesora::find($sifZahteva);
        }

        $zahtev->ocenjen = 1;
        $zahtev->save();


        return redirect('/');
    }


}
