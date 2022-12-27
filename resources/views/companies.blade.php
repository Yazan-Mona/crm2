<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Laravel 8 Ajax CRUD Tutorial Using Datatable - MyWebTuts.com</h4>
                    </div>
                    <div class="col-md-12 mb-4 text-right">
                        <a class="btn btn-success" href="javascript:void(0)" id="createNewContact"> <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered data-table">
                            <thead class="bg-secondary text-white">
                                <tr>
    
                                    <th>#</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>email</th>
                                    <th>nationality</th>
                                    <th>source</th>
                                    <th>status</th>
                                    <th>lead_status</th>
                                    <th>assign_to</th>
                                    <th>mobile</th>
                                    <th>alternate_mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="contactForm" name="contactForm" class="form-horizontal">
                    <input type="hidden" name="contact_id" id="contact_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">firstname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="col-sm-2 control-label">lastname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="col-sm-2 control-label">nationality</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="source" class="col-sm-2 control-label">source</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="source" name="source" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="status" name="status" placeholder="Enter Name" value="" maxlength="50" required="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="lead_status" class="col-sm-2 control-label">lead_status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lead_status" name="lead_status" placeholder="Enter Price" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">assign_to</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="assign_to" name="assign_to" placeholder="Enter Price" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">mobile</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Price" value="" maxlength="50" required="">
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('contact.index') }}",
            columns : [
                {data:'DT_RowIndex',name:'DT_RowIndex'},
                {data:'firstname',name:'firstname'},
                {data:'lastname',name:'lastname'},
                {data:'email',name:'email'},

                {data:'nationality',name:'nationality'},
                {data:'source',name:'source'},
                {data:'status',name:'status'},
                {data:'lead_status',name:'lead_status'},
                {data:'assign_to',name:'assign_to'},
                {data:'mobile',name:'mobile'},
                {data:'alternate_mobile',name:'alternate_mobile'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
  

        $('#createNewContact').click(function () {
            $('#saveBtn').val("create-contact");
            $('#contact_id').val('');
            $('#contactForm').trigger("reset");
            $('#modelHeading').html("Create New Contact");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editContact', function () {
            var contact_id = $(this).data('id');
            $.get("{{ route('contact.index') }}" +'/' + contact_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Contact");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#contact_id').val(data.id);
            $('#name').val(data.name);
            $('#price').val(data.price);
            $('#detail').val(data.details);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                data: $('#contactForm').serialize(),
                url: "{{ route('contact.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#contactForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteContact', function (){
            var contact_id = $(this).data("id");
            var result = confirm("Are You sure want to delete !");
            if(result){
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('contact.store') }}"+'/'+contact_id,
                    success: function (data) {
                        table.draw();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }else{
                return false;
            }
        });
    });
</script>
</html>