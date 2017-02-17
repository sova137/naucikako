<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 15-Feb-17
 * Time: 02:28
 */
/* kod php-a ne treba escape za navodnike */
$grupeCasova = DB::select("
           select s.brojDvocasa, s.pripadaDvocasu from snimak s 
           where $sifPredmeta = s.sifPredmeta
           and '$prvaVrsta' = s.vrsta
           and '$prvaGodinaOd' = s.GodinaOd
           and '$prvaGodinaDo' = s.GodinaDo
           group by s.brojDvocasa, s.pripadaDvocasu
        ");

$snimci = DB::select("
           select * from snimak s 
           where $sifPredmeta = s.sifPredmeta
           and '$prvaVrsta' = s.vrsta
           and '$prvaGodinaOd' = s.GodinaOd
           and '$prvaGodinaDo' = s.GodinaDo
        ");

for ($i = 0; $i < count($grupeCasova); $i++) {
    $dvocasTrocas = '';
    if($snimci[$i]->pripadaDvocasu == true){
        $dvocasTrocas = 'dvocas';
    }
    else{
        $dvocasTrocas = 'trocas';
    }
    $first = '<div class="list-group" id="' . $prvaVrsta . '-' . $prvaGodinaOd . '-' . $prvaGodinaDo . '-audio-lectures">'
        . '<a href="#' . $grupeCasova[$i]->brojDvocasa . '-' . $prvaVrsta . '-' . $prvaGodinaOd . '-' . $prvaGodinaDo . '-week-audio-lectures" class="list-group-item" data-toggle="collapse" style="padding-left:3em"><i class="glyphicon glyphicon-chevron-right"></i>'
        .  $grupeCasova[$i]->brojDvocasa . '. ' . $dvocasTrocas
        . '</a>' .
        '<div class="list-group collapse" id="' . $grupeCasova[$i]->brojDvocasa . '-' . $prvaVrsta . '-' . $prvaGodinaOd . '-' . $prvaGodinaDo . '-week-audio-lectures" style="padding-left:5em">'
        . '<br/>';

    $second = '';


    for ($j = 0; $j < count($snimci); $j++){
        if ($snimci[$j]->brojDvocasa == $grupeCasova[$i]->brojDvocasa) {
            $second .= '<li><a href=/audio/' . $nazivSmera . '/' . $godinaPredmeta . '/' . $nazivPredmeta . '/' . $prvaVrsta . '/' . $prvaGodinaOd . '-' . $prvaGodinaDo . '/' . $grupeCasova[$i]->brojDvocasa . '-' . $dvocasTrocas . '/' .  $snimci[$j]->cas . '?id=' . $snimci[$j]->sifSnimka . '>' . $snimci[$j]->cas . '.cas</a></li>';
        }
    }

    $third = '</div>' . '</div>';

    $result = $first . $second . $third;

    echo $result;
}