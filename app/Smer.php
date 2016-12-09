<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Predmet;
class Smer extends Model
{
   protected $table = 'smer'; //
    protected $primaryKey='sifSmera';

    public static function saNazivom($nazivSmera,$nazivFaksa){
        $fakultet = Fakultet::saNazivom($nazivFaksa);
        return Smer::where('Naziv', $nazivSmera)->where('sifFakulteta',$fakultet->sifFakulteta)->first();
    }
    public function godine(){
        return Predmet::select('Godina')->where('sifSmera',($this)->sifSmera)->groupby('Godina')->get();
    }

    //vraca kolekciju
    public function predmeti($godinaArapski){
        return Predmet::where('sifSmera',($this)->sifSmera)->where('Godina',$godinaArapski)->get();
    }
}


