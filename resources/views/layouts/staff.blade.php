<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AIS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ secure_asset('assets/img/logo2.png') }}" rel="icon">
  <link href="{{ secure_asset('assets/img/logo2.png') }}" rel="apple-touch-icon">

  <meta name="csrf-token" content="content">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">

  @livewireStyles

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/staff" class="logo d-flex align-items-center">
        <img style="max-height: 55px" src="{{ secure_asset('assets/img/logo2.png') }}" alt="">
        <span class="d-none d-lg-block" style="font-size: 25px">AIS STAFF</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
   

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            {{-- <img src="{{ secure_asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle"> --}}
            <span class="d-none d-md-block dropdown-toggle ps-2">
              
              @php
                $f_name = Auth::guard('staff')->user()->f_name; 
                $l_name = Auth::guard('staff')->user()->l_name; 

                echo $f_name.' '.$l_name;
              @endphp
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/staff/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>


           
          {{-- 
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li> --}}

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    

      <li class="nav-item">
        <a class="nav-link" href="/staff">
          <i class="bi bi-book"></i>
          <span>Assigned Modules</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="/staff/result">
          <i class="bi bi-journal-check"></i>
          <span>Upload Results</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/staff/online-class">
          <i class="bi bi-tv"></i>
          <span>Online Class</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed text-danger" data-bs-toggle="modal" data-bs-target="#basicModal" href="#">
          <i class="bi bi-box-arrow-in-left text-danger"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')
    
  </main><!-- End #main -->

    <!-- Basic Modal -->
    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="/staff/logout" class="btn btn-sm btn-danger">Logout</a>
          </div>
        </div>
      </div>
    </div><!-- End Basic Modal-->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer mt-auto">
  <div class="copyright">
    &copy; Copyright <strong><span>AIS</span></strong>. All Rights Reserved
  </div>
 
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ secure_asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ secure_asset('assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ secure_asset('assets/js/main.js') }}"></script>

@livewireScripts

@yield('scripts')

</body>

</html>

