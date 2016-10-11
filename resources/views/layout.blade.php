@extends('main-parent-layout')

@section('content')
<header class = "container">
    <h1 class="page-title">NAUČI KAKO</h1>

    <div id="SEARCH-HEADER" class="container">
        <div class="row">
            <div class="col-xs-3">
                <div id="FAKULTET" class="dropdown">
                    <button id="faculty" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><strong>Fakultet</strong>
                        <span class="caret"></span></button>
                    <ul id="lista-fakulteta" class="dropdown-menu">
                        <?php include('phpInclude/fakulteti.php');?>
                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="SMER" class="dropdown">
                    <button id="department" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown"><strong>Smer</strong>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-smerova">

                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="GODINA" class="dropdown">
                    <button id="year" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown"><strong>Godina</strong>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-godina">

                    </ul>
                </div>

            </div>



            <div class="col-xs-3">

                <div id="PREDMET" class="dropdown">
                    <button id="subject" class="btn btn-primary dropdown-toggle disabled" type="button" data-toggle="dropdown"><strong>Predmet</strong>
                        <span class="caret"></span></button>
                    <ul id="lista-predmeta" class="dropdown-menu">

                    </ul>
                </div>

             </div>

        </div>

        <div class="row">

            <div class="col-xs-4 col-xs-offset-4">

                <div class="btn btn-danger disabled" id="pretrazi">
                   <strong> Pretraži  </strong>  <img src="http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-md.png" height="25" width="25"/>
                </div>

            </div>

        </div>



    </div>

    <script src="/js/dropdown.js"></script>
    <script src="/js/search.js"></script>
</header>


<section class="container">
    @yield('search_results')
    @yield('make_contact')
</section>

@endsection


