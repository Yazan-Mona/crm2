@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')
@can('project-view') 
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            @can('project-create') 
            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('projects.create') }}">New Project</a>
                </span>
            @endcan
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                            <th> Main Image</th>
                            <th> Name</th>
                            <th>Title</th>
                            <th>Community</th>
                            <th>Emirate</th>
                            <th>Property_type</th>
                            <th>Description</th>
                            <th>Developer</th>
                            <th>State</th>
                            <th>Note</th>
                            <th>status</th>

                            <th>Floor_number</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $project)
                    <tr>  
                        <td>
                        <img src="{{ asset('/image/'.$project->main_image) }}"    width= "120px"
                                    aspect-ratio= "auto 120 / 100" height= "100px">
                        </td>     
                        <td>
                            {{ $project->name ?? '' }}
                        </td>
                        <td>
                            {{ $project->title ?? '' }}
                        </td>
                        <td>
                            {{ $project->community ?? '' }}
                        </td>
                        <td>
                            {{  $project->emirate ?? '' }}
                        </td>
                        <td>
                            {{ $project->property_type ?? '' }}
                        </td>
                        <td>
                        {{ substr($project->description, 0,  50) }}
                        
                        </td>
                        <td>
                            {{ $project->developer ?? '' }}
                        </td>
                        <td>
                            {{ $project->state ?? '' }}
                        </td>
                        <td>
                      
                            {{ substr($project->note, 0,  50) }}
                        </td>
                        <td>
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            {{ $project->floor_number ?? '' }}
                        </td>
                    <td>
                        @can('project-show') 
                        <a class="btn btn-primary  bi-eye" href="{{ route('projects.show', $project->id) }}"></a>
                        @endcan
                        @if (Auth::user()->getRoleNames()[0]== "admin" || Auth::user()->getRoleNames()[0]== "Raik")

                        @can('project-edit') 
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('projects.edit', $project->id) }}"></a>
                        @endcan
                        @endif
                        @can('listing-view') 
                        <form action="{{ route('projects.lists') }}" method="get" style="display: inline-block;">
                            <input type="hidden" id="id" name ="id" class="form-control round" value="{{$project->id}}">

                            <!--<a class="btn btn-success   bi-building"  href="{{ route('project-listings', $project->id )}}"></a>
                             -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                               <button type="submit" class="btn btn-success  bi-building">
                                
                               </button>
                        </form>
                        @endcan
                    

                        @can('project-delete') 
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        </div>

    </section>
    <!-- Basic Tables end -->

    @if (Auth::user()->getRoleNames()[0]== "admin")
<!-- Basic Tables start -->
<form action="{{ route('import-projects') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <table class="table   table  " id="table1">
                            <tr>

                            </tr>
                            <td><input type="file" name="file" class="form-control" id="customFile"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="btn btn-primary">Import   projects</button></td>
                            <td><a class="btn btn-success " href="{{ route('export-projects') }}">Export projects</a></td>
           

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
