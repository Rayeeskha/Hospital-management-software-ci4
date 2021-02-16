<!DOCTYPE html>
<html>
<head>
	<title>Booked Doctor Appointment</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;color: black}
		h6{font-weight: 500;font-size: 15px;}
	</style>
</head>
<body>
<!---Top Bar Section Include -->
<?= view('Patients/top_bar'); ?>
<!---Top Bar Section Include -->
<div class="container">
	<div class="card" style="background: green">
		<div class="card-content" style="background: green;padding: 10px;border-bottom: 1px dashed silver">
			<h6 style="color: white;font-weight: 500;text-align: center;"><span class="fa fa-users"></span>&nbsp;Booked Doctor Appointment</h6>
		</div>
		<div class="card-content" style="background: white">
			<div class="container">
			<?= form_open('Patients/booked_doctor_appointment'); ?>		
				<h6>Patient Name</h6>
				<input type="text" name="patient_name" value="<?= set_value('patient_name') ?>" id="input_box" placeholder="Enter Patient Name">
				<span style="color: red"><?= display_error($validation,'patient_name'); ?></span>
				<h6>Patient Symptoms</h6>
				<input type="text" name="pateint_issue" value="<?= set_value('pateint_issue') ?>" id="input_box" placeholder="Enter Patients Symptoms">
				<span style="color: red"><?= display_error($validation,'pateint_issue'); ?></span>
				<h6>Email</h6>
				<input type="text" name="patient_email" value="<?= set_value('patient_email') ?>" id="input_box" placeholder="Enter Patients Email">
				<span style="color: red"><?= display_error($validation,'patient_email'); ?></span>
				<h6>Mobile Number</h6>
				<input type="text" name="patient_mobile" value="<?= set_value('patient_mobile') ?>" id="input_box" placeholder="Enter Patients Mobile">
				<span style="color: red"><?= display_error($validation,'patient_mobile'); ?></span>
				<h6>Select Booking Date</h6>
				<input type="date" name="boking_date" value="<?= set_value('boking_date') ?>" id="input_box">
				<span style="color: red"><?= display_error($validation,'boking_date'); ?></span>
				<h6>Type Booking Time</h6>
				<input type="time"  name="boking_time" value="<?= set_value('boking_time') ?>" id="input_box" style="color: black">
				<span style="color: red"><?= display_error($validation,'boking_time'); ?></span>
				<input type="hidden" name="doctor_id" id="input_box" value="<?= $doctor_id[0]->id; ?>">
				<input type="hidden" name="doctor_name" id="input_box" value="<?= $doctor_id[0]->doctor_name; ?>">
				<center>
					<button type="submit" class="btn btn-waves-effect waves-light" style="background: green;font-weight: 500;text-transform: capitalize;">Booked Now</button>
				</center>
			<?= form_close(); ?>	
			</div>
		</div>
	</div>
</div>
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>