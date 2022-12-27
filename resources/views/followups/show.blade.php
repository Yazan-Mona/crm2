@extends('layouts.admin')
@section('content')
@can('followup-show')
@if ($followup->contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")


    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with Comment Details</h4>

                        @if( $followup->contact->status=='Lead')

                        @can('lead-view')
                        <a class="btn btn-primary  " href="{{ route('leads.show', $followup->contact->id) }}">Back To Lead </a>
                        @endcan 

                        @else

                        @can('contact-view')
                        <a class="btn btn-primary" href="{{ route('contacts.show', $followup->contact->id) }}">Back To Contact</a>
                        @endcan 
                        
                        @endif
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
                                            <td class="text-bold-500">  {{ $followup->activity }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">note</td>
                                            <td> {{ $followup->note}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">created_at</td>
                                            <td> {{ $followup->created_at }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">user_id  </td>
                                            <td> {{ $followup->user_id  }}</td>

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">file</td>
                                            <td> {{ $followup->file }}</td>
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
<iframe src="{{asset('/image/'.$followup->file) }}" height="600" width="100%" alt="..."></iframe>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    @endif
@endcan  
@endsection