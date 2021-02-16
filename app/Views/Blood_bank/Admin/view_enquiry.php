<!DOCTYPE html>
<html>
<head>
	<title>View Blood Enquiry</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		 #donor_filters{width: 200px !important;padding-top: 8px;padding-bottom: 8px;}
       #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
       #donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
       tr td{font-weight: 500;font-size: 14px}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!------Body Section Start ------->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Enquiry Blood Needed Users </h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div class="row">
				<div class="col l6 m6 s12"></div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="donor_filters" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Blood Need users</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="donor_filters">
						
						<li><a href="<?= base_url('Blood_bank/filter_blood_needed_users/new_user'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Users </a></li>
						<li><a href="<?= base_url('Blood_bank/filter_blood_needed_users/old_user'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Users </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Gender</th>
					<th>Donor Image</th>
					<th>Donor Name</th>
					<th>Donor Mobile</th>
					<th>Blood Group</th>
					<th>Donor Address</th>
					<th>Req Date</th>
				</tr>
				<?php if($req_users):
				count($req_users);
				foreach($req_users as $needed_users): 
					$get_users = get_doctor_name('blood_bank_users', $needed_users->request_user_id);

				?>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $get_users[0]->username; ?>">
								 <img src="<?= base_url().'./public/uploads/donor_image/'.$get_users[0]->image; ?>" class="responsive-img" id="donor_image" height="50">
							</a>
						</center>
					</td>
					<td>
						<?= $get_users[0]->username; ?>
					</td>
					<td>
						<a href="mailto:<?= $get_users[0]->email; ?>"><?= $get_users[0]->email; ?></a>
					</td>
					<td>
						<a href="tel:<?= $get_users[0]->mobile; ?>"><?= $get_users[0]->mobile; ?></a>
					</td>
					<td>
						<?= $get_users[0]->gender; ?>
					</td>
					<td>
						<?php
							$get_donors = get_doctor_name('blood_donor', $needed_users->blood_donor_id);
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
						<?= $get_donors[0]->blood_group; ?>
					</td>
					<td>
						<?= word_limiter($get_donors[0]->address, 4); ?>
					</td>
					<td>
						<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y', strtotime($needed_users->request_date)); ?></span>
					</td>
				</tr>

				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;font-size: 16px;">Not any Requested Users</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>
<!------Body Section End   ------->

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>