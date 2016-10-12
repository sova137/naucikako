
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/signup.css"  />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


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
                    <div class="col-xs-12">

                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Registruj se
                            </button>

                    </div>
                </div>


            </form>
            <br/>

            <div class="row">
                <div class="col-xs-6 col-xs-offset-3"  >
                    <img src="naucikako-logo.png" style="width:100%; height:50%"/>
                </div>
            </div>
            <br/>
        </div>


</div>

</body>

</html>