<h1>Hvala na registraciji!</h1><br/><br/>
Kliknite na link ispod kako biste verifikovali Vaš nalog:<br/> <a href="{{ $link = "http://naucikako.com/email-verification/check/$user->verification_token" . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
