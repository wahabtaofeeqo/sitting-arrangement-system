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
			<h4 class="h5 card-title mt-2">New Admin</h4>
		</div>

		<form action="add-admin" method="POST">
			<div class="card-body">
				<div class="form-group">
					<label for="name">Firstname</label>
					<input type="text" name="firstname" class="form-control rounded-0" placeholder="Firstname" required>
				</div>

				<div class="form-group">
					<label for="name">Lastname</label>
					<input type="text" name="lastname" class="form-control rounded-0" placeholder="lastname" required>
				</div>

				<div class="form-group">
					<label for="name">Email</label>
					<input type="email" name="email" class="form-control rounded-0" placeholder="Email" required>
				</div>

				<div class="form-group">
					<label for="name">Phone</label>
					<input type="text" name="phone" class="form-control rounded-0" placeholder="Phone Number" required>
				</div>

				<div class="form-group">
					<label for="name">Password</label>
					<input type="text" name="password" class="form-control rounded-0" placeholder="Password" required>
				</div>
			</div>

			<div class="card-footer">
				<button class="btn btn-danger">Add <i class="fas fa-plus"></i></button>
			</div>
		</form>
	</div>
</div>