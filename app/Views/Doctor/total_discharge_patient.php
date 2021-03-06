<!DOCTYPE html>
<html>
<head>
	<title>Total Discharge Patients</title>
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users" style="color: green"></span>&nbsp;Total Discharge Patients </h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12" style="text-align: center;">
					<?php if($today_patient):
						$total_dis_patient = count($today_patient);
					?>
					<h6 style="color: red"><span class="fa fa-eye"></span>&nbsp;<?= $total_dis_patient; ?></h6>
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
						<li><a href="<?= base_url('Doctor/filter_all_discharge_patient/new_patient'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;New  Patients </a></li>
						<li><a href="<?= base_url('Doctor/filter_all_discharge_patient/old_patient'); ?>" class="waves-effect">
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
			
			</tr>
			<?php if($today_patient):
			count($today_patient);
			foreach($today_patient as $t_patient): ?>
			<?php endforeach; ?>
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
					<td style="color: red">
						<?php if($t_patient['status'] == 'Ddischarge'): ?>
							<h6 style="color: red;font-size: 15px;"><?php echo 'Discharged Patient' ?></h6>
						<?php endif; ?>
					</td>
					<td>
						<h6>
							<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M d Y', strtotime($t_patient['created_at'])); ?></span>
						</h6>
					</td>
					
				</tr>
			</tbody>
			<?php else: ?>
				<h6 style="color: red;font-weight: 500">Patient Not Found</h6>
			<?php endif; ?>
			<tr>
				<td colspan="7">
					<div id="pagination" style="color: white">
						<?= $pager->links() ?>
					</div>
				</td>
			</tr>
		</table>		
	</div>
</div>
<!---Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>