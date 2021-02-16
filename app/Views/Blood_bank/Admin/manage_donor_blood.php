<!DOCTYPE html>
<html>
<head>
	<title>Manage Donor Blood</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		#donor_filters{width: 200px !important;padding-top: 8px;padding-bottom: 8px;}
       #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
       #donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
       tr td{font-weight: 500;font-size: 14px;}
		select{display: block;}
		 #blood_donors{display: flex;}
       #blood_donors li:first-child{width: 250px}
       #donor_filters{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
       #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
       #search_donors{display: flex;}
    #search_donors li:first-child{width: 300px}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->
<!-----Body Section Start ----->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Manage Blood Donor Blood</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank/search_donor_blood'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" vale="<?= set_value('blood_group'); ?>">
								<option selected="" disabled="">Select Blood blood_group</option>
									<?php if($donor_blood):
									count($donor_blood);
									foreach($donor_blood as $blood_group): ?>
										<option value="<?= $blood_group->blood_group; ?>"><?= $blood_group->blood_group; ?></option>
									<?php endforeach; ?>
									<?php else: ?>
										<h6 style="color: red;font-weight: 500;font-size: 16px;">Blood Group Not Found</h6>
									<?php endif; ?>
							</select>
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="donor_filters" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Blood</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="donor_filters">
						
						<li><a href="<?= base_url('Blood_bank/filter_donor_blood/new_donors'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Blood </a></li>
						<li><a href="<?= base_url('Blood_bank/filter_donor_blood/old_donors'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Blood </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Donor Picture</th>
					<th>Donor Name</th>
					<th>Donor Mobile</th>
					<th>Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood Price</th>
					<th>Blood Selling Price</th>
					<th>Blood Buy date</th>
					<th>Status</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if($donor_blood):
				count($donor_blood);
				foreach($donor_blood as $blood_donor): ?>
					<tr>
						<td>
						<?php
							$get_donors = get_doctor_name('blood_donor', $blood_donor->blood_donor_id);
						?>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $get_donors[0]->donor_name; ?>">
								 <img src="<?= base_url().'./public/uploads/donar_users/'.$get_donors[0]->donor_image; ?>" class="responsive-img" id="donor_image" height="50">
							</a>
						</center>
						</td>
						<td>
							<?= $get_donors[0]->donor_name; ?>
						</td>
						<td>
							<a href="tel:<?= $get_donors[0]->contact_number; ?>"><?= $get_donors[0]->contact_number; ?></a>
						</td>
						<td style="color: red">
							<?= $blood_donor->blood_group; ?>
						</td>
						<td style="color: orange">
							<?= $blood_donor->blood_unit; ?>
						</td>
						<td style="color: red">
							<span class="fa fa-rupee-sign"></span><?= number_format($blood_donor->blood_price); ?>
						</td>
						<td style="color: green">
							<span class="fa fa-rupee-sign"></span><?= number_format($blood_donor->selling_price); ?>
						</td>
						<td>
							<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y', strtotime($blood_donor->created_at)); ?></span>
						</td>
						<td>
							<?php if($blood_donor->status == "Active"):
								echo '<span style="color:green">Active</span>';
							else:
								echo '<span style="color:red">InActive</span>';
							?>
							<?php endif; ?>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $blood_donor->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $blood_donor->id; ?>">
								<li><a href="<?= base_url('Blood_bank/add_blood_selling_price/'.$blood_donor->id); ?>" style="border-bottom: 1px dashed silver;font-weight: 500;font-size: 12px;">&nbsp;Add Blood Selling Price</a></li>

								<li><a href="<?= base_url('Blood_bank/delete_donor_details/'.$blood_donor->id); ?>" style="border-bottom: 1px dashed silver"  onclick="return confirm('Are you sure you want to  delete this Donor Details ?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($blood_donor->status == "Active"):  ?>
								<li><a href="<?= base_url('Blood_bank/change_donor_blood/'.$blood_donor->id.'/InActive'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Blood_bank/change_donor_blood/'.$blood_donor->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>
							</ul>
							<!---Action Dropdown --->
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				
			<?php endif; ?>
			</table>
		</div>
	</div>
</div>
<!-----Body Section End ----->
<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>