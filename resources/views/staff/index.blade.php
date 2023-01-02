@extends('layouts.staff')

@section('content')

<h1>Assigned Module</h1>
<nav>
  <ol class="breadcrumb">
  </ol>
</nav>
</div><!-- End Page Title -->

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

          <!-- Table with stripped rows -->
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Level</th>
                <th scope="col">Programe</th>
                {{-- <th scope="col">Students</th>
                <th scope="col">Action</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($assigned_modules as $assigned_module)
              <tr>
                <th scope="row">{{$assigned_module->code}}</th>
                <td>{{$assigned_module->name}}</td>
                <td>{{$assigned_module->level}}</td>
                <td>{{$assigned_module->programe}}</td>
                {{-- <td>25</td>
                <td>
                    <button type="submit" class="btn btn-info text-white btn-sm">Download Student list</button>
                </td> --}}
              </tr>
              @endforeach
              
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>
</div>
    
@endsection