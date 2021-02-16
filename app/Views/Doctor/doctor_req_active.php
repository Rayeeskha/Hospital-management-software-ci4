<!DOCTYPE html>
<html>
<head>
	<title>Request Activation For Access Control</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		.nav-wrapper{background: blue}
		h6{font-weight: 500;}
		 #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;border-radius: 3px; width: 50%}
	</style>
</head>
<body>
<!---Navbar section start --->
 <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">
      	<span class="fa fa-user"></span> &nbsp;<?= $userdata->username; ?>
	</a>
	<ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?= base_url('Accountent_login/Logout_accountent'); ?>"><span class="fa fa-key"></span>&nbsp;Logout</a></li>
        <li><a href="#!"></li>
    </ul>
    </div>
  </nav>	
<!---Navbar section start --->	
<!---Body Section Start --->
<div class="container">
	<div class="card" style="background: green">
		<div class="card-content" style="padding: 10px;">
			<h6 style="margin-left: 10px;color: white;font-weight: 500"><span class="fa fa-hourglass-start" style="color: white;font-weight: bold;"></span>
				Welcome: <?= $userdata->username; ?>
			</h6>
		</div>
	</div>
	<div class="card">
		<div class="card-content" style="padding: 10px;">
			<h6><span style="color: red">Notes:</span>
				Your Email Doest Not Register by Admin Please Add Email to Use <br>
				Your Patient details & All Activity in Hospital 
			</h6>
			<h6 style="color: green">Thanks & Regards Access to hospital</h6>
		</div>
	</div>
	<div class="card" style="background: blue">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h6 style="margin-left: 10px;color: white"><span class="fa fa-envelope" style="color: white"></span>
				Activate to Your Email Address Request
			</h6>
		</div>
		<!---Php Meassge Show --->
<div style="margin-left: 20px;margin-right: 10px">
  <?php  if(session()->getTempdata('success')): ?>
        <div class="card">
          <div class="card-content" style="margin-left: 20px;margin-right: 20;padding: 10px; background: green;color: white;font-weight: 500">
            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= session()->getTempdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php  if(session()->getTempdata('error')): ?>
        <div class="card">
          <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= session()->getTempdata('error'); ?>
          </div>
        </div>
<?php endif; ?>
</div>
<!---Php Meassge Show --->
		<div class="card-content" style="background: white">
			<?= form_open('Doctor/request_activate_email'); ?>
				<h6>Name</h6>
				<input type="text" name="doctor_name" value="<?= set_value('doctor_name'); ?>" id="input_box" placeholder="Enter Name">
				<span style="color: red"><?= display_error($validation,'doctor_name'); ?></span>
				<h6>Email Id</h6>
				<input type="text" name="doctor_email" value="<?= set_value('doctor_email'); ?>" id="input_box" placeholder="Enter Email Id">
				<span style="color: red"><?= display_error($validation,'doctor_email'); ?></span>
				<h6>Phone Number</h6>
				<input type="text" name="doctor_phone" value="<?= set_value('doctor_phone'); ?>" id="input_box" placeholder="12345678s"> 
				<span style="color: red"><?= display_error($validation,'doctor_phone'); ?></span>
				<br><br>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: blue;;font-weight: 500;text-transform: capitalize;font-weight: 500"> Verification</button>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Body Section Start --->


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>