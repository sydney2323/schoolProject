@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Staff</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    <form action="/staff/{{ $staff->id }}" method="POST" class="row g-3">
      @csrf
      @method('PUT')
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Staff ID</label>
        <input type="number" class="form-control" value="{{ $staff->staff_id }}"  name="staff_id">
        @error('staff_id')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">First Name</label>
        <input type="text" class="form-control" value="{{ $staff->f_name }}"  name="f_name">
        @error('f_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="{{ $staff->l_name }}"  name="l_name">
        @error('l_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ $staff->email }}"  name="email">
        @error('email')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Contact</label>
        <input type="text" class="form-control" value="{{ $staff->contact }}"  name="contact">
        @error('contact')
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