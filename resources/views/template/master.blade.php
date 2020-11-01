<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mie Mami</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">


  <link rel="stylesheet" href="{{asset('css/jquery.fancybox.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
  <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('css/aos.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    @include("template.navbar")
    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        <div class="container">

          <div class="row">
            <div class="col-12 text-center">
              <div class="social-icons">
                <a href="#"><span class="icon-facebook"></span></a>
                <a href="#"><span class="icon-twitter"></span></a>
                <a href="#"><span class="icon-youtube"></span></a>
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="copyright">
                  <p>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      </p>



              </div>
            </div>
          </div>
        </div>
      </div>






  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('js/jquery.sticky.js')}}"></script>
  <script src="{{asset('js/jquery.mb.YTPlayer.min.js')}}"></script>
  <script src="https://kit.fontawesome.com/2de225e4d0.js" crossorigin="anonymous"></script>

  <script src="{{asset('js/cart.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <script >

  </script>



</body>

</html>
