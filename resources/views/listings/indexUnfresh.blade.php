@extends('layouts.admin')
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>



@section('content')
@can('listing-view')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card justify-content">
            <div class="card-header">

            <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('listings.create') }}">New Listing</a>
                </span>

                

            </div>
        
           
        <div class="card-body  ">
            <div class="table-responsive">
                <table class="table   table-bordered  " id="table1">
                    <thead>
                        <tr>
                        <th>Image</th>
                            <th>title</th>
                            <th>type</th>

                            <th>rent_pricing</th>
                            <th>price</th>
                            <th>beds</th>
                            <th>baths</th>
                            <th>plotarea_size</th>
                            <th>area_size</th>
                            <th>developer</th>
                            <th>Status</th>
                            <th>note</th>
                            <th>description</th>
                            <th>unitNo</th>
                            <th>user_id</th>
                            <th>owner_id</th>
                            <th>project_id</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $listing)
             
                    <tr>
                        <td>
                        <img src="{{ asset('/image/'.$listing->main_image) }}"    width= "120px"
                                    aspect-ratio= "auto 120 / 100" height= "100px">
                        </td>
                        <td>
                            {{ $listing->title ?? '' }}
                        </td>
                        <td>
                            {{ $listing->type ?? '' }}
                        </td>
                        <td>
                            {{ $listing->rent_pricing ?? '' }}
                        </td>
                        <td>
                            {{  $listing->price ?? '' }}
                        </td>
                        <td>
                            {{ $listing->beds ?? '' }}
                        </td>
                        <td>
                            {{ $listing->baths ?? '' }}
                        </td>

                        <td>
                            {{ $listing->plotarea_size ?? '' }}
                            {{ $listing->plotarea_size_postfix ?? '' }}
                        </td>
                        <td>
                            {{ $listing->area_size ?? '' }}
                            {{ $listing->area_size_postfix ?? '' }}
                        </td>
                        <td>
                            {{ $listing->developer ?? '' }}
                        </td>
                        <td>
                                <span class="badge bg-success">Active</span>
                        </td>
                        <td>
                            {{ $listing->note ?? '' }}
                        </td>                        <td>
                            {{ $listing->description ?? '' }}
                        </td>                        <td>
                            {{ $listing->unitNo ?? '' }}
                        </td>                        <td>
                            {{ $listing->user->getRoleNames()[0] ?? '' }}
                        </td>                        <td>
                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

                            {{ $listing->owner->firstname ?? '' }} {{ $listing->owner->lastname ?? '' }}
                            @endif
                        </td>                        
                        <td>
                            {{ $listing->project->name ?? '' }}
                        </td>
                        <td>

                        @can('listing-show')
                        <a class="btn btn-primary  bi-eye" href="{{ route('listings.show', $listing->id) }}"></a>
                        @endcan
                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")
                        @can('listing-edit')
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('listings.edit', $listing->id) }}"></a>
                        @endcan

                        @can('comment-create')
                        <a class="btn btn-success  bi-chat-dots" href="{{ route('listing_comment', $listing->id) }}"></a>
                        @endcan

                        @can('listing-delete')
                        <form action="{{ route('listings.destroy', $listing->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan

                        

                          <form action="{{ route('fresh.listing')}}" method="POST" >
                             @csrf
                             @method('PUT')
                                <input type="hidden" name="id" value="{{$listing->id}}">
                               
                                <button type="submit" class="btn btn-outline-primary bi-person-check-fill">
                                 
                                </button>
                            </form>

                        </td>
                        @endif  
                    </tr> 
                  
                    @endforeach
                      

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </section>


    @if (Auth::user()->getRoleNames()[0]== "admin")
    <!-- Basic Tables end -->
    <form action="{{ route('import-listings') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <table class="table   table  " id="table1">
                            <tr>

                            </tr>
                            <td><input type="file" name="file" class="form-control" id="customFile"></td>
                            <td><button class="btn btn-primary">Import   Listings</button></td>
                            <td><a class="btn btn-success " href="{{ route('export-listings') }}">Export Listings</a></td>
           

                    </table>
    </form>

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
