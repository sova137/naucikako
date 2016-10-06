<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/16/2016
 * Time: 12:09 AM
 */
require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$NazivSmera = $_GET['smer'];
$Godina = $_GET['godina'];

$godinaArapski=0;

switch($Godina){
    case "I": $godinaArapski=1;break;
    case "II": $godinaArapski=2;break;
    case "III": $godinaArapski=3;break;
    case "IV": $godinaArapski=4;break;
}

$sifSmerova = DB::select("SELECT sifSmera FROM smer WHERE Naziv = '$NazivSmera'");

echo "<li><a href='#' ><input type=\"text\" placeholder=\"Search..\" id=\"myInput\" onkeyup=\"filterFunction()\"></a></li>";

foreach($sifSmerova as $sifSmera){
    $predmeti = DB::select("select Naziv FROM predmet WHERE sifSmera = $sifSmera->sifSmera AND Godina = $godinaArapski");
    foreach($predmeti as $predmet){
        echo "<li><a href='#'>$predmet->Naziv</a></li>";
    }
}
