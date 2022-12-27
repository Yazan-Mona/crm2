@extends('layouts.admin')
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
 <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap.css")}}">
    
<link rel="stylesheet" href="{{asset("/assets/vendors/iconly/bold.css")}}">

    <link rel="stylesheet" href="{{asset("/assets/vendors/perfect-scrollbar/perfect-scrollbar.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/vendors/bootstrap-icons/bootstrap-icons.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/app.css")}}">
    <link rel="shortcut icon" href="{{asset("/assets/images/favicon.svg")}}" type="image/x-icon">

@section('content')
@can('listing-view')


    <!-- Basic Tables start -->
    <section class="section">
        <div class="card justify-content">
            <div class="card-header">
            <button type="button" class="btn btn-primary">Add New</button>
            <button type="button" class="btn btn-primary  bi-eye"></button>
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
                            {{ $listing->user_id ?? '' }}
                        </td>                        <td>
                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

                            {{ $listing->owner_id ?? '' }}
                            @endif
                        </td>                        
                        <td>
                            {{ $listing->project_id ?? '' }}
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
