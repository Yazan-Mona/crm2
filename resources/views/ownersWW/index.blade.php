@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')
@can('owner-view')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">

                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('owners.create') }}">New Owner</a>
                </span>

            </div>
        
           
            <div class="card-body">
            <div class="table-responsive">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th>Email</th>
                            <th>Nationality</th>
                            <th>Source</th>
                            <th>Emirate Id</th>
                            <th>Assign to</th>
                            @if (Auth::user()->getRoleNames()[0]== "admin")
                            <th>Mobile</th>
                            <th>Alternate Mobile</th>
                            <th>Created by </th>
                            @endif
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $owner)
                    @if ($owner->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

                    <tr>
                    <td>
                            {{ $owner->firstname ?? '' }}
                        </td>
                        <td>
                            {{ $owner->lastname ?? '' }}
                        </td>
                        <td>
                            {{ $owner->email ?? '' }}
                        </td>
                        <td>
                            {{  $owner->nationality ?? '' }}
                        </td>
                        <td>
                            {{ $owner->source ?? '' }}
                        </td>
                        <td>
                            {{ $owner->emirate_id_number ?? '' }}
                        </td>
                        <td>
                        {{$owner->user->getRoleNames()[0]}}
                        </td>
                        @if (Auth::user()->getRoleNames()[0]== "admin")
                        <td>
                            {{ $owner->mobile ?? '' }}
                        </td>
                        <td>
                            {{ $owner->alternate_mobile ?? '' }}
                        </td>
                       
                        <td>
                        
                        {{$owner->create->getRoleNames()[0]}}
                        
                        </td>
                        @endif
                        <td>
                        @can('owner-show')
                        <a class="btn btn-primary  bi-eye" href="{{ route('owners.show', $owner->id) }}"></a>
                        @endcan 

                        @can('owner-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('owners.edit', $owner->id) }}"></a>
                        @endcan 
                        <a class="btn btn-success  bi-chat-dots"></a>
                       
                        @can('owner-delete')
                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan 
                       
                                </td>
                    </tr> 
                    @endif  
                    @endforeach
                      

                    </tbody>
                </table>
            </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

    @if (Auth::user()->getRoleNames()[0]== "admin")
<!-- Basic Tables start -->
        <form action="{{ route('import-owners') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <table class="table   table  " id="table1">
                            <tr>

                            </tr>
                            <td><input type="file" name="file" class="form-control" id="customFile"></td>
                            <td><button class="btn btn-primary">Import   Listings</button></td>
                            <td><a class="btn btn-success " href="{{ route('export-owners') }}">Export Listings</a></td>
           

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
