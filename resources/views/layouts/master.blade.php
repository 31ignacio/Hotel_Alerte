<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HotelAlerte</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        {{-- <div class="header-configure-area">
            <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Connexion</a>

            <a href="#" class="bk-btn">Inscription</a>
        </div> --}}

        <div class="header-configure-area">
            @if (Auth::check())

            <div class="language-option">
                <img src="img/avatar5.png" alt="">
                <span>Votre Profil<i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="{{route('hotel.profil')}}">Profil</a></li>
                        <li><a href="{{route('logout')}}">Off</a></li>
                    </ul>
                </div>
            </div>
            @endif
            @if (Auth::check())
            <a href="{{route('client.create')}}" class="bk-btn mt-1 mb-1">Signaler un client</a>
            @else
            <a href="{{route('login')}}" class="bk-btn mt-1 mb-1">Signaler un client</a>
            @endif

        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{route('hotel.accueil')}}">Accueil</a></li>
                <li><a href="">Menu</a></li>
                @if (Auth::check())

                <li><a href="{{route('hotel.liste')}}">Hôtels</a></li>

                <li><a href="./pages.html">Signalements</a>
                    <ul class="dropdown">
                        <li><a href="{{route('client.create')}}">Signaler un client</a></li>
                        <li><a href="{{route('client.liste')}}">Liste des signalements</a></li>
                        {{-- <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li> --}}
                    </ul>
                </li>
                @endif
                {{-- <li><a href="{{route('client.create')}}">Signaler un client</a></li> --}}
                <li><a href="{{route('hotel.contact')}}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        {{-- <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div> --}}
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (229) 40735335</li>
            <li><i class="fa fa-envelope"></i> ariExpertiz@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (229) 40735335</li>
                            <li><i class="fa fa-envelope"></i> ariExperiz@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                             {{-- <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>  --}}
                            @if (Auth::check())
                            <a href="{{route('client.create')}}" class="bk-btn mt-1 mb-1">Signaler un client</a>
                            @else
                            <a href="{{route('login')}}" class="bk-btn mt-1 mb-1">Signaler un client</a>
                            @endif
                            @if (Auth::check())

                             <div class="language-option">
                                <img src="img/avatar5.png" alt="">
                                <span>Votre Profil <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="{{route('hotel.profil')}}">Profil</a></li>
                                        <li><a href="{{route('logout')}}">Off</a></li>
                                    </ul>
                                </div>
                            </div> 
                            @endif

                            {{-- <div class="header-configure-area">
                                <div class="language-option">
                                    <img src="img/flag.jpg" alt="">
                                    <span>EN <i class="fa fa-angle-down"></i></span>
                                    <div class="flag-dropdown">
                                        <ul>
                                            <li><a href="{{route('hotel.profil')}}">Profil</a></li>
                                            <li><a href="#">Déconnexion</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="{{route('hotel.accueil')}}">Accueil</a></li>
                                    <li><a href="">Menu</a></li>
                                    @if (Auth::check())

                                    <li><a href="{{route('hotel.liste')}}">Hôtels</a></li>

                                    <li><a href="./pages.html">Signalements</a>
                                        <ul class="dropdown">
                                            <li><a href="{{route('client.create')}}">Signaler</a></li>
                                            <li><a href="{{route('client.liste')}}">Signalements</a></li>
                                            {{-- <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li> --}}
                                        </ul>
                                    </li>
                                    @endif
                                    {{-- <li><a href="{{route('client.create')}}">Signaler un client</a></li> --}}
                                    <li><a href="{{route('hotel.contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                            {{-- <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>




    <br>
    @yield('content')




    
    <!-- Footer Section Begin -->
    <footer class="footer-section">
    
      <div class="copyright-option">
          <div class="container">
              <div class="row">
                  <div class="col-lg-7">
                    @if (Auth::check())

                      <ul>
                          <li><a href="{{route('hotel.contact')}}">Contact</a></li>
                          <li><a href="{{route('client.create')}}">Signaler client</a></li>
                          <li><a href="{{route('client.liste')}}">Liste signalement</a></li>
                      </ul>
                    @else
                        <ul>
                            <li><a href="{{route('hotel.contact')}}">Contact</a></li>
                            <li><a href="{{route('login')}}">Signaler client</a></li>
                            <li><a href="{{route('login')}}">Liste signalement</a></li>
                        </ul>
                    @endif
                  </div>
                  <div class="col-lg-5">
                      <div class="co-text">
                            <p>
                                <p style="font-size: 12px;"> Copyright © <script>document.write(new Date().getFullYear())</script> Tous droits réservés | Hôtel Alerte - Votre sécurité est notre priorité</p>
                            </p>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  {{-- <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch"><i class="icon_close"></i></div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Search here.....">
          </form>
      </div>
  </div> --}}
  <!-- Search model end -->

  <!-- Js Plugins -->
  <script src="https://cdn.kkiapay.me/k.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
