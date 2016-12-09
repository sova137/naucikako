<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/signup.css"  />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{URL::asset("/js/showHandshakeDescription.js")}}"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="/js/star-rating.js" type="text/javascript"></script>

    <title>Nauči kako</title>

    <link rel="icon" href="/naucikako-logo.ico"/>
</head>

<body>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<div class="container"  style="background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">
    <br>
    <div class="thumbnail"  style="border-radius: 10px;">
    <div class="row">
        <div class="col-xs-12">
            </br>
            </br>
            @if($oceni->preporucen == 0)

                <h2 align="center">Ukoliko ste zadovoljni preporučite predavača klikom na dugme</h2>
                </br>
                <button id="preporuci" type="button" class="btn btn-labeled btn-primary col-xs-4 col-xs-offset-4" onclick="preporuci( '{{json_encode($oceni)}}', '{{json_encode($zahtev)}}', '{{$javni}}')">
                <span class="btn-label"><i class="glyphicon glyphicon-thumbs-up" ></i></span> <em>Preporuči</em></button>
            @else

                <h3 align="center">Već ste preporučili ovog predavača, možete popuniti zvezdice i predati konačnu ocenu </h3>
                </br>
                <button id="preporuci"  type="button" class="btn btn-labeled btn-primary disabled col-xs-4 col-xs-offset-4">
                <span class="btn-label"><i class="glyphicon glyphicon-thumbs-up" ></i></span> <em>Preporuči</em></button>
            @endif

        </div>
    </div>
    <br/>

    <hr style="height:1px;border:none;color:#333;background-color:#333;" width="90%" />

        <form action="/zavrsiAnketu?sifOceni={{$oceni->sifOceni}}&sifZahteva={{$zahtev->sifZahteva}}&javni={{$javni}}" method="post">
            {{csrf_field()}}
            @if(!$zvezdiceDate)
    <div class="row">
        <div class="col-xs-8 col-xs-offset-3">
            <input id="input-7-lg" name="zvezdice" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="0.5" data-size="lg"><hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <button class="btn btn-success btn-block"><strong>Predaj ocenu</strong></button>
        </div>
    </div>
     @else
            <div class="row">
                <div class="col-xs-12">
                    <h3 align="center">Već ste ocenili predavača zvezdicama, možete ga još preporučiti za ovaj konkretan predmet. </h3>


                    <br>
                    <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <button class="btn btn-success btn-block"><strong>Završi anketu</strong></button>
                    </div>
                </div>
            </div>
        </div>
     @endif
        </form>
     </br>
    </div>

</div>
<script src="/js/anketa.js"></script>
</body>

</html>

