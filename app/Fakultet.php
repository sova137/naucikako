<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Collection;
class Fakultet extends Model
{
    protected $table='fakultet';//
    protected $primaryKey='sifFakulteta';
    public function smerovi(){
        return $this->hasMany('App\Smer','sifFakulteta','sifFakulteta');
    }

    public static function saNazivom($nazivFaksa){
        return Fakultet::where('Naziv',$nazivFaksa)->first();
    }

}
