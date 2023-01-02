@extends('layouts.staff')

@section('content')

<h1>Results</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/staff">Home</a></li>
    <li class="breadcrumb-item active">Results</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<div class="card pt-4">
    <div class="card-body">
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi-check-circle me-1"></i>
           {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <h5 class="card-title">
        <a class="btn btn-secondary btn-sm" href="/staff/result/create">Single Upload</a>
        <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal" href="#">Multiple Upload</a>
        <a class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal2" href="#">Customize Upload Excel</a>
     
      </h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover datatable">
        <thead>
          <tr>
            <th scope="col">Academic Year</th>
            <th scope="col">Reg No</th>
            <th scope="col">Module Code</th>
            <th scope="col">Assignment 1</th>
            <th scope="col">Assignment 2</th>
            <th scope="col">Cat 1</th>
            <th scope="col">Cat 2</th>
            <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>
        
         @foreach ($results as $result)
           <tr>
            <td>{{ $result->academic_year }}</td>
            <td>{{ $result->reg_no }}</td>
            <td>{{ $result->module_id }}</td>
            <td>{{ $result->assignment_1 }}</td>
            <td>{{ $result->assignment_2 }}</td>
            <td>{{ $result->cat_1 }}</td>
            <td>{{ $result->cat_2 }}</td>
            <td>
               
                <form action="/staff/result/{{ $result->id }}" method="post">
                  @method('DELETE')
                  @csrf
                  <a href="/staff/result/{{ $result->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-square"></i></a>
                <button type="submit" class="btn btn-danger  btn-sm"><i class="bi bi-trash"></i></button>
              </form>
            </td>
           </tr>  
         @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>

  <div class="modal fade" id="smallModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Results</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="/staff/result/import" method="POST" enctype="multipart/form-data">
             @csrf

             <div class="col-12">
              <label for="inputNanme4" class="form-label">Module Name</label>
              <select class="form-control" id="programe" name="module_id">
                <option value="">-- Choose --</option>
                @foreach ($modules as $module)
                  <option value="{{ $module->id }}">{{ $module->code }} - {{ $module->name }}</option>
                @endforeach
              </select>
              @error('module_id')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-12">
              <label for="inputNanme4" class="form-label">Upload Excel</label>
              <input type="file" class="form-control" value="{{ old('file') }}"  name="file">
              @error('file')
                <span class="error text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-sm btn-info">Upload</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div><!-- End Results-->

  <div class="modal fade" id="smallModal2" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Results</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/staff/result/export-customized-template" method="post">
            @csrf
          <div class="col-12">
            <label for="inputNanme4" class="form-label">Level</label>
            <select class="form-control" id="level" name="level">
              <option value="">Choose..</option>
              <option value="Diploma">Diploma</option>
              <option value="Degree">Degree</option>
            </select>
            @error('level')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
          </div>
          <div class="col-12 pt-2">
            <label for="inputNanme4" class="form-label">Programe</label>
            <select class="form-control" id="programe" name="programe">
              <option value="">Choose..</option>
              <option value="IT">IT</option>
              <option value="CSE">CSE</option>
            </select>
            @error('programe')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-info">Download Template</button>
        </div>
      </form>
      </div>
    </div>
  </div><!-- End Results-->

@endsection