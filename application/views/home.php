<!DOCTYPE html>
<html>
<head>
	<title>Mapoly Exam Seating Arrangement</title>

	<!-- Reset -->
	<link rel="stylesheet" type="text/css" href="./assets/css/reset.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="./assets/css/dataTables.bootstrap4.min.css">

	<!-- Fontawesome -->
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/regular.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/solid.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Animate -->
	<link rel="stylesheet" type="text/css" href="./assets/css/animate.css">

	<!-- Custom styles for this template-->
  	<link href="./assets/css/admin.min.css" rel="stylesheet">
</head>

<body>
	<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      	<!-- Main Content -->
      	<div id="content">

      		<nav class="navbar navbar-expand navbar-light bg-secondary">
      			<div class="container">
      				<ul class="navbar-nav ml-auto">
	      				<li class="nav-item">
	      					<a href="logout" class="nav-link text-white">Logout</a>
	      				</li>
	      			</ul>
      			</div>
      		</nav>

      		<main class="container-fluid py-5">
      			<?php 
      				switch ($page) {
      					case 'home':
      						include_once 'index.php';
      						break;

      					case 'seating':
      						include_once 'new_seating.php';
      						break;

      					case 'arrange':
      						include_once 'seating.php';
      						break;      

      					case 'add_hall':
      						include_once 'add_hall.php';
      						break;	

      					case 'view_hall':
      						include_once 'view_hall.php';
      						break;	

      					case 'add_student':
      						include_once 'add_student.php';
      						break;				
      					
      					case 'view_student':
      						include_once 'view_student.php';
      						break;

      					case 'add_course':
      						include_once 'add_course.php';
      						break;

      					case 'view_course':
      						include_once 'view_course.php';
      						break;

      					case 'add_invigilator':
      						include_once 'add_invigilator.php';
      						break;

      					case 'view_invigilator':
      						include_once 'view_invigilators.php';
      						break;

      					case 'add_admin':
      						include_once 'add_admin.php';
      						break;

      					case 'view_admin':
      						include_once 'admins.php';
      						break;

      					case 'seatings':
      						include_once 'seatings.php';
      						break;

      					default:
      						# code...
      						break;
      				}
      			?>	
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

	<script type="text/javascript">
		
		currentTab = 0;
		showTab(currentTab);

		function showTab(index) {

			var tabs = document.getElementsByClassName("tab");
			  tabs[index].style.display = "block";

			  // ... and fix the Previous/Next buttons:
			  if (index == 0) {
			    document.getElementById("prevBtn").style.display = "none";
			  } else {
			    document.getElementById("prevBtn").style.display = "inline";
			  }
			  if (index == (tabs.length - 1)) {
			    var btn = document.getElementById("nextBtn");
			    btn.innerHTML = "Create"
			  } else {
			    document.getElementById("nextBtn").innerHTML = "Next";
			  }
			  // ... and run a function that displays the correct step indicator:
			  fixStepIndicator(index)
		}

		function nextPrev(n) {
		  	// This function will figure out which tab to display
		  	var x = document.getElementsByClassName("tab");
		  	// Exit the function if any field in the current tab is invalid:
		  	if (n == 1 && !validateForm()) return false;
		  	// Hide the current tab:
		  	x[currentTab].style.display = "none";
		  	// Increase or decrease the current tab by 1:
		  	currentTab = currentTab + n;
		  	// if you have reached the end of the form... :
		  	if (currentTab >= x.length) {
		    	//...the form gets submitted:
		    	document.getElementById("sittingForm").submit();
		    	//return false;
		  	}
		  	// Otherwise, display the correct tab:
		  	showTab(currentTab);
		}

		function fixStepIndicator(n) {
		  	// This function removes the "active" class of all steps...
		  	var i, x = document.getElementsByClassName("step");
		  	for (i = 0; i < x.length; i++) {
		    	x[i].className = x[i].className.replace(" active", "");
		  	}
		  	//... and adds the "active" class to the current step:
		  	x[n].className += " active";
		}

		function validateForm() {
		  	// This function deals with validation of the form fields
		  	var x, y, i, valid = true;
		  	x = document.getElementsByClassName("tab");
		  	y = x[currentTab].getElementsByTagName("input");
		  	// A loop that checks every input field in the current tab:
		  	for (i = 0; i < y.length; i++) {
		    	// If a field is empty...
		    	if (y[i].value == "") {
		      		// add an "invalid" class to the field:
		      		y[i].className += " invalid";
		      		document.getElementById("invalid").style.display = "inline";
		      		// and set the current valid status to false:
		      		valid = false;
		    	}
		  	}
		  	// If the valid status is true, mark the step as finished and valid:
		  	if (valid) {
		    	document.getElementsByClassName("step")[currentTab].className += " finish";
		  	}

		  	return valid; // return the valid status
		}


		function createElement(index) {

			var counts = $("#counter").val();
			var holder = $("div#holder");
			holder.html("");

			for (var i = 1; i <= counts; i++) {

				const ele = $('<div class="form-group rounded-0"> <label for="teams"> Department And Students</label> <input type="text" name="dept'+i+'" class="form-control" placeholder="e.g SLT, 30" required> </div>');
				holder.append(ele);
			}
		}

		$(document).ready(function() {
			createElement();
			document.getElementById('counter').addEventListener('change', createElement, true);

			$("#generateForm").submit(function(e) {
				e.preventDefault();

				var form = $(this);
				var formData = $(form).serialize();

				$.ajax({
					url: $(form).attr("action"),
					type: $(form).attr("method"),
					data: formData,
					dataType: 'json',
					success: function(response) {
						location.href = 'save-list/' + response;
					},
					error: function(error) {
						log(error);
					}
				})
			})
		});
	</script>
</body>
</html>