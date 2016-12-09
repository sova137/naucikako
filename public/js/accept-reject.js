/**
 * Created by Nikola on 9/30/2016.
 */
function prihvatiOnClick($sifZahteva){

    //AJAX POST RADI SAMO UZ TOKEN KOJI MORA BITI U HEADER FAJLU
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('acceptRequest',"sifZahteva=" + $sifZahteva, function(data){
        alert(data+ "\n");
        $("#sifZahteva-"+$sifZahteva).remove();

    }).fail(function(xhr,govno,error){
        alert(xhr.status);
    });

}

function odbaciOnClick($sifZahteva){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('rejectRequest',"sifZahteva=" + $sifZahteva, function(data){

        alert(data);
        $("#sifZahteva-"+$sifZahteva).remove();
    });
}

function prihvatiJavniZahtev($sifZahteva){

    //AJAX POST RADI SAMO UZ TOKEN KOJI MORA BITI U HEADER FAJLU
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/acceptPublicRequest',"sifZahteva=" + $sifZahteva, function(data){
        alert(data+ "\n");
        $("#sifZahteva-"+$sifZahteva).remove();

    }).fail(function(xhr,govno,error){
        alert(xhr.status);
    });

}