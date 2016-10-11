<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/22/2016
 * Time: 1:52 AM
 */

if($profesor->brojCasova > 0) {
    $odnos = $profesor->zvezdice / $profesor->brojKlijenata;
    echo round(2*$odnos)/2;
}
else{
    echo 0;
}