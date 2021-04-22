<div class="card">
	<div class="card-header py-0">
		<h4 class="h6 card-title mt-2">Arrangement Data</h4>
	</div>

	<div class="card-body">
						<form action="seating-arrangement" method="POST" id="sittingForm">
							<div class="tab">
								<div class="form-group">
									<label for="room">Hall Name</label>
									<select name="hall" class="form-control rounded-0">
										<?php if (isset($hall)): ?>
											<?php foreach ($hall as $key => $value): ?>
												<option value="<?php echo($value->name); ?>"><?php echo($value->name); ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>

								<div class="form-group">
									<label for="code">Paper Code</label>
									<select name="code[]" class="form-control rounded-0" required multiple>
										<?php if (isset($courses)): ?>
											<?php foreach ($courses as $key => $value): ?>
												<option value="<?php echo($value->code); ?>"><?php echo($value->code); ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>

								<div class="form-group">
									<label for="capacity">Invigilators</label>
									<select class="form-control rounded-0" multiple name="invigilators[]" required>
										<?php if ($invigilators): ?>
											<?php foreach ($invigilators as $key => $value): ?>
												<option value="<?php echo($value->name); ?>"><?php echo($value->name); ?></option>
											<?php endforeach ?>
										<?php endif ?>
									</select>
								</div>

								<div class="form-group">
									<label for="date">Date</label>
									<input type="date" name="date" class="form-control rounded-0" placeholder="" required>
								</div>

								<div class="form-group">
									<label for="time">Time</label>
									<input type="time" name="time" class="form-control rounded-0" placeholder="10:00:AM" required>
								</div>
							</div>

							<div class="tab">
								<div class="form-group">
									<label for="code">Total Departments</label>
									<select class="form-control rounded-0" id="counter" name="depts" required>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>

								<div class="form-group">
									<label for="perRow">Sit Per Row</label>
									<input type="number" name="perRow" class="form-control rounded-0" required>
								</div>

								<div class="form-group">
									<label for="departments">Departments</label>
									<select class="form-control rounded-0" multiple name="departments[]">
										<?php foreach ($depts as $key => $value): ?>
											<option value="<?php echo($value->department); ?>">
												<?php echo($value->department); ?>
											</option>
										<?php endforeach ?>
									</select>
								</div>

								<div class="form-group">
									<label for="total">Each Department</label>
									<input type="text" name="counts" class="form-control rounded-0" placeholder="e.g 10, 20, 20">
									<small class="form-text text-danger">Comma seperated list</small>
								</div>
							</div>

							<div style="overflow:auto;">

								<div style="float:left;">
							    	<span class="text-danger animated slideInLeft" id="invalid">Required Fields are Empty</span>
							  	</div>

							  	<div style="float:right;">
							    	<button type="button" class="btn btn-light" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
							    	<button type="button" class="btn btn-danger" id="nextBtn" onclick="nextPrev(1)">Next</button>
							  	</div>
							</div>
						</form>

						<div class="text-center mt-4">
							<span class="step"></span>
							<span class="step"></span>
						</div>
					</div>
				</div>

	<style type="text/css">
		.tab {
			display: none;
		}

		#invalid {
			display: none;
		}

		.step {
			width: 15px;
			height: 15px;
			border: none;
			border-radius: 50%;
			display: inline-block;
			background: gray;
			opacity: 0.5;
		}

		.step.active {
			opacity: 1;
		}

		.step.finish {
		  	background-color: #4CAF50;
		}

	</style>