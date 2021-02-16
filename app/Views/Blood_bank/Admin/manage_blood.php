<!DOCTYPE html>
<html>
<head>
	<title>Manage Blood Group</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		tr td{font-weight: 500;font-size: 16px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Manage Blood Group</h5>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood Price 1 Unit</th>
					<th>Total Blood Price </th>
					<th>Status</th>
					<th>Created Date</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if($blood_group):
				count($blood_group);
				foreach($blood_group as $blood): ?>
					<tr>
						<td style="text-align: center;color: red"><?= $blood->blood_group; ?></td>
						<td style="color: orange"><?= $blood->blood_unit; ?></td>
						<td style="color: green">
							<span class="fa fa-rupee-sign">&nbsp;<?= number_format($blood->blood_price); ?></span>
						</td>
						<td style="color: green">
							<span class="fa fa-rupee-sign">&nbsp;<?= number_format($blood->total_blood_price); ?></span>
						</td>
						<td>
							<?php if($blood->status == "Active"):
								echo '<span style="color:green">Active</span>';
								 elseif($blood->status == "InActive"):
									echo '<span style="color:red">InActive</span>';
								?>
							<?php endif; ?>
						</td>

						<td>
							<span  class="fa fa-clock" style="color: blue" >&nbsp;<?= date('d M, Y', strtotime($blood->created_at)); ?></span>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $blood->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $blood->id; ?>">
								<li><a href="<?= base_url('Blood_bank/delete_blood_group/'.$blood->id); ?>"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($blood->status == "Active"):  ?>
								<li><a href="<?= base_url('Blood_bank/change_blood_status/'.$blood->id.'/InActive'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Blood_bank/change_blood_status/'.$blood->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>
							</ul>
							<!---Action Dropdown --->
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

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>