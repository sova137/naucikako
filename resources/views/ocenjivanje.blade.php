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

<div class="container jumbotron">

    <div class="row">
        <div class="col-xs-4 col-xs-offset-5">
            @if($oceni->preporucen == 0)
                <div class=" col-xs-8 col-xs-offset-2">
                    <p><strong>Ukoliko ste zadovoljni preporucite profesora klikom na dugme</strong></p>
                </div>

                <button id="preporuci" type="button" class="btn btn-labeled btn-primary" onclick="preporuci( '{{json_encode($oceni)}}', '{{json_encode($zahtev)}}', '{{$javni}}')">
                <span class="btn-label"><i class="glyphicon glyphicon-thumbs-up" ></i></span> <em>Preporuci</em></button>
            @else
                <p>Vec ste preporucili ovog profesora, mozete popuniti zvezdice i predati konacnu ocenu </p>
                <button id="preporuci" type="button" class="btn btn-labeled btn-primary disabled">
                <span class="btn-label"><i class="glyphicon glyphicon-thumbs-up"></i></span> <em>Preporuci</em></button>
            @endif

        </div>
    </div>
    <br/>
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
        <p> <strong>Vec ste ocenili profesora zvezdicama, mozete ga jos preporuciti za ovaj konkretan predmet. </strong> </p>
        </div>
        <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <button class="btn btn-success btn-block"><strong>Zavrsi anketu</strong></button>
        </div>
        </div>
     @endif
    </form>
</div>
<script src="/js/anketa.js"></script>
</body>

</html>

