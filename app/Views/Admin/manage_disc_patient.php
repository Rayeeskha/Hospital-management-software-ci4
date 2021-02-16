<!DOCTYPE html>
<html>
<head>
	<title>Discharged Patents</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->

<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500;color: red"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Manage Discharged Patents</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_discharge_patient'); ?>
					<ul id="search_doctor">
						<li>
							<input type="text" name="patent_name" id="input_box" value="<?= set_value('patent_name'); ?>" placeholder="Enter Patents Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Patients</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_dischrage_patient/new_patents'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Patients </a></li>
						<li><a href="<?= base_url('Admin/filter_dischrage_patient/old_patents'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Patients </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Zip</th>
					<th>Issue</th>
					<th>Room Number</th>
					<th>Doctor Name</th>
					<th>Doctor Fee</th>
					<th>Intry Fee</th>
					<th>Other Fee</th>
					<th>Patents Email</th>
					<th>Status</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if(count($patents)):
				foreach($patents as $pat_rec): ?>
					<tr>
						<td>
							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $pat_rec['patent_name']; ?>">
								 <img src="<?= base_url().'./public/uploads/patents/'.$pat_rec['patent_image']; ?>" class="responsive-img" id="doctor_image" height="50">
							 	</a>
							 </center>
						</td>
						<td>
							<?= $pat_rec['patent_name']; ?>
						</td>
						<td>
							<a href="tel:<?= $pat_rec['patent_phone']; ?>"><?= $pat_rec['patent_phone']; ?></a>
						</td>
						<td>
							<?= $pat_rec['patent_address']; ?>
						</td>
						<td>
							<?= $pat_rec['patent_zip']; ?>
						</td>
						<td>
							<?= $pat_rec['patent_issue']; ?>
						</td>
						<td>
							<?= $pat_rec['patent_room']; ?>
						</td>
						<td>
							<?php 
								$get_doctor =  get_doctor_name('doctor_fee',$pat_rec['doctor_name']);

								echo $get_doctor[0]->doctor_name;
							 ?>	
						</td>
						<td>
							<?= $pat_rec['doctor_fee']; ?>
						</td>
						<td>
							<?= $pat_rec['intry_fee']; ?>
						</td>
						
						<td>
							<?= $pat_rec['other_fee']; ?>
						</td>
						<td>
							<a href="mailto:<?= $pat_rec['patent_email']; ?>"><?= $pat_rec['patent_email']; ?></a>
						</td>
						<td>
							<?php if($pat_rec['status'] == "Ddischarge"):
								echo '<span style="color:orange;">Doctor Discharge</span>';
								else:
									echo '<span style="color:red;font-weight:500;font-size:14px;">Discharge </span>';
								?>
							<?php endif; ?>
						</td>

						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $pat_rec['id']; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $pat_rec['id']; ?>">
								<li><a href="<?= base_url('Admin/payment_dischrge_patient/'.$pat_rec['id']); ?>" target="_blank" style="color: green;border-bottom: 1px dashed silver"><span class="fa fa-eye" style="color: green;"></span>&nbsp;View Payment</a></li>
								<li><a href="<?= base_url('Admin/delete_patents/'.$pat_rec['id']); ?>" target="_blank" style="color: red"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
							</ul>
						<!---Action Dropdown --->
						</td>

					</tr>
				<?php endforeach; ?>

				<?php else: ?>
					<h6 style="color: red">Record Not Found</h6>
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
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>