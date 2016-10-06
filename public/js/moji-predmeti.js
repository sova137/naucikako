/**
 * Created by Nikola on 9/30/2016.
 */
    function deleteSubjectOffer($sifPredmeta){
        $.get('obrisi-oglas',"predmet=" + $sifPredmeta,function(){
            location.reload();
        }).fail(function () {
            alert('Neuspesno!');
        });
    }

function updateSubjectOffer($sifPredmeta,$opisOglasa){
    $.get('azuriraj-oglas',"predmet=" + $sifPredmeta + "&opis=" + $opisOglasa,function(){
        location.reload();
    }).fail(function () {
        alert('Neuspesno!');
    });
}