<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo csrf_token() ?>">


    <link rel="stylesheet" href="css/bootstrap-social.css" />
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" >

    <div class="container-fluid">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <nav class="navbar-header col-xs-8">

                <a id="siteSignature" class="navbar-brand" href="/"><b>NAUCI KAKO</b></a>
            </nav>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <div class="nav navbar-nav navbar-right col-xs-4">
                    <div class="col-xs-3"></div>
                    <div class="col-xs-3"></div>

               <?php if(Auth::guest()) : ?>
                    <!--<label id="opis">Drzis casove iz nekog predmeta?</label>-->
                    <a href="/login"><div class="btn btn-danger"  id="login-btn" ><b>Prijavi se</b></div></a>

                    <a href="/register"><div class="btn btn-danger" id="signup-btn" ><b>Registruj se</b></div></a>'
                    <?php else : ?>
                    <a href="#">
                        <div class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <img id="mini-avatar" class="img-circle" width="40px" height="40px" src="<?php include('phpInclude/printAvatar.php')?>" alt="av" />
                                   <?php echo Auth::user()->firstname ?> <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu col-xs-5" role="menu">
                                   <li>
                                       <a href="/home">Početna stranica</a>
                                   </li>
                                   <li>
                                       <a href="/moji-predmeti">Moji predmeti</a>

                                   </li>
                                   <li>
                                       <a href="/prihvaceni-zahtevi">Prihvaceni zahtevi</a>

                                   </li>
                                   <li>
                                       <a href="/odbijeni-zahtevi">Odbijeni zahtevi</a>
                                   </li>
                                   <li>
                                       <a href="/javni-zahtevi">Javni zahtevi</a>
                                   </li>
                                   <li>
                                       <a href="/settings">Podešavanje naloga</a>

                                   </li>
                                   <li>
                                       <a href="/help">Pomoć</a>
                                   </li>

                                   <li>
                                       <a href="<?php echo url('/logout') ?>"
                                          onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                           Logout
                                       </a>

                                       <form id="logout-form" action="<?php echo url('/logout') ?>" method="POST" style="display: none;">
                                           <?php echo csrf_field() ?>
                                       </form>
                                   </li>
                               </ul>
                    <div class="col-xs-2"></div>
                            </div>
                        </a>

                   <?php endif; ?>
                </div>
            </div>


        </div>
    </div>
</nav>

<style>
    .container-fluid {
        height: 10px;
    }

    #opis{
        color:white;
    }
    #login-btn{
        padding: 10px;
        margin-top: 2px;
    }

    #signup-btn{
        padding: 10px;
        margin-top: 2px;
    }

</style>
</body>
</html>
