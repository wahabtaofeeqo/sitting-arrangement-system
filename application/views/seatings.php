<!DOCTYPE html>
<html>
<head>
	<title>Mapoly Exam Seating Arrangement</title>

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

<body>
	<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/arrangement/admin">
	        <div class="sidebar-brand-icon">
	          	<i class="fas fa-laugh-wink"></i>
	        </div>
	        <div class="sidebar-brand-text mx-3"><?php echo $this->session->adminName; ?></div>
	    </a>

	    <!-- Divider -->
	    <hr class="sidebar-divider my-0">

	    <!-- Nav Item - Dashboard -->
	    <li class="nav-item active">
	        <a class="nav-link" href="/arrangement/admin">
	          	<i class="fas fa-fw fa-tachometer-alt"></i>
	          	<span>Dashboard</span>
	        </a>
	    </li>

	    <li class="nav-item">
	        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
	          <i class="fas fa-fw fa-cog"></i>
	          <span>Exam Hall</span>
	        </a>
	        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	          <div class="bg-white py-2 collapse-inner rounded">
	            <h6 class="collapse-header">Actions:</h6>
	            <a class="collapse-item" href="/arrangement/add-hall">Add</a>
	            <a class="collapse-item" href="/arrangement/view-hall">View</a>
	          </div>
	        </div>
	      </li>

	    <li class="nav-item">
	        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
	          <i class="fas fa-fw fa-users"></i>
	          <span>Students</span>
	        </a>
	        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	          <div class="bg-white py-2 collapse-inner rounded">
	            <h6 class="collapse-header">Actions:</h6>
	            <a class="collapse-item" href="/arrangement/add-student">Add</a>
	            <a class="collapse-item" href="/arrangement/view-student">View</a>
	          </div>
	        </div>
	    </li>

	    <li class="nav-item">
	        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
	          <i class="fas fa-fw fa-book"></i>
	          <span>Courses</span>
	        </a>
	        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	          <div class="bg-white py-2 collapse-inner rounded">
	            <h6 class="collapse-header">Actions:</h6>
	            <a class="collapse-item" href="/arrangement/add-course">Add</a>
	            <a class="collapse-item" href="/arrangement/view-course">View</a>
	          </div>
	        </div>
	    </li>


	    <li class="nav-item">
	        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
	          <i class="fas fa-fw fa-user"></i>
	          <span>Invigilators</span>
	        </a>
	        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	          <div class="bg-white py-2 collapse-inner rounded">
	            <h6 class="collapse-header">Actions:</h6>
	            <a class="collapse-item" href="/arrangement/add-invigilator">Add</a>
	            <a class="collapse-item" href="/arrangement/view-invigilator">View</a>
	          </div>
	        </div>
	    </li>


	    <li class="nav-item">
	        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseTwo">
	          <i class="fas fa-fw fa-user"></i>
	          <span>Admins</span>
	        </a>
	        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
	          <div class="bg-white py-2 collapse-inner rounded">
	            <h6 class="collapse-header">Actions:</h6>
	            <a class="collapse-item" href="/arrangement/add-admin">Add</a>
	            <a class="collapse-item" href="/arrangement/view-admins">View</a>
	          </div>
	        </div>
	    </li>
	</ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      	<!-- Main Content -->
      	<div id="content">

      		<nav class="navbar navbar-expand navbar-light bg-secondary">
      			<div class="container">
      				<ul class="navbar-nav ml-auto">
	      				<li class="nav-item">
	      					<a href="/arrangement/logout" class="nav-link text-white">Logout</a>
	      				</li>
	      			</ul>
      			</div>
      		</nav>

      		<main class="container-fluid py-5">
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
      	</div>
      	<!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

	<script type="text/javascript"  src="/arrangement/assets/js/jquery.min.js"></script>

	<!-- Bootstrap JS -->
	<script type="text/javascript" src="/arrangement/assets/js/bootstrap.bundle.min.js"></script>

	<!-- JQuery Datatable -->
	<script type="text/javascript"  src="/arrangement/assets/js/jquery.dataTables.min.js"></script>

	<!-- Bootstrap Datatable -->
	<script type="text/javascript"  src="/arrangement/assets/js/dataTables.bootstrap4.min.js"></script>

	<!-- Owl Carousel -->
	<script type="text/javascript" src="/arrangement/assets/js/owl.carousel.min.js"></script>

	<!-- JQuery Easing -->
	<script type="text/javascript" src="/arrangement/assets/js/jquery.easing.js"></script>

	<!-- Custom Script -->
	<script type="text/javascript" src="/arrangement/assets/js/script.js"></script>
</body>
</html>