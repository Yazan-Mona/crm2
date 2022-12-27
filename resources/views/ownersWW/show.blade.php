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
                        <h4 class="card-title">Table with outer spacing</h4>
                    
                        <a class="btn btn-primary  " href="{{ route('owners.index', $owner->id) }}">Back To List</a>

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
                                            <td class="text-bold-500">First name</td>
                                            <td class="text-bold-500">  {{ $owner->firstname }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Last name</td>
                                            <td> {{ $owner->lastname}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">mobile</td>
                                            <td> {{ $owner->mobile }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">email</td>
                                            <td> {{ $owner->email }}</td>
                     

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">nationality</td>
                                            <td> {{ $owner->nationality }}</td>
                              

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">source</td>
                                            <td> {{ $owner->source }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">emirate_id_number</td>
                                            <td> {{ $owner->emirate_id_number }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Created by</td>
                                            <td> {{ $owner->createby->name}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Assign to</td>
                                            <td> {{ $owner->user->name}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Alternate Mobile</td>
                                            <td> {{ $owner->alternate_mobile }}</td>
                             

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