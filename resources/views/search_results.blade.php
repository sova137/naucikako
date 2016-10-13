@extends('layout')

@section('search_results')

<div class="jumbotron" id="lista-oglasa" style="background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">

        @if(!empty($profesori))
        @foreach ($profesori as $profesor)
            <div class="thumbnail" style="background-color: steelblue; border-color: #2d4373; border-radius: 70px;">
            <div class="row">

                <div class="col-xs-4 col-md-2">
                    <a href="profile/{{$profesor->sifProfesora}}"><img class="img-responsive img-circle" src="<?php include("phpInclude/searchAvatar.php");?>" align="center" alt="Responsive image" ></a>
                </div>

                <div class="col-xs-8 col-md-4">
                    <br/>
                    <br/>
                    <a href="profile/{{$profesor->sifProfesora}}" style="color:white"><p  id="ime-i-prezime-{{$profesor->sifProfesora}}" style="margin:0"><?php include("phpInclude/firstAndLastName.php");?></p></a>
                    <p id="zanimanje" style="color:white">{{ $profesor->Opis}}</p>
                    <p id="opis-oglasa" style="color:white">{{ $profesor->Opis_oglasa }}</p>
                </div>

                <div class="col-xs-12 col-md-4">
                    <br/>

                    <input class="inp-3"  name="input-3" value="<?php include("phpInclude/calculateStarRating.php")?>" class="rating-loading">

                    <div class="row">
                        <div class="col-md-6">
                             <button type="button" class="btn btn-labeled btn-primary no-click">
                            <i class="glyphicon glyphicon-thumbs-up" ></i> <strong>{{$profesor->preporuke}}</strong> <em>Preporuka</em></button>
                        </div>
                        <div class="col-md-5">
                            <button class="btn-circle btn-primary btn no-click"><strong>@if($profesor->ukCasova > 0)<?php include('phpInclude/procenatPreporuka.php')?>%@else 0% @endif</strong></button>
                        </div>
                </div>


                </div>
                <div class="col-xs-12 col-md-2" >
                    <br/>
                    <br/>
                    <br/>
                    <a  href="#" onclick="kontaktirajOnClick(document.getElementById('ime-i-prezime-{{$profesor->sifProfesora}}').innerHTML,'{{ $profesor->sifPredaje }}')" class="btn btn-success" id="kontaktiraj-{{$profesor->sifPredaje}}"><strong>Kontaktiraj </strong><span class="glyphicon glyphicon-comment"></span></a>
                </div>
                </div>
    </div>
        @endforeach
    @else
            <strong class="col-form-label">Potrebna ti je pomoc iz ovog predmeta, a trenutno nema profesora?<br>Obavesti nas kako bismo rešili tvoj problem!<br></strong>
        <br>
        <br>
        <form>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>FAKULTET: </b></label>
                <div class="col-xs-3">
                    <input class="form-control" name="fakultet-text-input-contact" type="text" value="" id="fakultet-text-input-potreban-zahtev" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>SMER: </b></label>
                <div class="col-xs-3">
                    <input name="smer-text-input-contact" class="form-control" type="text" value="" id="smer-text-input-potreban-zahtev" readonly>
                </div>

            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>GODINA: </b></label>
                <div class="col-xs-3">
                    <input name="godina-text-input-contact" class="form-control" type="text" value="" id="godina-text-input-potreban-zahtev" readonly>
                </div>


            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>PREDMET: </b></label>
                <div class="col-xs-3">
                    <input name="predmet-text-input-contact" class="form-control" type="text" value="" id="predmet-text-input-potreban-zahtev" readonly>
                </div>
            </div>
            <div class="form-group row">

                <label for="example-text-input" class="col-xs-2 col-form-label"><b>EMAIL*: </b></label>

                <div class="col-xs-3"><input class="form-control" name="email" id="senders-email" type="email" /></div>

                <label for="example-text-input" class="col-xs-2 col-form-label"><b>Broj telefona:</b></label>
                <div class="col-xs-3">
                    <input class="form-control" id="senders-tel" name="phonenumber" value="06" type="phone number" />
                </div>

            </div>
            </br>
            </br>
            <div class="form-group">
                <label for="comment" class="col-form-label"><b>Dodaj opis: </b></label>
                <textarea rows="5" id="req-desc" name="req-desc" class="form-control"  placeholder="Dodaj opis..."></textarea>
            </div>

            <div class="form-group row col-xs-4 col-xs-offset-8">

                    <div class="g-recaptcha" data-sitekey="6Le5GwgUAAAAALb8JRwwctlhV3Yn23UTbOEEc6GR"></div>

            </div>
        </form>

            <button href='#'  type="button" id="zatrazi-profesora-btn" class="btn btn-sm btn-success btn3d col-xs-offset-5" onclick="sendGenericRequest({{$sifPredmeta}})" ><b>Pošalji zahtev</b></button>
    @endif
        <script>
                $(document).on('ready', function(){
                    $('.inp-3').rating({displayOnly: true});
                    $("html, body").animate({ scrollTop: $('#lista-oglasa').offset().top }, 1000);
                });
        </script>

            <script src="js/zatrazi-profesora.js"></script>
</div>

    <?php include('../resources/views/dialog-box-kontaktiraj.blade.php');?>

@endsection