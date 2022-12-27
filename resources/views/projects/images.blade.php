@extends('layouts.admin')
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset("assets3/css/bootstrap.min.css")}}"/>
	<link rel="stylesheet" href="{{ asset("assets3/css/font-awesome.min.css")}}"/>
	<link rel="stylesheet" href="{{ asset("assets3/css/slicknav.min.css")}}"/>
	<link rel="stylesheet" href="{{ asset("assets3/css/fresco.css")}}"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="{{ asset("assets3/css/style.css")}}"/>
@section('content')
    <!-- Basic Tables start -->
	<div>
	

</div>
<div>
<a class="btn btn-primary  " href="{{ route('projects.show', $id) }}" >Back To Project</a>
@if (Auth::user()->getRoleNames()[0]== "admin")
    <form action="{{ route('projects-image-add', $id) }}" method="POST" enctype="multipart/form-data"   > 
    @csrf
<br>
	<div class="col-sm-6">
	<div class="form-group">
	<a class="btn btn-primary  " href="{{ route('projects.show', $id) }}" >Back To Project</a>
	</div>
		<div class="form-group"  style="display: inline-block;">
		<input type="file" id="filename"   name ="filename[]" multiple accept="image/*" class="form-control round" >
		</div>
		<button class="btn btn-primary" type="submit">
                  ADD
        </button>
    </div>

</form>
@endif
</div>
	<!-- About Page -->
	<div class="gallery__page">
		<div class="gallery__warp">
			<div class="row">
			@foreach($images as $key => $image)
				<div class="col-lg-3 col-md-4 col-sm-6">
				
				<td>
                        @can('project-show') 
                        <a class="btn btn-primary  bi-eye" href="{{ route('pro.img.show', $image->id) }}"></a>
                        @endcan
                        @if (Auth::user()->getRoleNames()[0]== "admin")

                        @can('project-edit') 
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('pro.img.edit', $image->id) }}"></a>
                        @endcan
                        @endif

                    

                        @can('project-delete') 
                        <form action="{{ route('projects_destroy_image', $image->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                               
                                <button type="submit" class="btn btn-danger  bi-trash">
                                 
                                </button>
                            </form>
                        @endcan
                    </td>



					<a class="gallery__item fresco" href="{{ asset('/image/'.$image->filename) }}" data-fresco-group="gallery">
						<img src="{{ asset('/image/'.$image->filename) }}" alt="">
					</a>
				</div>
			@endforeach
			
			</div>
		</div>
	</div>
	<!-- About Page end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset("assets3/js/vendor/jquery-3.2.1.min.js")}}"></script>
	<script src="{{ asset("assets3/js/jquery.slicknav.min.js")}}"></script>
	<script src="{{ asset("assets3/js/slick.min.js")}}"></script>
	<script src="{{ asset("assets3/js/fresco.min.js")}}"></script>
	<script src="{{ asset("assets3/js/main.js")}}"></script>

@endsection