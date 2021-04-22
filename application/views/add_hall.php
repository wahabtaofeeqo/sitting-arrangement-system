<div class="col-lg-6">
	<div class="card">

		<?php if (isset($error) && !$error): ?>
			<div class="alert alert-success mb-4">
				<p><?php echo $message; ?></p>
			</div>
		<?php endif ?>
		
		<div class="card-header py-0">
			<h4 class="h5 card-title mt-2">New Exam Hall</h4>
		</div>

		<form action="add-hall" method="POST">
			<div class="card-body">
				<div class="form-group">
					<label for="name">Hall Name</label>
					<input type="text" name="name" class="form-control form-control-lg rounded-0" placeholder="ICT Room 7" required>
				</div>

				<div class="form-group">
					<label for="capacity">Hall Capacity</label>
					<input type="number" name="capacity" class="form-control form-control-lg rounded-0" placeholder="Capacity" required>
				</div>
			</div>

			<div class="card-footer">
				<button class="btn btn-danger">Add <i class="fas fa-plus"></i></button>
			</div>
		</form>
	</div>
</div>