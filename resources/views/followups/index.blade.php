@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')

@can('followup-view')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
 


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            @can('followup-create')
            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('followups.create') }}">Add New Followups</a>
                </span>
             @endcan
                
<!--
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                     @csrf
    
                    <input type="file" name="file" class="custom-file-input" id="customFile">

  
                   <button class="btn btn-primary">Import Users</button>
                  <a class="btn btn-success" href="{{ route('export-users') }}">Export Users</a>
                </form>
-->
            </div>
        
           
            <div class="card-body">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                        <th>No</th>
                            <th>Image</th>
                            <th>activity</th>
                            <th>note</th>

                            <th>file</th>
                            <th>user_id Name</th>

                            <th>contact_id</th>
                            <th>created_at</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $followup)
                    <tr>
                    <td>{{ $followup->id ?? '' }}</td>

                    <td><img src="/image/{{ $followup->file }}" width="100px"></td>
                    <td>
                            {{ $followup->activity ?? '' }}
                        </td>
                        <td>
                            {{ $followup->note ?? '' }}
                        </td>
                        <td>
                            {{ $followup->file ?? '' }}
                        </td>
                        <td>
                            {{ $followup->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $followup->contact_id ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success"> {{ $followup->created_at ?? '' }}</span>
                        </td>
                        <td>

                        @can('followup-show')
                        <a class="btn btn-primary  bi-eye" href="{{ route('followups.show', $followup->id) }}"></a>
                        @endcan
                        @can('followup-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('followups.edit', $followup->id) }}"></a>
                        @endcan

                        @can('followup-delete')
                        <form action="{{ route('followups.destroy', $followup->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                    
                          
                                </td>
                         
                                
                    </tr>   
                    @endforeach
                    @endcan
                        
                        


                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    @if (Auth::user()->getRoleNames()[0]== "admin")
<!-- Basic Tables start -->
<form action="{{ route('import-listings') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <table class="table   table  " id="table1">
                            <tr>

                            </tr>
                            <td><input type="file" name="file" class="form-control" id="customFile"></td>
                            <td><button class="btn btn-primary">Import   Follow Up</button></td>
                            <td><a class="btn btn-success " href="{{ route('export-listings') }}">Export Follow up</a></td>
           

                    </table>
    </form>
<!-- Basic Tables end -->
    @endif
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>

@endcan
@endsection
