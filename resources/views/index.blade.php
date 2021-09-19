<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form id="add_form">
    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="cls">class:</label>
      <input type="text" class="form-control" placeholder="Enter class" name="class">
    </div>
    <button type="button" id="btn_save" class="btn btn-default">Submit</button>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $StdRec)
      <tr>
        <td>{{$StdRec->name}}</td>
        <td>{{$StdRec->class}}</td>
        <td>
            <button class="btn btn-sm btn-clean btn-icon btn-icon-md edit" data-toggle="modal" data-id="{{$StdRec->id}}"  data-target="#exampleModal">
                <i class="la la-edit"></i>
            </button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>
    $(document).on('click', '#btn_save', function () {
        // alert('hello');exit;
            var form = $('#add_form')[0];
            var form_data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "{{route('SubmitData')}}",
                data: form_data,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if (data.status == 'success') {
                        $('#alert-success').show();
                        $('#alert-success').html(data.message+ `<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>`);
                        $("#alert_success").fadeOut(5000);


                        location.reload();
                        $('#add_classes').modal('hide');
                    } else {
                        alert('error');

                    }
                },
            });
        });

        $(document).on('click', '.edit', function() {

            var id = $(this).data('id');
            var form_data = new FormData();
            form_data.append('id', id);
            $.ajax({
                type: "POST",
                url: "{{route('EditData')}}",
                data: form_data,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data){
                    console.log(data);
                    $('#add_classes').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#class_id').val(id);
                    var class_name = data.class_name;
                    $('#class_name').val(class_name)
                    var description = data.description;
                    $('#description').val(description)
                },
                error: function(errorString) {

                }
            });
        });$(document).on('click', '.edit', function() {

            var id = $(this).data('id');
            var form_data = new FormData();
            form_data.append('id', id);
            $.ajax({
                type: "POST",
                url: "{{route('EditData')}}",
                data: form_data,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data){
                    console.log(data);
                    $('#add_classes').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    $('#class_id').val(id);
                    var class_name = data.class_name;
                    $('#class_name').val(class_name)
                    var description = data.description;
                    $('#description').val(description)
                },
                error: function(errorString) {

                }
            });
        });


</script>
</body>
</html>
