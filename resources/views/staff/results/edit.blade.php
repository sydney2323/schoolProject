@extends('layouts.admin')

@section('content')

  <div class="pagetitle">
    <h1>Results</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/staff">Home</a></li>
        <li class="breadcrumb-item"><a href="/staff/result">Results</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    <form action="/staff/result/{{ $result->id }}" method="POST">
      @csrf
      @method('PUT')
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Reg No</label>
        <input type="number" class="form-control" disabled value="{{ $result->reg_no }}"  name="reg_no">
        @error('reg_no')
        <span class="error text-danger">{{ $message }}</span>
      @enderror
      </div>
      <div class="row pt-2">
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Cat 1</label>
          <input type="number" class="form-control" value="{{ $result->cat_1 }}"  name="cat_1">
          @error('cat_1')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Cat 2</label>
          <input type="number" class="form-control" value="{{ $result->cat_2 }}"  name="cat_2">
          @error('cat_2')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="row pt-2">
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Assignment 1</label>
          <input type="number" class="form-control" value="{{ $result->assignment_1 }}"  name="assignment_1">
          @error('assignment_1')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Assignment 2</label>
          <input type="number" class="form-control" value="{{ $result->assignment_2 }}"  name="assignment_2">
          @error('assignment_2')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Save</button>
        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
      </div>

    </form><!-- Vertical Form -->

  </div>
</div>


@endsection