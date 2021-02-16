<!DOCTYPE html>
<html>
<head>
	<title>Print Patent Slip</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		table tr th{font-size: 14px;font-weight: bold;}
		#patent_image{width: 100px;height: 100px;border: 1px solid silver}
		h6{font-weight: 500;font-size: 14px;}
		tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body onload="window.print();">
<!---Body Section --->
<div style="margin-top: 10px;margin-left: 20px;margin-right: 20px;">
	<div class="card" style="box-shadow: none;">
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
				 <a href="<?= base_url('Blood_bank/index'); ?>" class="brand-logo">&nbsp;
	            <img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 
	            </a>
			</div>
			<div class="card-content">
			  <div class="row" style="border-bottom: 1px solid silver">	
				<div class="col l8 m8 s8" >
					<h6>Name : <span style="color: green"><?= $blood_slip[0]->username; ?></span>
					</h6>
					<h6>Date : <span style="color: green"><?= date('d M, Y, h:i:s', strtotime($blood_slip[0]->created_at)); ?></span></h6>
					<h6> Phone: <?= $blood_slip[0]->mobile; ?></h6>
					<h6>  Address: <?= $blood_slip[0]->address	; ?></h6>
					<h6> Email : <?= $blood_slip[0]->email	; ?></h6>
				</div>
				<div class="col l4 m4 s4">
					<img src="<?= base_url().'./public/uploads/hospitalblood_cus/'.$blood_slip[0]->photo; ?>" class="responsive-img" id="patent_image" height="50">
				</div>
			</div>
			<table class="table">
				<tr>
					<th>Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood 1 Unit Price</th>
					<th>Total Blood Price</th>
				</tr>
				<?php 
					$get_blood_name = get_doctor_name('blood_group', $blood_slip[0]->blood_id);
				?>
				<tr>
					<td>
						<span style="color: red">&nbsp;<?= $get_blood_name[0]->blood_group; ?></span>
					</td>
					<td>
						<?= $blood_slip[0]->blood_unit; ?>
					</td>
					<td style="color: red">
						<span class="fa fa-rupee-sign"></span><?= number_format($blood_slip[0]->blood_price); ?>
					</td>
					<td style="color: green">
						<?php 
							$total_bld_prc = $blood_slip[0]->blood_price * $blood_slip[0]->blood_unit;
						?>
						<span class="fa fa-rupee-sign"></span><?= number_format($total_bld_prc); ?>
					</td>
				</tr>
			</table>

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