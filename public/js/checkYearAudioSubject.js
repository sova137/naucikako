/**
 * Created by Nikola on 15-Feb-17.
 */
/*,"sifPredmeta=" + $sifPredmeta + "&godinaOd=" + $godinaOd  + "&godinaDo=" + $godinaDo + "&vrsta=" + $vrsta*/
function selectYear($sifPredmeta, $godinaOd,$godinaDo, $vrsta , $nazivSmera, $godina, $nazivPredmeta){
    $id =   $sifPredmeta + '-' + $vrsta + '-' + $godinaOd + '-' + $godinaDo +'-audio-lectures';
    $removePred = $sifPredmeta + '-P-audio-lectures';
    $removeVez = $sifPredmeta + '-V-audio-lectures';
    $removeLab = $sifPredmeta + '-L-audio-lectures';
    $("#"  + $removePred).children().removeClass("active");
    $("#"  + $removeVez).children().removeClass("active");
    $("#"  + $removeLab).children().removeClass("active");



    $.get('/audioSubject/selectYear',"sifPredmeta=" + $sifPredmeta + "&godinaOd=" + $godinaOd  + "&godinaDo=" + $godinaDo + "&vrsta=" + $vrsta,function (data) {
        var model = $('#desni-prozor');
        model.empty();
        for(var i = 0; i < data.grupeCasova.length; i++){
            var dvocasTrocas = '';
            if(data.grupeCasova[i].pripadaDvocasu){
                dvocasTrocas = 'dvocas';
            }
            else{
                dvocasTrocas = 'trocas';
            }

            var first = '<div class=\"list-group\" id=\"' + $vrsta + '-' + $godinaOd + '-' + $godinaDo + '-audio-lectures\">'
                + '<a href=\"#' + data.grupeCasova[i].brojDvocasa +'-' +$vrsta+'-'+$godinaOd+'-'+$godinaDo+'-week-audio-lectures\" class=\"list-group-item\" data-toggle=\"collapse\" style=\"padding-left:3em\"><i class=\"glyphicon glyphicon-chevron-right\"></i>'
                + data.grupeCasova[i].brojDvocasa + '. '+ dvocasTrocas
                + '</a>' +
                '<div class=\"list-group collapse\" id=\"' + data.grupeCasova[i].brojDvocasa + '-' + $vrsta + '-' + $godinaOd + '-' + $godinaDo + '-week-audio-lectures\" style=\"padding-left:5em\">'
                + '<br/>';

            var second ='';


            for(var j = 0; j < data.snimci.length; j++){
                if(data.snimci[j].brojDvocasa == data.grupeCasova[i].brojDvocasa){
                    second += '<li><a href=\"/audio/' + $nazivSmera + '/' + $godina + '/' + $nazivPredmeta + '/'+ $vrsta + '/'+ $godinaOd + '-' + $godinaDo + '/' + data.grupeCasova[i].brojDvocasa + '-' + dvocasTrocas + '/' +  data.snimci[j].cas + '?id=' + data.snimci[j].sifSnimka +'\">' + data.snimci[j].cas + '.cas</a></li>';
                }
            }

            var third = '</div>'
                +'</div>';

            var result = first + second + third;
            model.append(result);
            $("#" + $id).addClass('active');
        }
    });

}
/*
 var model = $('#desni-prozor');
 model.empty();

 <div class="list-group" id="{{$vrsta->vrsta}}-{{$godina->GodinaOd}}-{{$godina->GodinaDo}}-audio-lectures">
 <a href="#{{$grupa->brojDvocasa}}-{{$vrsta->vrsta}}-{{$godina->GodinaOd}}-{{$godina->GodinaDo}}-week-audio-lectures" class="list-group-item" data-toggle="collapse" style="padding-left:3em"><i class="glyphicon glyphicon-chevron-right"></i>
 {{$grupa->brojDvocasa}}.<?php echo'&nbsp'; ?>
 @if($grupa->pripadaDvocasu == true)
 dvocas
 @else
 trocas
 @endif
 </a>
 <div class="list-group collapse" id="{{$grupa->brojDvocasa}}-{{$vrsta->vrsta}}-{{$godina->GodinaOd}}-{{$godina->GodinaDo}}-week-audio-lectures" style="padding-left:5em">
 <br/>
 <li><a href="#">{{$snimak->cas}}. cas</a></li>
 </div>
 </div>
 */