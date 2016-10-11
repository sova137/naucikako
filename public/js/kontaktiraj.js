/**
 * Created by Nikola on 9/30/2016.
 */
    // Get the modal
var modal = document.getElementById('myModal');


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function kontaktirajOnClick($imeProfesora, $sifPredaje) {


    modal.style.display = "block";

    document.getElementById('kontaktiraj-header222').innerHTML = 'KONTAKTIRAJ PROFESORA : '  +$imeProfesora;
    $("#sifProfesora-text-input-contact").val($imeProfesora);

    //resetovanje komponenti i recaptche
    $("#req-desc").val('');
    $("#senders-email").val('');
    $("#senders-tel").val('06');
    grecaptcha.reset();

    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");

        // If first entry with this name
        if (pair[0] === "faks") {
            $("#fakultet-text-input-contact").val(decodeURIComponent(pair[1]));
            // If second entry with this name
        } else if (pair[0] === "smer") {
            $("#smer-text-input-contact").val(decodeURIComponent(pair[1]));
            // If third or later entry with this name
        } else if (pair[0] === "godina") {
            $rimski='I';
            switch (pair[1]){
                case '2': $rimski='II';
                case '3': $rimski='III';
                case '4': $rimski='IV';
            }
            $("#godina-text-input-contact").val($rimski);
        }
        else{
            $("#predmet-text-input-contact").val(decodeURIComponent(pair[1]));
        }
    }

    //zovi predajZahtev za konkretnu sifPredaje
    document.getElementById("predaj-zahtev").onclick = function() {
        predajZahtevOnClick($sifPredaje);

    };

}

function predajZahtevOnClick($sifPredaje){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/sendRequest',"sifPredaje=" + $sifPredaje + "&email=" + $("#senders-email").val() + "&tel=" + $("#senders-tel").val() + "&opis=" + $("#req-desc").val() + "&g-recaptcha-response=" + grecaptcha.getResponse() ,function(data){
        modal.style.display = "none";
        alert(data);
    });
}



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}