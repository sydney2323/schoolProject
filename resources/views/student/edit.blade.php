@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Student</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/student">Student</a></li>
      <li class="breadcrumb-item active">Edit</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    <form action="/student/{{ $student->id }}" method="POST" class="row g-3">
      @csrf
      @method('PUT')
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Reg No</label>
        <input type="number" class="form-control" value="{{ $student->reg_no }}"  name="reg_no">
        @error('reg_no')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">First Name</label>
        <input type="text" class="form-control" value="{{ $student->f_name }}"  name="f_name">
        @error('f_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="{{ $student->l_name }}"  name="l_name">
        @error('l_name')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ $student->email }}"  name="email">
        @error('email')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Contact</label>
        <input type="text" class="form-control" value="{{ $student->contact }}"  name="contact">
        @error('contact')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Level</label>
        <select class="form-control" name="level">
          <option value="">Choose..</option>
          <option {{ $student->level === 'Diploma' ? 'selected' : '' }} value="Diploma">Diploma</option>
          <option {{ $student->level === 'Degree' ? 'selected' : '' }} value="Degree">Degree</option>
        </select>
        @error('level')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Programe</label>
        <select class="form-control" name="programe">
          <option value="">Choose..</option>
          <option {{ $student->programe === 'IT' ? 'selected' : '' }} value="IT">IT</option>
          <option {{ $student->programe === 'CSE' ? 'selected' : '' }} value="CSE">CSE</option>
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