/**
 * Created by Nikola on 9/30/2016.
 */
    function deleteSubjectOffer($sifPredmeta){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.post('obrisi-oglas',"predmet=" + $sifPredmeta,function(){
            location.reload();
        }).fail(function () {
            alert('Neuspesno!');
        });
    }

function updateSubjectOffer($sifPredmeta,$opisOglasa,$sifPredaje){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var SMScheck = 0;
    var id = "SMScheck-" + $sifPredaje;
    if( document.getElementById(id).checked == true) SMScheck = 1;

    $.post('/azuriraj-oglas',"predmet=" + $sifPredmeta + "&opis=" + $opisOglasa + "&SMScheck=" + SMScheck ,function(data){
        alert("Promene su uspesno izvrsene");
        location.reload();
    }).fail(function () {
        alert('Neuspesno!');
    });

}