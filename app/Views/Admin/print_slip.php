<!DOCTYPE html>
<html>
<head>
	<title>Print Patent Slip</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		table tr th{font-size: 14px;font-weight: bold;}
		#patent_image{width: 100px;height: 100px;}
		h6{font-weight: 500;font-size: 15px;}
	</style>
</head>
<body  onload="window.print();">
<!---Body Section --->
<div style="margin-top: 10px;margin-left: 15px;margin-right: 15px;">
	<div class="card" style="box-shadow: none;">
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
				 <a href="<?= base_url('Admin/index'); ?>" class="brand-logo">&nbsp;
	            <img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 
	            </a>
			</div>
			<div class="card-content">
			  <div class="row">	
				<div class="col l2 m2 s2">
					<img src="<?= base_url().'./public/uploads/patents/'.$patent_slip[0]->patent_image; ?>" class="responsive-img" id="patent_image" height="50">
				</div>
				<div class="col l10 m10 s10" style="border-bottom: 1px solid silver">
					<div class="row">
						<div class="col l6 m6 s6">
							<h6>Patent Name : <span style="color: green"><?= $patent_slip[0]->patent_name; ?></span>
							</h6>
							<h6>Date : <span style="color: green"><?= date('d M, Y', strtotime($patent_slip[0]->created_at)); ?></span></h6>
							<h6>Patent Phone: <?= $patent_slip[0]->patent_phone; ?></h6>
							<h6>Patent Address: <?= $patent_slip[0]->patent_address; ?></h6>
							<h6>Patent Zip : <span><?= $patent_slip[0]->patent_zip; ?></span></h6>
						</div>
						<div class="col l6 m6 s6">
							<h6>Doctor Name : <span>
									<?php 
										$get_doctor =  get_doctor_name('doctor_fee',$patent_slip[0]->doctor_name);

										echo $get_doctor[0]->doctor_name;
									 ?>	
								</span>

							</h6>
							<h6>
								Doctor Fee : <?= $patent_slip[0]->doctor_fee; ?>
							</h6>
							<h6 > 
								Other Fee : <?= $patent_slip[0]->other_fee; ?>
							</h6>
							<h6 > 
								Intry Fee : <?= $patent_slip[0]->intry_fee; ?>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
				<h6 >Patent Issue : <?= $patent_slip[0]->patent_issue; ?> </h6>
				<h6 >Patent Room Number : <?= $patent_slip[0]->patent_room; ?> </h6>
			</div>
			<div class="row">
				<div class="col l6 m6 s6">
					<h6 style="font-size: 18px;font-weight: 500">Accountent Signature</h6>
				</div>
				<div class="col l6 m6 s6">
					<h6></h6>
				</div>
			</div>
		</div>
		
		
	</div>
</div>

<!---Body Section --->	
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>