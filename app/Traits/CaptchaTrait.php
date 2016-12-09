<?php
/**
 * Created by PhpStorm.
 * User: Nikola
 * Date: 9/30/2016
 * Time: 9:43 PM
 */

namespace App\Traits;

use Input;
use ReCaptcha\ReCaptcha;
use Illuminate\Http\Request;
trait CaptchaTrait
{
    public function captchaCheck()
    {
        $response = $_POST['g-recaptcha-response'];
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = "6LcfqQgUAAAAAM7V0HnxxkdY8VvEYDValOTf5ol5";

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }

 public function captchaRegister($captchaResponse)
    {

        $remoteip = $_SERVER['REMOTE_ADDR'];
        $secret   = "6LcfqQgUAAAAAM7V0HnxxkdY8VvEYDValOTf5ol5";
        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($captchaResponse, $remoteip);
        if ($resp->isSuccess()) {
            return true;
        } else {
            return false;
        }

    }
}
