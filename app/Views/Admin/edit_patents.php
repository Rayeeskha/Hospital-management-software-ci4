<!DOCTYPE html>
<html>
<head>
	<title>Edit Patents Details</title>
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
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-users"></span>&nbsp;Edit Patents Details</h5>
		</div>
		<div class="card-content">
			<?= form_open('Admin/update_patents/'.$patents[0]->id); ?>
				<div class="row">
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-user" style="color: #005a87"></span>&nbsp;Name</h6>
					<input type="text" name="patent_name" id="input_box" value="<?= $patents[0]->patent_name; ?>" />
					<h6><span class="fa fa-phone-square" style="color: #005a87"></span>&nbsp; Phone</h6>
					<input type="number" name="patent_phone" id="input_box" value="<?= $patents[0]->patent_phone; ?>" >
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Zip Code</h6>
					<input type="text" name="patent_zip" id="input_box" value="<?= $patents[0]->patent_zip; ?>">
					<h6><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Select Doctors</h6>
					<select name="doctor_name"  id="doctor">
						<?php if(count($doctors)):
							foreach($doctors as $doc):
						 ?>
						 <?php if($patents[0]->doctor_name == $doc->id): ?>
							<option value="<?= $doc->id; ?>" selected><?= $doc->doctor_name; ?></option>
							<?php else: ?>
							<option value="<?= $doc->id; ?>" ><?= $doc->doctor_name; ?></option>
							<?php endif; ?>
						<?php endforeach;
						else: ?>
								<option value="">Doctor Not Found's</option>
						<?php endif; ?>
					</select>
					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Intry Fee</h6>
					<input type="text" name="intry_fee" id="input_box" value="<?= $patents[0]->intry_fee; ?>">
				</div>
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Address</h6>
					<input type="text" name="patent_address" id="input_box" value="<?= $patents[0]->patent_address; ?>">
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Patents Issue</h6>
					<input type="text" name="patent_issue" id="input_box" value="<?= $patents[0]->patent_issue; ?>">
					<h6><span class="fa fa-home" style="color: #005a87"></span>&nbsp;Patents Room Number</h6>
					<input type="text" name="patent_room" id="input_box" value="<?= $patents[0]->patent_room; ?>">
					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Doctor Fee</h6>
					<select name="doctor_fee" id="doctor_fee">
						<option value="" ></option>
					</select>
					<h6><span class="fa fa-rupee-sign" style="color: #005a87"></span>&nbsp;Other Fee</h6>
					<input type="text" name="other_fee" id="input_box" value="<?= $patents[0]->other_fee; ?>">
				</div>
				<h6><span class="fa fa-envelope" style="color: #005a87"></span>&nbsp;Patient Email</h6>
				<input type="email" name="patent_email" id="input_box" value="<?= $patents[0]->patent_email; ?>">
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87;margin-top: 30px;"><span class="fa fa-user"></span>&nbsp;Edit Patents Details</button>
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