<div class="">
	<div class="card">

		<?php if (isset($error) && !$error): ?>
			<div class="alert alert-success mb-4">
				<p><?php echo $message; ?></p>
			</div>
		<?php endif ?>

		<?php if (isset($error) && $error): ?>
			<div class="alert alert-danger mb-4">
				<p><?php echo $errorMessage; ?></p>
			</div>
		<?php endif ?>
		
		<div class="card-header py-0">
			<h4 class="h5 card-title mt-2">New Course</h4>
		</div>

		<form action="add-course" method="POST">
			<div class="card-body">
				<div class="form-group">
					<label for="name">Code</label>
					<input type="text" name="code" class="form-control rounded-0" placeholder="Course Code" required>
				</div>

				<div class="form-group">
					<label for="matric">Title</label>
					<input type="text" name="title" class="form-control rounded-0" placeholder="Course Title" required>
				</div>
			</div>

			<div class="card-footer">
				<button class="btn btn-danger">Add <i class="fas fa-plus"></i></button>
			</div>
		</form>
	</div>
</div>