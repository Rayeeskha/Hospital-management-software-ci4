<!DOCTYPE html>
<html>
<head>
	<title>Doctor Dashboard</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		h6{font-weight: 500}
	</style>
</head>
<body>
<!---Topbar Section Include --->
<?= view('Doctor/top_bar'); ?>	
<!---Topbar Section Include --->

<!---dashboard Card Section Start -->
<div class="row" style="margin-top: 10px; margin-bottom: 0px;">
	<div class="col l4 m12 s12">
		<div class="card" style="background: red">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l8 m8 s8">
						<h6 style="font-weight: 500;font-size: 20px;color: white;text-align: center;">
							<?php if($appointment):
							echo count($appointment); ?>
							<?php else: ?>
								<h6 style="color: red">0</h6>
							<?php endif; ?>
						</h6>
						<h6 style="font-weight: 500;font-size: 18px;color: white;text-align: center;">Appointment for You</h6>
					</div>
					<div class="col l4 m4 s4">
						<div class="icon-box" style="text-align: center;">
							<img src="<?= base_url('public/assets/images/calander.jpg') ?>" style="width: 50px; border-radius: 50%">
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="card" style="background: orange">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l8 m8 s8">
						<h6 style="font-weight: 500;font-size: 20px;color: white;text-align: center;">
							<?php if($p_under_u):
								$patient_u = count($p_under_u);
								echo $patient_u;
							 ?>
							<?php else: ?>
								<h6 style="color: red;text-align: center;">0</h6>
							<?php endif; ?>
						</h6>
						<h6 style="font-weight: 500;font-size: 18px;color: white;text-align: center;">Patient Under You</h6>
					</div>
					<div class="col l4 m4 s4">
						<div class="icon-box" style="text-align: center;">
							<img src="<?= base_url('public/assets/images/doc.jpg') ?>" style="width: 50px; border-radius: 50%">
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l8 m8 s8">
						<h6 style="font-weight: 500;font-size: 20px;color: white;text-align: center;">
							<?php if($t_d_patient):
								$patient_u = count($t_d_patient);
								echo $patient_u;
							 ?>
							<?php else: ?>
								<h6 style="color: red;text-align: center;">0</h6>
							<?php endif; ?>
						</h6>
						<h6 style="font-weight: 500;font-size: 18px;color: white;text-align: center;">Your Patient Discharge</h6>
					</div>
					<div class="col l4 m4 s4">
						<div class="icon-box" style="text-align: center;">
							<img src="<?= base_url('public/assets/images/tick.png') ?>" style="width: 50px; border-radius: 50%">
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
<!---dashboard Card Section End -->	
<!---Resent Patient Appointment for You Section Start --->
<div class="row">
	<div class="col l5 m12 s12">
		<div class="card">
			<div class="card-content">
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
		</div>
	</div>
	<div class="col l7 m12 s12">
	<div class="card">
		<div class="card-content" style="background: blue;padding: 5px;border-bottom: 1px dashed silver">
			<h6 style="color: white;text-align: center;font-weight: 500">Recent Patients For You</h6>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Photo</th>
					<th>Patient Name</th>
					<th>Patient Issue</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Date</th>
				</tr>
				<?php if($p_under_u):
					count($p_under_u);
					foreach($p_under_u as $recent_patent):
				?>
				<tbody>
					<tr>
						<td>
							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $recent_patent['patent_name']; ?>">
								<img src="<?= base_url().'./public/uploads/patents/'.$recent_patent['patent_image']; ?>" class="responsive-img" id="doctor_image" height="50">
								 	</a>
							</center>
						</td>
						<td>
							<?= $recent_patent['patent_name']; ?>
						</td>
						<td style="color: red">
							<?= $recent_patent['patent_issue']; ?>
						</td>
						<td>
							<a href="tel:<?= $recent_patent['patent_phone']; ?>"><?= $recent_patent['patent_phone']; ?></a>
						</td>
						<td>
							<?= $recent_patent['patent_address']; ?>
						</td>
						<td>
							<h6>
								<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M d Y', strtotime($recent_patent['created_at'])); ?></span>
							</h6>
						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Not any Patient</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>
	</div>
</div>

<!---Resent Patient Appointment for You Section End --->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<!---Js file Include -->
<script type="text/javascript">
	//Chart Dashboard
window.onload = function () {

var options = {
    animationEnabled: true,
    title: {
         text: "Doctor Records by Status"
    },
    data: [{
        type: "doughnut",
        innerRadius: "40%",
        showInLegend: true,
        legendText: "{label}",
        indexLabel: "{label}:",
        dataPoints: [
             { label : 'Total Appointment',     y: <?= $chart_data['all_appointment_count']; ?>},
             { label : 'Total Patients',        y: <?= $chart_data['total_patients']; ?>},
             { label : 'Total Discharge Patients',y: <?= $chart_data['all_discharge_pat']; ?>}
        ]
    }]
};
$("#chartContainer").CanvasJSChart(options);

}         
//Chart Dashboard 
</script>
</body>
</html>