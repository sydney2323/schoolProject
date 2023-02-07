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
      <div class="card-body pt-4">
        <div id="messages"></div>
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi-check-circle me-1"></i>
              {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h5 class="card-title">
          <a class="btn btn-primary btn-sm" href="/admin/module/create">Create</a><hr>
        </h5>

        <!-- Table with hoverable rows -->
        <table class="table table-hover datatable">
          <thead>
            <tr>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Credit</th>
              <th scope="col">Level</th>
              <th scope="col">Programe</th>
              <th scope="col">Semester</th>
              <th scope="col">Assign</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($modules as $module)
             <tr>
              <td>{{ $module->code }}</td>
              <td>{{ $module->name }}</td>
              <td>{{ $module->credit }}</td>
              <td>{{ $module->level }}</td>
              <td>{{ $module->programe }}</td>
              <td>{{ $module->semester }}</td>
              <td>
                @php
                    if($module->assigned_staff == null){
                         $class = 'btn btn-secondary btn-sm';
                         $buttonName = 'Assign';
                    }else {
                         $class = 'btn btn-success btn-sm';
                         foreach ($staffs as $staff) {
                          if ($staff->id == $module->assigned_staff) {
                            $buttonName = $staff->f_name." ".$staff->l_name;
                          }
                         }
                    }
                @endphp
                <button type="submit" id="assign{{ $module->id }}" class=" {{$class}}" data-id="{{ $module->id }}" data-bs-toggle="modal" data-bs-target="#basicModal">
                  {{$buttonName}}
                </button>
              </td>
              <td>
                 
                  <form action="/admin/module/{{ $module->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="/admin/module/{{ $module->id }}/edit" class="btn btn-sm btn-info text-white"><i class="bi bi-pencil"></i></a>
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

        <!-- Basic Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">

                  <div class="pb-2">
                    <label for="inputNanme4" class="form-label">Programe</label>
                    <select class="form-control" id="staff_id" name="staff_id">
                      <option value="">Choose..</option>
                      @foreach ($staffs as $staff)
                        <option value="{{$staff->id}}">{{ $staff->f_name." ".$staff->l_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" id="assignSaveButton" class="btn btn-sm btn-info text-white">Save</a>
              </div>
            </div>
          </div>
        </div><!-- End Basic Modal-->


@endsection

@section('scripts')
<script>

$(document).ready(function () {
  var module_id;
  var button_id;
  $(document).on("click", "button", function () {
     var get_module_id = $(this).data('id')
     module_id = get_module_id;
  });

  $('#assignSaveButton').on('click', function () {
     
      var staff_id = $('#staff_id :selected').val();
      $.ajax({
          url: "/admin/module-assign",
          type: "POST",
          data: {
            staff_id: staff_id,
            module_id: module_id,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
            var messages = $('#messages');
            if (result.success) {
              var assign_id = 'assign'+module_id;
              console.log(assign_id);
               var alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">\
                              <i class="bi-check-circle me-1"></i>\
                               '+result.success+'\
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>';
                            $(messages).html(alert);
                            $('#'+assign_id+'').removeClass('btn-secondary').addClass('btn-success');
                            $('#'+assign_id+'').html('Assigned');
                            $('#basicModal').modal('hide');
            }else{
              var alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">\
                              <i class="bi-check-circle me-1"></i>\
                               '+result.warning+'\
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\
                            </div>';
                           $(messages).html(alert);
                           $('#basicModal').modal('hide');

            }
            
             
          }
      });
  });


});
</script>
@endsection