@extends('layouts.admin')
@section('content')
@can('followup-edit')
@if ($followup->contact->user_id == Auth::user()->id || Auth::user()->getRoleNames()[0]== "admin")

<form action="{{ route('followups.update' , $followup->id ) }}" method="POST"  enctype="multipart/form-data" > 
    @csrf
    @method('PUT')
    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">UPDATE FollowUp </h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                        
                            </div>
                            <div class="col-sm-12">
                        
                        <h6>Basic Select with Input Group</h6>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="activity">Options</label>
                            <select class="form-select" id="activity" name="activity">
                                <option selected>{{ $followup->activity}}</option>
                                <option value="Call">Call</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Viewing">Viewing</option>
                            </select>
                        </div>
                    
                </div>
                          
                        <div class="row">
                            <div class="col-12">

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="user_id">note</label>
                                    <input type="text" id="note"   name ="note" class="form-control round"
                                        placeholder="note Input"  value="{{ $followup->note}}">
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file"><i
                                                    class="bi bi-upload"></i></label>
                                         
                                            <input type="file" name="image" class="form-control" placeholder="image">

                                        </div>
                                    </div>
                        </div>

                       
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
@endif
@endcan 
@endsection