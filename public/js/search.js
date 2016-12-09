function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("lista-predmeta");
    a = div.getElementsByTagName("a");
    for (i = 1; i < a.length; i++) {
        //ide od 1 da bi zanemarilo SEARCH polje
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}

$("#pretrazi").click(function () {

    //moramo da osdsecemo poslednji karakter stringa jer je on razmak izmedju slova i strelice za dropdown
    $faks = $("#faculty").text().substring(0,$("#faculty").text().length-1);
    $smer = $("#department").text().substring(0,$("#department").text().length-1);
    $godina = $("#year").text().substring(0,$("#year").text().length-1);
    $predmet = $("#subject").text().substring(0,$("#subject").text().length-1);

    switch($godina){
        case "I": $godinaArapski=1; break;
        case "II": $godinaArapski=2; break;
        case "III": $godinaArapski=3; break;
        case "IV": $godinaArapski=4; break;
    }

    $tekst = "faks=" + $faks + "&smer="+$smer + "&godina=" + $godinaArapski + "&predmet=" + $predmet;

    window.location.href = "pretraga?" + $tekst;
});