<!DOCTYPE html>
<html>
<head>
	<title>Manage Doctor Fee</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
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
<!---Body Section Start -->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Manage Doctor Fee</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_doctor_fee'); ?>
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
						
						<li><a href="<?= base_url('Admin/filter_doctor_fee/new_doctor'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Doctor </a></li>
						<li><a href="<?= base_url('Admin/filter_doctor_fee/old_doctor'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Doctor </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Doctor Name</th>
					<th>Doctor Fee</th>
					<th>Status</th>
					<th>Created  Date</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if($doctor_fee):
					count($doctor_fee);
				foreach($doctor_fee as $doc_fee): ?>
				
				<tbody>
					<tr>
						<td >
							<?= $doc_fee->doctor_name; ?>
						</td>
						<td >
							<?= $doc_fee->doctor_fee; ?>
						</td>
						<td>
							<!-- <?= $doc_fee->status; ?> -->
							<?php if($doc_fee->status == "Active"):
							echo '<span style="color:green">Active</span>';
							 elseif($doc_fee->status == "InActive"):
								echo '<span style="color:red">InActive</span>';
							?>
						<?php endif; ?>
						</td>
						<td>
							<?= $doc_fee->created_at; ?>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $doc_fee->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>
							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $doc_fee->id; ?>">
								<li><a href="<?= base_url('Admin/edit_doctor_fee/'.$doc_fee->id); ?>"><span class="fa fa-edit" style="color: #005a87;"></span>&nbsp;Edit</a></li>
								
								<li><a href="<?= base_url('Admin/delete_doctor_fee/'.$doc_fee->id); ?>" onclick="return confirm('Are you sure you want to  delete this Doctor Fee Details?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($doc_fee->status == "Active"):  ?>
								<li><a href="<?= base_url('Admin/change_doctor_fee_status/'.$doc_fee->id.'/InActive'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Admin/change_doctor_fee_status/'.$doc_fee->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>
							</ul>
						<!---Action Dropdown --->
						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Doctor Record Not Found</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>

</div>
<!---Body Section End -->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>