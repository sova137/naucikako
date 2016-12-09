/**
 * Created by Nikola on 9/21/2016.
 */

$('#file').change( function(event) {
    $("#potvrdi").removeClass('disabled');
    $('#potvrdi').attr('type','Submit');
    $("#avatar-prev").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
});

