<!DOCTYPE html>
<html>
<head>
	<title>Today Patient Under You</title>
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users" style="color: green"></span>&nbsp;Today Patients </h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12" style="text-align: center;">
					<?php if($today_patient):
						$today_dis_patient = count($today_patient);
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
						<li><a href="<?= base_url('Doctor/filter_patent/new_patient'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;New  Patients </a></li>
						<li><a href="<?= base_url('Doctor/filter_patent/old_patient'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;Old Patients </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
	</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th style="text-align: center;">Image</th>
				<th>Patients Name</th>
				<th>Issue</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Status</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			<?php if($today_patient):
			count($today_patient);
			foreach($today_patient as $t_patient): ?>
			
			<tbody>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $t_patient['patent_name']; ?>">
							<img src="<?= base_url().'./public/uploads/patents/'.$t_patient['patent_image']; ?>" class="responsive-img" id="doctor_image" height="50">
							 	</a>
						</center>
					</td>
					<td><?= $t_patient['patent_name']; ?></td>
					<td style="color: red"><?= $t_patient['patent_issue']; ?></td>
					<td>
						<a href="tel:<?= $t_patient['patent_phone']; ?>"><?= $t_patient['patent_phone']; ?></a>
					</td>
					<td><?= $t_patient['patent_address']; ?></td>
					<td><?= $t_patient['status']; ?></td>
					<td>
						<h6>
							<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M d Y', strtotime($t_patient['created_at'])); ?></span>
						</h6>
					</td>
					<td>
						<center>
							<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $t_patient['id']; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
						</center>
						<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $t_patient['id']; ?>">
								<?php if ($t_patient['status'] == "Active"):  ?>
								<li><a href="<?= base_url('Doctor/change_patents_status/'.$t_patient['id'].'/Ddischarge'); ?>" style="color:red">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								Discharge</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Doctor/change_patents_status/'.$t_patient['id'].'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
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