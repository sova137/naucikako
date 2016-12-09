
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/signup.css"  />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>


<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-lg-offset-4">
            <legend><i class="glyphicon glyphicon-globe"></i></a> Registruj se!</legend>
            <form action="{{ url('/register') }}" method="post" class="form" role="form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                        <div class="col-xs-6 col-md-6">
                            <input id="firstname" class="form-control" name="firstname" placeholder="Ime" type="text"
                                   required autofocus />
                            @if ($errors->has('firstname'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                        <div class="col-xs-6 col-md-6">
                            <input id="lastname" class="form-control" name="lastname"  placeholder="Prezime" type="text" required />
                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" class="form-control" name="email" placeholder="Email" type="email" />
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- <label>Broj telefona</label> <input class="form-control" name="phonenumber" placeholder="+381 06" type="phone number" value="+381 06" /> -->
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password"required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br />
                <br />
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Registruj se
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

</body>

</html>