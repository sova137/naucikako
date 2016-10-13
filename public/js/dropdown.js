/**
 * Created by Nikola on 9/13/2016.
 * Edited by Milan on 9/14/2016.
 */

$(document).on('click', '#FAKULTET li a',function(){
    $("#pretrazi").attr('disabled','disabled');
    $("#year").attr('disabled','disabled');
    $("#subject").attr('disabled','disabled');
    $("#department").removeAttr('disabled');

    //meni dobija naziv izabrane stavke
    $(this).parents(".dropdown").children(".btn").html('<strong>' + $(this).text() + '</strong>'+' <span class="caret"></span>');

    $.get('getDepartmentList',"faks=" + $(this).text(), function (data) {
        var model = $('#lista-smerova');
        model.empty();

        $.each(data, function(index, element) {
            model.append("<li><a href='#'>" + element.Naziv + "</a></li>");
        });

    });


});

$(document).on('click', '#SMER li a', function(){
    $("#pretrazi").attr('disabled','disabled');
    $("#subject").attr('disabled','disabled');
    $("#year").removeAttr('disabled');


    //meni dobija naziv izabrane stavke
    $(this).parents(".dropdown").children(".btn").html('<strong>' + $(this).text() + '</strong>' + ' <span class="caret"></span>');

    $.get('getYearList',"faks=" + $("#faculty").text() + "&smer=" + $(this).text() ,function (data) {

        var model = $('#lista-godina');
        model.empty();

        $.each(data, function(index, element) {
            switch(element.Godina) {
                case 1:   model.append("<li><a href='#'>" + "I" + "</a></li>");   break;
                case 2:   model.append("<li><a href='#'>" + "II" + "</a></li>");   break;
                case 3:   model.append("<li><a href='#'>" + "III" + "</a></li>");  break;
                case 4:   model.append("<li><a href='#'>" + "IV" + "</a></li>");   break;
            }
        });
    });
});

$(document).on('click', '#GODINA li a', function() {
    $("#pretrazi").attr('disabled','disabled');
    $("#subject").removeAttr('disabled');
    //meni dobija naziv izabrane stavke
    $(this).parents(".dropdown").children(".btn").html('<strong>' + $(this).text() + '</strong>' + ' <span class="caret"></span>');

    $.get('getSubjectList',"faks=" + $("#faculty").text() + "&smer=" + $("#department").text()  + "&godina=" + $(this).text(),function (data) {

        var model = $('#lista-predmeta');
        model.empty();

        model.append("<li><a href='#' ><input type=\"text\" placeholder=\"Search..\" id=\"myInput\" onkeyup=\"filterFunction()\"></a></li>");

        $.each(data, function(index, element) {
            model.append("<li><a href='#'>" + element.Naziv + "</a></li>");
        });

    });


});

$(document).on('click', '#PREDMET li a', function(){
    $("#pretrazi").attr('disabled','disabled');
    //meni dobija naziv izabrane stavke
    if("#PREDMET:selected")$(this).parents(".dropdown").children(".btn").html('<strong>' + $(this).text() + '</strong>'+' <span class="caret"></span>');

    if($(this).text() != '')$("#pretrazi").removeAttr('disabled');
});