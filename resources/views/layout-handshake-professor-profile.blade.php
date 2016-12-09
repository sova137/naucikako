@extends('main-parent-layout')



@section('content')
<link rel="stylesheet" href="/css/signup.css"  />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{URL::asset("/js/showHandshakeDescription.js")}}"></script>
<style>
    .container {
        display: none;
    }
</style>
    <script type="text/javascript">
        var sifZahteva = '{{$zahtev->sifZahteva}}'
        var javniZahtev = '{{$javniZahtev}}'
    </script>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>

    <div class="container" style="background-color: rgba(0,0,0,0.4); /* Black w/ opacity */ height: 80%">
        <br>
        <div href = "#" class = "thumbnail" style="border-radius: 10px;">
            </br>
        <div class="row">
        <div id="profilePic" class = "col-sm-3 col-xs-8">
            <img id="profilePicture" class="img-responsive img-circle" src="" alt="Responsive image" />

        </div>
        <div id="name" class = "col-sm-3 col-xs-8">
            </br>
            </br>
            </br>
        </div>
        <div id="phoneNumber" class = "col-sm-2 col-xs-8">
            </br>
            </br>
            </br>
        </div>
        <div id="mail" class = "col-sm-3 col-xs-8">
            </br>
            </br>
            </br>
        </div>
        </div>

        <div class="row">

        </div>
        </div>
    </div>

@endsection
