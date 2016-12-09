<html lang="en">

<head>
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">


    <link rel="stylesheet" href="/css/signup.css"  />
 <link rel="stylesheet" href="css/bootstrap-social.css" />

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Nauči kako</title>

    <link rel="icon" href="/naucikako-logo.ico"/>

</head>
<body>
<?php include('../resources/views/navbar.blade.php');?>

<div class="container">

        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">

            <legend><i class="glyphicon glyphicon-globe"></i></a> Registracija </legend>


            <form action="{{ url('/register') }}" method="post" class="form" role="form">

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-xs-6 col-md-6">
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

                            <input id="firstname" class="form-control" name="firstname" placeholder="Ime" type="text"
                                   required />
                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6">
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">

                            <input id="lastname" class="form-control" name="lastname"  placeholder="Prezime" type="text" required />
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                   <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" class="form-control" name="email" placeholder="Email" type="email" />
                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input class="form-control" name="password" placeholder="Lozinka" type="password" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                </div>
                <!-- <label>Broj telefona</label> <input class="form-control" name="phonenumber" placeholder="+381 06" type="phone number" value="+381 06" /> -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Potvrdi lozinku" required autofocus>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
<div class="row">
 <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            
                            <div class="col-xs-10 col-md-12">
                                <div class="g-recaptcha" data-theme="dark" data-sitekey="6LcfqQgUAAAAABUXxWlHrxibMomVSmhJwD0IRkZ8" style="overflow:hidden;transform:scale(1.18);-webkit-transform:scale(1.18);transform-origin:0 0;-webkit-transform-origin:0 0;"></div> 
                                @if ($errors->has('g-recaptcha-response'))
				<br/>                               
     				<span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
</div>
<br/>
                <div class="row">
                    <div class="col-xs-12">

                            <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color:rgb(0, 0, 115); font-size:1.4em;opacity:0.93; ">
                                Registruj se
                            </button>

                    </div>
                </div>


            </form>

              <br/>
      <div class="row">
                <div class="col-xs-6  col-xs-offset-3"  >
                    <img src="naucikako-logo.png" style="width:100%; height:140px;"/>
                </div>
            </div>

		<br/>


	 <div class="row" id="social" style="margin-bottom:5px;">
                <div class="col-xs-12">
                    <a href="redirect/facebook" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Sign in with Facebook
                    </a>
                </div>
            </div>

            <div class="row" id="social">
                <div class="col-xs-12">
                    <a href="redirect/google" class="btn btn-block btn-social btn-google">
                        <span><i style="margin-top:5px;"  class="fa fa-google" aria-hidden="true"></i></span> Sign in with Google
                    </a>
                </div>
            </div>

</div>

</div>
 <script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>
