<!DOCTYPE html>
<html>
<head>
	<title>Medical Accountent</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		#customer_dropdown, #income_dropdown{width: 200px !important; padding-top: 8px;padding-bottom: 8px;}
		#customer_dropdown a, #income_dropdown a{color: grey; font-size: 16px;font-weight: 500;border-bottom: 1px dashed silver}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->
<!----Body Section Start --->
<div class="row">
	<div class="col l3 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<div class="row">
					<div class="col l4 m4 s4">
						 <h4><span class="fa fa-tasks" style="color: white"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Company </h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
							<?php if($total_company):
								echo count($total_company); 
							?>
							<?php else: ?>
								<h6 style="color: red;font-size: 13px;font-weight: 500">Not Added any Company</h6>
							<?php endif; ?>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l3 m12 s12">
		<div class="card" style="background: orange">
			<div class="card-content">
				<div class="row">
					<div class="col l4 m4 s4">
						 <h4><span class="fa fa-hourglass-start" style="color: white"></span></h4>
					</div>
					<div class="col l8 m8 s8">
						<h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Products </h6>
						<h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
							<?php if($total_products):
								echo count($total_products); 
							?>
							<?php else: ?>
								<h6 style="color: red;font-size: 13px;font-weight: 500">No data Found</h6>
							<?php endif; ?>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l3 m12 s12">
		<div class="card" style="background: red">
             <div class="card-content">
				<div class="row">
					<div class="col l8 m8 s8">
						<h6 style="font-size: 17px;color: white;font-weight: 550"><span class="fa fa-users" style="color:  white"></span>&nbsp;Customer's
						</h6>
						<h6 style="font-weight: 500;font-size: 18px;color: white">
							<span id="show_customers"></span>
						</h6>

						<span id="show_customer_heading" style="color: white;font-weight: 500;font-size: 15px;">hjdshdkjl</span>
					</div>
					<div class="col l4 m4 s4">
						<span class="right">
							<h6 style="font-size: 19px;color: white;font-weight: 500">
								<span class="fa fa-ellipsis-v dropdown-trigger" data-target="customer_dropdown" style="cursor: pointer;color: white"></span>
							</h6>
						</span>	
					</div>
				</div>
			</div>
        </div>
	</div>
	<div class="col l3 m12 s12">
		<div class="card" style="background: green;">
			 <div class="card-content">
				<div class="row">
					<div class="col l8 m8 s8">
						<h6 style="font-size: 17px;color: white;font-weight: 550"><span class="fa fa-rupee-sign" style="color:  white"></span>&nbsp;Total Income
						</h6>
						<h6 style="font-weight: 500;font-size: 18px;color: white">
							<span id="show_income"></span>
						</h6>

						<span id="show_income_heading" style="color: white;font-weight: 500;font-size: 15px;">hjdshdkjl</span>
					</div>
					<div class="col l4 m4 s4">
						<span class="right">
							<h6 style="font-size: 19px;color: white;font-weight: 500">
								<span class="fa fa-ellipsis-v dropdown-trigger" data-target="income_dropdown" style="cursor: pointer;color: white"></span>
							</h6>
						</span>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="card">
		<div class="card-content">
			<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
		</div>
	</div>
</div>
<!----Body Section End --->

<!-----Customer Dropdown Section Start --->
<ul class="dropdown-content" id="customer_dropdown">
	<li><a href="#!" onclick="count_customers('today')">Today Customer</a></li>
	<li><a href="#!" onclick="count_customers('yesterday')">Privious Day Customer</a></li>
	<li><a href="#!" onclick="count_customers('last_30_days')">Last 30 Days  Customer</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_customers('all')">All Customer</a></li>
</ul>
<!-----Customer Dropdown Section End --->

<!---Income Dropdown Section Start --->
<ul class="dropdown-content" id="income_dropdown">
	<li><a href="#!" onclick="count_income('today')">Today Income</a></li>
	<li><a href="#!" onclick="count_income('yesterday')">Privious Day Income</a></li>
	<li><a href="#!" onclick="count_income('last_30_days')">Last 30 Days  Income</a></li>
	<div class="divider"></div>
	<li><a href="#!" onclick="count_income('all')">All Income</a></li>
</ul>
<!---Income Dropdown Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
<!---Custom js File Include ---->
<?= view('Medical/custom_js.php'); ?>
<!---Custom js File Include ---->
</script>
</body>
</html>