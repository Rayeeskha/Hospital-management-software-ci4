<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Doctor/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="margin-top: 15px;border-bottom: 1px dashed silver;padding: 8px;">
			<h6 style="margi"><span class="fa fa-key" style="color: orange"></span>&nbsp;Change  Password</h6>
		</div>
		<div class="card-content">
			<!-- <?php if(isset($validation)): ?>
				<span style="color: red;font-weight: 500"><?= $validation->listErrors(); ?></span>
			<?php endif; ?> -->
			<?= form_open(); ?>
				<h6>Old Password</h6>
				<input type="text" name="old_password" id="input_box" value="<?= set_value('old_password'); ?>" placeholder="Old Password">
				<span style="color: red"><?= display_error($validation,'old_password'); ?></span>
				<h6>New Password</h6>
				<input type="password" name="new_password" value="<?= set_value('new_password'); ?>" id="input_box" placeholder="Enter New Password">
				<span style="color: red"><?= display_error($validation,'new_password'); ?></span>
				<h6>Confirm Password</h6>
				<input type="password" name="Confirm_password" value="<?= set_value('Confirm_password'); ?>" id="input_box" placeholder="Enter Confirm Password">
				<span style="color: red"><?= display_error($validation,'Confirm_password'); ?></span>
				<center>
					<button type="submit" class="btn btn-waves-effect waves-light" style="background: black;font-weight: 500;text-transform: capitalize;"><span class="fa fa-key"></span>&nbsp;Update Password</button>
				</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>	
<!---Body Section End --->	
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>