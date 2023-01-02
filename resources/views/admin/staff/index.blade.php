@extends('layouts.admin')

@section('content')

    <h1>Staff</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Staff</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="btn btn-primary btn-sm" href="/admin/staff/create">Create</a><hr>
        </h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover datatable">
          <thead>
            <tr>
              <th scope="col">Staff ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Contact</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($staffs as $staff)
             <tr>
              <td>{{ $staff->staff_id }}</td>
              <td>{{ $staff->f_name }}</td>
              <td>{{ $staff->l_name }}</td>
              <td>{{ $staff->email }}</td>
              <td>{{ $staff->contact }}</td>
              <td>
                 
                  <form action="/admin/staff/{{ $staff->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/admin/staff/{{ $staff->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-square"></i></a>
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