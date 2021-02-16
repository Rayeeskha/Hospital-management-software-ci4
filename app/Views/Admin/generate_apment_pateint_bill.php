<?php 
	$get_patient =  get_doctor_name('booked_doctor',$payment_bill[0]->pateints_id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Generate Payment Bill</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		h6{font-size: 15px;font-weight: 500}
	</style>
</head>
<body onload="window.print();"> 

<div style="margin-right: 15px; margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;">
			<div class="row">
				<div class="col l12 m12 s12">
					<div class="row">
						<div class="col l6 m6 s6">
							<img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 

						<h6 style="font-size: 15px;font-weight: 500">Patient Name : 
							<?php
							
								echo $get_patient[0]->patient_name;
							?>

							</h6>
						<h6>Patient Mobile : 
							
							<a href="tel:<?= $get_patient[0]->patent_phone; ?>">
								<?= $get_patient[0]->patient_mobile; ?></a>
							</h6>
							
						</div>
						<div class="col l6 m6 s6" style="text-align: center;">
							<h6>Admit Date : 
								<?= date('d M, Y', strtotime($get_patient[0]->boking_date)); ?>
							</h6>
							<h6>Release Date : <?= date('d M, Y'); ?></h6>
							<h6>Days Spent : 
								<?php 
									$admint_day = $get_patient[0]->boking_date;
									$today = date("Y-m-d");
									$diff = date_diff(date_create($admint_day), date_create($today));
									$get_spent_days = $diff->format('%d');
									echo $get_spent_days;
								?>
							</h6>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h5 style="font-weight: 500;font-size: 18px;">Disease and Symptoms :  <span style="color: red">&nbsp;<?= $get_patient[0]->pateint_issue; ?></span></h5>
			
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div class="row">
				<div class="col l6 m6  s6">
					<h5 style="font-weight: 500;font-size: 18px;">Charges</h5>
					<h6 style="margin-bottom:  20px;">Room Charge 
						<span class="fa fa-rupee-sign" style="color: green;"></span>
						<?= $payment_bill[0]->room_charge ?>&nbsp;(Per Day)
					</h6>
					<h6 style="margin-bottom:  30px;">Doctor Fee</h6>
					<h6 style="margin-bottom:  30px;">Medicine Cost</h6>
					<h6 style="margin-bottom:  30px;">Other Cost</h6>
					
				</div>
				<div class="col l6 m6 s6">
					<h5 style="font-weight: 500;font-size: 18px;">Charges</h5>
					<h6 style="margin-bottom:  20px;">
						<?php 
						 $count_room_bill = ($payment_bill[0]->room_charge * $get_spent_days);
					       echo number_format($count_room_bill);
						?>
					</h6>
					<h6 style="margin-bottom:  30px;"><?= $payment_bill[0]->doc_fee; ?></h6>
					<h6 style="margin-bottom:  30px;"><?= number_format($payment_bill[0]->med_cost); ?></h6>
					<h6 style="margin-bottom:  30px;"><?= $payment_bill[0]->other_cost; ?></h6>
				</div>
			</div>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m6 s6">
					<h6>Total Amount</h6>
				</div>
				<div class="col l6 m6 s6">
					<?php 
						$count_total_amount = ($count_room_bill + $payment_bill[0]->doc_fee + $payment_bill[0]->med_cost + $payment_bill[0]->other_cost);
						
					?>
					<h6><span class="fa fa-rupee-sign" style="color: green"></span>&nbsp;<?= number_format($count_total_amount); ?></h6>
				</div>
			</div>
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->	

</body>
</html>