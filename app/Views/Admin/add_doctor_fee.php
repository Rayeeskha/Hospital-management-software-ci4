<!DOCTYPE html>
<html>
<head>
	<title>Add Doctor Fee</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		h6{font-weight: 500;}
		select{display: block;}

        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
        select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users"></span>&nbsp;Add Doctor's Fee</h5>
		</div>
		<div class="card-content">
			<?= form_open('Admin/upload_doctor_fee'); ?>
			<div class="row">
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-user" style="color: green"></span>&nbsp;Doctor Name</h6>
					<select name="doctor_name">
						<option selected="" disabled="">Select Doctor Name</option>
						<?php if($doctors):
							count($doctors);
						foreach($doctors as $doc): ?>
							<option value="<?= $doc->doctor_name; ?>"><?= $doc->doctor_name; ?></option>
						<?php endforeach; 
						else:?>
							<h6 style="color: red">Doctor Not Found</h6>
						<?php endif; ?>
					</select>
					<span style="color: red"><?= display_error($validation,'doctor_name'); ?></span>

				</div>
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-file" style="color: green"></span>&nbsp;Doctor Fee</h6>
					<input type="text" name="doctor_fee"  id="input_box" placeholder="Add Doctor Fee" value="<?= set_value('doctor_fee'); ?>">
					<span style="color: red"><?= display_error($validation,'doctor_fee'); ?></span>
				</div>

			</div>

				<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-user"></span>&nbsp;Add Dotor Fee</button>
				</center>
			<?=  form_close(); ?>	
			
		</div>
	</div>
</div>
<!---Body Section End -->


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>