@extends('main-parent-layout')

@section('content')

<div id="chooser" >

    <div id="chooser-dialog" style="margin-top:180px;">
        <div class="cssload-loader">
            <div class="cssload-inner cssload-one"></div>
            <div class="cssload-inner cssload-two"></div>
            <div class="cssload-inner cssload-three"></div>
        </div>
    </div>
</div>
<div id="scene" class="hidden" style="margin-top:450px; ">
    <canvas width="600" height="600" id="scene-canvas"></canvas>
</div>
<div class="container">
    <div class="row col-md-2" style="padding-left:50px;width:100% !important; margin-top:-50px;" >
        <br/><br/><br/>
        <span id="spanbtns" class="btn" style="width:100%;    -webkit-box-shadow: 0px 0px 3px 3px #000000; !important; -moz-box-shadow:    0px 0px 3px 3px #000000; box-shadow:         0px 0px 3px 3px #000000;" >
            <br/>
            <input id="inputdugmici" disabled type="checkbox" unchecked data-toggle="toggle" onchange="playPause(this)" data-on="<i class='fa fa-play'></i> <strong>Pusti</strong>" data-off="<i class='fa fa-pause'></i> <strong>Pauza</strong>"   data-offstyle="danger">

            <br/>

            <div class="well text-center dugmici" style=" margin-top:30px; background:transparent; padding-right:50px;">
                <p style="margin-top:-10px;  margin-left:20px; font-size: 1.2em !important; font-weight:bold; color:white;"><strong>  Skoči na</strong></p>
    		<button disabled type="button" onclick="goToPart(0)" class="btn btn-danger" style="margin-right: 20px; margin-left:50px; font-size:1.5em;"><strong>0/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.125)" class="btn btn-danger" style="margin-right: 20px;font-size:1.4em; "><strong>1/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.25)" class="btn btn-primary" style="margin-right: 20px;font-size:1.3em; "><strong>2/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.375)" class="btn btn-primary" style="margin-right: 20px; font-size:1.2em; "><strong>3/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.5)" class="btn btn-primary" style="margin-right: 20px; font-size:1.2em;"><strong>4/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.625)" class="btn btn-primary" style="margin-right: 20px;font-size:1.3em;"><strong>5/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.75)" class="btn btn-danger" style="margin-right: 20px;font-size:1.4em;"><strong>6/8</strong></button>
            <button disabled type="button" onclick="goToPart(0.875)" class="btn btn-danger" style="margin-right: 20px;font-size:1.5em;"><strong>7/8</strong></button>
            </div>
            <div class="well text-center dugmici" style=" margin-top:30px; background:transparent; padding-right:50px;">
                <p style="margin-top:-10px;  margin-left:20px; font-size: 1.2em !important; font-weight:bold; color:white;"><strong>  Pomeri se za (sec)</strong></p>
    		<button disabled type="button" onclick="movePlayback(-30)" class="btn btn-primary" style="margin-right: 20px; margin-left:50px; font-size:1.3em;"><strong>-30</strong></button>
            <button disabled type="button" onclick="movePlayback(-20)" class="btn btn-primary" style="margin-right: 20px;font-size:1.4em; "><strong>-20</strong></button>
            <button disabled type="button" onclick="movePlayback(-10)" class="btn btn-danger" style="margin-right: 20px;font-size:1.5em; "><strong>-10</strong></button>
            <button disabled type="button" onclick="movePlayback(10)" class="btn btn-danger" style="margin-right: 20px; font-size:1.5em; "><strong>+10</strong></button>
            <button disabled type="button" onclick="movePlayback(20)" class="btn btn-primary" style="margin-right: 20px; font-size:1.4em;"><strong>+20</strong></button>
            <button disabled type="button" onclick="movePlayback(30)" class="btn btn-primary" style="margin-right: 20px;font-size:1.3em;"><strong>+30</strong></button>
            </div>
            <br/>
            <p style="margin-top:0px; font-size: 1.5em; font-weight:bold; color:white;">Jаčina zvuka</p>
            <div  disabled id="h1-slider"> </div>
            <br/>
        </span>
    </div>

</div>

<div class="alert alert-info alert-dismissible container" style="text-align:center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Premotavanje: </strong> Za premotavanje snimka scroll-ovati iznad plejera
</div>
<style>

</style>

@endsection

