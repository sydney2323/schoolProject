<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AIS</title>
    <link href="{{ asset('assets/img/logo2.png') }}" rel="icon">
    
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/best-carousel-slide.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dh-card-image-left-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Basic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Newsletter-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

 
  
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button">
        <div class="container">
          <a class="navbar-brand" href="#">
            <span>
              <img style="max-height: 80px" src="{{ asset('assets/img/logo2.png') }}" alt="">
            </span>
            AIS
          </a>
          <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <!-- <li class="nav-item"><a class="nav-link active" href="#">HOD&nbsp;</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="#">&nbsp;About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">&nbsp;Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">&nbsp;HOD</a></li>
                </ul><span class="navbar-text actions"> <a class="login" href="/staff/login/form">STAFF&nbsp;&nbsp;</a><a class="btn btn-light action-button" role="button" href="#">STUDENT&nbsp;</a></span>
            </div>
        </div>
    </nav>

    <main>

        @yield('content')
        
    </main><!-- End #main -->
    
    <div class="col">
        <footer class="footer-basic ">
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
            <p class="copyright">AIS © 2022</p>
        </footer>
    </div>
    
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script> --}}
    <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>