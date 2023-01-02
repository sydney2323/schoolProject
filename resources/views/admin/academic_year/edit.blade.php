@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Academic Year</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/admin/academic-year">Academic Year</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    @if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
         {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="/admin/academic-year/{{ $academicYear->id }}" method="POST" class="row g-3">
      @csrf
      @method('PUT')
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Academic Year</label>
        <input type="text" class="form-control" value="{{ $academicYear->academic_year }}" name="academic_year">
        <small class="">Eg. 2021/2022</small><br>
        @error('academic_year')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" name="status" type="checkbox" value="1"  {{  ($academicYear->status == 1 ? ' checked' : '') }} id="gridCheck1">
          <label class="form-check-label" for="gridCheck1">
            Active
          </label>
        </div>
        @error('status')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Save</button>
        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
      </div>

    </form><!-- Vertical Form -->

  </div>
</div>


@endsection