<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>@if($key!= null)
                Vaš zahtev za pomoć iz predmeta {{$predmet}} je prihvaćen.
                <br>
                Kako biste razmenili podatke sa predavačem kliknite na link ispod.
            @else
                Vaš zahtev za pomoć iz predmeta {{$predmet}} je odbijen.
            @endif
            </h2>

        <div>
            <p>
                Predavač {{$ime}} {{$prezime}} je @if($key!=null)prihvatio @else odbio @endif vaš zahtev za predmet {{$predmet}} na {{$godina}}. godini {{$faks}}-a (smer {{$smer}}).
            </p>
        </div>
        @if($key!= null)
        <div>
            <p>
            <strong>Neophodne informacije, možete dobiti na sledećoj adresi: </strong>

            <br>
            <a href="{{URL::to('/request/verify/public')}}/{{$key}}">{{URL::to('/request/verify/public')}}/{{$key}}</a>
            <br>
            </p>
        </div>
        @endif

</body>
</html>
