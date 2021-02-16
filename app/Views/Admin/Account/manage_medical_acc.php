<!DOCTYPE html>
<html>
<head>
	<title>Manage Medical Account</title>
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
<!---Body Section Start -->
<div style="margin-left: 15px; margin-right: 15px">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Manage Medical Accountent Account</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Admin/search_medical_account'); ?>
					<ul id="search_doctor">
						<li>
							<input type="text" name="search_med_name" id="input_box" value="<?= set_value('search_med_name'); ?>" placeholder="Enter Accountent Name" required="">
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
							<span class="fa fa-filter">&nbsp;Filter Accountent</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_med_account/new_med_acc'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Accountent </a></li>
						<li><a href="<?= base_url('Admin/filter_med_account/old_med_acc'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Accountent</a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
		
	</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th style="text-align: center;">Doctor Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>Level</th>
				<th>Status</th>
				<th style="text-align: center;">Action</th>
			</tr>
			<?php if($medical):
				count($medical); 
				foreach($medical as $doc):?>
			<tbody>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $doc->username; ?>">
							 <img src="<?= base_url().'./public/uploads/Account/Accountent/'.$doc->image; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						 </center>
					</td>
					<td>
						<?= $doc->username; ?>
					</td>
					<td>
						<a href="mailto:<?= $doc->email; ?>"><?= $doc->email; ?></a>
					</td>
					<td>
						<?= $doc->level; ?>
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
							<li><a href="<?= base_url('Admin/delete_acc_account/'.$doc->id); ?>" onclick="return confirm('Are you sure you want to  delete this Accountent Account ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

							<?php if ($doc->status == "Active"):  ?>
							<li><a href="<?= base_url('Admin/change_medical_acc_status/'.$doc->id.'/InActive'); ?>">
								<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
							InActive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_medical_acc_status/'.$doc->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>

				</tr>

			</tbody>
		<?php endforeach; ?>
		<?php else: ?>
			<h6 style="color: red;">Medical Accountent Account Not Found</h6>
		<?php endif; ?>
		</table>		
	</div>
</div>

<!---Body Section End--->
<!---Body Section End -->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>