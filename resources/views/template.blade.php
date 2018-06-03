<!DOCTYPE html>
<html lang="fr" class="bg">

<head>
    <meta charset="UTF-8">
    <title>Mirou's Bets</title>


    <link rel='stylesheet prefetch' href= "{{ asset('https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.31/css/uikit.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/navbarstyle.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <meta name="112732dc23a546617cbeacbb82b229c7e62354b6" content="8ad6720fe4147f289094e7b8cb2dc67c72112bb2" />

</head>

<body>

<!DOCTYPE html>
<div class="uk-offcanvas-content">
    <!-- menu position. delete .uk-light to change black navbar to white (also you should change logo to dark one)-->
    <nav class="uk-navbar-container uk-light" uk-navbar="mode: click" uk-sticky="animation: uk-animation-slide-top; show-on-up: true">
        <!-- logo or title-->
        <div class="uk-navbar-left nav-overlay"><a class="uk-navbar-item uk-logo" href="/">
                <!--h3 Site Name--><img src="http://www.joydownload.com/content/icons/33/5379c73118628.png" alt="logo" width="64"></a></div>
        <!-- end logo or title-->
        <!-- menu-->
        <div class="uk-navbar-right nav-overlay">
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav uk-visible@s">
                    <li class="uk-active">{!! link_to_route('accueil', 'Accueil') !!}</li>
                    <li>{!! link_to_route('mesparis', 'Mes paris') !!}</li>
                    <li>{!! link_to_route('account', 'Mon compte') !!}</li>
                    <li>{!! link_to_route('chart', 'Suivi des gains') !!}</li>
					@if(Auth::check() and Auth::user()->isAdmin())
					<li>{!! link_to_route('article.create', 'Ajouter un article') !!}</li>
					<li>{!! link_to_route('users', 'Utilisateurs') !!}</li>
					@endif
                    <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                </ul>
                <ul class="uk-navbar-nav uk-hidden@s">
                    <li><a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle="target: #mobile-navbar"></a></li>
                </ul>
            </div>
        </div>
        <!-- endmenu-->
        <!-- Overlay Search-->
        <div class="nav-overlay uk-navbar-left uk-flex-1" hidden>
            <div class="uk-navbar-item uk-width-expand">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Recherche..." autofocus>
                </form>
            </div><a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>
        </div>
        <!-- end overlay search-->
    </nav>
    <!-- end menu position-->
    <!-- off-canvas menu-->
    <div id="mobile-navbar" uk-offcanvas="mode: slide; flip: false">
        <div class="uk-offcanvas-bar">
            <!-- off-canvas close button-->
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <!-- off-canvas close button-->
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                <!-- logo or title-->
                <li class="uk-text-center" style="padding: 0 0 25px 0;"><a href="accueil">
                        <!--h3 Site Name--><img src="http://www.joydownload.com/content/icons/33/5379c73118628.png" alt="logo" width="64"></a></li>
                <!-- end logo or title-->
                <!-- menu-->
                <li>
                    <hr>
                </li>
                <li class="uk-text-center">
                    <h3>Menu</h3>
                </li>
                <li class="uk-active">{!! link_to_route('accueil', 'Accueil') !!}</li>
                        <!--span.uk-light(uk-icon="icon: pencil")-->
                        <!--| #{" "}Item 1--></li>
				<li>{!! link_to_route('mesparis', 'Mes Paris') !!}
                        <!--span.uk-light(uk-icon="icon: code")-->
                        <!--| #{" "}Item #{i}#{j}--></li>
                <li><a href="#">Mon compte
                        <!--span.uk-light(uk-icon="icon: code")-->
                        <!--| #{" "}Item #{i}#{j}--></a></li>
                <li><a href="#">Mes bénéfices
                        <!--span.uk-light(uk-icon="icon: code")-->
                        <!--| #{" "}Item #{i}#{j}--></a></li>
				@if(Auth::check() and Auth::user()->isAdmin())
				<li>{!! link_to_route('article.create', 'Ajouter un article') !!}</li>
				<li>{!! link_to_route('users', 'Utilisateurs') !!}</li>
				@endif
                <li><a href="{{ route('logout') }}">Déconnexion
                        <!--span.uk-light(uk-icon="icon: code")-->
                        <!--| #{" "}Item #{i}#{j}--></a></li>
            </ul>
        </div>
    </div>
    <!-- end off-canvas menu-->
</div>   	<body>
@yield('contenu')
</body> <script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.31/js/uikit.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.31/js/uikit-icons.min.js'></script>



</body>

</html>