<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/22/2016
 * Time: 12:13 AM
 */

$user = Auth::user();

if($user != null) echo "../uploads/avatars/$user->avatar";