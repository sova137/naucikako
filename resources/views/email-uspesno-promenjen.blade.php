<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/signup.css"  />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <?php header( "refresh:4;url=/settings" ); ?>
</head>
<body>

<div class="container">

    <div class = "col-xs-9 col-xs-offset-1">
        <div href = "#" class = "thumbnail">
            <h1 align="center"> Uspešno ste promenili e-mail adresu!</h1>

            <br>

            <hr style="height:1px;border:none;color:#333;background-color:#333;" width="90%" />
            <h4 align="center">Vaša nova adresa je : {{$newEmail}}</h4>
            <h2 align="center">Bićete automatski redirektovani.</h2>
            <br>

        </div>

    </div>
</div>


</body>

</html>
