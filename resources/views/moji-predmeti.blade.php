
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Moji predmeti</div>

                <div class="panel-body">
                    <div class="col-xs-12">
                    <div class="list-group list-group-root well">

                     <?php $i = 0; $j = 0; $k = 0;?>
                    @if(count($predmeti)>0)
                    @foreach($faksevi as $faks)

                        <a href="#item-{{$k}}" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-chevron-right"></i>
                            {{$faks["f"] }}
                        </a>

                        <div class="list-group collapse" id="item-{{$k}}">

                                @for(; $i < count($smerovi); $i++)
                                    @if($smerovi[$i]["f"] == $faks ["f"])
                                        <a href="#item-{{$k}}-{{$i}}" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-chevron-right"></i>
                                            {{ $smerovi[$i]["s"] }}
                                        </a>

                                                <?php $smer = $smerovi[$i] ?>

                                                 <div class="list-group collapse" id="item-{{$k}}-{{$i}}">
                                                     @for(; $j < count($predmeti); $j++)
                                                         @if($predmeti[$j]->s == $smer["s"])
                                                             <a href="#item_info-{{$predmeti[$j]->sifPredaje}}" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-chevron-right"></i>
                                                                 {{ $predmeti[$j]->p }}
                                                             </a>

                                                             <div class="list-group collapse" id="item_info-{{$predmeti[$j]->sifPredaje}}">
                                                                 <br>


                                                                 <div href = "#" class = "thumbnail">
                                                                     </br>
                                                                    <!-- <form action="/moji-predmeti" method="POST">-->
                                                                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                         <div class="form-group row">
                                                                             <label for="example-text-input" class="col-xs-2 col-form-label"><b align="center">FAKULTET: </b></label>
                                                                             <div class="col-xs-3">
                                                                                 <input class="form-control" name="fakultet-text-input" type="text" value="{{$faks["f"]}}" id="fakultet-text-input" readonly>
                                                                             </div>
                                                                         </div>

                                                                         <div class="form-group row">
                                                                             <label for="example-text-input" class="col-xs-2 col-form-label"><b>SMER: </b></label>
                                                                             <div class="col-xs-3">
                                                                                 <input name="smer-text-input" class="form-control" type="text" value="{{$smerovi[$i]['s']}}" id="smer-text-input" readonly>
                                                                             </div>
                                                                             <label class="col-xs-7 "><b style="color: mediumvioletred">Obaveštenja o pristiglim zahtevima za čas se podrazumevano šalju na Vaš email!</b></label>

                                                                         </div>

                                                                         <div class="form-group row">
                                                                             <label for="example-text-input" class="col-xs-2 col-form-label"><b>PREDMET: </b></label>
                                                                             <div class="col-xs-3">
                                                                                 <input name="predmet-text-input" class="form-control" type="text" value="{{ $predmeti[$j]->p }}" id="predmet-text-input" readonly>
                                                                             </div>
                                                                             @if(\App\Predaje::find($predmeti[$j]->sifPredaje)->SMS == 1)
                                                                             <label class="checkbox-inline col-xs-2 col-xs-offset-1"><input type="checkbox" name="SMScheck" id="SMScheck-{{$predmeti[$j]->sifPredaje}}" checked><b>Obavesti me SMS porukom o pristiglim zahtevima</b></label>
                                                                             @else
                                                                                 <label class="checkbox-inline col-xs-2 col-xs-offset-1"><input type="checkbox" name="SMScheck" id="SMScheck-{{$predmeti[$j]->sifPredaje}}" ><b>Obavesti me SMS porukom o pristiglim zahtevima</b></label>
                                                                             @endif
                                                                             <!--dodaj inline fju za broj telefona-->
                                                                         </div>
                                                                         </br>
                                                                         </br>
                                                                         <div class="form-group">
                                                                             <label for="comment"><b>Izmeni opis: </b></label>
                                                                             <textarea rows="5" name="opis-text-input" class="form-control" id="predaja-opis-oglasa-{{$k}}-{{$i}}" placeholder="Opišite svoje iskustvo u vezi izabranog predmeta...">{{$predmeti[$j]->o}}</textarea>
                                                                         </div>

                                                                         <div class="form-group row">

                                                                             <div class="list-group-item col-xs-3 col-xs-offset-2">
                                                                                 <button href='#' id="sacuvaj-izmene-oglasa-btn" class="btn btn-sm btn-primary col-xs-12" onclick="updateSubjectOffer('{{$predmeti[$j]->sifPredm}}',$('#predaja-opis-oglasa-{{$k}}-{{$i}}').val(),'{{$predmeti[$j]->sifPredaje}}')"><b align="center">Sačuvaj izmene</b></button>
                                                                             </div>

                                                                             <div class="list-group-item col-xs-3 col-xs-offset-2">
                                                                                 <button href='#' id="obrisi-oglas-btn" class="btn btn-sm btn-primary col-xs-12" onclick="deleteSubjectOffer('{{$predmeti[$j]->sifPredm}}')"><b align="center">Obriši oglas</b></button>
                                                                             </div>
                                                                         </div>
                                                                     <!--</form>-->
                                                                 </div>
                                                                 <br>


                                                             </div>

                                                         @else @break
                                                         @endif

                                                     @endfor
                                                 </div>

                                    @else @break
                                     @endif

                                 @endfor
                        </div>
                        <?php $k++;?>
                    @endforeach
                    @endif
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/avatar_upload.js"></script>
<script src="/js/collapsableList.js"></script>
<script src="js/predaja-oglasa.js"></script>
<script src="js/moji-predmeti.js"></script>

@endsection
