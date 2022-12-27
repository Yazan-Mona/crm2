@extends('layouts.admin')
@section('content')
@can('listing-edit')
@if ($listing->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin" || Auth::user()->getRoleNames()[0]== "Raik")

<form action="{{ route('listings.update' , $listing->id ) }}" method="POST"   enctype="multipart/form-data" > 
    @csrf
    @method('PUT')
    {{ csrf_field() }}
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE CONTACT </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input type="text" id="title"  name ="title" class="form-control round"
                                        placeholder="title" value=" {{ $listing->title }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type">type</label>
                                    <input type="text" id="type" name ="type" class="form-control square"
                                        placeholder="type"  value=" {{ $listing->type }}">
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
                                        placeholder="purpose"  value=" {{ $listing->purpose }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="natiorent_pricing_durationnality">rent_pricing_duration</label>
                                    <input type="text" id="rent_pricing_duration"  name ="rent_pricing_duration" class="form-control square"
                                        placeholder="rent_pricing_duration"  value=" {{ $listing->rent_pricing_duration }}">
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
                                        placeholder="price"  value=" {{$listing->price }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">state</label>
                                    <input type="text" id="state"  name ="state" class="form-control square"
                                        placeholder="state Input"  value=" {{$listing->state }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="beds">beds</label>
                                    <input type="text" id="beds"  name ="beds" class="form-control round"
                                        placeholder="beds"  value=" {{$listing->beds }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="baths">baths</label>
                                    <input type="text" id="baths"  name ="baths" class="form-control square"
                                        placeholder="baths Input"  value=" {{$listing->baths }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="plotarea_size">plotarea_size</label>
                                    <input type="text" id="plotarea_size"  name ="plotarea_size" class="form-control round"
                                        placeholder="plotarea_size"  value=" {{ $listing->plotarea_size }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="plotarea_size_postfix">plotarea_size_postfix</label>
                                    <input type="text" id="plotarea_size_postfix"  name ="plotarea_size_postfix" class="form-control square"
                                        placeholder="plotarea_size_postfix Input"  value=" {{ $listing->plotarea_size_postfix }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="area_size">area_size</label>
                                    <input type="text" id="area_size"  name ="area_size" class="form-control round"
                                        placeholder="area_size"  value=" {{ $listing->area_size }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="area_size_postfix">area_size_postfix</label>
                                    <input type="text" id="area_size_postfix"  name ="area_size_postfix" class="form-control square"
                                        placeholder="area_size_postfix Input"  value=" {{ $listing->area_size_postfix }}">
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
                                        placeholder="developer"  value=" {{ $listing->developer }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" id="note"  name ="note" class="form-control square"
                                        placeholder="note Input"  value=" {{ $listing->note }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="unitNo">unitNo</label>
                                    <input type="text" id="unitNo"  name ="unitNo" class="form-control round"
                                        placeholder="unitNo"  value="{{ $listing->unitNo }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" id="description"   name ="description" class="form-control square"
                                        placeholder="description  Input"  value=" {{ $listing->description }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_id">User Name </label>  
                                        <select class="form-select" id="user_id" name="user_id">
                                                <option selected value=" {{ $listing->user_id }}">{{ $listing->user->name  }}</option>
                                            @foreach($users as $key => $user)
                                            {{$role=$user->getRoleNames()}}
                                            @if(! $role->isEmpty())
                                            @if( $role[0]== "Listing")
                                                <option value="{{ $user->id }}"> {{ $user->name ?? '' }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="owner_id">owner_id</label>

                                        <select class="form-select" id="owner_id" name="owner_id">
                                                <option selected value="{{ $listing->owner_id }}">{{ $listing->owner->firstname }} &nbsp&nbsp  {{ $listing->owner->lastname }}</option>
                                            @foreach($owners as $key => $owner)
                                                <option value="{{ $owner->id }}"> {{ $owner->firstname ?? '' }}&nbsp&nbsp  {{ $owner->lastname ?? '' }}</option>
                                             @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group">

                                
                            <label for="image">Image</label>
        <div class="custom-file">
            <input type="file" class="form-control square" id="image" name="image">
         
        </div>
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="project_id">project_id</label>


                                        <select class="form-select" id="project_id" name="project_id">
                                                <option selected value=" {{ $listing->project_id }}" >{{ $listing->project->name}}</option>
                                            @foreach($data as $key => $project)
                                                <option value="{{ $project->id }}"> {{ $project->name ?? '' }}</option>
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
                                <button class="btn btn-primary" type="submit">
                                    Save
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
@endif
@endcan 
@endsection