<!DOCTYPE html>
<html>
<head>
	<title>Manage Donor Blood Transition</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		#donor_filters{width: 200px !important;padding-top: 8px;padding-bottom: 8px;}
       #donor_filters li a{color: grey;font-size: 14px;font-weight: 500;}
       #donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
       tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!------Body Section Start  ------->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Manage Donors Blood Sale Records</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver">
			<div class="row">
				<div class="col l6 m6 s6"></div>
				<div class="col l6 m6 s6">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="donor_filters" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Sale Records</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="donor_filters">
						
						<li><a href="<?= base_url('Blood_bank/filter_sale_records/new_sale'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-bug" style="color: #005a87"></span>&nbsp;New  Sale Records</a></li>
						<li><a href="<?= base_url('Blood_bank/filter_sale_records/old_sale'); ?>" class="waves-effect">
							<span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Old Sale Records </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Username</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Email</th>
					<th>Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood Price</th>
					<th>Selling date</th>
					<th>Donors</th>
				</tr>
				<?php if($blood_sale_rec):
				count($blood_sale_rec);
				foreach($blood_sale_rec as $sale_rec): ?>
					<tr>
						<td>
							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $sale_rec->username; ?>">
									 <img src="<?= base_url().'./public/uploads/blood_buy_cus/'.$sale_rec->photo; ?>" class="responsive-img" id="donor_image" height="50">
								</a>
							</center>
						</td>
						<td>
							<?= $sale_rec->username; ?>
						</td>
						<td>
							<a href="tel:<?= $sale_rec->mobile; ?>"><?= $sale_rec->mobile; ?></a>
						</td>
						<td>
							<?= $sale_rec->address; ?>
						</td>
						<td>
							<a href="mailto:<?= $sale_rec->email; ?>"><?= $sale_rec->email; ?></a>
						</td>
						<td style="color: red">
							<?= $sale_rec->blood_group_sale; ?>
						</td>
						<td style="color: orange">
							<?= $sale_rec->blood_unit; ?>
						</td>
						<td style="color: green">
							<span class="fa fa-rupee-sign">&nbsp;<?= number_format($sale_rec->blood_price); ?></span>
						</td>
						<td>
							<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y, h:i:s', strtotime($sale_rec->created_at)); ?></span>
						</td>
						<td>
							<?php
								$get_donors_details = get_doctor_name('buy_donor_blood', $sale_rec->blood_id);
								if($get_donors_details):
									count($get_donors_details);
									foreach($get_donors_details as $donor_detials):
										$get_donors = get_doctor_name('blood_donor', $donor_detials->blood_donor_id);
							?>

							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $get_donors[0]->donor_name; ?>">
									 <img src="<?= base_url().'./public/uploads/donar_users/'.$get_donors[0]->donor_image; ?>" class="responsive-img" id="donor_image" height="50">
								</a>
							</center>
						<?php endforeach; ?>
						<?php else: ?>
							<h6 style="color: red;font-weight: 500;font-size: 14px;">Donor Details Not Found</h6>
						<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;font-size: 16px;">Records Not Found</h6>
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