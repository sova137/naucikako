<?php

namespace App;
use Laravel\Socialite\Contracts\Provider as Provider; // ubaci ovo
use Image;
use App\Profesor;
class SocialAccountService
{
public function createOrGetUser(Provider $provider) // ovo zameni
 {

	 $providerUser = $provider->user(); // i ove dve linije stavi
	 $providerName = class_basename($provider);
         $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();
	if($account == null){
	   $account = User::where('email',$providerUser->getEmail())->first();
	   if($account){
		 $account->verified = 1;
		 $account->save();
		 return $account;
	   }		
	}
        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $space = ' ';
                $first_and_lastname = $providerUser->getName();
                $pos = strpos($first_and_lastname, $space);
                $len = strlen($first_and_lastname);
                $first_name = substr($first_and_lastname, 0, -($len - $pos));
                $last_name = substr($first_and_lastname, -($len - $pos));
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'firstname' => $first_name,
                    'lastname' => $last_name,
                ]);
		$user->verified = 1;

               $avatar= $providerUser->getAvatar();
               $filename = time() . '.jpg';

		
               Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename) );
                $user->avatar= $filename;
                $user->save();
		Profesor::addNewRow($providerUser->getEmail());
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
