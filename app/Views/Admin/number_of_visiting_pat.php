<!DOCTYPE html>
<html>
<head>
	<title>Number of Visiting Patients</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Number of Visiting  Patients</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
				<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?php if($pat_visiter):
					$count =  count($pat_visiter); ?>
					<h6 style="text-align: center;font-weight: 500;">
						Number of Visiting : <span class="fa fa-eye" style="color:green">&nbsp;<?= $count; ?></span>
					</h6>
					<?php else: ?>
						<h6 style="color: red">Not Visiting</h6>
					<?php endif; ?>
				</div>
				<div class="col l6 m6 s12"></div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
			
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Address</th>
					<th>Zip</th>
					<th>Issue</th>
					<th>Doctor Name</th>
					<th>Doctor Fee</th>
					<th>Patents Email</th>
				</tr>
				<?php 
					$get_patient =  get_doctor_name('patents',$pat_visiter[0]->patient_id);
					
				?>	
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $get_patient[0]->patent_name; ?>">
								<img src="<?= base_url().'./public/uploads/patents/'.$get_patient[0]->patent_image; ?>" class="responsive-img" id="doctor_image" height="50">
							</a>
						</center>
					</td>
					<td>
						<?= $get_patient[0]->patent_name; ?>
					</td>
					<td>
						<a href="tel:<?= $get_patient[0]->patent_phone; ?>"><?= $get_patient[0]->patent_phone; ?></a>
					</td>
					<td>
						<?= $get_patient[0]->patent_address; ?>
					</td>
					<td>
						<?= $get_patient[0]->patent_zip; ?>
					</td>
					<td>
						<?= $get_patient[0]->patent_email; ?>
					</td>
					<td style="color: green">
						<?php 
							$get_doctor =  get_doctor_name('doctor_fee',$get_patient[0]->doctor_name);
							echo $get_doctor[0]->doctor_name;
						?>	
					</td>
					<td>
						<?= $get_patient[0]->doctor_fee; ?>	
					</td>
					<td>
						<a href="mailto:<?= $get_patient[0]->patent_email; ?>"><?= $get_patient[0]->patent_email; ?></a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>