@extends('layouts.admin')

@section('content')

    <h1>Module</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Module</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          <a class="btn btn-primary" href="/module/create">Create</a>
        </h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Level</th>
              <th scope="col">Programe</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($modules as $module)
             <tr>
              <td>{{ $module->code }}</td>
              <td>{{ $module->name }}</td>
              <td>{{ $module->level }}</td>
              <td>{{ $module->programe }}</td>
              <td>
                 
                  <form action="/module/{{ $module->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/module/{{ $module->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil"></i></a>
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