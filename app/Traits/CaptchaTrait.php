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
        $secret   = "6Le5GwgUAAAAAGSTxdfalo5f2_Kr5pLv1izHF7lS";

        $recaptcha = new ReCaptcha($secret);
        $resp = $recaptcha->verify($response, $remoteip);
        if ($resp->isSuccess()) {
            return 1;
        } else {
            return 0;
        }

    }
}