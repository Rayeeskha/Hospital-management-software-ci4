<!DOCTYPE html>
<html>
<head>
	<title>Blood Donor Details</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		 #blood_donors{display: flex;}
       #blood_donors li:first-child{width: 250px}
       #donor_filters{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
       #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
       #search_donors{display: flex;}
    #search_donors li:first-child{width: 300px}
    select{display: block;}
     select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;width: 100%}
     #donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
     tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!------Body Section Start ---->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Donor Users</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank/search_donor_details'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" vale="<?= set_value('blood_group'); ?>">
								<option selected="" disabled="">Select Blood blood_group</option>
									<?php if($donor_details):
									count($donor_details);
									foreach($donor_details as $blood_group): ?>
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
							<span class="fa fa-filter">&nbsp;Filter Donors</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="donor_filters">
						
						<li><a href="<?= base_url('Blood_bank/filter_blood_donors/new_donors'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Donors </a></li>
						<li><a href="<?= base_url('Blood_bank/filter_blood_donors/old_donors'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Donors </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Image</th>
					<th>Donor Name</th>
					<th>Blood Group</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Status</th>
					<th>Created Date</th>
					<th style="text-align: center;">Request</th>
				</tr>
				<?php if($donor_details):
				count($donor_details);
				foreach($donor_details as $search_donors): ?>
					<tr>
						<td>
							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $search_donors->donor_name; ?>">
								 <img src="<?= base_url().'./public/uploads/donar_users/'.$search_donors->donor_image; ?>" class="responsive-img" id="donor_image" height="50">
							 	</a>
							 </center>
						</td>
						<td>
							<?= $search_donors->donor_name; ?>
						</td>
						<td style="color: red">
							<?= $search_donors->blood_group; ?>
						</td>
						<td>
							<a href="tel:<?= $search_donors->contact_number; ?>"><?= $search_donors->contact_number; ?></a>
						</td>
						<td>
							<?= $search_donors->address; ?>
						</td>
						<td>
							<?php if($search_donors->status == "Active"):
								echo '<span style="color:green">Active</span>';
								 elseif($search_donors->status == "InActive"):
									echo '<span style="color:red">InActive</span>';
								?>
							<?php endif; ?>
						</td>
						<td>
							<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y, h:i:s', strtotime($search_donors->created_at)); ?></span>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $search_donors->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $search_donors->id; ?>">
								<li><a href="<?= base_url('Blood_bank/blood_response_data/'.$search_donors->id); ?>"><span class="fa fa-eye" style="color: #005a87;"></span>&nbsp;Response</a></li>
							</ul>
							<!---Action Dropdown --->
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Not Any Donors</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>

</div>
<!------Body Section End ---->

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>