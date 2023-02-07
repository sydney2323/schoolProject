@extends('layouts.admin')

@section('content')

<div class="pagetitle">
  <h1>Module</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Home</a></li>
      <li class="breadcrumb-item"><a href="/admin/module">Module</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    <form action="/admin/module" method="POST" class="row g-3">
      @csrf
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Module Code</label>
        <input type="text" class="form-control" value="{{ old('code') }}"  name="code">
        @error('code')
          <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Module Name</label>
        <input type="text" class="form-control" value="{{ old('name') }}"  name="name">
        @error('name')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Module Credit</label>
        <input type="text" class="form-control" value="{{ old('credit') }}"  name="credit">
        @error('credit')
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

      <div class="col-12">
        <label for="inputNanme4" class="form-label">Semester</label>
        <select class="form-control" name="semester">
          <option value="">Choose..</option>
          <option value="I">I</option>
          <option value="II">II</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="V">V</option>
          <option value="VI">VI</option>
        </select>
        @error('semester')
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

