/**
 * Created by Nikola on 9/27/2016.
 */
$(function() {

    $('.list-group-item').on('click', function() {
        $('.glyphicon', this)
            .toggleClass('glyphicon-chevron-right')
            .toggleClass('glyphicon-chevron-down');
    });

});

// Get the modal
var modal = document.getElementById('dialogInfoKorisnika');

// Get the <span> element that closes the modal
var span = document.getElementById('close-podaci-korisnika');

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

function openContactInfo($userEmail,$userTelephone) {
    modal.style.display='block';

    $("#korisnikov-email").val($userEmail);
    $("#korisnikov-tel").val($userTelephone);

}