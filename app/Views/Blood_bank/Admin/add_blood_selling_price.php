<!DOCTYPE html>
<html>
<head>
	<title>Add Blood Selling Price</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		h6{font-weight: 500;font-size: 16px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!-----Body Section Start ------>
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Add Blood Selling Price</h5>
		</div>
		<?= form_open('Blood_bank/blood_selling_price/'.$donor_blood[0]->id); ?>
		<div class="card-content">
			<h6>Donor Blood Group</h6>
			<input type="text" name="donor_blood" id="input_box" value="<?= $donor_blood[0]->blood_group;  ?>" readonly>
			<h6>Blood Unit</h6>
			<input type="text" name="donor_unit" id="input_box" value="<?= $donor_blood[0]->blood_unit;  ?>" readonly>
			<h6>Blood Price</h6>
			<input type="text" name="donor_price" id="input_box" value="<?= $donor_blood[0]->blood_price;  ?>" readonly>
			<h6>Blood Selling Price</h6>
			<input type="text" name="selling_price" id="input_box" placeholder="Enter Selling Price" required="">
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Add Blood Price</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<!-----Body Section End   ------>

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>