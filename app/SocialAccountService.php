<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Image;
class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
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

               $avatar= $providerUser->getAvatar();
               $filename = time() . '.jpg';


               Image::make($avatar)->resize(140, 140)->save( public_path('uploads/avatars/' . $filename) );
                $user->avatar= $filename;
                $user->save();

            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}