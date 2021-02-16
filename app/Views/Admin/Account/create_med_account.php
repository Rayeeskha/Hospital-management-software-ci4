<!DOCTYPE html>
<html>
<head>
	<title>Create Doctor Account</title>
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
<!---Body Section Start --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-key" style="color: #005a87"></span>&nbsp;Create Medical Accountent Account</h5>
		</div>
		<?= form_open_multipart('Login/create_medical_acc_account'); ?>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m6 s12">
					
					<h6>Medical Accountent Name</h6>
					<input type="text" name="med_acc_name" id="input_box" placeholder="Medical Accountent Name" value="<?= set_value('med_acc_name'); ?>">
					<span style="color: red"><?= display_error($validation,'med_acc_name'); ?></span>
					<h6>Password</h6>
					<input type="text" name="password" id="input_box" placeholder="Password" value="<?= set_value('password'); ?>">
					<span style="color: red"><?= display_error($validation,'password'); ?></span>
					<h6 >Select Gender</h6>
					<select name="gender">
						<option selected=""  disabled="">---Select Gender---</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<span style="color: red"><?= display_error($validation,'gender'); ?></span>
				</div>
				<div class="col l6 m6 s12">
					<h6>Medical Accountent Email</h6>
					<input type="text" name="med_acc_email" id="input_box" placeholder="Medical Accountent Email" value="<?= set_value('med_acc_email'); ?>">
					<span style="color: red"><?= display_error($validation,'med_acc_email'); ?></span>
					<h6>Confirm Password</h6>
					<input type="text" name="conf_password" id="input_box" placeholder="Confirm Password" value="<?= set_value('conf_password'); ?>">
					<span style="color: red"><?= display_error($validation,'conf_password'); ?></span>
					<h6>Mobile Number</h6>
					<input type="number" name="mobile" value="<?= set_value('mobile'); ?>" id="input_box" placeholder="Enter Mobile Number">
					<span style="color: red"><?= display_error($validation,'mobile'); ?></span>
				</div>
				<br>
				
				<center>
					<button type="submit" class="btn btn-waves-effect waves-light" style="background: #005a87;text-transform: capitalize;font-weight: 500"><span class="fa fa-key"></span>&nbsp;Create Account</button>
				</center>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!---Body Section End --->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>