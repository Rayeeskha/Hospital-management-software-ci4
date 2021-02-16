<!DOCTYPE html>
<html>
<head>
	<title>About us</title>
	<!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  --->

<!---Doctor Section Include --->
<?= view('Home/doctor_section'); ?>
<!---Doctor Section Include --->

<!---Why Choose Section Include ---->
<?= view('Home/why_choose_us'); ?>
<!---Why Choose Section Include ---->
<!---Counter Section Include --->
<?= view('Home/counter_section'); ?>
<!---Counter Section Include --->


<!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
<!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->

</body>
</html>