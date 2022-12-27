<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset("/assets4/img/favicon.png")}}" rel="icon">
  <link href="{{asset("/assets4/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset("/assets4/vendor/aos/aos.css")}}" rel="stylesheet">
  <link href="{{asset("/assets4/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <link href="{{asset("/assets4/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
  <link href="{{asset("/assets4/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
  <link href="{{asset("/assets4/vendor/glightbox/css/glightbox.min.css")}}" rel="stylesheet">
  <link href="{{asset("/assets4/vendor/swiper/swiper-bundle.min.css")}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset("/assets4/css/style.css")}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset("/assets5/css/style.css")}}">

	</head>
	<body class="img js-fullheight" style="background-image: url('{{asset("/assets5/images/bg.jpg")}}');">
    
	<section class="ftco-section d-flex align-items-center"   id="hero" >
		<div class="container  flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">

			<div class="row justify-content-center">
            <img type="image/png" src="{{asset("/assets4/img/click-lead-crm-logo.png")}}" alt="click lead crm" class="img-fluid"  style="width:50%" >

			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		
		      	<form method="POST" action="{{ route('login') }}" class="signin-form">
                  @csrf
		      		<div class="form-group">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
		      		</div>
	            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Login </button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset("/assets5/js/jquery.min.js")}}"></script>
  <script src="{{asset("/assets5/js/popper.js")}}"></script>
  <script src="{{asset("/assets5/js/bootstrap.min.js")}}"></script>
  <script src="{{asset("/assets5/js/main.js")}}"></script>
  <script src="{{asset("/assets4/vendor/purecounter/purecounter.js")}}"></script>
  <script src="{{asset("/assets4/vendor/aos/aos.js")}}"></script>
  <script src="{{asset("/assets4/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <script src="{{asset("/assets4/vendor/glightbox/js/glightbox.min.js")}}"></script>
  <script src="{{asset("/assets4/vendor/isotope-layout/isotope.pkgd.min.js")}}"></script>
  <script src="{{asset("/assets4/vendor/swiper/swiper-bundle.min.js")}}"></script>
  <script src="{{asset("/assets4/vendor/waypoints/noframework.waypoints.js")}}"></script>
  <script src="{{asset("/assets4/vendor/php-email-form/validate.js")}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset("/assets4/js/main.js")}}"></script>

	</body>
</html>

