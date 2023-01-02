@extends('layouts.staff')

@section('content')

<div class="pagetitle">
  <h1>Results</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/staff">Home</a></li>
      <li class="breadcrumb-item"><a href="/staff/result">Results</a></li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<div class="card pt-4">
  <div class="card-body">
    <!-- Vertical Form -->
    @if ($message = Session::get('warning'))
    <div class="alert alert-sucess alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
         {{ $message }} 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/staff/result" method="POST">
      @csrf
      <div class="row">
        <div class="col-6">
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
        <div class="col-6">
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
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Reg No</label>
        <select class="form-control" id="reg_no_dropdown" name="reg_no">
        </select>
        @error('reg_no')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Module Name</label>
        <select class="form-control" id="programe" name="module_id">
          <option value="">Choose..</option>
          @foreach ($modules as $module)
            <option value="{{ $module->id }}">{{ $module->name }}</option>
          @endforeach
        </select>
        @error('module_id')
        <span class="error text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="row pt-2">
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Cat 1</label>
          <input type="number" class="form-control" value="{{ old('cat_1') }}"  name="cat_1">
          @error('cat_1')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Cat 2</label>
          <input type="number" class="form-control" value="{{ old('cat_2') }}"  name="cat_2">
          @error('cat_2')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="row pt-2">
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Assignment 1</label>
          <input type="number" class="form-control" value="{{ old('assignment_1') }}"  name="assignment_1">
          @error('assignment_1')
            <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-6">
          <label for="inputNanme4" class="form-label">Assignment 2</label>
          <input type="number" class="form-control" value="{{ old('assignment_2') }}"  name="assignment_2">
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


@section('scripts')
<script>



$(document).ready(function () {

  $('#level').on('change', function () {
      // var idCountry = this.value;
      var selectedPrograme = $('#programe :selected').text();
      var selectedLevel = $('#level :selected').text();
      // $("#state-dropdown").html('');
      console.log(selectedLevel,selectedPrograme);
      $.ajax({
          url: "{{url('staff/result/fetch-reg-no')}}",
          type: "POST",
          data: {
            level: selectedLevel,
            programe: selectedPrograme,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
            console.log(result);
              $('#reg_no_dropdown').html('<option value="">-- Choose--</option>');
              $.each(result.reg_no, function (key, value) {
                  $("#reg_no_dropdown").append('<option value="' + value
                      .reg_no + '">' + value.reg_no + '</option>');
              });
              // $('#city-dropdown').html('<option value="">-- Select City --</option>');
          }
      });
  });


  
  /*------------------------------------------
  --------------------------------------------
  Country Dropdown Change Event
  --------------------------------------------
  --------------------------------------------*/


  $('#programe').on('change', function () {
      // var idCountry = this.value;
      var selectedPrograme = $('#programe :selected').text();
      var selectedLevel = $('#level :selected').text();
      // $("#state-dropdown").html('');
      console.log(selectedLevel,selectedPrograme);
      $.ajax({
          url: "{{url('staff/result/fetch-reg-no')}}",
          type: "POST",
          data: {
            level: selectedLevel,
            programe: selectedPrograme,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
            console.log(result);
              $('#reg_no_dropdown').html('<option value="">-- Choose--</option>');
              $.each(result.reg_no, function (key, value) {
                  $("#reg_no_dropdown").append('<option value="' + value
                      .reg_no + '">' + value.reg_no + '</option>');
              });
              // $('#city-dropdown').html('<option value="">-- Select City --</option>');
          }
      });
  });

  /*------------------------------------------
  --------------------------------------------
  State Dropdown Change Event
  --------------------------------------------
  --------------------------------------------*/
  $('#state-dropdown').on('change', function () {
      var idState = this.value;
      $("#city-dropdown").html('');
      $.ajax({
          url: "{{url('api/fetch-cities')}}",
          type: "POST",
          data: {
              state_id: idState,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (res) {
              $('#city-dropdown').html('<option value="">-- Select City --</option>');
              $.each(res.cities, function (key, value) {
                  $("#city-dropdown").append('<option value="' + value
                      .id + '">' + value.name + '</option>');
              });
          }
      });
  });

});
</script>
@endsection