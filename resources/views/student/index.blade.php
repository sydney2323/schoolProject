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
      <table class="table table-hover mytable">
        <thead>
          <tr>
            <th scope="col">Academic Year</th>
            <th scope="col">Reg No</th>
            <th scope="col">Module Code</th>
            <th scope="col">Ass 1</th>
            <th scope="col">Ass 2</th>
            <th scope="col">Cat 1</th>
            <th scope="col">Cat 2</th>
            <th scope="col">Final</th>
            <th scope="col">Score</th>
            <th scope="col">Grade</th>
            {{-- <th scope="col">Action</th> --}}
           
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
            <td class="display{{ $result->id }}">
              {{ $result->final_exam }}
              {{-- @if ($result->final_exam == null)
              <input type="text" id="examInput{{ $result->id }}" value="{{$result->final_exam}}" data-id="{{ $result->id }}"  class="check col-6">
              @else
              {{$result->final_exam}}
              @endif --}}
             
            </td>
            <td>{{ $result->score }}</td>
            <td>{{ $result->grade }}</td>
           </tr>  
         @endforeach
        </tbody>
      </table>

        </div>
      </div>
</div>
    
@endsection