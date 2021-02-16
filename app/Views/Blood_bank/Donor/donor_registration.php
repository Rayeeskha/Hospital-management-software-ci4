<!DOCTYPE html>
<html>
<head>
  <title>Donor Registration</title>
  <!----Css file Include --->
  <?= view('Admin/css_file.php'); ?>
  <!----Css file Include --->
  <style type="text/css">
  	h6{font-weight: 500;font-size: 16px;}
  	#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
  	#input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
  	select{display: block;}
  	select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
  	textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
  </style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Donor/top_bar'); ?>
<!----Top Bar Section Start ---->

<!------Body Section Start ----->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Donor Registration</h5>
		</div>
		<?= form_open_multipart('Blood_bank_donor/donor_registered'); ?>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h6>Donor Name</h6>
			<input type="text" name="donor_name" id="input_box" value="<?= set_value('donor_name'); ?>" placeholder="Enter Donor Name">
			<span style="color: red"><?= display_error($validation,'donor_name'); ?></span>
			<h6>Blood Group</h6>
			<select name="blood_group">
				<option selected="" disabled="">Select Blood Group</option>
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
			</select>
			<span style="color: red"><?= display_error($validation,'blood_group'); ?></span>
			<h6>Contact Number</h6>
			<input type="number" value="<?= set_value('number'); ?>" name="contact_number" id="input_box" placeholder="Enter  Contact Number">
			<span style="color: red"><?= display_error($validation,'contact_number'); ?></span>
			<h6>Donor Photo</h6>
			<input type="file" name="donor_photo" id="input_file" required="">
			<h6>Donor Address</h6>
			<textarea name="address" name="<?= set_value('address'); ?>" placeholder="Enter Donor Address"></textarea>
			<span style="color: red"><?= display_error($validation,'address'); ?></span>
			<center>
				<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87;margin-top: 30px;"><span class="fa fa-user"></span>&nbsp;Add Donor Details</button>
			</center>
		</div>
		
		<?= form_close(); ?>
	</div>
</div>
<!------Body Section End   ----->

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>