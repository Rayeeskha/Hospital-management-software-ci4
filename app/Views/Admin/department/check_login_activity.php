<!DOCTYPE html>
<html>
<head>
	<title>Check Login Activity</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Name</th>
					<th>Browser</th>
					<th>IP</th>
					<th>Doctor Image</th>
					<th>Login Time</th>
					<th>Logout Time</th>
				</tr>
				<?php if($login_activity):
				count($login_activity);
				foreach($login_activity as $login): ?>
					<tr>
						<td>
							<?php 
								$login_data = get_login_activity('register_all_users', $login->uniid);
								echo $login_data[0]->username;
							?>
						</td>
						<td>
							<?= $login->browser; ?>
						</td>
						<td>
							<?= $login->ip; ?>
						</td>
						<td>
							<?php 
								$login_doctor_image = login_doctor_image('doctor', $login_data[0]->email);
							?>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $login_doctor_image[0]->doctor_name; ?>">
							 <img src="<?= base_url().'./public/uploads/doctor/'.$login_doctor_image[0]->doctor_image; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						</td>
						<td>
							 <span class="fa fa-clock" style="color: green"><?= date('d M, Y, h:i:s', strtotime($login->login_time)); ?>
						</td>
						<td>
							 <span class="fa fa-clock" style="color: green"><?= date('d M, Y, h:i:s', strtotime($login->logout_time)); ?>
						</td>

					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>