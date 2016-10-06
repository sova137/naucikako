<?php



$fakulteti = DB::select('select Naziv from fakultet');

foreach($fakulteti as $faks){
    $naziv = $faks->Naziv;
    echo "<li><a href='#'>$naziv</a></li>";
}





