@extends('main-parent-layout')

@section('content')
<header class = "container">
    <h1 class="page-title">NAUČI KAKO</h1>

    <div id="SEARCH-HEADER" class="container">
        <div class="row">
            <div class="col-xs-3">
                <div id="FAKULTET" class="dropdown">
                    <button id="faculty" class="btn btn-primary btn3d dropdown-toggle" type="button" data-toggle="dropdown"><strong>Fakultet</strong>
                        <span class="caret"></span></button>
                    <ul id="lista-fakulteta" class="dropdown-menu">
                        <?php include('phpInclude/fakulteti.php');?>
                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="SMER" class="dropdown">
                    <button id="department" class="btn btn-primary btn3d dropdown-toggle" type="button" data-toggle="dropdown" disabled><strong>Smer</strong>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-smerova">

                    </ul>
                </div>

            </div>

            <div class="col-xs-3">

                <div id="GODINA" class="dropdown">
                    <button id="year" class="btn btn-primary btn3d dropdown-toggle" type="button" data-toggle="dropdown" disabled><strong>Godina</strong>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" id="lista-godina">

                    </ul>
                </div>

            </div>



            <div class="col-xs-3">

                <div id="PREDMET" class="dropdown">
                    <button id="subject" class="btn btn-primary btn3d dropdown-toggle" type="button" data-toggle="dropdown" disabled><strong>Predmet</strong>
                        <span class="caret"></span></button>
                    <ul id="lista-predmeta" class="dropdown-menu">

                    </ul>
                </div>

             </div>

        </div>

        <div class="row">

            <div class="col-xs-4 col-xs-offset-4">

                <button class="btn btn-danger btn3d" id="pretrazi" disabled>
                   <strong> Pretraži  </strong>  <img src="http://www.clker.com/cliparts/Y/x/X/j/U/f/search-button-without-text-md.png" height="25" width="25"/>
                </button>

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


