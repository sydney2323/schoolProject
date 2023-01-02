@extends('layouts.admin')

@section('content')

    <h1>Dashboard</h1>
    <section class="section dashboard">
        <div class="row">
            
             <!--  Card -->
             <div class="col-xl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Students</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $students }}</h6> 
                   </div>
                  </div>
                </div>
               </div>
            </div>

             <!--  Card -->
             <div class="col-xl-3 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Staff</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $staffs }}</h6> 
                   </div>
                  </div>
                </div>
               </div>
            </div>

             <!--  Card -->
             <div class="col-xl-3 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Modules</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $modules }}</h6> 
                   </div>
                  </div>
                </div>
               </div>
            </div>

             <!--  Card -->
             <div class="col-xl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Info</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-diamond"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6> 
                   </div>
                  </div>
                </div>
               </div>
            </div>

            
        </div>
    </section>


@endsection