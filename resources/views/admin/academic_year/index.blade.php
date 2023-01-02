@extends('layouts.admin')

@section('content')

    <h1>Academic Years</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Academic Years</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="btn btn-primary btn-sm" href="/admin/academic-year/create">Create</a><hr>
        </h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover datatable">
          <thead>
            <tr>
              <th scope="col">Academic Year</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          
           @foreach ($academicYears as $academicYear)
             <tr>
              <td>{{ $academicYear->academic_year }}</td>
              <td>
                @if ($academicYear->status == 1)
                 <span class="badge bg-success">Active</span>
                @else
                 <span class="badge bg-secondary">Not active</span>
                @endif
              </td>
              <td>
                 
                  <form action="/admin/academic-year/{{ $academicYear->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/admin/academic-year/{{ $academicYear->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-square"></i></a>
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


@endsection