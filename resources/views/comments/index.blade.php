@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
 

@can('comment-view')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            <button type="button" class="btn btn-primary">Add New</button>
            <button type="button" class="btn btn-primary  bi-eye"></button>
            @can('comment-create')

            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('comments.create') }}">New Comments</a>
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

                            <th>listing_id</th>
                            <th>state</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $comment)
                    <tr>
                    <td>{{ $comment->id ?? '' }}</td>

                    <td><img src="/image/{{ $comment->file }}" width="100px"></td>
                    <td>
                            {{ $comment->activity ?? '' }}
                        </td>
                        <td>
                            {{ $comment->note ?? '' }}
                        </td>
                        <td>
                            {{ $comment->file ?? '' }}
                        </td>
                        <td>
                            {{ $comment->user_id ?? '' }}
                        </td>
                        <td>
                            {{ $comment->listing_id ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>

                        @can('comment-show')
                        <a class="btn btn-primary  bi-eye" href="{{ route('comments.show', $comment->id) }}"></a>
                        @endcan

                        @can('comment-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('comments.edit', $comment->id) }}"></a>
                          @endcan


                        @can('comment-delete')
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan
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
@endcan

@endsection
