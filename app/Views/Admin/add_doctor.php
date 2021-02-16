<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
        h6{font-weight: 500}

        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block;}
		#select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		span{cursor: pointer;}
		h6{font-weight: 500}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start -->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users"></span>&nbsp;Add Doctor's</h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/add_doctor'); ?>	
			<h6> <span class="fa fa-tasks" style="color: #005a87"></span> Select Department</h6>
			<select name="department_name">
				<option selected="" disabled="">Select department</option>
				<?php if($department):
				count($department);
				foreach($department as $dep): ?>
					<option value="<?= $dep->department_name; ?>"><?= $dep->department_name; ?></option>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500">Department Not Found</h6>
				<?php endif; ?>
			</select>
			<span style="color: red"><?= display_error($validation,'department_name'); ?></span>
			<div class="row">
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-user" style="color: #005a87"></span>&nbsp;Name</h6>
					<input type="text" name="doctor_name" id="input_box" placeholder="Enter  Doctor Name" value="<?= set_value('doctor_name'); ?>" >
					<span style="color: red"><?= display_error($validation,'doctor_name'); ?></span>
					<h6><span class="fa fa-phone-square" style="color: #005a87"></span>&nbsp; Phone</h6>
					<input type="number" name="doctor_phone" id="input_box" placeholder="Enter  Doctor Phone Number" value="<?= set_value('doctor_phone'); ?>" >
					<span style="color: red"><?= display_error($validation,'doctor_phone'); ?></span>
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Doctor Address</h6>
					<input type="text" name="doctor_address" id="input_box" placeholder="Enter Doctor Address" value="<?= set_value('doctor_address'); ?>">
					<span style="color: red"><?= display_error($validation,'doctor_address'); ?></span>

				</div>
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-envelope" style="color: #005a87"></span>&nbsp;Doctor Email</h6>
					<input type="email" name="doctor_email" id="input_box" placeholder="Enter  Doctor Email ID" value="<?= set_value('doctor_email'); ?>">
						<span style="color: red"><?= display_error($validation,'doctor_email'); ?></span>
					<h6><span class="fa fa-camera" style="color: #005a87"></span>&nbsp;Doctor Profile Image</h6>
					<input type="file" name="doctor_image" id="input_file" required="" value="<?= set_value('doctor_image'); ?>">
					<span style="color: red"><?= display_error($validation,'doctor_image'); ?></span>
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Doctor Specility</h6>
					<input type="text" name="doctor_specility" id="input_box" placeholder="Enter Doctor Specility" value="<?= set_value('doctor_specility'); ?>">
					<span style="color: red"><?= display_error($validation,'doctor_specility'); ?></span>
				</div>
				<div class="col l12 m12 s12">
					<h6><span class="fa fa-user-secret" style="color: #005a87"></span>Doctor Other Information</h6>
					<textarea name="doctor_other_info" placeholder="Enter Client Other Information"></textarea>
				</div>
					<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-user"></span>&nbsp;Add Dotor Details</button>
				</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Body Section Start -->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>