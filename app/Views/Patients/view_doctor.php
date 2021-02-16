<!DOCTYPE html>
<html>
<head>
	<title>View  All Doctor</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;color: white}
	</style>
</head>
<body>
<!---Top Bar Section Include -->
<?= view('Patients/top_bar'); ?>
<!---Top Bar Section Include -->

<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card" style="background: blue;">
		<div class="card-content" style="background: orange;padding: 10px;border-bottom: 1px dashed silver">
			<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-users"></span>&nbsp;Best Doctor Can Helps</h6>
		</div>
		<div class="card-content" style="background: white">
			<div class="row">
				<?php if($view_doctor):
				count($view_doctor);
				foreach($view_doctor as $doctor): ?>
				<div class="col l2 m4 s12">
					<div class="card">
						<div class="card-content">
							<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $doctor->doctor_name; ?>">
								<img src="<?= base_url().'./public/uploads/doctor/'.$doctor->doctor_image; ?>" class="responsive-img" id="doc_img">
							</a>
						</center>
						<h6 style="color: green;font-weight: 500"><?= $doctor->doctor_specility; ?></h6>
						<h6 style="color: orange;font-weight: 500;font-size: 14px;"><?= word_limiter($doctor->doctor_other_info, 10); ?></h6>
						<center>
							<a href="<?= base_url('Patients/booked_doctor/'.$doctor->id); ?>" class="btn btn-waves-effect waves-light" style="background: green;font-weight: 500;text-transform: capitalize;">Booked Appointment</a>
						</center>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php else: ?>
				<h6 style="color: red">Record's Not Found</h6>
			<?php endif; ?>
				<div class="col l2 m4 s12"></div>
				<div class="col l2 m4 s12"></div>
				<div class="col l2 m4 s12"></div>
				<div class="col l2 m4 s12"></div>
				<div class="col l2 m4 s12"></div>
			</div>
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>