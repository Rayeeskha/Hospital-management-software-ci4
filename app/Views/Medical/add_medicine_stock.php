<!DOCTYPE html>
<html>
<head>
	<title>Add Medicine Stock</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Add Medicine Stock</h5>
		</div>
		<div class="card-content">
			<?= form_open('Medical_Accountent/update_stock/'.$mediciens[0]->id); ?>	
			<h6>Product Name</h6>
			<input type="text" name="pro_name" id="input_box" value="<?= $mediciens[0]->med_name; ?>" readonly>
			<?php
				$get_company_name =  get_doctor_name('mediciens_category',$mediciens[0]->med_company);
								
			?>
			<h6>Product Company</h6>
			<input type="text" name="pro_name" id="input_box" value="<?= $get_company_name[0]->company_name; ?>" readonly>
			<h6>All Stock</h6>
			<input type="text" name="pro_name" id="input_box" value="<?= $mediciens[0]->med_stock; ?>" readonly>
			<h6>Add Stock</h6>
			<input type="text" name="med_stock" id="input_box" placeholder="Add Stock" required="">
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: #008a5c;text-transform: capitalize;font-weight: 500">Add Stock</button>
			</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>