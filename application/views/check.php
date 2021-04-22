<!DOCTYPE html>
<html>
<head>
	<title>Mapoly Seating Arrangement</title>

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
	<div class="login-bg">
		<div style="background: rgba(0, 0, 0, 0.6); width: 100%; height: 100%;">
			<div class="col-md-8 col-lg-4 center">

				<div class="card shadow-sm bg-dark animated slideIn">
					<?php if (isset($error) && $error == TRUE): ?>
						<div class="alert alert-danger mx-2 mb-2">
							<p class="mb-0"><?php echo $errorMessage ?></p>
						</div>
					<?php endif ?>

					<div class="card-header">
						<h4 class="card-title text-white text-center text-uppercase">Check Your Seat</h4>
					</div>

					<div class="card-body">
						<form action="check-seating" method="POST" autocomplete="off">
							<div class="form-group mb-4">
								<label for="matric" class="text-white">Matric Number</label>
								<input type="text" name="matric" class="form-control form-control-lg" placeholder="Enter Matric" required="required">
							</div>				

							<div class="form-group mb-4">
								<label for="password" class="text-white">Course</label>

								<select class="form-control form-control-lg" required name="course" id="course">
									<option value=""></option>
									<?php foreach ($courses as $key => $value): ?>
										<option value="<?php echo($value->code); ?>"><?php echo $value->code; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<button class="btn btn-block btn-danger btn-lg mt-5">Check</button>

							<a href="./home/seating/" id="seatings" class="text-white d-block text-center mt-4 px-3">View Allocation</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<a href="login" style="position: absolute; display: inline-block; bottom: 100px; left: 50%; transform: translateX(-50%); text-decoration: none; font-weight: bold;" class="text-white">Admin Login</a>

	<script type="text/javascript"  src="./assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>

	<!-- Custom Script -->
	<script type="text/javascript" src="./assets/js/script.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			$("#seatings").click(function(e) {
				e.preventDefault();

				code = $("#course").val();
				if (code != "" || code != null) {
					location.href = $(this).attr("href") + code;
				}
			})
		})
	</script>
</body>
</html>