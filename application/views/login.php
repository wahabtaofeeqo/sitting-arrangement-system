<!DOCTYPE html>
<html>
<head>
	<title>Mapoly Seating Arrangement| Login</title>

	<!-- Reset -->
	<link rel="stylesheet" type="text/css" href="./assets/css/reset.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/regular.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/solid.min.css">

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="./assets/css/animate.css">

	<!-- Custom styles for this template-->
  	<link href="./assets/css/styles.css" rel="stylesheet">
</head>

<body>
	<div class="w-100 h-100" style="background: url('./assets/images/admin.jpg'); background-size: cover;">
		<div style="background: rgba(0, 0, 0, 0.6); width: 100%; height: 100%;">
			<div class="col-md-6 col-lg-4 center">

				<div class="card shadow-sm">
					<?php if (isset($error) && $error == TRUE): ?>
						<div class="alert alert-danger mx-2 mb-2">
							<p class="mb-0"><?php echo $errorMessage ?></p>
						</div>
					<?php endif ?>

					<div class="card-body">
						<h4 class="card-title mb-4">Login to Dashboard</h4>
						<form action="login" method="POST" autocomplete="on">
							<div class="form-group">
								<label for="username small">Email</label>
								<input type="text" name="username" class="form-control form-control-lg" placeholder="Enter Email" required="required" style="box-shadow: none;">
							</div>				

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control form-control-lg" placeholder="Enter Password" required="required" style="box-shadow: none;">
							</div>

							<button class="btn btn-block btn-dark btn-lg mt-5">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript"  src="./assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>

	<!-- JQuery Datatable -->
	<script type="text/javascript"  src="./assets/js/jquery.dataTables.min.js"></script>

	<!-- Bootstrap Datatable -->
	<script type="text/javascript"  src="./assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Owl Carousel -->
	<script type="text/javascript" src="./assets/js/owl.carousel.min.js"></script>

	<!-- JQuery Easing -->
	<script type="text/javascript" src="./assets/js/jquery.easing.js"></script>

	<!-- JQuery Skitter -->
	<script type="text/javascript" src="./assets/js/jquery.skitter.min.js"></script>

	<!-- Validator JS -->
	<script type="text/javascript" src="./assets/js/jquery.form-validator.min.js"></script>

	<!-- Custom Script -->
	<script type="text/javascript" src="./assets/js/script.js"></script>
</body>
</html>