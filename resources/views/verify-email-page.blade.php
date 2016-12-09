<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/signup.css"  />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>

</head>
<body>
<?php include('../resources/views/navbar.blade.php');?>

<div class="container">
    <div class = "col-xs-9 col-xs-offset-1">
        <div href = "#" class = "thumbnail">
            <h1 align="center">Verifikacija naloga</h1>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" width="90%" />

                    <h4 align="center"><strong>Da biste nastavili dalje morate verifikovati svoj nalog!</strong></h4>
                    <br>
                    <h4 align="center">Upravo vam je poslat email sa link-om za potvrdu. </h4>

                    <h4 align="center">Još uvek niste primili email? <a href="#" onclick="resendEmail({{$user_id}})">Ponovi slanje email-a </a></h4>
            <br>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" width="90%"/>
            <h3 align="center">Hvala na registraciji!</h3>
            <br>

            </div>

        </div>
        </div>

    </div>

</body>
<script src="/js/resendEmail.js"></script>
</html>