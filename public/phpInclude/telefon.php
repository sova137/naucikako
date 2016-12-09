<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 1:44 PM
 */

$profesor = \App\Profesor::odUsera(Auth::user());
if($profesor->telefon != null){
    echo $profesor->telefon;
}
else echo "06";