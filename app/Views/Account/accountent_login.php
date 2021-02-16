<!DOCTYPE html>
<html>
<head>
	<title>Accountent</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: url(<?= base_url('public/assets/images/hos2.jpg') ?>)no-repeat fixed;background-size: 100% 100%   }
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;color: white}
		#login_id_with_image{background:black }
	</style>
</head>
<body>
<!----Body Section Start --->	
<!---Login Form --->
<div class="row" style="margin-top: 5%;">
	<div class="col l4 m12 s12"></div>
	<div class="col l4 m12 s12">

		<!---card Section --->
		<?= form_open('Accountent_login/accountent_login'); ?>
		<div class="card">
			<!---Php Meassge Show --->
			<div >
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
				<h5 class="center-align" style="margin-top: 0px; color: orange;font-weight: 500">Acccount Access Control</h5>
				
				
				<?php if(isset($error)): ?>
					<div style="color: red"><?= $error; ?></div>
				<?php endif; ?>

				
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Username/Email</h6>
				<input type="text" name="email" id="input_box" placeholder="Username/Email" value="<?= set_value('email'); ?>" > 
				<span style="color: red"><?= display_error($validation,'email'); ?></span>

				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Password</h6>
				<input type="password" name="password" id="input_box" placeholder="xxxxxxx" value="<?= set_value('password'); ?>" >
				<span style="color: red"><?= display_error($validation,'password'); ?></span>
				<button type="submit" class="btn waves-effect waves-light" id="btn_sign_in" style="background: #ff3d00;text-transform: capitalize;width: 100%;font-weight: 500;margin-top: 10px;height: 40px;border-radius: 3px;">Sign In <span class="fa fa-sign-in-alt" ></span>	</button>
				<a href="<?= base_url('Accountent_login/forget_password'); ?>" style="text-decoration: underline;margin-top: 10px; font-weight: 500">Forget Password ?</a>
				<a href="<?= base_url('Accountent_login/index'); ?>" style="text-decoration: underline; margin-left: 10%; margin-top: 10px; font-weight: 500">Create Accountent Account</a>
				
				<a href="<?= base_url('Doctor_login/index'); ?>" style="text-decoration: underline; margin-left: 20%; margin-top: 10px;font-weight: 500">Create Doctor Account</a>
				<br>
				<h6 style="margin-top: 20px;font-size: 14px; font-weight: 500;color: grey;">Notes:</h6>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Hospital Management  Software Login Panel  </p>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Here ! Medical Accountent Login ! <br> Doctor Login & Blood Bank Accountent Login  </p>
				

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