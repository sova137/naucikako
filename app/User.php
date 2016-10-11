<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function nijeVerifikovan($credentials){

        $user = User::where('email',$credentials['email'])->first();

        if($user != null){
            if(Hash::check($credentials['password'],$user->password)) {
                return true;
            }
        }
        return false;
    }

    public static function dohvatiUseraSaEmailom($email){
        return User::where('email',$email)->first();
    }
    public static function getUser($userId){  //Ova metoda vraca user-a sa zadatim userId-em i poziva se iz profesor.php
        return User::where('id',$userId)->first();
    }

    public static function whereConfirmationCode($confirmation_code){
        return User::where('email_change_code', $confirmation_code)->first();
    }

    public static function postojiVecMejl($email,$user){
        if(User::where('id','<>',$user->id)->where('email',$email)->first() != null){
            return 1;
        }
        else return 0;
    }
}
