<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: url(<?= base_url('public/assets/images/back.png') ?>)no-repeat fixed;background-size: 100% 100%   }
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;color: white}
	</style>
</head>
<body>

<div class="container">
	<div class="row" style="margin-top: 10%">
		<div class="col l4 m12 s12"></div>
		<div class="col l4 m12 s12">
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
			<?= form_open(); ?>
			<div class="card" style="background: black;box-shadow: none;">
				<div class="card-content" style="padding: 5px;border-bottom: 1px dashed silver">
					<h6 style="font-weight: 500;color: orange;text-align: center;"><span class="fa fa-key" style="color: white"></span>&nbsp;Forget Password ?</h6>
				</div>
				<div class="card-content">
					<h6 style="color: orange">Email</h6>
					<input type="text" name="email" id="input_box" value="<?= set_value('email'); ?>" placeholder="Enter Email Id">
					<span style="color: red"><?= display_error($validation,'email'); ?></span>
					<center>
						<button type="submit" class="btn btn-waves-effect waves-light" style="background: orange">
							<img src="<?= base_url('public/assets/images/forget.png') ?>" style="width: 100px; height: 35px;">
						</button>
					</center>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
		<div class="col l4 m12 s12"></div>
	</div>
</div>


<?= view('Admin/js_file.php'); ?>
</body>
</html>