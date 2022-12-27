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
	<a class="btn btn-primary  " href="{{ route('listings.show', $id) }}">Back To Listing</a>
    <form action="{{ route('listings-image-add', $id) }}" method="POST" enctype="multipart/form-data"> 
    @csrf

	<div class="col-sm-6">
		<div class="form-group">
		<label for="filename">images</label>
		<input type="file" id="filename"   name ="filename[]" multiple accept="image/*" class="form-control round">
		</div>
		<button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
        </button>
    </div>

</form>
	<!-- About Page -->
	<div class="gallery__page">
		<div class="gallery__warp">
			<div class="row">
			@foreach($images as $key => $image)
				<div class="col-lg-3 col-md-4 col-sm-6">

				<td>
                        @can('listing-show') 
                        <a class="btn btn-primary  bi-eye" href="{{ route('list.img.show', $image->id) }}"></a>
                        @endcan
                        @if (Auth::user()->getRoleNames()[0]== "admin")

                        @can('listing-edit') 
                        <a  class="btn btn-info   bi-pencil-square"  href="{{ route('list.img.edit', $image->id) }}"></a>
                        @endcan
                        @endif

                    

                        @can('listing-delete') 
                        <form action="{{ route('listings_destroy_image', $image->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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