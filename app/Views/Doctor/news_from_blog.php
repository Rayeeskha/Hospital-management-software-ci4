<!DOCTYPE html>
<html>
<head>
	<title>Upload Your thinking</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}	
	</style>
</head>
<body>
<!---Topbar Section Include --->
<?= view('Doctor/top_bar'); ?>	
<!---Topbar Section Include --->

<!----Body Section Start ---->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-tasks" style="color: green"></span>&nbsp;Upload your Thinking </h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<?= form_open_multipart('Doctor/Upload_blog'); ?>
			<div class="container">
				<h6>Blog Title</h6>
				<input type="text" name="blog_title" id="input_box" placeholder="Enter Blog Title">
				<span style="color: red"><?= display_error($validation,'blog_title'); ?></span>
				<h6>Blog Image</h6>
				<input type="file" name="blog_image" id="input_file"  required="">
				<h6>Blog Content</h6>
				<textarea name="blog_content" placeholder="Enter Blog Content"></textarea>
				<span style="color: red"><?= display_error($validation,'blog_content'); ?></span>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-share"></span>&nbsp;Upload Blog</button>
				</center>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!----Body Section End ---->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>