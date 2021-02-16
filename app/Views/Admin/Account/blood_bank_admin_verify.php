<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank Admin Verification</title>
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
<!----Style Body Section Start --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Verify Blood Bank Admin Account</h5>
		</div>
		
	<div class="card-content">
		<table class="table">
			<tr>
				<th style="text-align: center;">Name</th>
				<th>UID</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Level</th>
				<th>Status</th>
				<th>Created Date</th>
				<th style="text-align: center;">Action</th>
			</tr>
			<?php if($bld_bnk_admin):
			count($bld_bnk_admin);
			foreach($bld_bnk_admin as $acc_account): ?>
				<tbody>
					<tr>
						<td>
							<center>
								<?= $acc_account->username; ?>
							</center>
						</td>
						<td>
							<?= $acc_account->uid; ?>
						</td>
						<td>
							<a href="mailto:<?= $acc_account->email; ?>"><?= $acc_account->email; ?></a>
						</td>
						<td>
							<a href="tel:<?= $acc_account->mobile; ?>"><?= $acc_account->mobile; ?></a>
						</td>
						
						<td style="color: orange">
							<?= $acc_account->gender; ?>
						</td>
						<td>
							<?= $acc_account->level; ?>
						</td>
						<td>
							<?php if($acc_account->status   == "Active"):
								echo '<span style="color:green">Active</span>';
								 elseif($acc_account->status == "AdminVerification"):
									echo '<span style="color:red">AdminVerification</span>';
								?>
							<?php endif; ?>
						</td>
						<td>
							<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M. d Y',strtotime($acc_account->created_date)); ?></span>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $acc_account->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $acc_account->id; ?>">
								
								<li><a href="<?= base_url('Admin/delete_bld_admin_account/'.$acc_account->id); ?>" onclick="return confirm('Are you sure you want to  delete this Verification?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($acc_account->status == "AdminVerification"):  ?>
								<li><a href="<?= base_url('Admin/change_bld_admin_acc/'.$acc_account->id.'/Active'); ?>">
									<span class="fa  fa-eye-slash" style="color: green"></span>&nbsp;
								Active</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Admin/change_bld_admin_acc/'.$acc_account->id.'/InActive'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;InActive</a></li>
								<?php endif; ?>
							</ul>
						<!---Action Dropdown --->
						</td>
					</tr>
				</tbody>
			<?php endforeach; ?>
			<?php else: ?>
				<div class="card" style="padding: 5px">
					<div class="card-content" style="background: red;padding: 3px;">
						<h6 style="color: white;font-weight: 500;margin-left: 20px;">
							<span class="fa fa-times"></span>&nbsp;Not any Verification for Blood Bank Admin</h6>
					</div>
				</div>
			<?php endif; ?>
		</table>		
	</div>
</div>
<!----Style Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>