<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/15/2016
 * Time: 12:01 PM
 */

    $Naziv = $_GET['n'];

    // Where $db is a instance of PDO

    $sifFakulteta = DB::select("SELECT sifFakulteta FROM Fakultet WHERE Naziv = $Naziv");
    $sifFakulteta= $sifFakulteta->sifFakulteta();

    $smerovi = DB::select("SELECT Naziv FROM Smer WHERE sifFakulteta = $sifFakulteta");
    $naziviSmerova = $smerovi->Naziv();

    $options = "";

    foreach ($naziviSmerova as $nazivSmera) {
        $options .= "<li><a href='#'>$nazivSmera</a></li>";
    }

    $response = array(
        'success' => TRUE,
        'options' => $options
    );

    header('Content-Type: application/json');
    echo json_encode($response);