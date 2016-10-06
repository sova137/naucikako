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

    $Naziv = $_GET['choice'];

    $sifSmerova = DB::select("SELECT sifSmera FROM smer WHERE Naziv = '$Naziv'");

    foreach($sifSmerova as $sifSmera){
        $godine = DB::select("SELECT Godina FROM predmet WHERE sifSmera = $sifSmera->sifSmera GROUP BY Godina");
        foreach($godine as $godina){
          switch($godina->Godina){
            case '1':   echo "<li><a href='#'>I</a></li>";   break;
            case '2':   echo "<li><a href='#'>II</a></li>";   break;
            case '3':   echo "<li><a href='#'>III</a></li>";   break;
            case '4':   echo "<li><a href='#'>IV</a></li>";   break;
          }
       }
  }

