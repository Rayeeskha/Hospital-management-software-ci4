<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine</title>
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
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Add Products</h5>
		</div>
		<div class="card-content">
			<div class="container">
			<?= form_open('Medical_Accountent/upload_products'); ?>
				<h6>Products Name</h6>
				<input type="text" name="product_name" id="input_box" placeholder="Enter Products Name">
				<span style="color: red"><?= display_error($validation,'product_name'); ?></span>	
				<h6>Company Name</h6>
				<select name="company_name">
					<option selected="" disabled="">Select Comapany Name</option>
					<?php if($company):
					count($company); ?>
					<?php foreach($company as $com_name): ?>
						<option value="<?= $com_name->id; ?>"><?= $com_name->company_name; ?></option>
					<?php endforeach; ?>
					<?php else: ?>
						<h6 style="color: red">Company Not Found</h6>
					<?php endif; ?>	
				</select>
				<span style="color: red"><?= display_error($validation,'company_name'); ?></span>
				
				<h6>Unit Price</h6>
				<input type="text" name="unit_price" value="<?= set_value('unit_price'); ?>" placeholder="Single Unit Price" id="input_box">
				<span style="color: red"><?= display_error($validation,'unit_price'); ?></span>
				<h6>Discount Price</h6>
				<input type="text" name="med_dis" value="<?= set_value('med_dis'); ?>" placeholder="Medicine Discount Price" id="input_box">
				
				<h6>Stock</h6>
				<input type="text" name="stock" value="<?= set_value('stock'); ?>" placeholder="Add Stock" id="input_box">
				<span style="color: red"><?= display_error($validation,'stock'); ?></span>
				<h6>Expiry Date</h6>
				<input type="date" name="expiry_date" value="<?= set_value('expiry_date'); ?>" id="input_box">
				<span style="color: red"><?= display_error($validation,'expiry_date'); ?></span>
				<h6>Batch Number</h6>
				<input type="text" name="batch_number" value="<?= set_value('batch_number'); ?>" placeholder="Enter Batch Number" id="input_box">
				<span style="color: red"><?= display_error($validation,'batch_number'); ?></span>
			<center>
				<a href="#!" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Cancel</a>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: blue;text-transform: capitalize;font-weight: 500">Add Products</button>
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