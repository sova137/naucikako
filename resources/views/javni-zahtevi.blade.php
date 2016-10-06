@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <div class="panel-heading"><strong>PRISTIGLI ZAHTEVI</strong></div>
                    <div class="panel-body">
                        <?php $i=0; ?>
                        @foreach($zahtevi as $zahtev)
                            <?php $i++ ?>
                            <div class="row" >
                                <div class = "col-xs-12">
                                    <div href = "#" class = "thumbnail">
                                        <div class="articles">
                                            <div id="sifZahteva-{{$zahtev->sifZahteva}}" class="article current">
                                                <div class="item row list-group-item">
                                                    <div class="col-xs-4">
                                                        <p><i class="glyphicon glyphicon-chevron-right"></i> Zahtev #{{$i}} </p>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <p class="source">{{ $zahtev->faks }}-{{$zahtev->sm}}-<?php include('phpInclude/godinaRimski.php') ?>-{{ $zahtev->prd }}</p>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <p class="pubdate">
                                                            {{$zahtev->created_at}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="description row">

                                                    <div class="description-text">
                                                        <form>
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-xs-2 col-form-label"><b>FAKULTET: </b></label>
                                                                <div class="col-xs-3">
                                                                    <input class="form-control" name="fakultet-text-input-contact" type="text" value="{{ $zahtev->faks }}" id="fakultet-text-input-contact" readonly>

                                                                </div>

                                                                <div class="list-group-item col-xs-3 col-xs-offset-3">
                                                                    {{csrf_field()}}
                                                                    <button href='#' type="button" id="prihvati" class="btn btn-sm btn-primary col-xs-12" onclick="prihvatiJavniZahtev('{{$zahtev->sifZahteva}}')" style="background-color:green"><b align="center">Prihvati</b></button>
                                                                </div>

                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-xs-2 col-form-label"><b>SMER: </b></label>
                                                                <div class="col-xs-3">
                                                                    <input name="smer-text-input-contact" class="form-control" type="text" value="{{ $zahtev->sm }}" id="smer-text-input-contact" readonly>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-xs-2 col-form-label"><b>GODINA: </b></label>
                                                                <div class="col-xs-3">
                                                                    <input name="godina-text-input-contact" class="form-control" type="text" value="<?php include('phpInclude/godinaRimski.php') ?>" id="godina-text-input-contact" readonly>
                                                                </div>


                                                            </div>
                                                            <br/>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-xs-2 col-form-label"><b>PREDMET: </b></label>
                                                                <div class="col-xs-3">
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



                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <link href="/css/articles.css" rel="stylesheet">
    <script src="/js/avatar_upload.js"></script>
    <script src="/js/collapsableList.js"></script>
    <script src="/js/articles.js"></script>
    <script src="/js/accept-reject.js"></script>
@endsection