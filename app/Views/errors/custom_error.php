<!DOCTYPE html>
<html>
<head>
	<title>Hospital Software</title>
	<!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  --->	
<br><br><br><br><br><br>
<div class="container">
	<div class="card">
		<h5 style="text-align: center;font-weight: 500;color: red;font-size: 32px;">Sorry ! Unable to Load Your Request</h5>
		<h5 style="text-align: center;font-weight: 500;color: red;font-size: 22px;">Unauthrozied Access</h5>
		<center>
			<a href="<?= base_url('Home/index'); ?>" style="text-align: center;font-weight: 500;background: green;" class="btn btn-primary">Back to home</a>
		</center>
		<br><br>
	</div>
</div>



<!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
<!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->
</body>
</html>