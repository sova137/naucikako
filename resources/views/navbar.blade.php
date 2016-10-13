

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

            <a id="siteSignature" class="navbar-brand" href="/" ><b>NAUCI KAKO</b></a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <?php if(Auth::guest()) : ?>
                    <li><label id="opis"  style="margin-top: 9%; text-align: right; font-style: italic">Drzis casove iz nekog predmeta?</label></li>

                    <li><a class="patka" href="/login"><div class="btn btn-danger"  id="login-btn"><b>Prijavi se</b></div></a></li>

                    <li><a class="patka" href="/register"><div class="btn btn-danger "  id="signup-btn" ><b>Registruj se</b></div></a></li>
                <?php else : ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img id="mini-avatar" class="img-circle" width="35px" height="35px" src="<?php include('phpInclude/printAvatar.php')?>" alt="av" />
                            <?php echo Auth::user()->firstname ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
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
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="/css/navbar.css"  />

