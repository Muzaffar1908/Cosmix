<!DOCTYPE html>
<!--
	Cosmix by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Cosmix Free HTML5 Responsive Template | Template Stock</title>
<!--Bootstrap-->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<!--Responsive-->
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
<!--Animation-->
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<!--Prettyphoto-->
<link rel="stylesheet" type="text/css" href="{{asset('css/prettyPhoto.css')}}">
<!--Font-Awesome-->
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
<!--Owl-Slider-->
<link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/owl.transitions.css')}}">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
<!--Preloader-->
<div id="preloader">
  <div id="pre-status">
    <div class="preload-placeholder"></div>
  </div>
</div>
<!--Navigation-->
<header id="menu">
  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#menu"><img src="images/Logo/01.png" alt=""></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a class="scroll
              @if(Request::getRequestUri() == '/')
                active
              @endif
              "  href="{{route('home')}}">Home</a></li>
            <li><a class="scroll
              @if(Request::getRequestUri() == '/about')
              active
              @endif
              " href="{{route('about')}}">About</a></li>
            <li><a class="scroll" href="#service">Service</a></li>
            <li><a class="scroll" href="#features">Features</a></li>
            <li><a class="scroll" href="#portfolio">Portfolio</a></li>
            <li><a class="scroll" href="#pricing">Pricing</a></li>
            <li><a class="scroll" href="#team">Team</a></li>
            <li><a class="scroll" href="#blog">Blog</a></li>
            <li><a class="scroll" href="#contact">Contact</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </div>
  </div>
</header>
<!--Slider-Start-->
  @yield('home')
<!--About-Section-Start-->
 
<!--About-Sec-2-Start-->

<!--Service-Section-Start-->
  
<!--Features-Section-Start-->
 
<!--Portfolio-Section-Start-->

<!--Pricing-Section-Start-->
  
<!--Team-Section-Start-->
 
<!--Testimonials-Section-Start-->

<!--Fun-Facts-Section-Start-->

<!--Blog-Section-Start-->
  
<!--Client-Section-Start-->

<!--Contact-Section-Start-->

<footer id="footer">
  <div class="bg-sec">
    <div class="container">
      <h2>LOOKING FORWARD TO <strong>HEARING </strong>FROM YOU!</h2>
    </div>
  </div>
</footer>
<footer id="footer-down">
  <h2>Follow Us On</h2>
  <ul class="social-icon">
    <li class="facebook hvr-pulse"><a href="#"><i class="fa fa-facebook-f"></i></a></li>
    <li class="twitter hvr-pulse"><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li class="linkedin hvr-pulse"><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li class="google-plus hvr-pulse"><a href="#"><i class="fa fa-google-plus"></i></a></li>
    <li class="youtube hvr-pulse"><a href="#"><i class="fa fa-youtube"></i></a></li>
    <li class="instagram hvr-pulse"><a href="#"><i class="fa fa-instagram"></i></a></li>
    <li class="behance hvr-pulse"><a href="#"><i class="fa fa-behance"></i></a></li>
  </ul>
  <p> &copy; Copyright 2016 Cosmix - Created By : <a href="http://templatestock.co" target="_blank">Template Stock</a> </p>
</footer>
<!--Jquery-->
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<!--Boostrap-Jquery-->
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<!--Preetyphoto-Jquery-->
<script type="text/javascript" src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<!--NiceScroll-Jquery-->
<script type="text/javascript" src="{{asset('js/jquery.nicescroll.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<!--Isotopes-->
<script type="text/javascript" src="{{asset('js/jquery.isotope.js')}}"></script>
<!--Wow-Jquery-->
<script type="text/javascript" src="{{asset('js/wow.js')}}"></script>
<!--Count-Jquey-->
<script type="text/javascript" src="{{asset('js/jquery.countTo.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.inview.min.js')}}"></script>
<!--Owl-Crousels-Jqury-->
<script type="text/javascript" src="{{asset('js/owl.carousel.js')}}"></script>
<!--Main-Scripts-->
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</body>
</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
