<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Exam Rooms </h4>
	</div>

	<table class="table table-striped">

		<thead>
			<tr>
				<th>#</th>
				<th>Code</th>
				<th>Title</th>
				<th>Manage</th>
			</tr>
		</thead>
		<tbody>

			<?php if (empty($courses)): ?>
				<tr>
					<td colspan="4">No Record Found</td>
				</tr>
			<?php endif ?>
			<?php if (!empty($courses)): ?>
				<?php foreach ($courses as $key => $row): ?>
					<tr>
						<td><?php echo $key + 1 ?></td>
						<td><?php echo $row->code; ?></td>
						<td><?php echo $row->title; ?></td>
						<td>
							<a href="#" class="text-danger course-delete" data-id="<?php echo($row->id); ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>