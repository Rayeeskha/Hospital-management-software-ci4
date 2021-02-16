<!DOCTYPE html>
<html>
<head>
	<title>Manage Company</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start  ---->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Manage Medicines Company</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Medical_Accountent/search_company'); ?>
					<ul id="search_doctor">
						<li>
							<input type="text" name="company_name" id="input_box" value="<?= set_value('company_name'); ?>" placeholder="Enter Company Name" required="">
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
							<span class="fa fa-filter">&nbsp;Filter Company</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Medical_Accountent/filter_medicine_cpmpany/new_medicine'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;New  Company </a></li>
						<li><a href="<?= base_url('Medical_Accountent/filter_medicine_cpmpany/old_medicine'); ?>" class="waves-effect">
							<span class="fa fa-trophy" style="color: #005a87"></span>&nbsp;Old Company </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
		
	</div>
	<div class="card-content">
		<table class="table">
			<th>Company Name</th>
			<th>Company Address</th>
			<th>Company Mobile Number</th>
			<th>Show Products</th>
			<th>Status</th>
			<th>Date</th>
			<th style="text-align: center;">Action</th>
		<?php if($medicine_company):
			count($medicine_company); ?>	
		<?php foreach($medicine_company as $md_c): ?>	
			<tr>
				<td>
					<?= $md_c->company_name; ?>
				</td>
				<td>
					<?= $md_c->com_address; ?>
				</td>
				<td>
					<?= $md_c->company_c_num; ?>
				</td>
				<td>
					<span class="fa fa-eye" style="color: green"></span>
					<a href="<?= base_url('Medical_Accountent/show_products/'.$md_c->id); ?>">Show Products</a>
				</td>
				<td>
					<?= date('d M, Y', strtotime($md_c->created_at)); ?>
				</td>
				<td>
					<?php if($md_c->status == "Active"):
						echo '<span style="color:green">Active</span>';
					elseif($md_c->status == "InActive"):
						echo '<span style="color:red">InActive</span>';
					?>
					<?php endif; ?>
				</td>
				
				<td>
					<center>
						<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $md_c->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
					</center>
					<!---Action Dropdown --->
					<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $md_c->id; ?>">
						<li><a href="<?= base_url('Medical_Accountent/edit_company_name/'.$md_c->id); ?>"><span class="fa fa-edit" style="color: #005a87;"></span>&nbsp;Edit</a></li>
						<li><a href="<?= base_url('Medical_Accountent/delete_company/'.$md_c->id); ?>" onclick="return confirm('Are you sure you want to  delete this Company Details?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
						<?php if ($md_c->status == "Active"):  ?>
							<li><a href="<?= base_url('Medical_Accountent/change_company_status/'.$md_c->id.'/InActive'); ?>">
								<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
							<?php else: ?>
							<li><a href="<?= base_url('Medical_Accountent/change_company_status/'.$md_c->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
						<?php endif; ?>
					</ul>
						<!---Action Dropdown --->
				</td>
			</tr>
		<?php endforeach; ?>
		<?php else: ?>
			<div class="card" style="padding: 5px">
				<div class="card-content" style="background: red;padding: 3px;">
					<h6 style="color: white;font-weight: 500;margin-left: 20px;">
						<span class="fa fa-times"></span>&nbsp;Company Not Found</h6>
				</div>
			</div>
			
		<?php endif; ?>
	</table>		
	</div>
</div>
<!---Body Section End  ---->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>