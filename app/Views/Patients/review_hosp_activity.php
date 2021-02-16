<!DOCTYPE html>
<html>
<head>
	<title>Review Hospital Activity</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		h6{font-weight: 500;font-size: 15px;}
		  #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
	</style>
</head>
<body>
<!---Top Bar Section Include -->
<?= view('Patients/top_bar'); ?>
<!---Top Bar Section Include -->

<!---Body Section Start --->
<div class="container">
	<div class="card">
		<?= form_open_multipart(); ?>
		<div class="card-content" style="background: green;padding: 10px;border-bottom: 1px dashed silver">
			<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-tasks"></span>&nbsp;Review Hospital Activity</h6>
		</div>
		<div class="card-content">
			<h6>Review Title</h6>
			<input type="text" name="review_title" id="input_box" placeholder="Enter Review Title">
			<span style="color: red"><?= display_error($validation,'review_title'); ?></span>
			<h6>Review Image</h6>
			<input type="file" name="review_image" id="input_file" required="">
			
			<h6>Review Discription</h6>
			<textarea name="review_content" placeholder="Enter Description"></textarea>
			<span style="color: red"><?= display_error($validation,'review_content'); ?></span>
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: green;font-weight: 500;text-transform: capitalize;"><span class="fa fa-share"></span>&nbsp;Review</button>
			</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>