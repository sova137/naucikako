
@extends('layout')

@section('search_results')

<div class="jumbotron" id="lista-oglasa" style="background-color: rgba(0,0,0,0.4); /* Black w/ opacity */">

        @if(!empty($profesori))
        @foreach ($profesori as $profesor)
            <div class="thumbnail" style="background-color: steelblue; border-color: #2d4373; margin-bottom:70px; border-radius: 70px;">
            <div class="row">

                <div class="col-xs-5 col-xs-offset-1 col-md-2 col-md-offset-0">
                    <a href="profile/{{$profesor->sifProfesora}}"><img class="img-circle" src="<?php include("phpInclude/searchAvatar.php");?>" align="center" alt="Responsive image" ></a>
                </div>

                <div class="col-xs-5 col-md-4">
                    <br/>
                    <br/>
                    <a href="profile/{{$profesor->sifProfesora}}" style="color:white"><p  id="ime-i-prezime-{{$profesor->sifProfesora}}" style="margin:0"><?php include("phpInclude/firstAndLastName.php");?></p></a>
			@if( $profesor->Opis !='')<p id="zanimanje" style="color:white">{{ $profesor->Opis}}</p> @else </br> @endif
                	<br/><br/>
		</div>
                <div class="col-xs-12 col-md-3">
                    <br/>

                    <input class="inp-3"  name="input-3" value="<?php include("phpInclude/calculateStarRating.php")?>" class="rating-loading">

                    <div class="row">
                        <div class="col-md-8 col-xs-8">
                             <button type="button" class="btn btn-labeled btn-primary no-click">
                            <i class="glyphicon glyphicon-thumbs-up" ></i> <strong>{{$profesor->preporuke}}</strong> <em>Preporuka</em></button>
                        </div>
                        <div class="col-md-3 col-xs-4">
                            <button class="btn-circle btn-primary btn no-click"><strong>@if($profesor->ukCasova > 0)<?php include('phpInclude/procenatPreporuka.php')?>%@else 0% @endif</strong></button>
                        </div>
			</div>
                </div>
			<br/>
			<br/>
			<br/>
                  <div class="col-xs-10 col-xs-offset-1 col-md-2 col-md-offset-0" >

	            <a  href="#" style="margin-bottom:20px;margin-right:20px;" onclick="kontaktirajOnClick(document.getElementById('ime-i-prezime-{{$profesor->sifProfesora}}').innerHTML,'{{ $profesor->sifPredaje }}')" class="btn btn3d btn-success" id="kontaktiraj-{{$profesor->sifPredaje}}"><strong>Kontaktiraj </strong><span class="glyphicon glyphicon-comment"></span></a>

                  </div>
<div class="row col-xs-10 col-xs-offset-1" >

<textarea rows="5" style="width:100%; resize:none; font-size:1.1em;  margin-bottom: -10%; background:transparent; border:none;color:white;" readonly>{{$profesor->Opis_oglasa}}</textarea></div>
		</div>
   </div>

        @endforeach
    @else
            <strong class="col-form-label">Potrebna ti je pomoć iz ovog predmeta, a trenutno nema predavača?<br>Obavesti nas kako bismo rešili tvoj problem!<br></strong>
        <br>
        <br>
        <form>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>FAKULTET: </b></label>
                <div class="col-xs-12 col-md-3">
                    <input class="form-control" name="fakultet-text-input-contact" type="text" value="" id="fakultet-text-input-potreban-zahtev" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>SMER: </b></label>
                <div class="col-xs-12 col-md-3">
                    <input name="smer-text-input-contact" class="form-control" type="text" value="" id="smer-text-input-potreban-zahtev" readonly>
                </div>

            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>GODINA: </b></label>
                <div class="col-xs-12 col-md-3">
                    <input name="godina-text-input-contact" class="form-control" type="text" value="" id="godina-text-input-potreban-zahtev" readonly>
                </div>


            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label"><b>PREDMET: </b></label>
                <div class="col-xs-12 col-md-3">
                    <input name="predmet-text-input-contact" class="form-control" type="text" value="" id="predmet-text-input-potreban-zahtev" readonly>
                </div>
            </div>
            <div class="form-group row">

                <label for="example-text-input" class="col-xs-2 col-form-label"><b>EMAIL*: </b></label>

                <div class="col-xs-12 col-md-3"><input class="form-control" name="email" id="senders-email" type="email" /></div>

                <label for="example-text-input" class="col-xs-12 col-md-2 col-form-label"><b>Broj telefona:</b></label>
                <div class="col-xs-12 col-md-3">
                    <input class="form-control" id="senders-tel" name="phonenumber" value="06" type="phone number" />
                </div>

            </div>
            </br>
            </br>
            <div class="form-group">
                <label for="comment" class="col-form-label"><b>Dodaj opis: </b></label>
                <textarea rows="5" id="req-desc" name="req-desc" class="form-control"  placeholder="Dodaj opis..."></textarea>
            </div>

            <div class="form-group row col-md-4 col-md-offset-7 col-lg-4 col-lg-offset-8 col-xs-10 col-xs-offset-0">

                    <div style="margin-left: -15px;" class="g-recaptcha" data-sitekey="6LcfqQgUAAAAABUXxWlHrxibMomVSmhJwD0IRkZ8"></div>

            </div>
        </form>
	
	<div class="row">
            <button href='#'  type="button" id="zatrazi-profesora-btn" class="btn btn-success btn3d col-xs-offset-4 col-md-offset-5" onclick="sendGenericRequest({{$sifPredmeta}})"><b>Pošalji zahtev</b></button>
	</div>   
 @endif
        <script>
                $(document).on('ready', function(){
                  

		   $('.inp-3').rating({displayOnly: true});
                    $("html, body").animate({ scrollTop: $('#lista-oglasa').offset().top }, 1000);
		    $("#department").removeAttr('disabled');
                	$("#year").removeAttr('disabled');
			$("#subject").removeAttr('disabled');
			$("#pretrazi").removeAttr('disabled');
		$god = '{{$godina}}';
		switch($god){
			case '1': $godinaRimski = 'I'; break;
			case '2': $godinaRimski = 'II'; break;
			case '3': $godinaRimski = 'III'; break;
			case '4': $godinaRimski = 'IV'; break;
		}

      		 $("#faculty").html('<strong>' + '{{$nazivFaksa}}'  + '</strong>'+' <span class="caret"></span>');               
 		 $("#department").html('<strong>' + '{{$nazivSmera }}' + '</strong>'+' <span class="caret"></span>'); 
		$.get('getDepartmentList',"faks=" + '{{$nazivFaksa}}', function (data) {
		        var model = $('#lista-smerova');
        		model.empty();

        		$.each(data, function(index, element) {
           			 model.append("<li><a href='#'>" + element.Naziv + "</a></li>");
        		});

    		});
		$.get('getYearList',"faks=" + '{{$nazivFaksa}}' + "&smer=" + '{{$nazivSmera}}' ,function (data) {

        	var model = $('#lista-godina');
        	model.empty();

      		  $.each(data, function(index, element) {
            		switch(element.Godina) {
                		case 1:   model.append("<li><a href='#'>" + "I" + "</a></li>");   break;
                		case 2:   model.append("<li><a href='#'>" + "II" + "</a></li>");   break;
                		case 3:   model.append("<li><a href='#'>" + "III" + "</a></li>");  break;
                		case 4:   model.append("<li><a href='#'>" + "IV" + "</a></li>");   break;
        	    }
        		});
    		});

		    $.get('getSubjectList',"faks=" + '{{$nazivFaksa}}' + "&smer=" + '{{$nazivSmera}}'  + "&godina=" + $godinaRimski ,function (data) {

		        var model = $('#lista-predmeta');
        		model.empty();

		        model.append("<li><a href='#' ><input type=\"text\" placeholder=\"Search..\" id=\"myInput\" onkeyup=\"filterFunction()\"></a></li>");

        		$.each(data, function(index, element) {
           			 model.append("<li><a href='#'>" + element.Naziv + "</a></li>");
       			 });

    		});

 		 $("#year").html('<strong>' +$godinaRimski + '</strong>'+' <span class="caret"></span>');               
 		 $("#subject").html('<strong>' + '{{$nazivPredmeta }}' + '</strong>'+' <span class="caret"></span>');
});
        </script>
		
            <script src="js/zatrazi-profesora.js"></script>
            <script src="js/correctTelephone.js"></script>
</div>
    <?php include('../resources/views/dialog-box-kontaktiraj.blade.php');?>
@endsection
