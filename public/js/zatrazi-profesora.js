var main = function(){
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");

        // If first entry with this name
        if (pair[0] === "faks") {
            $("#fakultet-text-input-potreban-zahtev").val(decodeURIComponent(pair[1]));
            // If second entry with this name
        } else if (pair[0] === "smer") {
            $("#smer-text-input-potreban-zahtev").val(decodeURIComponent(pair[1]));
            // If third or later entry with this name
        } else if (pair[0] === "godina") {
            $rimski='I';
            switch (pair[1]){
                case '2': $rimski='II';
                case '3': $rimski='III';
                case '4': $rimski='IV';
            }
            $("#godina-text-input-potreban-zahtev").val($rimski);
        }
        else{
            $("#predmet-text-input-potreban-zahtev").val(decodeURIComponent(pair[1]));
        }
    }
}

$(document).ready(main);

function sendGenericRequest($sifPredmeta){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/sendGenericRequest', "sifPredmeta=" + $sifPredmeta + "&email=" + $("#senders-email").val() + "&tel=" + $("#senders-tel").val() + "&opis=" + $("#req-desc").val() + "&g-recaptcha-response=" + grecaptcha.getResponse(),function(data){
        alert(data);
    }).fail(function(){
        alert(12);
    });
}