<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/21/2016
 * Time: 2:28 PM
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use File;
use App\Profesor;
use App\Smer;
use App\Predmet;
use App\Predaje;
use Mail;
use Illuminate\Support\Str;
use App\User;
class ProfileController
{
    public function updateAvatar(Request $request){

        // Handle the user upload of avatar

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            $user =  Auth::user();

            $newAvatarPath = 'uploads/avatars/' . $filename;
            $oldAvatarPath = 'uploads/avatars/' . $user->avatar;

            Image::make($avatar)->resize(140, 140)->save( public_path( $newAvatarPath) );

            if($user->avatar != 'default-avatar.png' && File::exists($oldAvatarPath)) File::delete($oldAvatarPath);

            $user->avatar = "$filename";
            $user->save(); // obavezno mora, ali mora da postoji kolona updated_at i da se podesi primarykey atribut u modelu
        }

        return view('profile-settings');
    }

    public function showProfile(Request $request,$id){

    }

    public function showSettings(){
        $user =  Auth::user();
        $profesor = Profesor::odUsera($user);
        return view('profile-settings',compact('profesor'));
    }
    public function addNewSubject(Request $request)
    {
        $telefon = $request->input('telefon');
        $user = Auth::user();
        $profesor = Profesor::odUsera($user);

        if(isset($telefon)) {
            if (strlen($telefon) >= 9 && strlen($telefon) <= 10 && $telefon[0] == 0 && $telefon[1] == 6 && (in_array($telefon[2], array(0, 1, 2, 3, 4, 5, 6, 9)))) {
                for ($i = 2; $i < strlen($telefon); $i++) {
                    if (!(is_numeric($telefon[$i]))) {
                        $returnMessage = "<script> alert('Oglas nije dodat! \\n Morate uneti validan broj telefona pri predaji prvog oglasa ili ga izmeniti u podesavanjima profila'); </script>";
                        echo $returnMessage;
                        return view('predaja-oglasa');
                    }
                }
            } else {
                $returnMessage = "<script> alert('Oglas nije dodat! \\n Morate uneti validan broj telefona pri predaji prvog oglasa ili ga izmeniti u podesavanjima profila'); </script>";
                echo $returnMessage;
                return view('predaja-oglasa');
            }

            $profesor->telefon = $telefon;
            $profesor->save();
        }

        $SMScheck = $request->input('SMScheck');

        if(isset($SMScheck)) $SMScheck = 1;
        else $SMScheck = 0;

        $nazivFaksa = $request->input('fakultet-text-input');

        $nazivSmera = $request->input('smer-text-input');
        $smer = Smer::saNazivom($nazivSmera,$nazivFaksa);

        $godina = $request->input('godina-text-input');

        switch($godina){
            case "I": $godinaArapski=1; break;
            case "II": $godinaArapski=2; break;
            case "III": $godinaArapski=3; break;
            case "IV": $godinaArapski=4; break;
        }

        $nazivPredmeta = $request->input('predmet-text-input');

        $opis = $request->input('opis-text-input');

        $profesor = Profesor::odUsera($user);

        $predmet = Predmet::saNazivom($nazivPredmeta, $smer, $godinaArapski);

        Predaje::addNewRow($profesor->sifProfesora, $predmet->sifPredmeta, $opis,$SMScheck);

        return view('predaja-oglasa');
    }

    public function deleteSubject(){
        $sifProfesora = Profesor::odUsera(Auth::user())->sifProfesora;
        $sifPredmeta = $_POST['predmet'];

        Predaje::deleteRow( $sifProfesora,$sifPredmeta);
    }

    public function updateSubjectInfo(){
        $sifProfesora = Profesor::odUsera(Auth::user())->sifProfesora;
        $sifPredmeta = $_POST['predmet'];
        $opis = $_POST['opis'];

        $SMScheck = $_POST['SMScheck'];

        Predaje::updateRow( $sifProfesora,$sifPredmeta,$opis,$SMScheck);
    }

    public function showMySubjects(){
        $profesor = Profesor::odUsera(Auth::user());
        $predmeti = $profesor->getFullSubjects();

        $smerovi[]=[];
        $faksevi[]=[];

        if(count($predmeti) == 0)return view('moji-predmeti',compact('predmeti','smerovi','faksevi'));

        $i = 1;
        $j = 1;
        $faks = $predmeti[0]->f;
        $smer = $predmeti[0]->s;

        $faksevi[0] =  array("f" => $faks);
        $smerovi[0] = array("f" => $faks, "s" =>$smer);

        foreach($predmeti as $predmet){
            if($predmet->f == $faks && $predmet->s == $smer){
                continue;
            }
            else if($predmet->f == $faks){
                $smerovi[$i] = array("f" => $faks ,"s" => $predmet->s);
                $i = $i + 1;
                $smer = $predmet->s;
            }
            else {
                $smerovi[$i] = array("f" => $predmet->f,"s" =>  $predmet->s);
                $faksevi[$j] = array("f" => $predmet->f);
                $i = $i + 1;
                $j = $j + 1;
                $faks=$predmet->f;
                $smer = $predmet->s;
            }
        }

        return view('moji-predmeti',compact('predmeti','smerovi','faksevi'));
    }

    public function napraviProfesora(Request $request){
        $email = $request->query('email');
        Profesor::addNewRow($email);
        return view('successfully-registered-page');
    }

    private function sendConfirmationForNewEmail($user,$email){
        $confirmation_code = hash_hmac('sha256', Str::random(40), config('app.key'));
        $data = [
          'oldEmail' => $user->email,
          'newEmail' => $email,
          'ime' =>$user->firstname,
          'prezime' => $user->lastname,
          'key' => $confirmation_code
        ];

        $user->email_change_code = $confirmation_code;
        $user->save();

        Mail::queue('emailChange', $data , function($msg) use ($email) {
                $msg->to("$email")->subject("Zahtev za promenu email-a");
        });
    }

    private function emailZadovoljava($email){
        return !User::postojiVecMejl($email,Auth::user());
    }

    public function updateSettings(){

        $telefon = $_POST['telefon'];
        $newpass = $_POST['newpass'];
        $confnewpass = $_POST['confnewpass'];
        $email = $_POST['email'];
        $opis = $_POST['opis'];

        $emailString = ""; // za poruke oko promene e-maila

        if($email == '' || (strpos($email,'@') == false)){
            $emailflag = -1;
        }else{
            if(!($this->emailZadovoljava($email))){
                $emailString = "Vec postoji nalog sa e-mail adresom koju ste zeleli da postavite.";
                $emailflag = -1; // ako neko vec ima mejl u koji zelim oda promenimo
            }
            else $emailflag = 0;
        }

        if($opis == ''){
            $opisflag = -1;
        } else $opisflag = 0;

        if(strlen($telefon) >= 9 && strlen($telefon) <=10 && $telefon[0] == 0 && $telefon[1] == 6 && ( in_array($telefon[2], array(0,1,2,3,4,5,6,9)))){
            $phoneflag = 0;
            for($i = 2; $i < strlen($telefon); $i++){
                if(!(is_numeric($telefon[$i]))){
                    $phoneflag = -1;
                    break;
                }
            }
        }
        else{
            $phoneflag = -1;
        }

        if($newpass == $confnewpass){
            $passflag = 0;
        }
        else{
            $passflag = -1;
        }


        if($phoneflag == 0 && $passflag == 0 && $emailflag == 0 && $opisflag == 0) {
            $user = Auth::user();

            if($user->email != $email) {
                $this->sendConfirmationForNewEmail($user, $email);
                $emailString = "Promenu email-a morate potvrditi na novom mejlu koji ste naveli da zelite da koristite.";
            }




            $profesor = Profesor::odUsera($user);
            $profesor->telefon = $telefon;
            $profesor->Opis = $opis;
            $profesor->save();

            if($newpass!='') {
                $user->password = bcrypt($newpass);
                $user->save();
            }
            return "Promene su uspesno izvrsene. " . $emailString;
        }
        else if($phoneflag == -1){
            return "Promene nisu izvrsene. Broj telefona nije validan.";
        }
        else if($passflag == -1){
            return "Promene nisu izvrsene. Passwordi se ne podudaraju";
        }
        else if($emailflag == -1){
            return "Email je nevalidan. Zahtev nije ispunjen. " . $emailString;
        }
        else if($opisflag == -1){
            return "Opis ne sme biti prazan. Zahtev nije ispunjen.";
        }


    }


    public function validProfileSettings(){
        $user = Auth::user();
        $profesor = Profesor::odUsera($user);
        $data = [
            'email' => $user->email,
            'telefon' => $profesor->telefon,
            'opis' => $profesor->Opis
        ];
        return $data;
    }
}