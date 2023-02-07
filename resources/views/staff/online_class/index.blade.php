@extends('layouts.staff')

@section('content')

<h1>Zoom Online Class</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/staff">Home</a></li>
    <li class="breadcrumb-item active">Online Class</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<div class="card">
 <!-- Default Accordion -->
 <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       <strong> Create Online Class</strong>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">

        <form action="/staff/online-class" method="POST">
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

          <div class="row">
            <div class="col-6">
              <label for="inputNanme4" class="form-label">Title</label>
              <input type="text" class="form-control" value="{{ old('title') }}"  name="title">
                @error('title')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6">
              <label for="inputNanme4" class="form-label">Date</label>
              <input type="date" class="form-control" value="{{ old('date') }}"  name="date">
                @error('date')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

          </div>

          <div class="row">
            <div class="col-6">
              <label for="inputNanme4" class="form-label">Start Time</label>
              <input type="time" class="form-control" value="{{ old('start_time') }}"  name="start_time">
                @error('start_time')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-6">
              <label for="inputNanme4" class="form-label">End Time</label>
              <input type="time" class="form-control" value="{{ old('end_time') }}"  name="end_time">
                @error('end_time')
                <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>

          </div>

          <div class="col-12">
            <label for="inputNanme4" class="form-label">Description</label>
            <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
              @error('desc')
              <span class="error text-danger">{{ $message }}</span>
              @enderror
          </div>
          
          
          <div class="col-12 mt-2">
            <button type="submit" class="btn-sm btn btn-success">Save</button>
            {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
          </div>
    
        </form><!-- Vertical Form -->
        
      </div>
    </div>
  </div>
</div><!-- End Default Accordion Example -->

</div>

<div class="card pt-4">
    <div class="card-body">

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi-check-circle me-1"></i>
           {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
         
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
              <a href="{{ $class->start_url }}" class="btn btn-sm btn-info text-white">Start Online Class</i></a>
            </td>
           </tr>  
         @endforeach
        </tbody>
      </table>
      <!-- End Table with hoverable rows -->

    </div>
  </div>



@endsection