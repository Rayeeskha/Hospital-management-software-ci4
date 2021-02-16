<!DOCTYPE html>
<html>
<head>
  <title>Donor Dashboard</title>
  <!----Css file Include --->
  <?= view('Admin/css_file.php'); ?>
  <!----Css file Include --->
  <!----Css file Include --->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		tr td{font-weight: 500;font-size: 16px;}
		#search_donors{display: flex;}
    	#search_donors li:first-child{width: 300px}
    	select{display: block;}
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
<?= view('Blood_bank/Donor/top_bar'); ?>
<!----Top Bar Section Start ---->
<div class="row">
	<div class="col l6 m12 s12">
		<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Bank</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank_donor/search_hos_bld_user'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" id="username" value="<?= set_value('username'); ?>">
								<option selected="" disabled="">---Search Username ---</option>
									<?php if($blood_bank):
									count($blood_bank);
									foreach($blood_bank as $blood_group): ?>
										<option value="<?= $blood_group->blood_group; ?>"><?= $blood_group->blood_group; ?></option>
									<?php endforeach; ?>
									<?php else: ?>
										<h6 style="color: red;font-weight: 500;font-size: 16px;">User Not Found</h6>
									<?php endif; ?>
							</select>
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12"></div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood Price 1 Unit</th>
				
				</tr>
				<?php if($blood_bank):
				count($blood_bank);
				foreach($blood_bank as $blood): ?>
					<tr>
						<td style="text-align: center;color: red"><?= $blood->blood_group; ?></td>
						<td style="color: orange"><?= $blood->blood_unit; ?></td>
						<td style="color: green">
							<span class="fa fa-rupee-sign">&nbsp;<?= number_format($blood->blood_price); ?></span>
						</td>
						
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;font-size: 16px;">Blood Not Available</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>
	</div>
	<div class="col l6 m12 s12">
		<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: red"></span>&nbsp;Search Blood Donors</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank_donor/search_donor_details'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" vale="<?= set_value('blood_group'); ?>">
								<option selected="" disabled="">Select Blood blood_group</option>
									<?php if($all_donors):
									count($all_donors);
									foreach($all_donors as $blood_group): ?>
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

			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Image</th>
					<th> Name</th>
					<th>Blood Group</th>
					<th>Number</th>
					<th>Address</th>
					
				</tr>
				<?php if($all_donors):
				count($all_donors);
				foreach($all_donors as $search_donors): ?>
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
						<td>
							<?= $search_donors->blood_group; ?>
						</td>
						<td>
							<a href="tel:<?= $search_donors->contact_number; ?>"><?= $search_donors->contact_number; ?></a>
						</td>
						<td>
							<?= $search_donors->address; ?>
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
	</div>
</div>


<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
<script type="text/javascript" src="<?= base_url('public/assets/select2/dist/js/select2.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
       // Initialize select2
     	$("#username").select2();
			
        });
</script>
</body>
</html>