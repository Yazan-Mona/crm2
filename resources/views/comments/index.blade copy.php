@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">



    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            <button type="button" class="btn btn-primary">Add New</button>
            <button type="button" class="btn btn-primary  bi-eye"></button>
            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('owners.create') }}">New Owner</a>
                </span>

                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                     @csrf
    
                    <input type="file" name="file" class="custom-file-input" id="customFile">

  
                   <button class="btn btn-primary">Import Users</button>
                  <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
                </form>
            </div>
        
           
            <div class="card-body">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th>Email</th>
                            <th>nationality</th>
                            <th>source</th>
                            <th>emirate_id</th>
                            <th>assign_to</th>
                            <th>mobile</th>
                            <th>alternate_mobile</th>
                            <th>Status</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $contact)
                    <tr>
                    <td>
                            {{ $contact->firstname ?? '' }}
                        </td>
                        <td>
                            {{ $contact->lastname ?? '' }}
                        </td>
                        <td>
                            {{ $contact->email ?? '' }}
                        </td>
                        <td>
                            {{  $contact->nationality ?? '' }}
                        </td>
                        <td>
                            {{ $contact->source ?? '' }}
                        </td>
                        <td>
                            {{ $contact->lead_status ?? '' }}
                        </td>
                        <td>
                            {{ $contact->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $contact->mobile ?? '' }}
                        </td>
                        <td>
                            {{ $contact->alternate_mobile ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                        <a class="btn btn-primary  bi-eye" href="{{ route('contacts.show', $contact->id) }}"></a>

                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('contacts.edit', $contact->id) }}"></a>
                        <a class="btn btn-success  bi-chat-dots"></a>
              
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                    
                          
                                </td>
                         
                                
                    </tr>   
                    @endforeach
                    
                        
                        


                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->


    
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>


@endsection
