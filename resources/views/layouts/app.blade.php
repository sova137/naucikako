<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/home-layout.css" rel="stylesheet">

    <title>Nauči Kako</title>
	<link rel="icon" href="/naucikako-logo.ico"/>
    <!-- Styles -->

    <link href="/css/collapsableList.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">


    <!-- Scripts -->

    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
	
                <a class="navbar-brand" style="margin-top: 2%; font-size:1.5em;" href="/">
                    {{ 'NAUČI KAKO' }}
                </a>
		@if(!Auth::guest())	
                <a class="navbar-brand" style=" font-size:1.5em;" href="/home">
                   <i class="glyphicon glyphicon-user"></i>
                </a>
		@endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li style="margin-top:5px;"><a style="font-weight:bold;"  href="{{ url('/login') }}">Prijava</a></li>
                        <li style="margin-top:5px;"><a style="font-weight:bold;" href="{{ url('/register') }}">Registracija</a></li>
                    @else
        <li>
                        <a class="patka" href="predaja-oglasa"><div class="btn btn-danger btn3d" id="predajOglasZaPredmet"><b>Predaj oglas za predmet</b></div></a>
                    </li>
            
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle patka" id="mini-profile" data-toggle="dropdown" role="button" aria-expanded="false">
                                 <img id="mini-avatar" class="img-circle" width="35px" height="35px" src="<?php include('phpInclude/printAvatar.php')?>" alt="av" />
                                <span style="font-weight:bold">{{ Auth::user()->firstname }}</span> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/home">Početna stranica</a>
                                </li>

                                <li>
                                    <a href="/moji-predmeti">Moji predmeti</a>

                                </li>
                                <li>
                                    <a href="/prihvaceni-zahtevi">Prihvaćeni zahtevi</a>

                                </li>
                                <li>
                                    <a href="/odbijeni-zahtevi">Odbijeni zahtevi</a>
                                </li>
                                <li>
                                    <a href="/javni-zahtevi">Javni zahtevi</a>
                                </li>
                                <li>
                                    <a href="/settings">Podešavanje naloga</a>

                                </li>
 <li>
                                <a href="/profile/<?php echo \App\Profesor::odUsera(Auth::user())->sifProfesora; ?>">Moj profil</a>

                            </li>

                                <li>
                                    <a href="/help">Pomoć</a>

                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>

<?php include('../resources/views/footer.blade.php');?>	
</body>
</html>
