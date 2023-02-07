@extends('layouts.student')

@section('content')

<h1>Home</h1>
<nav>
  <ol class="breadcrumb">
  </ol>
</nav>
</div><!-- End Page Title -->

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
      <!-- Table with hoverable rows -->
      <table class="table table-hover datatable">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Desc</th>
            <th scope="col">Date</th>
            <th scope="col">Start Time</th>
            <th scope="col">Duration</th>
            <th scope="col">Action</th>
           
          </tr>
        </thead>
        <tbody>
        
         @foreach ($classes as $class)
           <tr>
            <td>{{ $class->title }}</td>
            <td>{{ $class->desc }}</td>
            <td>{{ $class->date }}</td>
            <td>{{ $class->start_time }}</td>
            <td>{{ $class->duration }}</td>
            <td>
              <a href="{{ $class->join_url }}" class="btn btn-sm btn-success text-white">Join Online Class</i></a>
            </td>
           </tr>  
         @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->


        </div>
      </div>
</div>
    
@endsection