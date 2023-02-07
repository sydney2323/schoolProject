@extends('layouts.admin')

@section('content')

<h1>Results</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active">Results</li>
  </ol>
</nav>
</div><!-- End Page Title -->

<div class="card pt-4">
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
           @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div id="message"></div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi-check-circle me-1"></i>
           {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <h5 class="card-title">
        <a class="btn btn-secondary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal" href="#">Upload Final Exam</a>
        {{-- <a class="btn btn-secondary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#smallModal2" href="#">Customize Excel Template</a> --}}
        {{-- <a class="btn btn-success text-white btn-sm" href="#">Publish Result</a> --}}
      </h5>

     

      <!-- Table with hoverable rows -->
      <table class="table table-hover mytable datatable">
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
            <td>
               
                <form action="/admin/result/{{ $result->id }}" method="post">
                  @method('DELETE')
                  @csrf
                  {{-- <a href="/admin/result/{{ $result->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil-square"></i></a> --}}
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
         <form action="/admin/result/import" method="POST" enctype="multipart/form-data">
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
              <button type="submit" class="btn btn-sm btn-info text-white">Upload</button>
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
          <form action="/admin/result/export-customized-template" method="post">
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
          <button type="submit" class="btn btn-sm btn-info text-white">Download Template</button>
        </div>
      </form>
      </div>
    </div>
  </div><!-- End Results-->



@endsection

@section('scripts')

@if ($errors->has('level')||$errors->has('programe'))
<script type="text/javascript">
  $( document ).ready(function() {
       $('#smallModal2').modal('show');
  });
</script>
@endif

@if ($errors->has('module_id')||$errors->has('file') )
<script type="text/javascript">
  $( document ).ready(function() {
       $('#smallModal').modal('show');
  });
</script>
@endif

<script>



$(document).ready(function () {

  var module_id;
  var get_input_id;

  var timer;
  var timeout = 1000;

  $(document).on("click", ".check", function () {
    var result_id = $(this).data('id');
    var examInputName = 'examInput'+result_id;
    send_ajax_to_save_final_exam(examInputName, result_id);
  });

  function send_ajax_to_save_final_exam(examInputName, result_id) {
    $('#'+examInputName+'').keyup(function(){
          clearTimeout(timer);
          if ($('#'+examInputName+'').val) {
              timer = setTimeout(function(){

                if ($('#'+examInputName+'').val() == '') {
                  return false;
                }

                var value = $('#'+examInputName+'').val();

                $.ajax({
                    url: "{{url('admin/result/store-final-exam')}}",
                    type: "PUT",
                    data: {
                      id: result_id,
                      value: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (response) {
                      console.log(response);
                      
                      $('#message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">\
                                         <i class="bi-check-circle me-1"></i>\
                                        '+response.success+'\
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                                          </div>');
                      $('.display'+result_id+'').html('');
                      $('.display'+result_id+'').html(response.value);
                    }
                });
                 
              }, timeout);
          }
      });
  }


  $('#level').on('change', function () {
      // var idCountry = this.value;
      var selectedPrograme = $('#programe :selected').text();
      var selectedLevel = $('#level :selected').text();
      // $("#state-dropdown").html('');
      console.log(selectedLevel,selectedPrograme);
      $.ajax({
          url: "{{url('admin/result/fetch-reg-no')}}",
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
          url: "{{url('admin/result/fetch-reg-no')}}",
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