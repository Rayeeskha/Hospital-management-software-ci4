<!DOCTYPE html>
<html>
<head>
	<title>Slider Image</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start --->

<div class="container" style="margin-top: 15px;">

	<?= form_open_multipart("Admin/publish_slider_image"); ?>
	<div class="row">
		<div class="col l7 m7 s12">
			<div class="card" style="box-shadow: none;">
				<div class="card-content">
					<h5 style="color: grey; font-weight: bolder; margin-bottom: 25px; margin-top: 5px;"><span class="fa fa-image" style="color: red"></span> &nbsp;Upload Front page Slider Image </h5>
					<h6 style="color: grey;">Image Title</h6>
					<input type="text" name="image_title" id="input_box" required="" placeholder="Enter Image Title">
					<h6 style="color: grey;">Select Image </h6>
					<input type="file" name="image_gallery" id="input_file" required="">
					<h6 style="color: grey;">Website Link</h6>
					<input type="text" name="website_link" id="input_box" required="" placeholder="Enter Image Title">
					<h6 style="color: grey;">Image  Discription</h6>
					<textarea name="image_discription" id="image_discription">
						
					</textarea>
					<button type="submit" class="btn waves-effect waves-light" style="background: #13124e; margin-top: 5px;font-weight: 500;font-size: 14px;font-weight: 500;text-transform: capitalize;">Publish Slider Image</button>

					<?= form_close(); ?>
				</div>
			</div>

		</div>
		<div class="col l5 m5 s12">
			
			<div class="card" style="box-shadow: none;">
				<div class="card-content">
					<h6 style="color: grey; font-weight: bolder; margin-bottom: 20px;">Upload Image Guideline</h6>
					<h6 style="color: grey; margin-bottom: 25px;"><span class="fa fa-image" style="color: orange"></span>&nbsp;File Types <span class="right" style="color: red">JPG-PNG-JPEG</span></h6>
					<h6 style="color: grey; margin-bottom: 25px;"><span class="fa fa-text-width" style="color: orange"></span>&nbsp;Image Size<span class="right" style="color: red">500px(W) X 250px(H)</span></h6>
					<!-- <h6 style="color: grey;"><span class="fa fa-link" style="color: orange"></span>&nbsp;Image Link<span class="right" style="color: red">with http/https://</span></h6> -->
				</div>
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