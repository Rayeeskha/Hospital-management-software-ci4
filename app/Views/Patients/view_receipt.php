<!DOCTYPE html>
<html>
<head>
	<title>View Payment Slip</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		#patients_img{width: 200px;height: 200px;border-radius: 5%;}
		#patients_img :hover{background: blue}
		h6{font-weight: 500;font-size: 13px;}
		td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!---Top Bar Section Include -->
<?= view('Patients/top_bar'); ?>
<!---Top Bar Section Include -->
<!---Body Section Start --->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<a href="<?= base_url('Patients/index'); ?>" class="brand-logo">&nbsp;
	            <img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 
	        </a>
	        <h6 style="text-align: right"><span class="fa fa-clock" style="color: green">&nbsp;<?= date('d M, Y', strtotime($patients[0]->created_at)); ?></span></h6>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div class="row">
				<div class="col l6 m12 s12">
					
						<a class="tooltipped" data-position="top" data-tooltip="<?= $patients[0]->patent_name; ?>">
							<img src="<?= base_url().'./public/uploads/patents/'.$patients[0]->patent_image; ?>" class="responsive-img" id="patients_img" height="50">
						</a>
					
				</div>
				<div class="col l6 m12 s12">
					<div class="row">
						<div class="col l6 m12 s12">
							<h6>Patient Name : <?= $patients[0]->patent_name; ?></h6>
							<h6>Phone : <a href="tel:<?= $patients[0]->patent_phone; ?>"><?= $patients[0]->patent_phone; ?></a></h6>
							<h6>Address : <?= $patients[0]->patent_address; ?></h6>
							<h6>Zip : <?= $patients[0]->patent_zip; ?></h6>
						</div>
						<div class="col l6 m12 s12">
							<h6>Booked Doctor :
								<?php 
									$get_doctor =  get_doctor_name('doctor',$patients[0]->doctor_name);

									echo $get_doctor[0]->doctor_name;
								 ?>	
							 </h6>
							<h6>Patient Issue : <?= $patients[0]->patent_issue; ?></h6>
							<h6>Email : <a href="mailto:<?= $patients[0]->patent_email; ?>"><?= $patients[0]->patent_email; ?></a></h6>
							<h6>Patient Room : <?= $patients[0]->patent_room; ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Registration Fee</th>
					<th>Hospital Fee</th>
					<th>Doctor Fee</th>
				</tr>
				<tr>
					<td><?= $patients[0]->intry_fee; ?></td>
					<td><?= $patients[0]->other_fee; ?></td>
					<td><?= $patients[0]->doctor_fee; ?></td>
				</tr>
				<tr>
					<td>Total Payment</td>
					<td></td>
					<td colspan="5">
						<span class="fa fa-rupee-sign" style="color: green"></span>
						<?php
							$total_fee = ($patients[0]->intry_fee + $patients[0]->other_fee + $patients[0]->doctor_fee );
							echo number_format($total_fee);
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>	
<!---Body Section End --->	
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>