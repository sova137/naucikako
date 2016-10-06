
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nauci Kako</title>

        <link rel="stylesheet" href="/css/professor-profile.css" />
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
        <script src="/js/star-rating.js" type="text/javascript"></script> <!-- mora poslednje da bi radilo -->


    </head>
    <body>
    <?php include('../resources/views/navbar.blade.php');?>
    <div class="container jumbotron">
        <div class="row">
            </br>
            </br>


            <div id="profilna" class="col-xs-4" align="center">
                <img class="img-responsive img-circle" src="<?php include("phpInclude/searchAvatar.php");?>" alt="Responsive image" >
            </div>

            <div id="name" class="col-xs-8" >
                <?php include("phpInclude/firstAndLastName.php");?>
            </div>
            </br>

            <div id="CV" class="col-xs-4">
                {{$profesor->Opis}}
            </div>

            </br>
            </br>
            <div id="starRating" class="col-xs-4">
                <input class="inp-3" name="input-3" value="<?php include("phpInclude/calculateStarRating.php")?>" class="rating-loading" >
            </div>
            </br>
            </br>
            </br>
            </br>

            </br>
            </br>
            </br>
            </br>
            <div class="col-xs-4 col-xs-offset-4" >
                Predmeti koje drzi profesor :
            </div>

            </br>
            <div id="horizontalScrollBar" class="col-xs-4 col-xs-offset-4" >
                <div class="btn-group" role="group" >
                    @for($i=0;$i<count($predmeti);$i++)
                    <button type="button" class="btn btn-default" href="#" onclick="showSubjectDescription('{{$profesor->sifProfesora}}','{{$predmeti[$i]->sifPredmeta}}')" >{{$predmeti[$i]->Naziv}}</button>
                    @endfor
                </div>
            </div>
            </br>
            </br>
            </br>
            <div id="subjectDescription" class="col-xs-12 col-xs-offset-4 ">

            </div>

            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            <div id="kontaktiraj" class="col-xs-4 col-xs-offset-4">
                <button type="button" class="btn btn-primary btn-block">Kontaktiraj</button>
            </div>
        </div>
    </div>
    <script>

        $(document).ready( function(){
            $('.inp-3').rating({displayOnly: true, step: 0.5});
        });
    </script>
    </body>



    <script src="/js/showSubjectDescription.js"></script>

</html>