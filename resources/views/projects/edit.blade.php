@extends('layouts.admin')
@section('content')
@can('project-edit') 
<form action="{{ route('projects.update' , $project->id ) }}" method="POST"  enctype="multipart/form-data"> 
@csrf
    @method('PUT')
    {{ csrf_field() }}
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Project </h4>
                        <a class="btn btn-primary  " href="{{ route('projects.index') }}">Back To List</a>

                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" id="name"  name ="name" class="form-control round"
                                        placeholder="name" value=" {{ $project->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" id="title" name ="title" class="form-control square"
                                        placeholder="title"  value=" {{ $project->title }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">community</label>
                                    <input type="text" id="community" name ="community" class="form-control round"
                                        placeholder="community"  value=" {{ $project->community }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="emirate">emirate</label>
                                    <input type="text" id="emirate"  name ="emirate" class="form-control square"
                                        placeholder="emirate"  value=" {{ $project->emirate }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="developer">developer</label>
                                    <input type="text" id="developer"  name ="developer" class="form-control round"
                                        placeholder="developer"  value=" {{ $project->developer }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">state</label>
                                    <input type="text" id="state"  name ="state" class="form-control square"
                                        placeholder="state Input"  value=" {{ $project->state }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" id="note"  name ="note" class="form-control round"
                                        placeholder="note"  value="{{ $project->note }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="property_type">property_type</label>
                                    <input type="text" id="property_type"   name ="property_type" class="form-control square"
                                        placeholder="property_type Input"  value=" {{ $project->property_type }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" id="description"   name ="description" class="form-control round"
                                        placeholder="description Input"  value=" {{ $project->description }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="floor_number">floor_number</label>
                                    <input type="text" id="floor_number"  name ="floor_number" class="form-control square"
                                        placeholder="floor_number Input"  value=" {{ $project->floor_number }}">
                                </div>
                            </div>
                        </div>
   
        <div class="row">
            <div class="col-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control square" id="image" name="image">
                        </div>
                    </div>
                </div> 
            </div>
        </div>     

                        <input type="hidden" id="assign_to"  name ="user_id" class="form-control square"  placeholder="assign_to Input" value="1">
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                                </button>
                                </div>
                            </div>
                           
                        </div>
                    </div>


     

                    
                </div>
            </div>
        </div>
    </section>
</form>
    <!-- Input Style end -->

@endcan 
@endsection