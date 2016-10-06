<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>@if($key!= null)
                Vas zahtev za pomoc iz predmeta {{$predmet}} je prihvacen.
                <br>
                Kako bi razmenili podatke sa profesorom kliknite na link ispod.
            @else
                Vas zahtev za pomoc iz predmeta {{$predmet}} je odbijen.
            @endif
            </h2>

        <div>
            <p>
                Profesor {{$ime}} {{$prezime}} je @if($key!=null)prihvatio @else odbio @endif vas zahtev za predmet {{$predmet}} na {{$godina}}. godini {{$faks}}-a (smer {{$smer}}).
            </p>
        </div>
        @if($key!= null)
        <div>
            <p>
            <strong>Neophodne informacije, kako bi cas bio sto lakse realizovan, mozete dobiti na sledecoj adresi: </strong>

            <br>
            <a href="http://localhost:8000/request/verify/{{$key}}">http://localhost:8000/request/verify/{{$key}}</a>
            <br>
            </p>
        </div>
        @endif

</body>
</html>