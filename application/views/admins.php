<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Admins </h4>
	</div>

	<table class="table table-striped">

		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Manage</th>
			</tr>
		</thead>
		<tbody>

			<?php if (empty($admins)): ?>
				<tr>
					<td colspan="5">No Record Found</td>
				</tr>
			<?php endif ?>
			<?php if (!empty($admins)): ?>
				<?php foreach ($admins as $key => $row): ?>
					<tr>
						<td><?php echo $key + 1 ?></td>
						<td><?php echo $row->firstname; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->phone; ?></td>
						<td>
							<a href="#" class="text-danger admin-delete" data-id="<?php echo($row->id); ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>