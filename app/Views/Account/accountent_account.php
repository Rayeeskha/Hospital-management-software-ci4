<!DOCTYPE html>
<html>
<head>
	<title>Medical Accountent </title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: url(<?= base_url('public/assets/images/hos2.jpg') ?>)no-repeat fixed;background-size: 100% 100%   }
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;color: white}
		#login_id_with_image{background-color: black;}
		select{display: block;border: 1px solid silver;border-radius: 3px;box-shadow: none;height: 40px;}
	</style>
</head>
<body>
<!----Body Section Start --->	
<!---Login Form --->
<div class="row" style="margin-top: 6%;">
	<div class="col l4 m12 s12"></div>
	<div class="col l4 m12 s12">
		<!---card Section --->
		<?= form_open('Accountent_login/create_acc_account'); ?>
		<div class="card" style="box-shadow: none;">

			<!---Php Meassge Show --->
			<div style="margin-left: 20px;margin-right: 10px">
			  <?php  if(session()->getTempdata('success')): ?>
			        <div class="card" style="background-color: black">
			          <div class="card-content" style="margin-left: 20px;margin-right: 20;padding: 10px; background: green;color: white;font-weight: 500">
			            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= session()->getTempdata('success'); ?>
			          </div>
			        </div>
			      <?php endif; ?>
			      <?php  if(session()->getTempdata('error')): ?>
			        <div class="card" style="background-color: black">
			          <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
			            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= session()->getTempdata('error'); ?>
			          </div>
			        </div>
			<?php endif; ?>
			</div>
		<!---Php Meassge Show --->
			<div class="card-content" id="login_id_with_image">
				<h4 class="center-align" style="margin-bottom: 0px;"><span class="fa fa-users" style="color: #ff3d00"></span></h4>
				<h5 class="center-align" style="margin-top: 0px; color: orange;font-weight: 500">Accountent Access Control</h5>
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Username</h6>
				<input type="text" name="username" id="input_box" placeholder="Username" value="<?= set_value('username'); ?>" > 
				<span style="color: red"><?= display_error($validation,'username'); ?></span>

				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Email</h6>
				<input type="email" name="email" id="input_box" placeholder="abc@gmail.com" value="<?= set_value('email'); ?>" >
				<span style="color: red"><?= display_error($validation,'email'); ?></span>
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Mobile</h6>
				<input type="number" name="mobile" id="input_box" placeholder="1234567890" value="<?= set_value('mobile'); ?>" >
				<span style="color: red"><?= display_error($validation,'mobile'); ?></span>
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Select Gender</h6>
				<select name="gender">
					<option selected="" disabled="">Select Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Custom">Custom</option>
				</select>
				<span style="color: red"><?= display_error($validation,'gender'); ?></span>
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Password</h6>
				<input type="password" name="password" id="input_box" placeholder="xxxxxxx" value="<?= set_value('password'); ?>" >
				<span style="color: red"><?= display_error($validation,'password'); ?></span>
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Confirm Password</h6>
				<input type="password" name="Confirm_password" id="input_box" placeholder="xxxxxxx" value="<?= set_value('Confirm_password'); ?>" >
				<span style="color: red"><?= display_error($validation,'Confirm_password'); ?></span>

				<button type="submit" class="btn waves-effect waves-light" id="btn_sign_in" style="background: #ff3d00;text-transform: capitalize;width: 100%;font-weight: 500;margin-top: 10px;height: 40px;border-radius: 3px;">Sign In <span class="fa fa-sign-in-alt" ></span>	</button>
				<br>
				<a href="<?= base_url('Accountent_login/accountent_login'); ?>"class="btn waves-effect waves-light" style="background: #ff3d00;text-transform: capitalize;width: 100%;font-weight: 500;margin-top: 10px;height: 40px;border-radius: 3px;">I have already Account ?</a>

				<h6 style="margin-top: 20px;font-size: 14px; font-weight: 500;color: grey;">Notes:</h6>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Hospital Management  Software Login Panel  </p>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Admin Login will Manage All Activity in that Hospital  </p>
				

			</div>
		</div>
		<?= form_close(); ?>
		<!---card Section --->
	</div>
	<div class="col l4 m12 s12"></div>
</div>
<!---Login Form --->
<!----Body Section Start --->	



<?= view('Admin/js_file.php'); ?>
</body>
</html>