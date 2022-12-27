



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
@if (Auth::user()->getRoleNames()[0]== "admin")
    <form action="#" method="POST" enctype="multipart/form-data"   > 
    @csrf
<br>
	<div class="col-sm-6">
	<div class="form-group">
	<a class="btn btn-primary  " href="#" >Back To Projec</a>
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

				<div class="col-lg-3 col-md-4 col-sm-6">
				




					<a class="gallery__item fresco" href="{{ asset('/image/'.$image->filename) }}" data-fresco-group="gallery">
						<img src="{{ asset('/image/'.$image->filename) }}" alt="">
					</a>
				</div>

			
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