<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Anketa o kvalitetu profesora koji Vam je pomogao</h2>


<div>
    <p>
        Profesor {{$ime}} {{$prezime}} Vam je poslao anketu za predmet {{$predmet}} na {{$godina}}. godini {{$faks}}-a (smer {{$smer}}), kako biste mogli da ocenite koliko ste zadovoljni njegovim radom s Vama.
    </p>
    <p>
        Takodje, mozete preporuciti profesora ostalima.
    </p>
    <div>
        <p>
            <strong>Anketu mozete popuniti na sledecoj adresi: </strong>

            <br>
            <a href="{{URL::to('/zahtev/oceni')}}/{{$javni}}/{{$sifZahteva}}/{{$sifOceni}}/{{$key}}">{{URL::to('/zahtev/oceni')}}/{{$javni}}/{{$sifZahteva}}/{{$sifOceni}}/{{$key}}</a>
            <br>
        </p>
    </div>
</div>

</body>