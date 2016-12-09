<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Smer;
use App\Predmet;
use App\Profesor;

class SearchController extends Controller
{
    public function search(Request $request){
        $nazivFaksa = $request->query('faks');
        $nazivSmera = $request->query('smer');
        $godina = $request->query('godina');
        $nazivPredmeta = $request->query('predmet');

        $smer=Smer::saNazivom($nazivSmera,$nazivFaksa);

        $predmet = Predmet::saNazivom($nazivPredmeta,$smer,$godina);
        $sifPredmeta = $predmet->sifPredmeta;
        $profesori = Profesor::predajuSortirano($predmet);
	//dodata 4 argumenta da bi dropdown bio selectovan nakon searcha
        return view('search_results',compact('profesori','sifPredmeta','nazivFaksa','nazivSmera','godina','nazivPredmeta')); // ova druga stvar u compactu je zbog zahteva koji nemaju profesora
    }


}
