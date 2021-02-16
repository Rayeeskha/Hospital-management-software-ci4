<!DOCTYPE html>
<html>
<head>
	<title>Image Gallary</title>
	<!---CSS File Include ---->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include ---->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!----Body Section Start --->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;color: green"><span class="fa fa-images" style="color: green;"></span>&nbsp;Upload Image Gallary</h5>
		</div>
		<?= form_open_multipart(); ?>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h6>Select Image</h6>
			<input type="file" name="gallary_image[]" id="input_file" multiple="multiple" required="">
			<h6>Image Title</h6>
			<input type="text" name="image_title" id="input_box" placeholder="Enter Image Title">
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-images"></span>&nbsp;Upload Image</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<!----Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>