/**
 * Created by Nikola on 9/30/2016.
 */

function printValidSettings(data){
    $("#email-settings").val(data.email);
    if(data.telefon == null) $("#telefon").val("06");
    else $("#telefon").val(data.telefon);
    $("#newpass").val("");
    $("#confnewpass").val("");
    $("#opis-settings").val(data.opis);
    $("#ime-settings").val(data.ime);
    $("#prezime-settings").val(data.prezime);
}

$(document).on('click', '#promeni',function() {

    //AJAX POST RADI SAMO UZ TOKEN KOJI MORA BITI U HEADER FAJLU
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $("#telefon").val( telephone($("#telefon").val()) );


    $.post('updateSettings', "&telefon=" + $("#telefon").val() + "&email=" + $("#email-settings").val() + "&newpass=" + $("#newpass").val() + "&confnewpass=" + $("#confnewpass").val() +"&opis="+ $("#opis-settings").val() + "&firstname=" + $("#ime-settings").val() + "&lastname=" + $("#prezime-settings").val() ,function(data){
        alert(data);
    });




});

$(document).on('click', '#otkazi',function() {
    $.get('/validProfileSettings' , function(data){
        printValidSettings(data);
    });
});


$(document).on('ready', function(){
    $("html, body").animate({ scrollTop: $('#container-settings').offset().top }, 1000);
});
