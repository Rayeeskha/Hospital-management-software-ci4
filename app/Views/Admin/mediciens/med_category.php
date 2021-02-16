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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file"></span>&nbsp;Add Medicines Category</h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/add_med_category'); ?>
			<div class="row">
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-user" style="color: green"></span>&nbsp;Medicines Company Name</h6>
					
					<input type="text" name="company_name"  id="input_box" placeholder="Add Meiciens Company Name" value="<?= set_value('company_name'); ?>">
					
					<span style="color: red"><?= display_error($validation,'company_name'); ?></span>

				</div>
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-file" style="color: green"></span>&nbsp;Medicines Image</h6>
					<input type="file" name="category_image"  id="input_file">
					<span style="color: red"><?= display_error($validation,'category_image'); ?></span>
				</div>

			</div>

				<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-file"></span>&nbsp;Add Category</button>
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