<!DOCTYPE html>
<html>
<head>
	<title>Hospital Software</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: url(<?= base_url('public/assets/images/hos2.jpg') ?>)no-repeat fixed;background-size: 100% 100%   }
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		#login_id_with_image{background: url(<?= base_url('public/assets/images/hos1.jpg') ?>)no-repeat fixed center;background-size: 100% 100% }
	</style>
</head>
<body>
<!----Body Section Start --->	
<!---Login Form --->
<div class="row" style="margin-top: 5%;">
	<div class="col l4 m4 s12"></div>
	<div class="col l4 m4 s12">



		<!---card Section --->
		<?= form_open('Login'); ?>
		<div class="card">
			<div class="card-content" id="login_id_with_image">
				<h4 class="center-align" style="margin-bottom: 0px;"><span class="fa fa-users" style="color: #ff3d00"></span></h4>
				<h5 class="center-align" style="margin-top: 0px; color: orange;font-weight: 500">Admin Access Control</h5>
				
				
				<?php if(isset($error)): ?>
					<div style="color: red"><?= $error; ?></div>
				<?php endif; ?>

				
				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Username/Email</h6>
				<input type="text" name="email" id="input_box" placeholder="Username/Email" value="<?= set_value('email'); ?>" > 
				<span style="color: red"><?= display_error($validation,'email'); ?></span>

				<h6 style="font-size: 14px; font-weight: 500;color: orange;">Password</h6>
				<input type="password" name="password" id="input_box" placeholder="xxxxxxx" value="<?= set_value('password'); ?>" >
				<span style="color: red"><?= display_error($validation,'password'); ?></span>
				<button type="submit" class="btn waves-effect waves-light" id="btn_sign_in" style="background: #ff3d00;text-transform: capitalize;width: 60%;font-weight: 500;margin-top: 10px;height: 40px;border-radius: 3px;">Sign In <span class="fa fa-sign-in-alt" ></span>	</button>
				<a href="#!" style="text-decoration: underline;">Forget Password ?</a>
				<br>

				<?php if(isset($loginButton)): ?>
				<a href="<?= $loginButton; ?>" style="">
					<img src="<?= base_url('public/assets/images/google.png') ?>" style="width: 100%;height: 50px;margin-top: 10px;border-radius: 3px;">
				</a>
			<?php endif; ?>

				<h6 style="margin-top: 20px;font-size: 14px; font-weight: 500;color: grey;">Notes:</h6>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Hospital Management  Software Login Panel  </p>
				<p style="font-size: 14px; font-weight: 500;color: grey;">Admin Login will Manage All Activity in that Hospital  </p>
				

			</div>
		</div>
		<?= form_close(); ?>
		<!---card Section --->
	</div>
	<div class="col l4 m4 s12"></div>
</div>
<!---Login Form --->
<!----Body Section Start --->	



<?= view('Admin/js_file.php'); ?>
</body>
</html>