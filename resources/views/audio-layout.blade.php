@extends('main-parent-layout')

@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>ETF AUDIO MATERIJALI</b></div>

                    <div class="panel-body">
                        <div class="col-xs-12">
                            <div class="list-group list-group-root well">
                                <?php $i = 0; ?>
                                @foreach($smerovi as $smer)
                                    @if($i != 0)
                                        <br/><br/><br/>
                                    @endif
                                        <h3  class="list-group-item" style="font-family: 'Segoe UI'">
                                            <strong>{{$smer->Naziv}}</strong>
                                        </h3>
                                        @foreach($godine as $godina)
                                            @if($godina->sifSmera == $smer->sifSmera)
                                                <a href="#item-{{$smer->sifSmera}}-{{$godina->Godina}}" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-chevron-right"></i>
                                                   {{$godina->Godina}}. godina
                                                </a>
                                                <div class="list-group collapse" id="item-{{$smer->sifSmera}}-{{$godina->Godina}}">
                                                @foreach($audioPredmeti as $predmet)
                                                        @if($predmet->Godina == $godina->Godina AND $predmet->sifSmera == $smer->sifSmera)
                                                            <a href="/audio/{{$smer->Naziv}}/{{$godina->Godina}}/{{$predmet->nazivPredmeta}}?id={{$predmet->sifPredmeta}}" class="list-group-item" style="padding-left:2em">
                                                                <b>{{$predmet->nazivPredmeta}}</b>
                                                            </a>
                                                        @endif
                                                @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                        @if($i == count($smerovi) - 1)
                                            <br/>
                                            @endif
                                        <?php $i++; ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @endsection