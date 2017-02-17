@extends('main-parent-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <br/><br/>
                <div class="panel panel-default">

                    <div class="panel-heading"><b>{{$nazivPredmeta}}</b></div>

                    <div class="panel-body">
                        <div class="col-xs-6">
                            <div class="list-group list-group-root well">
                                <br/>
                                <?php $marked =false; $prvaGodinaOd = -1; $prvaGodinaDo = -1; $prvaVrsta = '';?>
                                @foreach($kategorijeSnimaka as $vrsta)
                                    <div class="list-group-item">
                                        <b>
                                            @if($vrsta->vrsta == 'P')
                                                Predavanja
                                            @elseif($vrsta->vrsta == 'V')
                                                Vezbe
                                            @else
                                                Laboratorija
                                            @endif
                                        </b>
                                    </div>
                                    <!-- navodjenje godina za dati predmet -->
                                    <div class="list-group" id="{{$sifPredmeta}}-{{$vrsta->vrsta}}-audio-lectures">
                                        @foreach($skolskeGodine as $godina)
                                            @if($marked == false)
                                            <?php $prvaGodinaDo = $godina->GodinaDo; $prvaGodinaOd = $godina->GodinaOd; $prvaVrsta = $vrsta->vrsta; ?>
                                            @endif
                                            @if($godina->vrsta == $vrsta->vrsta)
                                                <a id="{{$sifPredmeta}}-{{$vrsta->vrsta}}-{{$godina->GodinaOd}}-{{$godina->GodinaDo}}-audio-lectures" onclick="selectYear('{{$sifPredmeta}}' , '{{$godina->GodinaOd}}', '{{$godina->GodinaDo}}', '{{$vrsta->vrsta}}', '{{$nazivSmera}}' , '{{$godinaPredmeta}}' ,'{{$nazivPredmeta}}')" class="list-group-item <?php if($marked == false) echo 'active'; $marked=true; ?>" style="padding-left:2em">
                                                    <b>{{$godina->GodinaOd}} - {{$godina->GodinaDo}}</b>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-6" id="desni-prozor">
                            <?php include('phpInclude/printClasses.php') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/checkYearAudioSubject.js"></script>
@endsection