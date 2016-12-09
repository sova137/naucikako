<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 11:28 PM
 */

namespace App\Http\Controllers;


use App\Zahtev;
use App\ZahtevBezProfesora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
class ConfirmationController extends Controller
{
    public function confirm($confirmation_code)
    {

        if( ! $confirmation_code)
        {
            return view('neuspesna-verifikacija-zahteva');
        }

        $zahtev = Zahtev::whereConfirmationCode($confirmation_code)->first();

        if ( ! $zahtev)
        {
             return view('neuspesna-verifikacija-zahteva');
        }

       if($zahtev->confirmed == 0){
           $zahtev->confirmed = 1;
           //dodati mejl
       }

        $zahtev->save();
        $javniZahtev = 0;
        return view('layout-handshake-professor-profile',compact('zahtev', 'javniZahtev'));
    }

    public function confirmPublicRequest($confirmation_code){
        if( ! $confirmation_code)
        {
                       return view('neuspesna-verifikacija-zahteva');
        }

        $zahtev = ZahtevBezProfesora::whereConfirmationCode($confirmation_code)->first(); // jedina izmena
        if ( ! $zahtev)
        {
                      return view('neuspesna-verifikacija-zahteva');
        }
        $zahtev->confirmed = 1;
        $zahtev->confirmation_code = null;
        $zahtev->save();
        $javniZahtev = 1;
        return view('layout-handshake-professor-profile',compact('zahtev','javniZahtev'));
    }

    public function confirmNewEmail(Request $request,$newEmail,$confirmation_code){
        if( ! $confirmation_code)
        {
            return view('neuspesno-promenjen-email');
        }

        $user = User::whereConfirmationCode($confirmation_code); // jedina izmena
        if ( ! $user)
        {
          return view('neuspesno-promenjen-email');
        }

        $user->email_change_code = null;
        $user->email = $newEmail;
        $user->save();

        return view('email-uspesno-promenjen', compact('newEmail'));
    }


}
