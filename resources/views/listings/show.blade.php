@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>

@section('content')
@can('listing-show')
<link rel="stylesheet" href="assets/css/bootstrap.css">
 <!-- <link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Of Listing</h4>
                    
                        <a class="btn btn-primary  " href="{{ route('listings.index') }}">Back To All Listing</a>

                    </div>
                    <div class="card-content">
                        <div class="card-body">
      
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg  table-bordered " id="table1">
                                    <thead>
                                        <tr>
                                            <th  class="col-12 col-md-3" >NAME</th>
                                            <th class="col-12 col-md-9" >RATE</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>

                       
                                        <tr>
                                            <td class="text-bold-500">Title</td>
                                            <td class="text-bold-500">  {{ $listing->title }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Type</td>
                                            <td> {{ $listing->type}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Price</td>
                                            <td> {{ $listing->price }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Beds</td>
                                            <td> {{ $listing->beds }}</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Baths</td>
                                            <td> {{ $listing->baths }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">State</td>
                                            <td> {{ $listing->state }}</td>                            
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Plot area size</td>
                                            <td> {{ $listing->plotarea_size }}
                                                 {{ $listing->plotarea_size_postfix }}
                                            </td>                            
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Plot area size</td>
                                            <td> {{ $listing->area_size }}
                                                 {{ $listing->area_size_postfix }}
                                            </td>                             
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Developer</td>
                                            <td> {{ $listing-> developer}}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Note</td>
                                            <td> {{ $listing->note }}</td>                           
                                       </tr>
                                        <tr>
                                            <td class="text-bold-500">Description</td>
                                            <td> {{ $listing->description }}</td>
                                        </tr>
                                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")
                                        <tr>
                                            <td class="text-bold-500">Unit No</td>
                                            <td> {{ $listing->unitNo }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="text-bold-500">Assign to</td>
                                            <td> {{ $listing->user->name }}</td>
                                        </tr>
                                        @if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

                                        <tr>
                                            <td class="text-bold-500">Owner</td>
                                            <td> {{ $listing->owner->firstname }}  {{ $listing->owner->lastname }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Owner Mobile</td>
                                            <td> {{ $listing->owner->mobile }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="text-bold-500">Project Name</td>
                                            <td> {{ $listing->project->name }}</td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="text-bold-500">Main Image</td>
                                            <td> 
                                                <img src="{{ asset('/image/'.$listing->main_image) }}"    width= "220px"
                                                    aspect-ratio= "auto 220 / 200" height= "200px">
                                            </td>
                                        </tr>
                                        <tr>
                                        <td class="text-bold-500"> <a class="btn btn-primary  " href="{{ route('listing_images', $listing->id) }}">View All Images</a>
                                            </td></td>
                                            <td> 
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            </div>
    </section>
<!-- comment of listing -->

@can('comment-view')
@if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">

            <a class="btn btn-primary" href="{{ route('listing_comment', $listing->id) }}">Add New Comment</a>


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
                            <th>User Name</th>

                            <th>listing </th>
                            <th>state</th>
                            <th width="280px">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $key => $comment)
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
                            {{ $comment->user->name?? '' }}
                        </td>
                        <td>
                            {{ $comment->listing->title ?? '' }}
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
    @endif
    @endcan 

    
<script src="assets/vendors/jquery/jquery.min.js"></script>
<script src="assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>



<!-- end of comment of listing -->





@endcan 
@endsection