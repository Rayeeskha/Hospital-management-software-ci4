<!DOCTYPE html>
<html>
<head>
	<title>Edit Medicine</title>
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
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start -->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Edit Medicines </h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Medical_Accountent/update_medicines/'.$medicines[0]->id); ?>	
			<div class="row">
				<div class="col l6 m6 s6">
					<h6>Medicine Company Name</h6>
					<select name="med_company"  id="doctor">
						<?php if(count($medicine)):
							foreach($medicine as $medi_name):
						?>
						<?php if($medicines[0]->med_company == $medi_name->id): ?>
							<option value="<?= $medi_name->id; ?>" selected><?= $medi_name->company_name; ?></option>
						<?php else: ?>
							<option value="<?= $medi_name->id; ?>" ><?= $medi_name->company_name; ?></option>
							<?php endif; ?>
						<?php endforeach;
						else: ?>
							<option value="">Medicine  Not Found's</option>
						<?php endif; ?>
					</select>
					<h6>Medicine Price</h6>
					<input type="text" name="med_price" id="input_box" value="<?= $medicines[0]->med_price; ?>" required>
					<h6>Expiry Date</h6>
					<input type="date" name="expiry_date" id="input_box" value="<?= $medicines[0]->expiry_date; ?>" required>
				</div>
				<div class="col l6 m6 s6">
					<h6> Medicine Name</h6>
					<input type="text" name="med_name" id="input_box" value="<?= $medicines[0]->med_name; ?>" required>
					<h6>Medicine Discount Price</h6>
					<input type="text" name="med_d_price" id="input_box" value="<?= $medicines[0]->med_d_price; ?>" required>
					<h6>Batch Number</h6>
					<input type="text" name="batch_number" id="input_box" value="<?= $medicines[0]->batch_number; ?>" required>
				</div>
				<div class="col l12 m12 s12">
					<h6>Medicine Stock</h6>
					<input type="text" name="med_dis" id="input_box" value="<?= $medicines[0]->med_stock; ?>" required="">
				</div>
					<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-user"></span>&nbsp;Update Medicine</button>
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