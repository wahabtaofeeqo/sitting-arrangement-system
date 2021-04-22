<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Exam Rooms </h4>
	</div>

	<table class="table table-striped">

		<thead>
			<tr>

				<th>#</th>
				<th>Name</th>
				<th>Capacity</th>
				<th>Manage</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($hall as $key => $row): ?>
				<tr>
					<td><?php echo $key + 1 ?></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->capacity; ?></td>
					<td>
						<a href="#" class="text-danger hall-delete" data-id="<?php echo($row->id); ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>