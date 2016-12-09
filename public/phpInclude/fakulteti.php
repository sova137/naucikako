<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/14/2016
 * Time: 11:36 PM
 */

use Illuminate\Database\Connection;

$fakulteti = DB::select('select Naziv from fakultet');

foreach($fakulteti as $faks){
    $naziv = $faks->Naziv;
    echo "<li><a href='#'>$naziv</a></li>";
}





