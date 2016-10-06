<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/css/signup.css"  />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="{{URL::asset("/js/showHandshakeDescription.js")}}"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <style>
        .container {
            display: none;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        var sifZahteva = '{{$zahtev->sifZahteva}}'
    </script>
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
        <div id="profilePic" class = "col-xs-3">
            <img id="profilePicture" class="img-responsive img-circle" src="" alt="Responsive image" />

        </div>
        <div id="name" class = "col-xs-3">
            </br>
            </br>
            </br>
        </div>
        <div id="phoneNumber" class = "col-xs-3">
            </br>
            </br>
            </br>
        </div>
        <div id="mail" class = "col-xs-3">
            </br>
            </br>
            </br>
        </div>
        </div>

        <div class="row">

        </div>
    </div>

</body>

</html>