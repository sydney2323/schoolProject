@extends('layouts.app')

@section('content')

<div class="container">

  <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
          
          </div><!-- End Logo -->
         
          <div class="card mb-5">
           
            <div class="card-body">

              <div class="pt-4 pb-4">
                <h5 class="card-title text-center text-dark pb-0 fs-4">Login to Student Account</h5>
              </div>
              @if ($message = Session::get('warning'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                   {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <form action="/student/login" method="POST" class="row g-3">
                 @csrf
                <div class="col-12">
                  <label for="yourreg_no" class="form-label">Reg No</label>
                  <div class="input-group">
                    <input type="text" name="reg_no" value="{{ old('reg_no') }}" class="form-control">
                  </div>
                  @error('reg_no')
                    <span class="error text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                  @error('password')
                    <span class="error text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>

  </section>

</div>
    
@endsection