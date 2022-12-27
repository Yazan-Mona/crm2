@extends('layouts.admin')
@section('content')
@can('listing-create')

<form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data"> 
    @csrf
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE LISTING </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" id="title"  name ="title" class="form-control round"
                                        placeholder="title">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type">type</label>
                                    <input type="text" id="type" name ="type" class="form-control square"
                                        placeholder="type">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="purpose">purpose</label>
                                    <input type="text" id="purpose" name ="purpose" class="form-control round"
                                        placeholder="purpose">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="rent_pricing_duration">rent_pricing_duration</label>
                                    <input type="text" id="rent_pricing_duration"  name ="rent_pricing_duration" class="form-control square"
                                        placeholder="rent_pricing_duration">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="text" id="price"  name ="price" class="form-control round"
                                        placeholder="price">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="beds">beds</label>
                                    <input type="text" id="beds"  name ="beds" class="form-control square"
                                        placeholder="beds Input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="baths">baths</label>
                                    <input type="text" id="baths"  name ="baths" class="form-control round"
                                        placeholder="baths">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">state</label>
                                    <input type="text" id="state"   name ="state" class="form-control square"
                                        placeholder="state Input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="plotarea_size">plotarea_size</label>
                                    <input type="text" id="plotarea_size"   name ="plotarea_size" class="form-control square"
                                        placeholder="plotarea_size Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="plotarea_size_postfix">plotarea_size_postfix</label>
                                    <input type="text" id="plotarea_size_postfix"   name ="plotarea_size_postfix" class="form-control round"
                                        placeholder="plotarea_size_postfix Input">
                                </div>
                            </div>
                           
                        </div>


                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="area_size">area_size</label>
                                    <input type="text" id="area_size"   name ="area_size" class="form-control square"
                                        placeholder="area_size Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="area_size_postfix">area_size_postfix</label>
                                    <input type="text" id="area_size_postfix"   name ="area_size_postfix" class="form-control round"
                                        placeholder="area_size_postfix Input">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="developer">developer</label>
                                    <input type="text" id="developer"   name ="developer" class="form-control square"
                                        placeholder="developer Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" id="note"   name ="note" class="form-control round"
                                        placeholder="note Input">
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" id="description"   name ="description" class="form-control square"
                                        placeholder="description Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="unitNo">unitNo</label>
                                    <input type="text" id="unitNo"   name ="unitNo" class="form-control round"
                                        placeholder="unitNo Input">
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-12">

                            </div>
               


                            <div class="col-sm-6">
                                <div class="form-group">
                                <label for="source">project</label>
                                        <select class="form-select" id="project_id" name="project_id">
                                                <option selected>Choose project ...</option>
                                            @foreach($data as $key => $project)
                                                <option value="{{ $project->id }}"> {{ $project->name ?? '' }}</option>
                                             @endforeach
                                        </select>

                   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="owner_id">owner </label>

                                        <select class="form-select" id="owner_id" name="owner_id">
                                                <option selected>Choose owner ...</option>
                                            @foreach($owners as $key => $owner)
                                                <option value="{{ $owner->id }}"> {{ $owner->firstname ?? '' }}&nbsp&nbsp  {{ $owner->lastname ?? '' }}</option>
                                             @endforeach
                                        </select>
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

                        <input type="hidden" id="assign_to"  name ="user_id" class="form-control square"  placeholder="assign_to Input" value="{{ Auth::user()->id }}">
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



                             <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_id">user_id</label>
                                    <input type="hidden" id="user_id"   name ="user_id" value="{{ Auth::user()->id }}" class="form-control square"
                                        placeholder="user_id Input">
                                </div>
                            </div>
        </form>
    <!-- Input Style end -->

    @endcan 
@endsection