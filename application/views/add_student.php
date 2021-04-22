<div class="col-lg-6">
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
			<h4 class="h5 card-title mt-2">Student File</h4>
		</div>

		<form action="add-student" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<div class="form-group">
					<input type="hidden" name="temp" value="1">

					<label class="d-block" for="customFile">Excel file</label>
				  	<input type="file" class="custom-file-inpt" id="customFile" name="students" required>
				</div>
			</div>

			<div class="card-footer">
				<button class="btn btn-danger">Upload to add <i class="fas fa-plus"></i></button>
			</div>
		</form>
	</div>
</div>