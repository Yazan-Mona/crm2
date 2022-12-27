@extends('layouts.admin')
@section('content')
@can('project-edit') 
<form action="{{ route('pro.img.update' , $image->id ) }}" method="POST"  enctype="multipart/form-data"> 
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






                    <a class="gallery__item fresco" href="{{ asset('/image/'.$image->filename) }}" data-fresco-group="gallery">
						<img src="{{ asset('/image/'.$image->filename) }}" alt="">
					</a>
  
   
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