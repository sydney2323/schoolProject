@extends('layouts.admin')

@section('content')

    <h1>Student</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Student</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="btn btn-primary btn-sm" href="/admin/student/create">Create</a><hr>
        </h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover datatable">
          <thead>
            <tr>
              <th scope="col">Reg No</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Contact</th>
              <th scope="col">Level</th>
              <th scope="col">Programe</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($students as $student)
             <tr>
              <td>{{ $student->reg_no }}</td>
              <td>{{ $student->f_name }}</td>
              <td>{{ $student->l_name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->contact }}</td>
              <td>{{ $student->level }}</td>
              <td>{{ $student->programe }}</td>
              <td>
                 
                  <form action="/admin/student/{{ $student->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/admin/student/{{ $student->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-square"></i></a>
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