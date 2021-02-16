<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Add Medicines </h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/upload_medicine'); ?>	
			<div class="row">
				<div class="col l6 m6 s6">
					<h6>Medicine Company Name</h6>

					<select name="med_company">
						<option selected="" disabled="">Select Medicine Category</option>
						<?php if(count($mediciens)):
						foreach($mediciens as $med): ?>
							<option value="<?= $med->id; ?>"><?= $med->company_name; ?></option>
						<?php endforeach; ?>
						<?php else: ?>
							<h6 style="color: red">Medicine Category Not Found</h6>
						<?php endif; ?>
					</select>
					<span style="color: red"><?= display_error($validation,'med_company'); ?></span>

					<h6>Medicine Price</h6>
					<input type="text" name="med_price" id="input_box" placeholder="Enter Medicine Price" value="<?= set_value('med_price'); ?>">
					<span style="color: red"><?= display_error($validation,'med_price'); ?></span>
					<h6>Medicine Discount Price</h6>
					<input type="text" name="med_d_price" id="input_box" placeholder="Enter Discount Price" value="<?= set_value('med_d_price'); ?>">
					<span style="color: red"><?= display_error($validation,'med_d_price'); ?></span>

				</div>
				<div class="col l6 m6 s6">
					<h6> Medicine Name</h6>
					<input type="text" name="med_name" id="input_box" placeholder="Enter  Medicine Name" value="<?= set_value('med_name'); ?>" >
					<span style="color: red"><?= display_error($validation,'med_name'); ?></span>
					<h6>Medicine Image</h6>
					<input type="file" name="med_image" id="input_file" value="<?= set_value('med_image'); ?>" required>
					<span style="color: red"><?= display_error($validation,'med_image'); ?></span>
					

					<h6>Medicine Description</h6>
					<textarea name="med_dis" placeholder="Enter Medicine Discription"></textarea>
				</div>
					<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-user"></span>&nbsp;Upload Medicine</button>
				</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Body Section End -->


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>