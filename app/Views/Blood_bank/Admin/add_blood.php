<!DOCTYPE html>
<html>
<head>
	<title>Add Blood Group</title>
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

<!------Body Section Start ---->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Add Blood Group</h5>
		</div>
		<?= form_open('Blood_bank/add_blood_group'); ?>
		<div class="card-content">
			<h6>Blood Group Name</h6>
			<input type="text" name="blood_group" id="input_box" value="<?= set_value('blood_group'); ?>" placeholder="Enter Blood Group">
			<span style="color: red"><?= display_error($validation,'blood_group'); ?></span>
			<h6>Blood Unit</h6>
			<input type="text" name="blood_unit" value="<?= set_value('blood_unit'); ?>" id="input_box" placeholder="Enter Blood Unit">
			<span style="color: red"><?= display_error($validation,'blood_unit'); ?></span>
			<h6>Blood Price 1 Unit</h6>
			<input type="number" name="blood_price" value="<?= set_value('blood_price'); ?>" id="input_box" placeholder="Enter Blood Price">
			<span style="color: red"><?= display_error($validation,'blood_price'); ?></span>
			<h6>Total Blood Price</h6>
			<input type="number" name="total_blood_price" value="<?= set_value('total_blood_price'); ?>" id="input_box" placeholder="Enter Total Blood Price">
			<span style="color: red"><?= display_error($validation,'total_blood_price'); ?></span>
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Add Blood Group</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<!------Body Section End ---->

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>