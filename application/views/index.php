<a href="seating-arrangement" class="btn btn-danger d-inline-block mb-4">New Seating</a>
<div class="card">
	<div class="card-header py-0">
		<h4 class="h5 card-title mt-2">Exam Arrangements</h4>
	</div>
	<table class="table table-striped" id="seatingTable">
				<thead>
					<tr>
						<th>Paper</th>
						<th>Room Name</th>
						<th>Capacity</th>
						<th>Supervisor(s)</th>
						<th>Date</th>
						<th>Manage</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($seatings) && empty($seatings)): ?>
							<tr>
								<td colspan="6">
									<p>No Record Found</p>
								</td>
							</tr>
							<?php endif ?>

							<?php if (isset($seatings) && !empty($seatings)): ?>
								<?php foreach ($seatings as $key => $value): ?>
									<tr>
										<td><?php echo $value->course_code ?></td>
										<td><?php echo $value->hall ?></td>
										<td><?php echo $value->capacity ?></td>
										<td><?php echo $value->invigilators ?></td>
										<td><?php echo $value->exam_date; ?></td>
										<td>
											<a href="seatings/<?php echo($value->id)?>" class="text-danger">View Seating</a>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
		</tbody>
	</table>
</div>