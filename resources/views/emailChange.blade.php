<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>
    Potvrda o promeni zvaničnog email-a koji ćete koristiti na našem sajtu.
</h2>

<div>
    <p>
        Vi ({{$ime}} {{$prezime}}) ste poslali zahtev o promeni email-a i možete ga potvrditi ukoliko želite da se od sad prijavljujete i dobijate informacije na ovaj e-mail adresi.
    </p>
    <p>
        Vaša stara e-mail adresa je {{$oldEmail}}, a potvrdom ćete je promeniti u {{$newEmail}}, tj. adresu sa koje čitate ovu poruku.
    </p>
</div>
    <div>
        <p>
            <strong>Potvrdite da želite da adresa na kojoj ste primili ovu poruku bude e-mail adresa koju ćete zvanično koristiti na našem sajtu, klikom na link ispod: </strong>

            <br>
            <a href="{{URL::to('/promena-mejla/potvrdi')}}/{{$newEmail}}/{{$key}}">{{URL::to('/promena-mejla/potvrdi')}}/{{$newEmail}}/{{$key}}</a>
            <br>
        </p>
    </div>
</body>
</html>
