@extends('layouts.admin')
@section('content')
@can('owner-show')
@if ($owner->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table Of OWNERS</h4>
         <div class="card-content">
                <div class="card-body">
                            <!-- Table with outer spacing -->
                        <div class="table-responsive">
                             <table class="table table-lg  table-bordered ">
                                    <thead>
                                <tr>
                                    <th  class="col-12 col-md-2" >
                                        <a class="btn btn-primary  " href="{{ route('listings.index', $owner->id) }}">Back To List Of Listing</a>
                                    </th>
                                    <th class="col-12 col-md-2" >
                                         <form action="{{ route('Make.listing')}}" method="POST" >
                                          @csrf
                                          @method('PUT')
                                          <input type="hidden" name="unitNo" value="{{ $owner->unitNo }}">
                                          <input type="hidden" name="project_id" value="{{ $owner->project_id }}">
                                          <input type="hidden" name="owner_id" value="{{ $owner->id }}">
                                          <button type="submit" class="btn btn-primary ">
                                          Add Listing
                                         </button>
                                         </form>

                                    </th>
                                    <th class="col-12 col-md-2" >
                                        <form action="{{ route('owner.listing') }}" method="get" style="display: inline-block;">
                                        <input type="hidden" id="user_id" name ="user_id" class="form-control round" value="{{auth()->user()->id}}">
                                        <input type="hidden" id="owner_id" name ="owner_id" class="form-control round" value="{{ $owner->id }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
   
                                        <button class=" btn btn-primary ">owner listing</button> 
                                       </form>
                                    </th>
                                     
                                </tr>
                                    </thead>
                                    
      
                        </table>
                     </div>
                 </div>    
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
                                            <td class="text-bold-500">Project</td>
                                            <td> {{ $owner->project->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Unit Number</td>
                                            <td> {{ $owner->unitNo }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">First name</td>
                                            <td class="text-bold-500">  {{ $owner->firstname }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Last name</td>
                                            <td> {{ $owner->lastname}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Mobile</td>
                                            <td> {{ $owner->mobile }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Email</td>
                                            <td> {{ $owner->email }}</td>
                     

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Nationality</td>
                                            <td> {{ $owner->nationality }}</td>
                              

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Source</td>
                                            <td> {{ $owner->source }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Emirate Id Number</td>
                                            <td> {{ $owner->emirate_id_number }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Created by</td>
                                            <td> {{ $owner-> createby->name}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Assign to</td>
                                            <td> {{ $owner->user->name}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Alternate Mobile</td>
                                            <td> {{ $owner->alternate_mobile }}</td>
                                        </tr>


                                        <tr>
                                            <td class="text-bold-500">Call</td>
                                            <td> {{ $owner->call}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">State</td>
                                            <td> {{ $owner->state}}</td>
                             

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
    @endif
@endcan      
@endsection