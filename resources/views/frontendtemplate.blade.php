<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Online Shopping - @yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontendtemplate/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('frontendtemplate/css/small-business.css')}}" rel="stylesheet">
  <link href="{{ asset('frontendtemplate/css/hover-master/css/hover.css')}}" rel="stylesheet">
  <link href="{{ asset('frontendtemplate/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <style type="text/css">
    @-webkit-keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-10px);
          -moz-transform: translatex(-10px);
          -o-transform: translatex(-10px);
          transform: translatex(-10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @-moz-keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-10px);
          -moz-transform: translatex(-10px);
          -o-transform: translatex(-10px);
          transform: translatex(-10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @keyframes fadeInLeft {
        from {
          opacity:0;
          -webkit-transform: translatex(-100px);
          -moz-transform: translatex(-100px);
          -o-transform: translatex(-100px);
          transform: translatex(-100px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      .in-left {
        -webkit-animation-name: fadeInLeft;
        -moz-animation-name: fadeInLeft;
        -o-animation-name: fadeInLeft;
        animation-name: fadeInLeft;
        -webkit-animation-fill-mode: both;
        -moz-animation-fill-mode: both;
        -o-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-duration: 0.2s;
        -moz-animation-duration: 0.2s;
        -o-animation-duration: 0.2s;
        animation-duration: 0.2s;
        -webkit-animation-delay: 0.2s;
        -moz-animation-delay: 0.2s;
        -o-animation-duration:0.2s;
        animation-delay: 0.2s;
      }

      @-webkit-keyframes fadeInRight {
        from {
          opacity:0;
          -webkit-transform: translatex(10px);
          -moz-transform: translatex(10px);
          -o-transform: translatex(10px);
          transform: translatex(10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @-moz-keyframes fadeInRight {
        from {
          opacity:0;
          -webkit-transform: translatex(-10px);
          -moz-transform: translatex(-10px);
          -o-transform: translatex(-10px);
          transform: translatex(-10px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      @keyframes fadeInRight {
        from {
          opacity:0;
          -webkit-transform: translatex(100px);
          -moz-transform: translatex(100px);
          -o-transform: translatex(100px);
          transform: translatex(100px);
        }
        to {
          opacity:1;
          -webkit-transform: translatex(0);
          -moz-transform: translatex(0);
          -o-transform: translatex(0);
          transform: translatex(0);
        }
      }
      .in-right {
        -webkit-animation-name: fadeInRight;
        -moz-animation-name: fadeInRight;
        -o-animation-name: fadeInRight;
        animation-name: fadeInRight;
        -webkit-animation-fill-mode: both;
        -moz-animation-fill-mode: both;
        -o-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-duration: 0.2s;
        -moz-animation-duration: 0.2s;
        -o-animation-duration: 0.2s;
        animation-duration: 0.2s;
        -webkit-animation-delay: 0.2s;
        -moz-animation-delay: 0.2s;
        -o-animation-duration:0.2s;
        animation-delay: 0.2s;
      }
      /*======================FadeInUp===========================*/
      @keyframes fadeInUp {
          from {
              transform: translate3d(0,40px,0)
          }

          to {
              transform: translate3d(0,0,0);
              opacity: 1
          }
      }

      @-webkit-keyframes fadeInUp {
          from {
              transform: translate3d(0,40px,0)
          }

          to {
              transform: translate3d(0,0,0);
              opacity: 1
          }
      }

      .animated {
          animation-duration: 1s;
          animation-fill-mode: both;
          -webkit-animation-duration: 1s;
          -webkit-animation-fill-mode: both
      }

      .animatedFadeInUp {
          opacity: 0
      }

      .fadeInUp {
          opacity: 0;
          animation-name: fadeInUp;
          -webkit-animation-name: fadeInUp;
      }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hvr-icon-buzz-out" href="{{route('cart')}}"><i class="fa fa-shopping-cart hvr-icon" aria-hidden="true"></i>
              <span class="badge badge-light product_count">0</span></a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 mt-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('frontendtemplate/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontendtemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('frontendtemplate/sweetalert/dist/sweetalert.min.js')}}"></script>

  @yield('script')

</body>

</html>
