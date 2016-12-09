@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-heading"><strong>PRIHVAĆENI ZAHTEVI</strong></div>
                    <div class="panel-body">
                        <?php $i=0; ?>
                        @foreach($zahtevi as $zahtev)
                            <?php $i++ ?>
                            <div class="row" >
                                <div class = "col-xs-12">
                                    <div href = "#" class = "thumbnail">
                                        <div class="articles" >
                                            <div id="sifZahteva-prihvaceni-{{$zahtev->sifZaht}}" class="article current">
                                                @if($zahtev->confirmed != 0)
                                                    <div class="item row list-group-item" style="background-color: green" >
                                                        @else
                                                            <div class="item row list-group-item"  style="background-color: red" >
                                                                @endif
                                                    <div class="col-md-4 col-xs-12">
                                                        <p><i class="glyphicon glyphicon-chevron-right"></i> Zahtev #{{$i}} </p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-3">
                                                        <p class="source">{{ $zahtev->faks }}-{{$zahtev->sm}}-<?php include('phpInclude/godinaRimski.php') ?>-{{ $zahtev->prd }}</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <p class="pubdate">
                                                            {{$zahtev->vreme}}
                                                        </p>
                                                    </div>
                                                                <div class="col-xs-1">
                                                                <!-- <span class="close" id="close_dugme-{{$zahtev->sifZaht}}">×</span> -->
                                                                    <script>
                                                                        $("#close_dugme-{{$zahtev->sifZaht}}").on('click',function(){
                                                                            $('#sifZahteva-prihvaceni-{{$zahtev->sifZaht}}').remove();
                                                                        });
                                                                    </script>
                                                                    </div>
                                                </div>
                                                <div class="description row">

                                                    <div class="description-text">
                                                        <form>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b>FAKULTET: </b></label>
                                                                <div class="col-xs-7 col-md-3">
                                                                    <input class="form-control" name="fakultet-text-input-contact" type="text" value="{{ $zahtev->faks }}" id="fakultet-text-input-contact" readonly>

                                                                </div>


                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b>SMER: </b></label>
                                                                <div class="col-xs-7 col-md-3">
                                                                    <input name="smer-text-input-contact" class="form-control" type="text" value="{{ $zahtev->sm }}" id="smer-text-input-contact" readonly>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b>GODINA: </b></label>
                                                                <div class="col-xs-7 col-md-3">
                                                                    <input name="godina-text-input-contact" class="form-control" type="text" value="<?php include('phpInclude/godinaRimski.php') ?>" id="godina-text-input-contact" readonly>
                                                                </div>


                                                            </div>
                                                            <br/>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label"><b>PREDMET: </b></label>
                                                                <div class="col-xs-7 col-md-3">
                                                                    <input name="predmet-text-input-contact" class="form-control" type="text" value="{{$zahtev->prd}}" id="predmet-text-input-contact" readonly>
                                                                </div>
                                                            </div>

                                                            </br>
                                                            <div class="form-group">
                                                                <label for="comment"><b>Opis zahteva: </b></label>
                                                                <textarea rows="5" name="opis-text-input" class="form-control" id="predaja-opis-oglasa"  readonly>{{$zahtev->Opis_zahteva}}</textarea>
                                                            </div>


                                                        </form>
                                                    </div>

                                                    <div class="list-group-item col-xs-12">
                                                        {{csrf_field()}}
                                                            <p align="center"><strong>Možete pogledati podatke o pošiljaocu.</strong></p>

                                                            <button href='#' type="button" id="podaci-o-posiljaocu" class="btn btn-info col-xs-12" onclick="openContactInfo('{{$zahtev->email}}','{{$zahtev->telefon}}')"><b align="center">Pogledaj podatke o posiljaocu</b></button>
                                                            <br>
								 <?php include('../resources/views/dialog-box-podaci-ucenika.blade.php');?>
                                                        @if($zahtev->confirmed == 0)
                                                            @if(is_null($zahtev->ocenjen))
                                                            <p align="center"><strong>Nakon održanog časa pošaljite učeniku anketu kako bi Vas preporučio budućim učenicima.</strong></p>
                                                            <button href='#' type="button" id="posalji-anketu" class="btn btn-danger col-xs-12 disabled" onclick="" ><b align="center">Posalji anketu</b></button>
                                                            @endif
                                                        @else
                                                            @if(is_null($zahtev->ocenjen))
                                                             <div id="mesto-anketa">
                                                            <p align="center"><strong>Nakon održanog časa pošaljite učeniku anketu kako bi Vas preporučio budućim učenicima.</strong></p>
                                                            <button href='#' type="button" id="posalji-anketu" class="btn btn-success col-xs-12" onclick="posaljiAnketu('{{json_encode($zahtev)}}')" ><b align="center">Posalji anketu</b></button>
                                                            </div>
                                                                 @endif
                                                           
                                                        @endif
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
			@if($i==0) <strong>Nema prihvaćenih zahteva</strong> @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <link href="/css/articles.css" rel="stylesheet">
    <script src="/js/avatar_upload.js"></script>
    <script src="/js/anketa.js"></script>
    <script src="/js/collapsableList.js"></script>
    <script src="/js/articles.js"></script>
@endsection