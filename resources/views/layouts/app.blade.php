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
    <link rel="stylesheet" href="{{ asset('assets/css/Footer-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Logo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-with-Button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Newsletter-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Navigation-Clean.css') }}">
    

 
  
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<style>
    #check{
        float: left;
        padding-right: 100px;
    }
</style>

<body>

        <!-- Start: Navigation with Button -->
        <nav class="navbar navbar-light navbar-expand-lg navigation-clean-button" style="height: 87px;">
            <div class="container">
                <!-- Start: Logo -->
                <nav class="navbar navbar-light navbar-expand-md">
                    <div class="container-fluid">
                        <div><img id="ii" src="{{ asset('assets/img/logo2.png') }}" style="width: 100px;height: 100px;"><button class="navbar-toggler" data-bs-toggle="collapse"></button></div><!-- Start: Navigation Clean -->
                        <nav class="navbar navbar-light navbar-expand-lg navigation-clean">
                            <div class="container">
                                <!-- Start: Academic information system -->
                                <a class="navbar-brand" href="#">Academic Information System</a>
                                <!-- End: Academic information system --><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <div class="collapse navbar-collapse" id="navcol-4">
                                    <ul class="navbar-nav ms-auto" id="check">
                                        <li class="nav-item"><a class="nav-link" id="fi" href="/staff/login/form">Staff</a></li>
                                        <li class="nav-item"><a class="nav-link" id="si" href="/student/login/form">Student</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav><!-- End: Navigation Clean -->
                    </div>
                </nav>
                
                <button class="navbar-toggler" data-bs-toggle="collapse"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav><!-- End: Navigation with Button -->
        <!-- Start: Nav-center-custom -->
        <nav class="navbar text-success navbar-expand-md sticky-top" id="bb">
            <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="navbar-nav flex-grow-1 justify-content-between" id="clr">
                        <li class="nav-item"><a class="nav-link active"></a></li>
                        <li class="nav-item"><a class="nav-link scroll" style="font-family: ABeeZee, sans-serif;" href="/"><span style="color: black;">Home</span></a></li>
                        <li class="nav-item"><a class="nav-link scroll" style="font-family: ABeeZee, sans-serif;" href="#team" target="_top"> <span style="color: black;">About us</span></a></li>
                        <li class="nav-item"><a class="nav-link scroll" style="font-family: ABeeZee, sans-serif;" href="#services"><span style="color: black;">Programs</span></a></li>
                        <li class="nav-item"><a class="nav-link" style="font-family: ABeeZee, sans-serif;" href="#"><span style="color: black;">Join Us</span></a></li>
                        <li class="nav-item"><a class="nav-link active"></a></li>
                    </ul>
                </div>
            </div>
        </nav><!-- End: Nav-center-custom -->

    <main>

        @yield('content')
        
    </main><!-- End #main -->

       <!-- Start: Footer Clean -->
       <footer class="footer-clean text-black">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Start: Services -->
                <div class="col-sm-4 col-md-3 item">
                    <h3>Services</h3>
                    <ul>
                        <li><a href="#">Web design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Hosting</a></li>
                    </ul>
                </div><!-- End: Services -->
                <!-- Start: About -->
                <div class="col-sm-4 col-md-3 item">
                    <h3>About</h3>
                    <ul>
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Legacy</a></li>
                    </ul>
                </div><!-- End: About -->
                <!-- Start: Careers -->
                <div class="col-sm-4 col-md-3 item">
                    <h3>Careers</h3>
                    <ul>
                        <li><a href="#">Job openings</a></li>
                        <li><a href="#">Employee success</a></li>
                        <li><a href="#">Benefits</a></li>
                    </ul>
                </div><!-- End: Careers -->
            </div>
            {{-- <p class="copyright" style="text-align: center">AIS © 2022</p> --}}
        </div>
    </footer><!-- End: Footer Clean -->
    
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