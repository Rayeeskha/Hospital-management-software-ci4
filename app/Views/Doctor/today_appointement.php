<!DOCTYPE html>
<html>
<head>
	<title>Today Appointment</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		table tr td{font-weight: 500;font-size: 15px;}
	</style>
</head>
<body>
<!---Topbar Section Include --->
<?= view('Doctor/top_bar'); ?>	
<!---Topbar Section Include --->

<!---Body Section Start --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users" style="color: green"></span>&nbsp;Today Appointment Patients </h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12" style="text-align: center;">
					<?php if($today_apmt):
						$today_dis_patient = count($today_apmt);
					?>
					<h6 style="color: red"><span class="fa fa-eye"></span>&nbsp;<?= $today_dis_patient; ?></h6>
					<?php endif; ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Patients</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						<li><a href="<?= base_url('Doctor/filter_appointment_patient/new_patient'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;New  Patients </a></li>
						<li><a href="<?= base_url('Doctor/filter_appointment_patient/old_patient'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;Old Patients </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
	</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th>Patients Name</th>
				<th>Issue</th>
				<th>Phone</th>
				<th>Appointemnt Date</th>
				<th>Appointemnt Time</th>
				<th>Status</th>
				<th style="text-align: center;">Action</th>
			</tr>
			<?php if($today_apmt):
			count($today_apmt);
			foreach($today_apmt as $t_patient): ?>
			
			<tbody>
				<tr>
					
					<td><?= $t_patient->patient_name; ?></td>
					<td style="color: red"><?= $t_patient->pateint_issue; ?></td>
					<td>
						<a href="tel:<?= $t_patient->patient_mobile; ?>"><?= $t_patient->patient_mobile; ?></a>
					</td>
					<td>
						<h6>
							<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M d Y', strtotime($t_patient->boking_date)); ?></span>
						</h6>
					</td>
					<td>
						<h6>
							<span class="fa fa-clock" style="color: green">&nbsp;<?= date('h:i:s', strtotime($t_patient->boking_time)); ?></span>
						</h6>
					</td>
					<td>
						<?php if($t_patient->status == "Active"):
								echo '<span style="color:green">Active</span>';
								else:
									echo '<span style="color:red;font-weight:500;font-size:14px;">InActive </span>';
								?>
							<?php endif; ?>
					</td>
					<td>
						<center>
							<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $t_patient->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
						</center>
						<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $t_patient->id; ?>">
								<?php if ($t_patient->status == "Active"):  ?>
								<li><a href="<?= base_url('Doctor/change_appointment_status/'.$t_patient->id.'/Ddischarge'); ?>" style="color:red">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								Discharge</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Doctor/change_appointment_status/'.$t_patient->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>

							</ul>
						<!---Action Dropdown --->
					</td>
				</tr>
			</tbody>
			<?php endforeach; ?>
			<?php else: ?>
				<h6 style="color: red;font-weight: 500">Patient Not Found</h6>
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