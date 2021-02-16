<!DOCTYPE html>
<html>
<head>
	<title>Edit Medicine Category</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start -->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Edit Medicine Category</h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/update_med_category/'.$med_cat[0]->id); ?>
			<div class="row">
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-file" style="color: green"></span>&nbsp;Medicines Company Name</h6>
					<input type="text" name="company_name"  id="input_box" value="<?= $med_cat[0]->company_name; ?>">
				</div>
				<div class="col l6 m6 s12">
					<h6><span class="fa fa-file" style="color: green"></span>&nbsp;Medicines Image</h6>
					<img src="<?= base_url('public/uploads/mediciens_Category/'.$med_cat[0]->category_image); ?>" style="width: 100px;height: 100px;border: 1px solid silver;">
					<input type="file" name="category_image"  id="input_file" required>
					<span style="color: red"><?= display_error($validation,'category_image'); ?></span>
				</div>

			</div>
			<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-edit"></span>&nbsp;Edit Category</button>
				</center>
			<?=  form_close(); ?>	
			
		</div>
	</div>
</div>
<!---Body Section Start -->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>