@extends('layouts.admin')
@section('content')
@can('comment-show') 
@if ($comment->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with outer spacing</h4>
                        @can('owner-view')
                        <a class="btn btn-primary  " href="{{ route('owners.index', $comment->id) }}">Back To List</a>
                        @endcan 
                    </div>
                    <div class="card-content">
                        <div class="card-body">
      
                            <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg  table-bordered ">
                                    <thead>
                                        <tr>
                                            <th  class="col-12 col-md-6" >NAME</th>
                                            <th class="col-12 col-md-6" >RATE</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <tr>
                                            <td class="text-bold-500">activity</td>
                                            <td class="text-bold-500">  {{ $comment->activity }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">note</td>
                                            <td> {{ $comment->note}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">created_at</td>
                                            <td> {{ $comment->created_at }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">user_id  </td>
                                            <td> {{ $comment->user_id  }}</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">file</td>
                                            <td> {{ $comment->file }}</td>
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
    <!-- Basic Tables end -->

        <!-- Basic form file start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View File</h4>
                    

                    </div>
                    <div class="card-content">
                        <div class="card-body">
<iframe src="{{asset('/image/'.$comment->file) }}" height="600" width="100%" alt="..."></iframe>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
        <!-- Basic form file end -->
        @endif
@endcan  
@endsection