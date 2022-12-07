@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Student</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/student">Student</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    <form action="/student" method="POST" class="row g-3">
      @csrf
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Reg No</label>
        <input type="number" class="form-control" value="{{ old('name') }}"  name="reg_no">
        @error('reg_no')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">First Name</label>
        <input type="text" class="form-control" value="{{ old('code') }}"  name="f_name">
        @error('f_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="{{ old('code') }}"  name="l_name">
        @error('l_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ old('code') }}"  name="email">
        @error('email')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Contact</label>
        <input type="text" class="form-control" value="{{ old('code') }}"  name="contact">
        @error('contact')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Level</label>
        <select class="form-control" name="level">
          <option value="">Choose..</option>
          <option value="Diploma">Diploma</option>
          <option value="Degree">Degree</option>
        </select>
        @error('level')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Programe</label>
        <select class="form-control" name="programe">
          <option value="">Choose..</option>
          <option value="IT">IT</option>
          <option value="CSE">CSE</option>
        </select>
        @error('programe')
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