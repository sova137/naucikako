<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 6:52 PM
 */
switch($zahtev->god){
    case 1 : $godinaRimski = 'I'; break;
    case 2 : $godinaRimski = 'II'; break;
    case 3 : $godinaRimski = 'III'; break;
    case 4 : $godinaRimski = 'IV'; break;
}

echo $godinaRimski;