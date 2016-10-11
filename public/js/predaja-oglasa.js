
$(document).on('click', '#predaja-fakultet a',function(){

    $that = $(this);
    //uklanja sve prethodno selektovane
    $that.parent().find('a').removeClass('active');
    $that.addClass('active');

    $.get('getDepartmentList',"faks=" + $(this).text(), function (data) {



        var model = $('#predaja-smer');
        model.empty();

        $('#predaja-godina').empty();
        $('#predaja-predmet').empty();

        hideButtonAndKorak2();


        $.each(data, function(index, element) {
            model.append("<a href='#' class=\"list-group-item smer\" >" + element.Naziv + "</a>");
        });

    });
    $("#fakultet-text-input").val($(this).text());
});

$(document).on('click', '#predaja-smer a',function(){

    $that = $(this);
    //uklanja sve prethodno selektovane
    $that.parent().find('a').removeClass('active');
    $that.addClass('active');

    var faculty = document.getElementsByClassName("list-group-item fax active");
    $(this).addClass('active');

    $.get('getYearList',"faks=" + faculty[0].innerHTML + "&smer=" + $(this).text() ,function (data) {

        var model = $('#predaja-godina');
        model.empty();

        $('#predaja-predmet').empty();

        hideButtonAndKorak2();

        $.each(data, function(index, element) {
            switch(element.Godina) {
                case 1:   model.append("<a href='#' class=\"list-group-item godina\" >" + "I" + "</a>");   break;
                case 2:   model.append("<a href='#' class=\"list-group-item godina\" >" + "II" + "</a>");   break;
                case 3:   model.append("<a href='#' class=\"list-group-item godina\" >" + "III" + "</a>");  break;
                case 4:   model.append("<a href='#' class=\"list-group-item godina\" >" + "IV" + "</a>");   break;
            }
        });
    });

    $("#smer-text-input").val($(this).text());
});

$(document).on('click', '#predaja-godina a',function(){
    $that = $(this);
    //uklanja sve prethodno selektovane
    $that.parent().find('a').removeClass('active');
    $that.addClass('active');

    var faculty = document.getElementsByClassName("list-group-item fax active");
    var department = document.getElementsByClassName("list-group-item smer active");
    $(this).addClass('active');

    $.get('getSubjectList',"faks=" + faculty[0].innerHTML + "&smer=" + department[0].innerHTML  + "&godina=" + $(this).text(),function (data) {

        var model = $('#predaja-predmet');
        model.empty();

        hideButtonAndKorak2();


        //model.append("<a href='#' class=\"list-group-item predmet\" ><input type=\"text\" placeholder=\"Search..\" id=\"predaja-input-search\" onkeyup=\"filterFunction()\"></a>");

        $.each(data, function(index, element) {
            model.append("<a href='#' class=\"list-group-item predmet\" >" + element.Naziv + "</a>");
        });

    });

    $("#godina-text-input").val($(this).text());

});

$(document).on('click', '#predaja-predmet a', function(){

    $that = $(this);
    //uklanja sve prethodno selektovane
    $that.parent().find('a').removeClass('active');
    $that.addClass('active');


    $(this).addClass('active');
    hideButtonAndKorak2();
    var model = $('#predaja-dalje-btn');
    model.empty();
    document.getElementById("korak2").style.display='unset';

    model.append("<a href='#korak2' class=\"list-group-item btn-danger\" align=\"center\" >" + 'Dalje' + "</a>");

    $("#predmet-text-input").val($(this).text());

});

function hideButtonAndKorak2(){

    $('#predaja-dalje-btn').empty(); //dok se ne izaberu sve 4 stavke brise dugme za DALJE
    document.getElementById("korak2").style.display='none';
}


