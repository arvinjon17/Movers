<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movers</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maintenance</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous">

	<!-- for multiple select -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<style>
	html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}

	.background-radial-gradient {
	display: flex; 
	align-items: center; 
	justify-content: center;
	height: 100vh; 
	width: 100vw; 
	background-color: hsl(218, 41%, 15%);
	background-image: radial-gradient(650px circle at 0% 0%,
		hsl(218, 41%, 35%) 15%,
		hsl(218, 41%, 30%) 35%,
		hsl(218, 41%, 20%) 75%,
		hsl(218, 41%, 19%) 80%,
		transparent 100%),
		radial-gradient(1250px circle at 100% 100%,
		hsl(218, 41%, 45%) 15%,
		hsl(218, 41%, 30%) 35%,
		hsl(218, 41%, 20%) 75%,
		hsl(218, 41%, 19%) 80%,
		transparent 100%);
	background-repeat: no-repeat; 
	background-size: cover; 
	}

	
	#radius-shape-1, #radius-shape-2 {
	position: absolute; 
	}

	
	#radius-shape-1 {
	height: 220px;
	width: 220px;
	top: -60px;
	left: -130px;
	background: radial-gradient(#44006b, #ad1fff);
	overflow: hidden;
	}

	
	#radius-shape-2 {
	border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
	bottom: -60px;
	right: -110px;
	width: 300px;
	height: 300px;
	background: radial-gradient(#44006b, #ad1fff);
	overflow: hidden;
	}


	.bg-glass {
	background-color: hsla(0, 0%, 100%, 0.9) !important;
	backdrop-filter: saturate(200%) blur(25px);
	}

  </style>
  
<section class="background-radial-gradient">
		<div class="container d-flex justify-content-center align-items-center min-vh-100">

			<div class="col-lg-6 mb-5 mb-lg-0 position-relative">
				<div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
				<div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

				<div class="card bg-glass">
				<div class="card-body px-4 py-5 px-md-5">
				

						<div data-mdb-input-init class="form-outline mb-4">
							<input type="text" id="fullName" class="form-control" />
							<label class="form-label" for="fullName">Full name</label>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<input type="date" id="birthday" class="form-control" />
							<label class="form-label" for="birthday">Birthday</label>
						</div>
					
						<div data-mdb-input-init class="form-outline mb-4">
							<input type="text" id="username" class="form-control" />
							<label class="form-label" for="username">Username</label>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<input type="email" id="email" class="form-control" />
							<label class="form-label" for="email">Email address</label>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<input type="password" id="password" class="form-control" />
							<label class="form-label" for="password">Password</label>
						</div>

						<div data-mdb-input-init class="form-outline mb-4">
							<input type="password" id="confirmPassword" class="form-control" />
							<label class="form-label" for="confirmPassword">Confirm Password</label>
						</div>

						<div class="text-center">
							<button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block" style="padding: 10px 50px 10px 50px;" id="registerbtn">
								Register
							</button>
						</div>

						<div class="mt-5 text-start">
							<span>Have an account already?</span><br>
							<a href="<?= site_url('Login_controller')?>">Login</a>
						</div>
				
				</div>
				</div>
			</div>
		</div>
</section>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?= base_url() ?>JS/registerJS.js"></script>
</html>