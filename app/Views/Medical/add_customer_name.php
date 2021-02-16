<!DOCTYPE html>
<html>
<head>
	<title>Add Slip Name</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->
<!----Body Section Start --->

<div  class="container">
	<div  class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-file" style="color: green"></span>&nbsp;Add Bill Slip  Name</h5>
		</div>
		<div class="card-content">
		<?= form_open('Medical_Accountent/add_customer_bill_slip'); ?>
			<h6>Customer Name</h6>
			<input type="text" name="cus_name" id="input_box" placeholder="Enter Customer Name" required="">
			<h6>Customer Address</h6>
			<input type="text" name="cus_address" id="input_box" placeholder="Enter Customer Address">
			<h6>Customer Mobile</h6>
			<input type="number" name="cus_number" id="input_box" placeholder="Enter Customer Mobile Number">
			<h6>Doctor Name</h6>
			<input type="text" name="doc_name" id="input_box" placeholder="Enter Doctor Name">
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize;font-weight: 500">Add Customer Name</button>
			</center>
		<?= form_close(); ?>	
		</div>
	</div>
</div>

<!----Body Section End --->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>