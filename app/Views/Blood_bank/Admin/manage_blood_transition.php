<!DOCTYPE html>
<html>
<head>
	<title>Manage Blood Transition</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		h6{font-weight: 500;font-size: 15px;}
		#username{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height:45px !important;border-radius: 3px}
		select{display: block;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		#search_donors{display: flex;}
    	#search_donors li:first-child{width: 300px}
    	 #donor_filters{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
    	  #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
    	   #donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
    	   tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->
<!------Body Section Start ----->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Manage Blood Transition</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank/search_hos_bld_user'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="username" id="username" value="<?= set_value('username'); ?>">
								<option selected="" disabled="">---Search Username ---</option>
									<?php if($blood_rec):
									count($blood_rec);
									foreach($blood_rec as $blood_group): ?>
										<option value="<?= $blood_group->username; ?>"><?= $blood_group->username; ?></option>
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
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="donor_filters" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Blood</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="donor_filters">
						
						<li><a href="<?= base_url('Blood_bank/filter_hos_sale_bld/new_blood'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Customer </a></li>
						<li><a href="<?= base_url('Blood_bank/filter_hos_sale_bld/old_blood'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Customer </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver">
			<table class="table">
				<tr>
					<th style="text-align: center;">Photo</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood 1Unit Price</th>
					<th>Total Blood Price</th>
					<th>Buy date</th>
					<th>Action</th>
				</tr>
				<?php if($blood_rec):
				count($blood_rec);
				foreach($blood_rec as $bld_rec): ?>
					<tr>
						<td>
							<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $bld_rec->username; ?>">
								 <img src="<?= base_url().'./public/uploads/hospitalblood_cus/'.$bld_rec->photo; ?>" class="responsive-img" id="donor_image" height="50">
							</a>
						</center>
						</td>
						<td>
							<?= $bld_rec->username; ?>
						</td>
						<td>
							<a href="tel:<?= $bld_rec->mobile; ?>"><?= $bld_rec->mobile; ?></a>
						</td>
						<td>
							<a href="mailto:<?= $bld_rec->email; ?>"><?= $bld_rec->email; ?></a>
						</td>
						<td style="color: red">
							<?php 
								$get_blood_name = get_doctor_name('blood_group', $bld_rec->blood_id);
								echo $get_blood_name[0]->blood_group;
							?>
						</td>
						<td>
							<?= $bld_rec->blood_unit; ?>
						</td>
						<td style="color: red">
							<span class="fa fa-rupee-sign"></span><?= number_format($bld_rec->blood_price); ?>
						</td>
						<td style="color: green">
							<?php 
								$total_bld_prc = $bld_rec->blood_price * $bld_rec->blood_unit;
								
							?>
							<span class="fa fa-rupee-sign"></span><?= number_format($total_bld_prc); ?>
						</td>
						<td>
							<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y, h:i:s', strtotime($bld_rec->created_at)); ?></span>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $bld_rec->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $bld_rec->id; ?>">
								<li><a href="<?= base_url('Blood_bank/blood_selling_slip/'.$bld_rec->id); ?>" style="border-bottom: 1px dashed silver;font-weight: 500;font-size: 12px;" target="_blank"><span class="fa fa-print"></span>&nbsp;Print Slip</a></li>
							</ul>
							<!---Action Dropdown --->
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Records Not Found</h6>
				<?php endif; ?>

			</table>
		</div>
	</div>
</div>
<!------Body Section End ----->
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