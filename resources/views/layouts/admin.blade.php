<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AIS ADMIN-PANEL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="content">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ secure_asset('assets/img/logo2.png') }}" rel="icon">

  <link href="{{ secure_asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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
      <a href="/admin" class="logo d-flex align-items-center">
        {{-- <img src="{{ secure_asset('assets/img/logo2.png') }}" alt=""> --}}
        <span class="d-none d-lg-block">AIS ADMIN PANEL</span>
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
              <a class="dropdown-item d-flex align-items-center" href="#">
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
        <a class="nav-link " href="/admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/module">
          <i class="bi bi-book"></i>
          <span>Modules</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/student">
              <i class="bi bi-circle"></i><span>Students</span>
            </a>
          </li>
          <li>
            <a href="/admin/staff">
              <i class="bi bi-circle"></i><span>Staff</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-command"></i><span>Manage</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/admin/academic-year">
              <i class="bi bi-circle"></i><span>Academic Year</span>
            </a>
          </li>
          <li>
            <a href="/admin/privilege">
              <i class="bi bi-circle"></i><span>Admin Privileges</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/result">
          <i class="bi bi-journal-check"></i>
          <span>Results</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-heading">Others</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-lungs"></i><span>Bio Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Students</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Staff</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed text-danger" data-bs-toggle="modal" data-bs-target="#basicModal12" href="#">
          <i class="bi bi-box-arrow-in-left text-danger"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

      <!-- Basic Modal -->
      <div class="modal fade" id="basicModal12" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <p>Are you sure you want to end your session?</p>
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <a href="/admin/logout" class="btn btn-sm btn-danger">Logout</a>
            </div>
          </div>
        </div>
      </div><!-- End Basic Modal-->

  <main id="main" class="main">

    @yield('content')
    
  </main><!-- End #main -->

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

@yield('scripts')

</body>

</html>