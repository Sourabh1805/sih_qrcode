<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('initiatorcss/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('initiatorcss/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="#">
                                <img src="{{asset('initiatorcss/img/govt.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">

                <nav class="nav-menu mobile-menu">
                    <ul>




                            <li><a href="/home">Home</a></li>
                            <li ><a href="/myfiles">My Files</a></li>
                            <li><a href="/aboutus">About us</a></li>
                            <li><a href="/faq">FAQ</a></li>
                            @if(Session::has('Current_User_id'))
                              <li><a href='/logout'>Logout</a></li>
                            @endif
                            @if(!Session::has('Current_User_id'))
                              <li><a href="/login">Log in</a></li>
                              <li><a href="/initiator/create">Register</a></li>
                            @endif

                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
      <br>

    @yield('content')

    </section>
    <!-- Hero Section End -->
    <!-- Banner Section Begin -->
        <div class="banner-section spad">
          <br>
            <br>
              <br>
                <br>
                  <br>
                    <br>
        </div>
        <!-- Banner Section End -->


    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('initiatorcss/img/govt.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3" >
                    <div class="footer-widget">
                        <h5>Terms And Condition</h5>
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Linking Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('initiatorcss/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('initiatorcss/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('initiatorcss/js/main.js')}}"></script>
</body>

</html>
