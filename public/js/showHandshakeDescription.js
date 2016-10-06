$(document).ready(function () { //Ovo ce se pozivati za handshake
    var profilePicture=$('#profilePicture');
    var name=$('#name');
    var phoneNumber=$('#phoneNumber');
    var mail=$('#mail');

    $.get('/getUserAtts',"sifZahteva=" + sifZahteva, function (data) {

        $.each(data, function(index, element) {
            profilePicture.attr('src','/uploads/avatars/' + element.slika);
            name.append('<strong>' + element.ime + ' ' + element.prezime + '</strong>');
            phoneNumber.append('<strong>' + element.tel + '</strong>');
            mail.append('<strong>' + element.profMejl + '</strong>');
            $(".container").show(); // u pocetku je skriven da se ne bi video ajax kako radi
        });


    });


});
