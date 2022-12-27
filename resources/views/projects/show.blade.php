@extends('layouts.admin')
@section('content')
@can('project-show') 
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Table with Project details</h4>
                    
                        <a class="btn btn-primary  " href="{{ route('projects.index') }}">Back To Project List</a>

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
                                            <td class="text-bold-500">name</td>
                                            <td class="text-bold-500">  {{ $project->name }}</td>
                           

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">title</td>
                                            <td> {{ $project->title}}</td>
                          

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">community</td>
                                            <td> {{ $project->community }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">emirate</td>
                                            <td> {{ $project->emirate }}</td>
                     

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">developer</td>
                                            <td> {{ $project->developer }}</td>
                              

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">property_type</td>
                                            <td> {{ $project->property_type }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">description</td>
                                            <td> {{ $project->description }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">state</td>
                                            <td> {{ $project-> state}}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">note</td>
                                            <td> {{ $project->note }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">floor_number</td>
                                            <td> {{ $project->floor_number }}</td>
                             

                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Main Image</td>
                                            <td> 
                                                <img src="{{ asset('/image/'.$project->main_image) }}"    width= "220px"
                                                    aspect-ratio= "auto 220 / 200" height= "200px">
                                            </td>
                                        </tr>
                                        <tr>
                                        <td class="text-bold-500"> <a class="btn btn-primary  " href="{{ route('project_images', $project->id) }}">View All Images</a>
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
    <!-- Basic Tables end -->
@endcan  
@endsection