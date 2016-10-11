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
            return redirect('/login');
        }

        $zahtev = Zahtev::whereConfirmationCode($confirmation_code)->first();

        if ( ! $zahtev)
        {
            return redirect('/register');
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
            return redirect('/login');
        }

        $zahtev = ZahtevBezProfesora::whereConfirmationCode($confirmation_code)->first(); // jedina izmena
        if ( ! $zahtev)
        {
            return redirect('/register');
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
            return redirect('/login');
        }

        $user = User::whereConfirmationCode($confirmation_code); // jedina izmena
        if ( ! $user)
        {
            return redirect('/register');
        }

        $user->email_change_code = null;
        $user->email = $newEmail;
        $user->save();

        return view('email-uspesno-promenjen', compact('newEmail'));
    }


}