<!DOCTYPE html>
<html>
<head>
	<title>Today Appointment</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start --->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Today Appointment</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
				<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12"></div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Appointment</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_appointment/new_appointment'); ?>" class="waves-effect" style="border-bottom: 1px  dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Appointment </a></li>
						<li><a href="<?= base_url('Admin/filter_appointment/old_appointment'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Appointment </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
	</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th>Patient Name</th>
				<th>Patient Email</th>
				<th>Patient Mobile</th>
				<th>Doctor Name</th>
				<th>Booked Date</th>
				<th>Booked Timing</th>
				<th>Patient Issue</th>
				<th style="text-align: center;">Status</th>
				<th>Action</th>
			</tr>
			<?php if($today_apmnt):
			count($today_apmnt); ?>
			<?php foreach($today_apmnt as $t_appointment): ?>
				<tr>
					<td>
						<?= $t_appointment->patient_name; ?>
					</td>
					<td>
						<a href="mailto:<?= $t_appointment->patient_email; ?>"><?= $t_appointment->patient_email; ?></a>
					</td>
					<td>
						<a href="tel:<?= $t_appointment->patient_mobile; ?>"><?= $t_appointment->patient_mobile; ?></a>
					</td>
					<td style="color: green">
						<?= $t_appointment->doctor_name; ?>
					</td>
					<td>
						<span class="fa fa-clock" style="color: orange">&nbsp;<?= date('d M, Y', strtotime($t_appointment->boking_date)); ?></span>
					</td>
					<td>
						<span class="fa fa-clock" style="color: orange">&nbsp;<?= date('h:i:s', strtotime($t_appointment->boking_time)); ?></span>
					</td>
					<td style="color: red">
						<?= $t_appointment->pateint_issue; ?>
					</td>
					<td>
						<?php if($t_appointment->status == "Appointment"):
							echo '<span style="color:green">Appointment</span>';
							 elseif($t_appointment->status == "Active"):
								echo '<span style="color:blue">Active</span>';
							?>
						<?php endif; ?>
					</td>
					<td>
						<center>
							<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $t_appointment->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $t_appointment->id; ?>">
							
							<li><a href="<?= base_url('Admin/delete_appointment/'.$t_appointment->id); ?>" onclick="return confirm('Are you sure you want to  delete this Appointment Details ?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

							<?php if ($t_appointment->status == "Appointment"):  ?>
							<li><a href="<?= base_url('Admin/change_Appointment_status/'.$t_appointment->id.'/Active'); ?>">
								<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
							Active</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_Appointment_status/'.$t_appointment->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Inactive</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
				<h6 style="color: red">Not any Appointment</h6>
			<?php endif; ?>
		</table>
	</div>
</div>
<!---Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>