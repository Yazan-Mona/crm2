@extends('layouts.admin')
@section('content')
@can('followup-create')
<form action="{{ route('create_followup') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">CREATE FOLLOWUP </h4>
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
                                            <option selected>Choose Activity ...</option>
                                            <option value="Call">Call</option>
                                            <option value="Meeting">Meeting</option>
                                            <option value="Viewing">Viewing</option>
                                        </select>
                                    </div>
                                
                            </div>
                                </div>

                        <div class="row">
                            <div class="col-12">
                        <br>
                            </div>
                            <div class="col-sm-12">
                            
                                    <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="file"><i
                                                    class="bi bi-upload"></i></label>
                                         
                                            <input type="file" name="image" class="form-control" placeholder="image">

                                        </div>
                                    </div>

                            </div>

                        </div>




                        <div class="row">
                            <div class="col-12">
                            </div>
                            <div class="col-sm-12">
                            <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here"
                                id="note"  name="note"></textarea>
                            <label for="note">Note</label>
                            </div>
                            </div>
                           <br>
                        </div>
                        <input type="hidden" id="contact_id"  name ="contact_id" class="form-control square"  placeholder="listing_id Input" value="{{$contact->id}}">

                        <input type="hidden" id="assign_to"  name ="user_id" class="form-control square"  placeholder="assign_to Input" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="col-12">
                            <br>
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