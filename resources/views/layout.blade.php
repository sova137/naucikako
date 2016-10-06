<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nauci Kako</title>

    <link rel="stylesheet" href="/css/search.css"  />

    <link rel="stylesheet" href="css/bootstrap-social.css" />
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">


    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />



    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script src="/js/star-rating.js" type="text/javascript"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
<?php include('../resources/views/navbar.blade.php');?>

<header class = "container">
    <h1 class="page-title">NAUCI KAKO</h1>

    <div id="SEARCH-HEADER" class="container">
        <div class="row">
            <div class="col-xs-3">
                <div id="FAKULTET" class="dropdown">
                    <button id="faculty" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Fakultet
                        <span class="caret"></span></button>
                    <ul id="lista-fakulteta" class="dropdown-menu">
                        <?php include('phpInclude/fakulteti.php');?>
                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="SMER" class="dropdown">
                    <button id="department" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown">Smer
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-smerova">

                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="GODINA" class="dropdown">
                    <button id="year" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown">Godina
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-godina">

                    </ul>
                </div>

            </div>



            <div class="col-xs-3">

                <div id="PREDMET" class="dropdown">
                    <button id="subject" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown">Predmet
                        <span class="caret"></span></button>
                    <ul id="lista-predmeta" class="dropdown-menu">

                    </ul>
                </div>

             </div>

        </div>

        <div class="row">

            <div class="col-xs-4 col-xs-offset-4">

                <div class="btn btn-danger disabled" id="pretrazi">
                    Pretraži    <img src="http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-md.png" height="25" width="25"/>
                </div>

            </div>

        </div>



    </div>

    <script src="/js/dropdown.js"></script>
    <script src="/js/search.js"></script>
</header>


<section class="container">
    @yield('search_results')
    @yield('make_contact')
</section>


</body>
<?php include('../resources/views/footer.blade.php');?>
</html>
