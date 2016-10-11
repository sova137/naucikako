<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/login.css"  />
    <link rel="stylesheet" href="css/bootstrap-social.css" />
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
<?php include('../resources/views/navbar.blade.php');?>
<div class="container">


    <div class="col-xs-12 col-md-4 col-md-offset-4">

        <div class="account-wall">

            <div class="row">
                <div class="col-xs-12">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                         alt="">
                </div>
            </div>

            <div class="row" id="social">
                <div class="col-xs-12">
                    <a href="redirect" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Sign in with Facebook
                    </a>
                </div>
            </div>

            <div class="row" id="social">
                <div class="col-xs-12">
                    <a class="btn btn-block btn-social btn-google">
                        <span><i class="fa fa-google-plus" aria-hidden="true"></i></span> Sign in with Google
                    </a>
                </div>
            </div>

            <div class="row" id="social">
                <div class="col-xs-12">
                    <a class="btn btn-block btn-social btn-instagram">
                        <span class="fa fa-instagram"></span> Sign in with Instagram
                    </a>
                </div>
            </div>

            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email')  }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">
                            Prijavi se</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-xs-offset-1">
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Zapamti me
                        </label>
                    </div>
                    <div class="col-xs-7">
                        <a href="password/reset" class="new-account" align="right">Zaboravili ste lozinku?</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="register" class="new-account" align="center">Kreiraj novi nalog</a>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>

</body>
</html>