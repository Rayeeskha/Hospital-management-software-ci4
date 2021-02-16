<!DOCTYPE html>
<html>
<head>
	<title>Manage Doctor</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
        h6{font-weight: 500}
        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;}
        #search_doctor{display: flex;}
		 #search_doctor li:first-child{width: 250px}
		 #doctor_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
		 #doctor_filter li a{color: grey;font-size: 14px;font-weight: 500;}
		 #doctor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
		 td{font-size: 15px;font-weight: 500}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start --->
<div style="margin-left: 15px; margin-right: 15px">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Manage Doctor</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_doctor'); ?>
					<ul id="search_doctor">
						<li>
							<input type="text" name="doctor_name" id="input_box" value="<?= set_value('doctor_name'); ?>" placeholder="Enter Doctor Name" required="">
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
							<span class="fa fa-filter">&nbsp;Filter Doctor</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_doctor/new_doctor'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Doctor </a></li>
						<li><a href="<?= base_url('Admin/filter_doctor/old_doctor'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Doctor </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
		
	</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th style="text-align: center;">Doctor Photo</th>
				<th>Name</th>
				<th>Department</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>Specility</th>
				<th>Other Info</th>
				<th>Status</th>
				<th style="text-align: center;">Action</th>
			</tr>
			<?php if($doctors):
				count($doctors); 
				foreach($doctors as $doc):?>
			<tbody>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $doc->doctor_name; ?>">
							 <img src="<?= base_url().'./public/uploads/doctor/'.$doc->doctor_image; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						 </center>
					</td>
					<td >
						<?= $doc->doctor_name; ?>
					</td>
					<td style="color: orange">
						<?= $doc->department_name; ?>
					</td>
					<td>
						<a href="mailto:<?= $doc->doctor_email; ?>"><?= $doc->doctor_email; ?></a>
					</td>
					<td>
						<a href="tel:<?= $doc->doctor_phone; ?>"> <?= $doc->doctor_phone; ?></a>
					</td>
					<td>
						<?= $doc->doctor_address; ?>
					</td>
					<td>
						<?= $doc->doctor_specility; ?>
					</td>
					<td>
						<?= word_limiter($doc->doctor_other_info, 4); ?>
					</td>
					<td>
						<?php if($doc->status == "Active"):
							echo '<span style="color:green">Active</span>';
							 elseif($doc->status == "InActive"):
								echo '<span style="color:red">InActive</span>';
							?>
						<?php endif; ?>
					</td>
					<td>
						<center>
							<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $doc->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $doc->id; ?>">
							<li><a href="<?= base_url('Admin/edit_doctor/'.$doc->id); ?>"><span class="fa fa-edit" style="color: #005a87;"></span>&nbsp;Edit</a></li>
							
							<li><a href="<?= base_url('Admin/delete_doctor/'.$doc->id); ?>" onclick="return confirm('Are you sure you want to  delete this Doctor ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

							<?php if ($doc->status == "Active"):  ?>
							<li><a href="<?= base_url('Admin/change_doctor_status/'.$doc->id.'/InActive'); ?>">
								<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
							InActive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_doctor_status/'.$doc->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>

				</tr>

			</tbody>
		<?php endforeach; ?>
		<?php else: ?>
			<h6 style="color: red;">Doctor Not Found</h6>
		<?php endif; ?>
		</table>		
	</div>
</div>

<!---Body Section End--->


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>