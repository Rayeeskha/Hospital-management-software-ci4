<!DOCTYPE html>
<html>
<head>
	<title>Patient dashboard</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		#dashboard_default{width: 100%;border-radius: 5px; }
		#doc_img{width: 250px; height: 250px;border-radius: 100%;}
	</style>
</head>
<body>
<!---Top Bar Section Include -->
<?= view('Patients/top_bar'); ?>
<!---Top Bar Section Include -->
<!---Body Section Start --->
<div class="row">
	<div class="col l4 m12 s12">
		<div class="card">
			<div class="card-content" style="background: orange;padding: 10px;border-bottom: 1px dashed silver">
				<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-users"></span>&nbsp;Best Doctor Can Helps</h6>
			</div>
			<div class="card-content" style="border-bottom: 1px dashed silver">
				<center>
					<img src="<?= base_url('public/assets/images/patients_dashboard.jpg') ?>" id="dashboard_default">
				</center>
			</div>
			<div class="card-content">
				<h6 style="font-weight: 500;font-size: 15px;">You may call them simply doctors. But most doctors have extra expertise in one type of medicine or another. In fact, there are several hundred medical specialties and subspecialties. Here are the most common types of doctors you'll likely see</h6>
			</div>

		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="card">
			<div class="card-content" style="background: blue;padding: 10px;border-bottom: 1px dashed silver">
				<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-user"></span>&nbsp;Your Booking Doctor</h6>
			</div>
			<div class="card-content">
				<center>
					<a class="tooltipped" data-position="top" data-tooltip="<?= $doctor_details[0]->doctor_name; ?>">
						<img src="<?= base_url().'./public/uploads/doctor/'.$doctor_details[0]->doctor_image; ?>" class="responsive-img" id="doc_img">
					</a>
				</center>
				<h6 style="text-align: center;font-weight: 500;font-size: 15px;"><span class="fa fa-user" style="color: blue;"></span>&nbsp;<?= $doctor_details[0]->doctor_name; ?>
				</h6>
				<hr>
				<h6 style="color:orange;font-weight: 500;font-size: 15px;">Doctor Specialist</h6>
				<h6 style="color: green;font-size: 16px;font-weight: 500"><span class="fa fa-trophy"></span>&nbsp;<?= $doctor_details[0]->doctor_specility; ?></h6>
				<h6 style="font-weight: 500;color: orange;"><?= word_limiter($doctor_details[0]->doctor_other_info, 10); ?></h6>
			</div>
		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="row">
			<div class="col l6 m12 s12">
				<div class="row">
					<div class="card">
						<div class="card-content" style="background: blue;padding: 10px;border-bottom: 1px dashed silver">
							<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-user"></span>&nbsp;Doctor Specialist</h6>
						</div>
						<div class="card-content">
							<h6 style="color: blue;font-weight: 500;font-size: 15px;"><span class="fa fa-check"></span>&nbsp; <?= $doctor_details[0]->doctor_specility; ?>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col l6 m12 s12">
				<div class="card">
					<div class="card-content" style="background: blue;padding: 10px;border-bottom: 1px dashed silver">
						<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-phone"></span>&nbsp;Doctor Contact Number</h6>
					</div>
					<div class="card-content">
						<a href="tel:<?= $doctor_details[0]->doctor_phone; ?>" style="font-weight: 500">
							<span class="fa fa-phone"></span>&nbsp;<?= $doctor_details[0]->doctor_phone; ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col l12 m12 s12">
				<div class="card">
					<div class="card-content" style="background: blue;padding: 10px;border-bottom: 1px dashed silver">
						<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-trophy"></span>&nbsp;Doctor Event</h6>
					</div>
					<div class="card-content">
						<img src="<?= base_url('public/assets/images/doctor_days_calander.png') ?>" style="width: 100%">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!---Body Section Start --->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->

</body>
</html>