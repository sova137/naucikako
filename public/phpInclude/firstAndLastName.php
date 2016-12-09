<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/21/2016
 * Time: 9:46 PM
 */

//parametri view-a se mogu automatski i ovde koristiti

$user = DB::select("select firstname,lastname from users where id=$profesor->user_id")[0];

echo "$user->firstname $user->lastname";


