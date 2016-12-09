
                                   <nav class="navbar  navbar-inverse">
    <div class="container-fullwidth">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            <!-- Branding Image -->

            <a id="siteSignature" style="margin-top: 2%;" class="navbar-brand" href="/" ><b>NAUČI KAKO</b></a>
            <?php if(Auth::user()) : ?>
            <a class="navbar-brand" style="font-size:1.5em;" href="/home">
                <i class="glyphicon glyphicon-user"></i>
            </a>
            <?php endif; ?>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
<ul style="margin-top:7px;margin-left:20px;"class="nav navbar-nav navbar-left"><li><a href="/help" class="btn btn-primary patka btn-outline"><span class="glyphicon glyphicon-question-sign"></span> Pomoć</a></li></ul>		
<?php if(!Auth::guest()) : ?>
          	 <ul style="margin-top:0px; padding:0px;" class="nav navbar-nav navbar-right">
			<li>
                        	<a style="margin:0px; padding:0px;" class="patka" href="predaja-oglasa"><div class="btn btn-danger btn3d" style="margin-top:0px"  id="predajOglasZaPredmet"><b>Predaj oglas za predmet</b></div></a>
                   	</li>
		</ul>
		 <?php endif; ?>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                    <?php if(Auth::guest()) : ?>
                    <li><label id="opis"  style="margin-top: 7%; text-align: right; font-style: italic">Držis časove iz nekog predmeta?</label></li>

                    <li><a class="patka" href="/login"><button class="btn btn3d btn-danger"  id="login-btn"><b>Prijavi se</b></button></a></li>

                    <li><a class="patka" href="/register"><button class="btn btn3d btn-danger"  id="signup-btn" ><b>Registruj se</b></button></a></li>
                <?php else : ?>

                    <li class="dropdown">
                        <a href="#" id="mini-profile" class="patka dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img id="mini-avatar" class="img-circle" width="35px" height="35px" src="<?php include('phpInclude/printAvatar.php')?>" alt="av" />
                            <span style="color:white; font-weight: bold"><?php echo Auth::user()->firstname ?></span> <span style="color:white;" class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/home">Početna stranica</a>
                            </li>

                            <li>
                                <a href="/moji-predmeti">Moji predmeti</a>

                            </li>
                            <li>
                                <a href="/prihvaceni-zahtevi">Prihvaćeni zahtevi</a>

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
                                <a href="/profile/<?php echo \App\Profesor::odUsera(Auth::user())->sifProfesora; ?>">Moj profil</a>

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
 	 <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="/css/navbar.css"  />



