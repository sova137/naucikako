/**
 * Created by Nikola on 9/30/2016.
 */



$(document).on('click', '#promeni',function() {

    //AJAX POST RADI SAMO UZ TOKEN KOJI MORA BITI U HEADER FAJLU
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $.post('updateSettings', "&telefon=" + $("#telefon").val() + "&newpass=" + $("#newpass").val() + "&confnewpass=" + $("#confnewpass").val() ,function(data){
        alert(data);
    });

});