<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>
    Potvrda o promeni zvanicnog email-a koji cete koristiti na nasem sajtu.
</h2>

<div>
    <p>
        Vi ({{$ime}} {{$prezime}}) ste poslali zahtev o promeni mejla i mozete ga potvrditi ukoliko zelite da se od sad prijavljujete i dobijate informacije na ovoj e-mail adresi.
    </p>
    <p>
        Vasa stara e-mail adresa je {{$oldEmail}}, a potvrdom cete je promeniti u {{$newEmail}}, tj. adresu sa koje citate ovu poruku.
    </p>
</div>
    <div>
        <p>
            <strong>Potvrdite da zelite da adresa na kojoj ste primili ovu poruku bude e-mail adresa koju cete zvanicno koristiti na nasem sajtu, klikom na link ispod: </strong>

            <br>
            <a href="{{URL::to('/promena-mejla/potvrdi')}}/{{$newEmail}}/{{$key}}">{{URL::to('/promena-mejla/potvrdi')}}/{{$newEmail}}/{{$key}}</a>
            <br>
        </p>
    </div>
</body>
</html>
