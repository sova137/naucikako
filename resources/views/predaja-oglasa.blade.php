@extends('layouts.app')

@section('content')

    <body>

    <div class="container">


        <div class="row">

            <div id="predaja-fakultet" class="col-xs-2 list-group">
                <?php
                $fakulteti = DB::select('select Naziv from fakultet');

                foreach($fakulteti as $faks){
                    $naziv = $faks->Naziv;
                    echo "<a href='#' class=\"list-group-item fax\" >$naziv</a>";
                }
                ?>
            </div>

            <div id="predaja-smer" class="col-xs-3 list-group">

            </div>

            <div id="predaja-godina" class="col-xs-2 list-group">

            </div>

            <div id="predaja-predmet" class="col-xs-3 list-group">

            </div>

            <div id="predaja-dalje-btn" class="col-xs-2 list-group">

            </div>

        </div>

        </br>
        </br>

        <div id="korak2" class="row bottom" style="display: none">

            <div class = "col-xs-12">
                <div class="container" style="background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">
                    <br>
                <div href = "#" class = "thumbnail" style="border-radius: 10px;">
                    </br>
                    <form action="/predaja-oglasa" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-xs-2 col-form-label"><b>FAKULTET: </b></label>
                            <div class="col-xs-3">
                                <input class="form-control" name="fakultet-text-input" type="text" value="" id="fakultet-text-input" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-xs-2 col-form-label"><b>SMER: </b></label>
                            <div class="col-xs-3">
                                <input name="smer-text-input" class="form-control" type="text" value="" id="smer-text-input" readonly>
                            </div>
                            <label class="col-xs-7" ><b style="color: #2d4373">Obaveštenja o pristiglim zahtevima za čas se podrazumevano šalju na Vaš email!
                           @if( (\App\Profesor::odUsera(Auth::user()))->telefon == null)<br> Ukoliko prvi put predajete oglas morate ostaviti i telefon! @endif </b></label>

                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-xs-2 col-form-label"><b>GODINA: </b></label>
                            <div class="col-xs-3">
                                <input name="godina-text-input" class="form-control" type="text" value="" id="godina-text-input" readonly>
                            </div>
                            <label class="checkbox-inline col-xs-2 col-xs-offset-1"><input type="checkbox" name="SMScheck" id="SMS-obavestenje" value="0"><b>Obavesti me SMS porukom o pristiglim zahtevima</b></label>
                            @if( (\App\Profesor::odUsera(Auth::user()))->telefon == null)
                            <label id="predaja-oglasa-br-telefona" class="col-xs-3 phone-number"  ><b>Broj telefona*</b>
                               <input  class="form-control" name="telefon" value="06" type="phone number" />
                            </label>
                             @endif
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-xs-2 col-form-label"><b>PREDMET: </b></label>
                            <div class="col-xs-3">
                                <input name="predmet-text-input" class="form-control" type="text" value="" id="predmet-text-input" readonly>
                            </div>
                        </div>
                        </br>
                        </br>
                        <div class="form-group">
                            <label for="comment"><b>Dodaj opis: </b></label>
                            <textarea rows="5" name="opis-text-input" class="form-control" id="predaja-opis-oglasa" placeholder="Opišite svoje iskustvo u vezi izabranog predmeta..."></textarea>
                        </div>

                        <div class="form-group row">
                            <div class="list-group-item col-xs-3 col-xs-offset-2">
                                <button href='#' type="submit" id="predaj-oglas-btn" class="btn btn-sm btn-primary col-xs-12"><b align="center">Predaj</b></button>
                            </div>
                        </div>
                    </form>
                </div>
                    </div>
            </div>

        </div>

    </div>

    <script src="js/predaja-oglasa.js"></script>
    <style>
        body{
            padding-bottom:100px;
            margin-bottom: -100px;
        } /* Height of the footer element */

    </style>
    </body>
@stop

