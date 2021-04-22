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
	<main class="h-100 w-100">
		<div class="col-lg-5 mx-auto center">
			<div class="card">
				<div class="card-header py-0 bg-dark">
					<h4 class="h5 card-title mt-2 text-white">Seating Details:</h4>
				</div>

				<div class="card-body">
					<p>Your Exam Hall: <?php echo $hall; ?></p>
					<p>Row Number: <?php echo $rowNo; ?></p>
					<h6 class="h6 mb-4">Arrangement</h6>
					
					<?php foreach ($others as $key => $value): ?>
						<span class="px-4"><?php if($value == $code) echo $matric; else echo $value; ?></span>
					<?php endforeach ?>
				</div>

				<div class="card-footer">
					<a href="check-seating" class="btn btn-danger">OK</a>
				</div>
			</div>
		</div>
	</main>

	<script type="text/javascript"  src="./assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>

	<!-- Custom Script -->
	<script type="text/javascript" src="./assets/js/script.js"></script>
</body>
</html>