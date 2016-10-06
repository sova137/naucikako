Click here to verify your account: <a href="{{ $link = "http://localhost:8000/email-verification/check/$user->verification_token" . '?email=' . urlencode($user->email) }}">{{ $link }}</a>
