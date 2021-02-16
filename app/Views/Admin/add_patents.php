<!DOCTYPE html>
<html>
<head>
	<title>Add Patents</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
        h6{font-weight: 500}

        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block;}
		select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Add Patents</h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/upload_patents'); ?>	
			<div class="row">
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-user" style="color: #005a87"></span>&nbsp;Name</h6>
					<input type="text" name="patent_name" id="input_box" placeholder="Enter  Patents Name" value="<?= set_value('patent_name'); ?>" >
					<span style="color: red"><?= display_error($validation,'patent_name'); ?></span>
					<h6><span class="fa fa-phone-square" style="color: #005a87"></span>&nbsp; Phone</h6>
					<input type="number" name="patent_phone" id="input_box" placeholder="Enter   Phone Number" value="<?= set_value('patent_phone'); ?>" >
					<span style="color: red"><?= display_error($validation,'patent_phone'); ?></span>
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Address</h6>
					<input type="text" name="patent_address" id="input_box" placeholder="Enter Patents Address" value="<?= set_value('patent_address'); ?>">
					<span style="color: red"><?= display_error($validation,'patent_address'); ?></span>
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Zip Code</h6>
					<input type="text" name="patent_zip" id="input_box" placeholder="Enter Patents zip Code" value="<?= set_value('patent_zip'); ?>">

					<h6><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Select Doctors</h6>
					<select name="doctor_name"  id="doctor">
						<option selected="" disabled="">Select Doctor</option>
						<?php if($doctors):
							count($doctors);
						foreach($doctors as $doc): ?>
						<option value="<?= $doc->id; ?>"><?= $doc->doctor_name; ?></option>
							<?php endforeach; ?>
						<?php else: ?>
							<h6 style="color: red">Doctor Not Found</h6>
						<?php endif; ?>
					</select>
					<span style="color: red"><?= display_error($validation,'doctor_name'); ?></span>

					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Intry Fee</h6>
					<input type="text" name="intry_fee" id="input_box" placeholder="Intry Fee">

				</div>
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-envelope" style="color: #005a87"></span>&nbsp;Patents Email</h6>
					<input type="email" name="patent_email" id="input_box" placeholder="Enter  Patents Email ID" value="<?= set_value('patent_email'); ?>">
					<h6><span class="fa fa-camera" style="color: #005a87"></span>&nbsp;Patents Profile Image</h6>
					<input type="file" name="patent_image" required="" id="input_file" value="<?= set_value('patent_image'); ?>">
					<span style="color: red"><?= display_error($validation,'patent_image'); ?></span>
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Issue</h6>
					<input type="text" name="patent_issue" id="input_box" placeholder="Enter Patents Issue" value="<?= set_value('patent_issue'); ?>">
					<h6><span class="fa fa-home" style="color: #005a87"></span>&nbsp;Patents Room Number</h6>
					<input type="text" name="patent_room" id="input_box" placeholder="Enter Patents Room Number" value="<?= set_value('patent_room'); ?>">
					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Doctor Fee</h6>
					<select name="doctor_fee" id="doctor_fee">
						<option value="" ></option>
					</select>

					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Other Fee</h6>
					<input type="text" name="other_fee" id="input_box" placeholder="Other Fee">
				</div>
					
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87;margin-top: 30px;"><span class="fa fa-user"></span>&nbsp;Add Patents Details</button>
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