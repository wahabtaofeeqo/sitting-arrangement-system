<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Student </h4>
	</div>

	<table class="table table-striped">

		<thead>
			<tr>

				<th>#</th>
				<th>Name</th>
				<th>Matric</th>
				<th>Department</th>
				<th>Level</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($students as $key => $row): ?>
				<tr>
					<td><?php echo $key + 1 ?></td>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->matric; ?></td>
					<td><?php echo $row->department; ?></td>
					<td><?php echo $row->level ?></td>
					<td>
						<a href="#" class="text-danger student-delete" data-id="<?php echo($row->id); ?>">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>