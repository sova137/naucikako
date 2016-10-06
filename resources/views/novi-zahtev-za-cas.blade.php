<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>
    Pristigao Vam je novi zahtev za pomoc.
</h2>
    <p>
        Od Vas se trazi pomoc na predmetu {{$predmet}} na {{$godina}}. godini {{$faks}}-a (smer {{$smer}}).
    </p>
    <div>
        <p>
            <strong>Zahtev koji Vam je upravo pristigao mozete videti na adresi: </strong>

            <br>
            {{ URL::to('/home') }}
            <br>
        </p>
    </div>

</body>
</html>