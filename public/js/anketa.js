/**
 * Created by Nikola on 10/8/2016.
 */
function posaljiAnketu($zahtev){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/posaljiAnketu', 'zahtev=' + $zahtev, function(data){
        alert(data);
        $("#mesto-anketa").remove();
    }).fail(
        function(){
            alert("failed");
        }
    );
}


function preporuci($oceni,$zahtev, $javni){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.post('/zabeleziPreporuku', "oceni=" + $oceni + "&zahtev=" + $zahtev + "&javni=" + $javni ,function(data){
        $("#preporuci").addClass('disabled');
    }).fail(function(){
        alert("failed");
    });

}