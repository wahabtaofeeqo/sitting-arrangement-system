<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Examiners </h4>
	</div>

	<table class="table table-striped">

		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Post</th>
				<th>Manage</th>
			</tr>
		</thead>
		<tbody>

			<?php if (empty($examiners)): ?>
				<tr>
					<td colspan="4">No Record Found</td>
				</tr>
			<?php endif ?>
			<?php if (!empty($examiners)): ?>
				<?php foreach ($examiners as $key => $row): ?>
					<tr>
						<td><?php echo $key + 1 ?></td>
						<td><?php echo $row->name; ?></td>
						<td><?php echo $row->post; ?></td>
						<td>
							<a href="#" class="text-danger examiner-delete" data-id="<?php echo($row->id); ?>">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>