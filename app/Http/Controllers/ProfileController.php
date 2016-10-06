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
    public function addNewSubject(Request $request)
    {


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

        $user = Auth::user();
        $profesor = Profesor::odUsera($user);

        $predmet = Predmet::saNazivom($nazivPredmeta, $smer, $godinaArapski);

        Predaje::addNewRow($profesor->sifProfesora, $predmet->sifPredmeta, $opis);

        return view('predaja-oglasa');
    }

    public function deleteSubject(){
        $sifProfesora = Profesor::odUsera(Auth::user())->sifProfesora;
        $sifPredmeta = $_GET['predmet'];

        Predaje::deleteRow( $sifProfesora,$sifPredmeta);
    }

    public function updateSubjectInfo(){
        $sifProfesora = Profesor::odUsera(Auth::user())->sifProfesora;
        $sifPredmeta = $_GET['predmet'];
        $opis = $_GET['opis'];
        Predaje::updateRow( $sifProfesora,$sifPredmeta,$opis);
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

    public function updateSettings(){

        $telefon = $_POST['telefon'];
        $newpass = $_POST['newpass'];
        $confnewpass = $_POST['confnewpass'];


        if(strlen($telefon) >= 9 && strlen($telefon) <=10 && $telefon[0] == 0 && $telefon[1] == 6 && ( in_array($telefon[2], array(0,1,2,3,4,5,6,9)))){
            $phoneflag = 0;
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


        if($phoneflag == 0 && $passflag == 0) {
            $profesor = Profesor::odUsera(Auth::user());
            $profesor->telefon = $telefon;
            $profesor->save();

            if($newpass!='') {
                Auth::user()->password = bcrypt($newpass);
                Auth::user()->save();
            }
            return "Promene su uspesno izvrsene";
        }
        else if($phoneflag == -1){
            return "Promene nisu izvrsene. Broj telefona nije validan.";
        }
        else if($passflag == -1){
            return "Promene nisu izvrsene. Passwordi se ne podudaraju";
        }
    }

}