<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profesor;
use phpDocumentor\Reflection\Types\Array_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showRequests(){
        $profesor=Profesor::odUsera(Auth::user());
        $zahtevi = $profesor->pristigliZahtevi();

        return view('home',compact('zahtevi'));
    }
}
