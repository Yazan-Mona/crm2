@extends('layouts.admin')
@section('content')
@can('contact-edit')
@if ($contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

<form action="{{ route('contacts.update' , $contact->id ) }}" method="POST"> 
    @csrf
    @method('PUT')
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
                                    <label for="firstname">firstname</label>
                                    <input type="text" id="firstname"  name ="firstname" class="form-control round"
                                        placeholder="firstname" value=" {{ $contact->firstname }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">lastname</label>
                                    <input type="text" id="lastname" name ="lastname" class="form-control square"
                                        placeholder="lastname"  value=" {{ $contact->lastname }}">
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
                                        placeholder="email"  value=" {{ $contact->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nationality">nationality</label>
                                    <input type="text" id="nationality"  name ="nationality" class="form-control square"
                                        placeholder="nationality"  value=" {{ $contact->nationality }}">
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
                                        placeholder="source"  value=" {{ $contact->source }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <input type="text" id="status"  name ="status" class="form-control square"
                                        placeholder="status Input"  value=" {{ $contact->status }}">
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
                                        placeholder="mobile"  value="{{ $contact->mobile }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alternate mobile">alternate mobile</label>
                                    <input type="text" id="alternate_mobile"   name ="alternate_mobile" class="form-control square"
                                        placeholder="alternate  mobile Input"  value=" {{ $contact->alternate_mobile }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lead_status">lead_status</label>
                                    <input type="text" id="lead_status"   name ="lead_status" class="form-control round"
                                        placeholder="lead_status Input"  value=" {{ $contact->lead_status }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="assign_to">assign_to</label>
                          

                                        <select class="form-select" id="user_id" name="user_id">
                                                <option value="{{$contact->user->id }}" selected>{{ $contact->user->name }}</option>
                                            @foreach($users as $key => $user)
                                            {{$role=$user->getRoleNames()}}
                                            @if(! $role->isEmpty())
                                            @if( $role[0]== "sales")
                                                <option value="{{ $user->id }}"> {{ $user->name ?? '' }}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="created_by"  name ="created_by" class="form-control square"  placeholder="assign_to Input" value="{{ $contact->created_by }}">
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