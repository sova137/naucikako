<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Mail\Mailer;
use App\Traits\CaptchaTrait;
use Illuminate\Http\Request;
use Mail;
use URL;
use App\Zahtev;
use Illuminate\Support\Str;
use App\Profesor;
use Illuminate\Support\Facades\Auth;
use App\Predaje;
use App\ZahtevBezProfesora;
use App\Oceni;
class RequestController extends Controller
{

    use CaptchaTrait;

    public function sendRequest(Request $request){

        $sifPredaje = $_POST['sifPredaje'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $opis = $_POST['opis'];
        $godina = $_POST['godina'];
        $ip = $request->ip();

        if($this->captchaCheck() == false){
           return "Nekorektna recaptcha. Zahtev nije poslat.";
        }
        if($email == '' || strpos($email,'@') == false){
            return "Email je nevalidan. Zahtev nije poslat.";
        }
        if($opis == ''){
            return "Opis ne sme biti prazan. Zahtev nije poslat.";
        }

        if(!(strlen($tel) >= 9 && strlen($tel) <=10 && $tel[0] == 0 && $tel[1] == 6 && ( in_array($tel[2], array(0,1,2,3,4,5,6,9))))){
            $tel = null;
        }
        else{
            for($i = 2; $i < strlen($tel); $i++){
                if(!(is_numeric($tel[$i]))){
                    $tel = null;
                    break;
                }
            }
        }

        $zahtev = Zahtev::create([
            'ip' => $ip,
            'email' => $email,
            'sifPredaje' => $sifPredaje,
            'telefon' => $tel,
            'Opis_zahteva' => $opis,
            'Godina' => $godina
        ]);

        $zahtev->save();
        $podaci = $zahtev->dohvatiPodatkeZaMejl();
        $this->sendAlertMail($podaci,$zahtev);

        return "Uspesno ste predali zahtev za cas. Odgovor ce Vam stici na email(telefon).";
    }

    private function sendAlertMail($podaci,$zahtev){
        $data =
            [
                'predmet' => $podaci->pred,
                'godina' => $podaci->god,
                'smer' => $podaci->sm,
                'faks' => $podaci->faks
            ];
        $profMejl = $podaci->profMejl; //profesorov mejl, njega obavestavamo
        Mail::queue('novi-zahtev-za-cas', $data, function($message) use ($data,$profMejl){ $message->to($profMejl)->
            subject("Zahtev : " . $data['faks'] . "->" . $data['smer'] .  '->' . $data['godina'] . '->' . $data['predmet']);
        });
    }

    private function sendConfirmationMail($podaci, $zahtev, $confirmation_code, $javniZahtev){
        $data =
            [
                'key' => $confirmation_code,
                'predmet' => $podaci->pred,
                'godina' => $podaci->god,
                'smer' => $podaci->sm,
                'faks' => $podaci->faks,
                'ime' => $podaci->ime,
                'prezime' => $podaci->prezime
            ];

        //drugaciji je layout maila za javni i tajni zahtev
        if(!$javniZahtev) {
                Mail::queue('confirmation', $data, function ($message) use ($data, $zahtev) {
                    $message->to("$zahtev->email")->
                    subject("Odgovor na zahtev : " . $data['faks'] . "->" . $data['smer'] . '->' . $data['godina'] . '->' . $data['predmet'] . ' | ' . $data['ime'] . ' ' . $data['prezime']);
                });
        }
        else{
            Mail::queue('confirmation-pub-request', $data, function ($message) use ($data, $zahtev) {
                $message->to($zahtev->email)->
                subject("Odgovor na zahtev : " . $data['faks'] . "->" . $data['smer'] . '->' . $data['godina'] . '->' . $data['predmet'] . ' | ' . $data['ime'] . ' ' . $data['prezime']);
            });
        }
    }



    public function acceptRequest(){
        $sifZahteva = $_POST['sifZahteva'];
        $zahtev = Zahtev::find($sifZahteva);
        $zahtev->prihvacen = 1;
        $confirmation_code = hash_hmac('sha256', Str::random(40), config('app.key'));
        $zahtev->confirmation_code = $confirmation_code;
        $zahtev->confirmed = 0;

        if(Oceni::isAlreadyRated($zahtev) == 1){
            $zahtev->ocenjen = 1;
        }

        $zahtev->save();
        $podaci = $zahtev->dohvatiPodatkeZaMejl();

        //podaci se u view mogu prebaciti samo kao niz, a tamo se koriste direktnim navodjenjem asocijavitnog kljuca, primer : $ime, $prezime..
        ($this)->sendConfirmationMail($podaci,$zahtev, $confirmation_code,0);

        return "Uspesno ste prihvatili zahtev#" . $zahtev->sifZahteva . "      $podaci->faks -> $podaci->sm -> $podaci->god -> $podaci->pred";
    }

    public function rejectRequest(){
        $sifZahteva = $_POST['sifZahteva'];
        $zahtev = Zahtev::find($sifZahteva);
        $zahtev->prihvacen = 0;
        $zahtev->save();
        $podaci = $zahtev->dohvatiPodatkeZaMejl();

        ($this)->sendConfirmationMail($podaci,$zahtev, null , 0);

        return "Uspesno ste odbili zahtev#" . $zahtev->sifZahteva . "      $podaci->faks -> $podaci->sm -> $podaci->god -> $podaci->pred";
    }


    public function acceptedRequests(){
        $profesor=Profesor::odUsera(Auth::user());
        $zahtevi = $profesor->prihvaceniZahtevi();

        return view('prihvaceni-zahtevi',compact('zahtevi'));
    }

    public function RejectedRequests(){
        $profesor = Profesor::odUsera(Auth::user());
        $zahtevi = $profesor->odbijeniZahtevi();

        return view('odbijeni-zahtevi',compact('zahtevi'));
    }

    public function saveGenericRequest(Request $request){

        $sifPredmeta = $_POST['sifPredmeta'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $opis = $_POST['opis'];
        $godina = $_POST['godina'];
        $ip = $request->ip();

        if($this->captchaCheck() == false){
            return "Nekorektna recaptcha. Zahtev nije poslat.";
        }
        if($email == '' || strpos($email,'@') == false){
            return "Email je nevalidan. Zahtev nije poslat.";
        }
        if($opis == ''){
            return "Opis ne sme biti prazan. Zahtev nije poslat.";
        }
        if(!(strlen($tel) >= 9 && strlen($tel) <=10 && $tel[0] == 0 && $tel[1] == 6 && ( in_array($tel[2], array(0,1,2,3,4,5,6,9))))){
            $tel = null; // ako omasi telefon uspesan je zahtev ali u bazi pamtimo null
        }



        $zahtevBezProfesora = ZahtevBezProfesora::create([
            'ip' => $ip,
            'email' => $email,
            'telefon' =>$tel,
            'Opis_zahteva' => $opis,
            'sifPredmeta' => $sifPredmeta,
            'Godina' => $godina
        ]);

        $zahtevBezProfesora->save();


        return "Uspesno ste predali zahtev za pomoc. Ukoliko neki profesor prihvati, bicete obavesteni na mejlu.";
    }

    public function publicRequests(){
        $zahtevi = ZahtevBezProfesora::sviZahtevi();
        return view('javni-zahtevi',compact('zahtevi'));
    }

    //DODATI ZA NITI
    public function acceptPublicRequest(){

        $sifZahteva = $_POST['sifZahteva'];
        $zahtev = ZahtevBezProfesora::find($sifZahteva);
        if($zahtev->prihvacen == 0 )$zahtev->prihvacen = 1;
        else return "Vec je neko drugi prihvatio ovaj zahtev.";

        $user = Auth::user();
        $zahtev->sifProfesora = Profesor::odUsera($user)->sifProfesora;

        $confirmation_code = hash_hmac('sha256', Str::random(40), config('app.key'));
        $zahtev->confirmation_code = $confirmation_code;
        $zahtev->confirmed = 0;

        if(Oceni::isAlreadyRated($zahtev) == 1){
            $zahtev->ocenjen = 1;
        }

        $zahtev->save();

        $podaci = $zahtev->dohvatiPodatkeZaMejl();

        //podaci se u view mogu prebaciti samo kao niz, a tamo se koriste direktnim navodjenjem asocijavitnog kljuca, primer : $ime, $prezime..
        ($this)->sendConfirmationMail($podaci,$zahtev, $confirmation_code, 1);

        return "Uspesno ste prihvatili zahtev#" . $zahtev->sifZahteva . "      $podaci->faks -> $podaci->sm -> $podaci->god -> $podaci->pred";
    }
}
