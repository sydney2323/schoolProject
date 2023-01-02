@extends('layouts.admin')

@section('content')

    <h1>Admin Privilege</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Admin Privilege</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
      <div class="card-body">
        <!-- Table with hoverable rows -->
        <table class="table table-hover datatable">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Is Admin</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($staffs as $staff)
             <tr>
              <td>{{ $staff->f_name }}</td>
              <td>{{ $staff->l_name }}</td>
              <td>{{ $staff->email }}</td>
              <td>
                @php
                    if($staff->is_admin == 0){
                         $class = 'btn btn-secondary btn-sm';
                         $buttonName = 'No';
                    }else {
                         $class = 'btn btn-success btn-sm';
                         $buttonName = 'Yes';
                    }
                @endphp
                <button type="submit" id="assign{{ $staff->id }}" data-id="{{ $staff->id }}" class="{{$class}} assignAdmin">
                {{$buttonName}}
                </button>
              </td>
             </tr>  
           @endforeach
          </tbody>
        </table>
        <!-- End Table with hoverable rows -->

      </div>
    </div>


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

  $('.assignAdmin').on('click', function () {
    
     var staff_id = $(this).data('id')
      $.ajax({
          url: "/admin/privilege-assign",
          type: "PUT",
          data: {
            staff_id: staff_id,
              _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function (result) {
            var messages = $('#messages');
            var assign_id = 'assign'+staff_id;
            if(result.success) {
                console.log(result.success);
                            $('#'+assign_id+'').removeClass('btn-secondary').addClass('btn-success');
                            $('#'+assign_id+'').html('Yes');
            }else if (result.success_2){
                console.log(result.success_2);
                            $('#'+assign_id+'').removeClass('btn-success').addClass('btn-secondary');
                            $('#'+assign_id+'').html('No');
            }     
          }
      });
  });


});
</script>
@endsection