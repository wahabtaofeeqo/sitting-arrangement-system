<!DOCTYPE html>
<html>
<head>
	<title>Seatings</title>

	<!-- Reset -->
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/css/reset.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/css/dataTables.bootstrap4.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/fontawesome/css/regular.min.css">
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/fontawesome/css/solid.min.css">

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="/arrangement/assets/css/animate.css">

	<!-- Custom styles for this template-->
  	<link href="/arrangement/assets/css/admin.min.css" rel="stylesheet">
</head>
<body class="bg-secondary">

	<main class="container py-5">
      	<div class="card">
			<div class="card-header py-0">
						<h4 class="card-title h6 mt-2">Arrangement for : <b><?php echo $seat->course_code; ?></b></h4>
					</div>

					<table class="table table-striped">
						<tbody>
							<?php foreach ($seatings as $key => $value): ?>
								<tr>
									<td><?php echo $key + 1 ?></td>
									<?php $row = explode(",", $value->row); ?>
									<td><?php echo $row[0] ?></td>
									<td><?php echo $row[1] ?></td>
									<td><?php echo $row[2] ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</main>
</body>
</html>