<!DOCTYPE html>
<html>
<head>
	<title>Discharge Pateints</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		h6{font-size: 15px;font-weight: 500}
	</style>
</head>
<body >
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<div style="margin-right: 15px; margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;">
			<div class="row">
				<div class="col l12 m12 s12">
					<div class="row">
						<div class="col l6 m6 s6">
							<img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 

						<h6 style="font-size: 15px;font-weight: 500">Patient Name : <?= $patents[0]->patient_name; ?></h6>
						<h6>Patient Mobile : <a href="tel:<?= $patents[0]->patent_phone; ?>"><?= $patents[0]->patient_mobile; ?></a></h6>
						<h6>Booking Time : <?= date('h:i:s', strtotime($patents[0]->boking_time)); ?></h6>
						
						</div>
						<div class="col l6 m6 s6" style="text-align: center;">
							<h6>Admit Date : 
								<?= date('d M, Y', strtotime($patents[0]->created_at)); ?>
							</h6>
							<h6>Release Date : <?= date('d M, Y'); ?></h6>
							<h6>Days Spent : 
								<?php 
									$admint_day = $patents[0]->created_at;
									$today = date("Y-m-d");
									$diff = date_diff(date_create($admint_day), date_create($today));
									echo ' '.$diff->format('%d');
								?>
							</h6>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h5 style="font-weight: 500;font-size: 18px;">Disease and Symptoms : <span style="color: red;font-weight: 500"><?= $patents[0]->pateint_issue; ?></span></h5>
			
		</div>
		<div class="card-content">
			
			<?=  form_open('Admin/add_appointment_pat_charge/'.$patents[0]->id); ?>
			<div class="row">
				<div class="col l6 m12  s12">
					<h5 style="font-weight: 500;font-size: 18px;">Charges</h5>
					<h6 style="margin-bottom:  20px;">Room Charge (Per Day) </h6>
					<h6 style="margin-bottom:  30px;">Doctor Fee</h6>
					<h6 style="margin-bottom:  30px;">Medicine Cost</h6>
					<h6 style="margin-bottom:  30px;">Other Cost</h6>
				</div>
				<div class="col l6 m12  s12">
					<h5 style="font-weight: 500;font-size: 18px;">Price</h5>
					<input type="number" name="room_charge" id="input_box" placeholder="Enter  Room Charge">
					<span style="color: red"><?= display_error($validation,'room_charge'); ?></span>
					<input type="number" name="doc_fee" id="input_box" placeholder="Enter  Doctor Fee">
					<span style="color: red"><?= display_error($validation,'doc_fee'); ?></span>
					<input type="number" name="med_cost" id="input_box" placeholder="Enter Medicine Cost">
					<span style="color: red"><?= display_error($validation,'med_cost'); ?></span>
					<input type="number" name="other_cost" id="input_box" placeholder="Other Cost">
					<span style="color: red"><?= display_error($validation,'other_cost'); ?></span>
					

				</div>
				<center>
					<button class="btn btn-wavevs-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500"><span class="fa fa-sign-in-alt"></span>&nbsp;Generate Bill</button>
				</center>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>