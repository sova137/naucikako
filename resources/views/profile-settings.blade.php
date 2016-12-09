@extends('layouts.app')

@section('content')
    <div class="container" id="container-settings">
        <div class = "col-xs-12">
            <div href = "#" class = "thumbnail" >
                <h1>Podesavanje naloga</h1>
                <hr>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-3">
                        <!-- ako nije ovaj enctype forme, forma nece moci da posalje fajl -->
                        <form enctype="multipart/form-data" method="post" action="settings">
                            <div class="text-center">
                                {{csrf_field()}}
                                <img id="avatar-prev" src="<?php include('phpInclude/printAvatar.php')?>" alt="140x140" class="avatar img-circle" width="140px" height="140px">
                                <h6>Promeni profilnu sliku...</h6>
                                <input type="file" id="file" class="form-control" name="avatar">
                                <button type="button" id="potvrdi" class="btn btn-sm btn-primary disabled">Potvrdi</button>
                            </div>
                        </form>
                    </div>

                    <!-- edit form column -->
                    <div class="col-md-9 personal-info">
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="fa fa-coffee"></i>
                            Promena slike ce se iskljucivo izvrsiti klikom na dugme potvrdi <br>
                        </div>
                        <div class="alert alert-info alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a>
                            <i class="fa fa-coffee"></i>
                            Dodaj svoj broj telefona kako bi bio brže obavešten o zahtevima za čas!
                        </div> 

                        <h3>Lične informacije:</h3>

                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Ime:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="ime-settings" type="text" value="{{ Auth::user()->firstname }}" name="firstname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Prezime:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" id="prezime-settings" type="text" value="{{ Auth::user()->lastname }}" name="lastname">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" value="{{ Auth::user()->email }}" id="email-settings">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Mobilni telefon:</label>
                                <div class="col-lg-8">
                                    <input class="form-control" name="phonenumber" id="telefon" value="<?php include('phpInclude/telefon.php')?>" type="phone number" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Nova lozinka:</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="newpass" type="password" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Potvrdi novu lozinku:</label>
                                <div class="col-md-8">
                                    <input class="form-control" id="confnewpass" type="password" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><b>Izmeni opis: </b></label>
                                <div class="col-md-8">
                                <textarea rows="5" id="opis-settings" class="form-control" placeholder="Vase zanimanje..">{{ $profesor->Opis }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">

                                    <input id="promeni" type="button" class="btn btn-primary" value="Sačuvaj promene">
                                    <span></span>
                                    <input type="reset" class="btn btn-default" id="otkazi" value="Otkaži">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <hr>
            </div>
            </div>

        </div>


    <script src="/js/avatar_upload.js"></script>
    <script src="/js/update-settings.js"></script>
    <script src="/js/correctTelephone.js"></script>
    <style>
        body{
            padding-bottom:100px;
            margin-bottom: -100px;

        } /* Height of the footer element */
        .row{
            padding:5px;
        }
    </style>

@stop
