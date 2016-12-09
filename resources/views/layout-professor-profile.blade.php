
@extends('main-parent-layout')


<link rel="stylesheet" href="/css/professor-profile.css" />


    @section('content')


    <div class="container jumbotron" id="prof-info">

        <div class = "col-xs-12">
            <div href = "#" class = "thumbnail" >
                <span class="close" id="close-dugme">×</span>

        <div class="row">
            </br>
            </br>

            <div id="profilna" class="col-md-3" align="center">
                <img id="avatar-prev" src="<?php include("phpInclude/searchAvatar.php");?>" alt="140x140" class="avatar img-circle" width="140px" height="140px">
            </div>

            <!-- profile info -->
            <div class="col-md-9 col-md-offset-0 personal-info">
                <div class="row">
                    <div id="name" class="col-xs-8" >
                        <h2 align="center"><strong><?php include("phpInclude/firstAndLastName.php");?></strong></h2>
                    </div>
                    </br>
                </div>
                <div class="row">
                    <div id="CV" class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                        <h5> <strong>Nešto o predavaču: </strong></h5>{{$profesor->Opis}}
                    </div>

                </div>



                </br>
                <div class="row">
                    <div class="col-xs-12" >
                        <strong>Svi predmeti koje drži predavač : </strong>
                    </div>

                    <div id="horizontalScrollBar" class="col-xs-12 col-md-6 " >
                        <div class="btn-group" role="group" >
                         @for($i=0;$i<count($predmeti);$i++)
                                <button type="button" class="btn btn-default" href="#" onclick="showSubjectDescription('{{$profesor->sifProfesora}}','{{$predmeti[$i]->sifPredmeta}}')" >{{$predmeti[$i]->Naziv}}</button>
                            @endfor
                        </div>
                    </div>

			
                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-1 col-xmd-4">
	<br/>                        
<textarea rows="5"  id="subjectDescription" class="form-control" placeholder="Opis predmeta.." readonly></textarea>
                    </div>
                </div>

                </br>
                <div class="row">
                    <div class="col-xs-12 col-md-3" >
                        <strong> Šta drugi misle o predavaču: </strong>
                    </div>
                    <div id="starRating" class="col-xs-12 col-md-4">
                        <input class="inp-3" name="input-3" value="<?php include("phpInclude/calculateStarRating.php")?>" class="rating-loading" >
                    </div>
                    </br>
                    </br>
                    </br>
                    <div class="row">
                     <div  class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-3">
                        <button type="button" class="btn btn-labeled btn-success no-click" style=".no-click{pointer-events: none;}">
                         <i class="glyphicon glyphicon-thumbs-up" ></i> <strong>{{$profesor->brojPreporuka}}</strong> <em>Preporuka</em></button>
                    </div>
                    </div>
                    </br>
                    </br>
                </div>


            </div>
        </div>
    </div>
            </div>
    </div>

    <script>

        $(document).ready( function(){
            $('.inp-3').rating({displayOnly: true, step: 0.5});
        });

        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            window.history.back();
        }

        var modal = document.getElementsByTagName('body')[0];
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {

            if (event.target == modal) {
                window.history.back();
            }
        }
    </script>

    <script src="/js/showSubjectDescription.js"></script>
    <script src="/js/star-rating.js" type="text/javascript"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css/search.css"  />



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />



    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
    <script src="/js/star-rating.js" type="text/javascript"></script>

    @endsection