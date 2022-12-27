@extends('layouts.admin')
@section('content')
@can('project-create') 
<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE project </h4>
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
                                        placeholder="name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" id="title" name ="title" class="form-control square"
                                        placeholder="title">
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
                                        placeholder="community">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="emirate">emirate</label>
                                    <input type="text" id="emirate"  name ="emirate" class="form-control square"
                                        placeholder="emirate">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" id="description"  name ="description" class="form-control round"
                                        placeholder="description">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">state</label>
                                    <input type="text" id="state"  name ="state" class="form-control square"
                                        placeholder="state Input">
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
                                        placeholder="note">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="developer">developer </label>
                                    <input type="text" id="developer"   name ="developer" class="form-control square"
                                        placeholder="developer   Input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="property_type">property_type</label>
                                    <input type="text" id="property_type"   name ="property_type" class="form-control round"
                                        placeholder="property_type Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="floor_number">floor_number </label>
                                    <input type="text" id="floor_number"   name ="floor_number" class="form-control square"
                                        placeholder="floor_number   Input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Image">main Image</label>
                                    <input type="file" id="Image"   name ="img" class="form-control square"
                                        placeholder="user_id Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="filename">images</label>
                                    <input type="file" id="filename"   name ="filename[]" multiple accept="image/*" class="form-control round">
                                </div>
                            </div>
                           
                        </div>


                        <input type="hidden" id="assign_to"  name ="user_id" class="form-control square"  placeholder="assign_to Input" value="1">
                        <div class="row">
                            <div class="col-12">

                            </div>
  
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