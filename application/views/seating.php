<div class="card">
	<div class="card-header py-0">
		<h4 class="card-title h5 mt-2">Arrangement for <?php echo $code; ?> </h4>
	</div>

	<table class="table table-striped">
		<tbody>
			<?php foreach ($seats as $key => $row): ?>
				<?php if (is_array($row)): ?>
					<tr>
						<?php foreach ($row as $key => $seat): ?>
							<td><?php echo $seat; ?></td>
						<?php endforeach ?>
					</tr>
				<?php endif ?>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="card-footer">
		<form action="confirm-seating" method="POST">
			<input type="hidden" name="seatid" value="<?php echo($seatID); ?>">

			<button class="btn btn-danger">Save Arrangement</button>
		</form>
	</div>
</div>