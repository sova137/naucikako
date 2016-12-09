<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/23/2016
 * Time: 7:16 PM
 */
//$profesor nam je argument view-a

$user = DB::select("select avatar from users where id=$profesor->user_id")[0];

echo "../uploads/avatars/$user->avatar";