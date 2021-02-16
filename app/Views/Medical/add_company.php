<!DOCTYPE html>
<html>
<head>
	<title>Add Company</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Add Medicine Company Name</h5>
		</div>
		<div class="card-content">
			<div class="container">
			<?= form_open('Medical_Accountent/upload_company'); ?>	
				<h6>Company Name</h6>
				<input type="text" name="company_name" id="input_box" value="<?= set_value('company_name'); ?>" placeholder="Enter Company Name">
				<span style="color: red"><?= display_error($validation,'company_name'); ?></span>
				<h6>Company Contact Number</h6>
				<input type="text" name="company_c_num" id="input_box" placeholder="Enter Company Contact Number">
				<span style="color: red"><?= display_error($validation,'company_c_num'); ?></span>
				<h6>Company Address</h6>
				<textarea name="com_address" placeholder="Enter Company Address"></textarea>
			<center>
				<a href="#!" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Cancel</a>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: blue;text-transform: capitalize;font-weight: 500">Add Company</button>
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