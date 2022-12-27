@extends('layouts.admin')
@section('content')
@can('owner-edit') 
@if ($owner->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

<form action="{{ route('owners.update' , $owner->id ) }}" method="POST"> 
    @csrf
    @method('PUT')
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE LANDLORD </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">firstname</label>
                                    <input type="text" id="firstname"  name ="firstname" class="form-control round"
                                        placeholder="firstname" value=" {{ $owner->firstname }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">lastname</label>
                                    <input type="text" id="lastname" name ="lastname" class="form-control square"
                                        placeholder="lastname"  value=" {{ $owner->lastname }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="roundText">email</label>
                                    <input type="email" id="email" name ="email" class="form-control round"
                                        placeholder="email"  value=" {{ $owner->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nationality">nationality</label>
                                    <input type="text" id="nationality"  name ="nationality" class="form-control square"
                                        placeholder="nationality"  value=" {{ $owner->nationality }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="source">source</label>
                                    <input type="text" id="source"  name ="source" class="form-control round"
                                        placeholder="source"  value=" {{ $owner->source }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="emirate_id_number">emirate_id_number</label>
                                    <input type="text" id="emirate_id_number"  name ="emirate_id_number" class="form-control square"
                                        placeholder=" Input emirate_id_number"  value=" {{ $owner->emirate_id_number }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" id="mobile"  name ="mobile" class="form-control round"
                                        placeholder="mobile"  value="{{ $owner->mobile }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alternate mobile">alternate mobile</label>
                                    <input type="text" id="alternate_mobile"   name ="alternate_mobile" class="form-control square"
                                        placeholder="alternate  mobile Input"  value=" {{ $owner->alternate_mobile }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="created_by ">created_by </label>


                                        <select class="form-select" id="created_by" name="created_by">
                                                <option selected value="{{ $owner->createby->id}}"> {{ $owner->createby->name }}</option>
                                            @foreach($users as $key => $user)
                                            {{$role=$user->getRoleNames()}}
                                            @if(! $role->isEmpty())
                                           
                                                <option value="{{ $user->id }}"> {{ $user->name ?? '' }}</option>
                                         
                                            @endif
                                            @endforeach
                                        </select>


                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="assign_to">assign_to</label>
                        

                                        <select class="form-select" id="user_id" name="user_id">
                                                <option selected value="{{ $owner->user->id}}">{{ $owner->user->name  }}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-12">

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