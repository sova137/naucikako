<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 11:28 PM
 */

namespace App\Http\Controllers;


use App\Zahtev;
use Illuminate\Support\Facades\Redirect;
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

       $zahtev->confirmed = 1;
       $zahtev->confirmation_code = null;
       $zahtev->save();

        return view('layout-handshake-professor-profile',compact('zahtev'));
    }


}