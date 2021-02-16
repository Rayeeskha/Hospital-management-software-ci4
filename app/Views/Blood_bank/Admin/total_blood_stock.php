<!DOCTYPE html>
<html>
<head>
	<title>Total Blood Stock</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		h6{font-weight: 500;font-size: 15px;}
		select{display: block;}
		#search_donors{display: flex;}
    	#search_donors li:first-child{width: 300px}
    	tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Manage Total Blood  Stock Records</h5>
		</div>
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank/search_sale_bld_stock'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" id="blood_group" value="<?= set_value('blood_group'); ?>">
								<option selected="" disabled="">---Search Username ---</option>
									<?php if($blood_stock):
									count($blood_stock);
									foreach($blood_stock as $blood_group): ?>
										<option value="<?= $blood_group->blood_group; ?>"><?= $blood_group->blood_group; ?></option>
									<?php endforeach; ?>
									<?php else: ?>
										<h6 style="color: red;font-weight: 500;font-size: 16px;">User Not Found</h6>
									<?php endif; ?>
							</select>
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12"></div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Blood Group</th>
					<th>Total Blood Unit</th>
					<th>Total Blood Sale</th>
					<th>Blood Unit In Stock</th>
					<th>Blood Sale Price</th>
					<th>Total Blood Price In Stock</th>
				</tr>
				<?php if($blood_stock):
				count($blood_stock);
				foreach($blood_stock as $bld_stock):
					 $get_blood_name = get_doctor_name('blood_group', $bld_stock->blood_id);
				 ?>
					<tr>
						<td>
							<?= $bld_stock->blood_group; ?>
						</td>
						<td style="color: orange">
							<?= $get_blood_name[0]->blood_unit; ?>
						</td>
						<td style="color: green">
							<?= $bld_stock->blood_unit; ?>
						</td>
						<td style="color: red">
							<?php 
								$blood_in_stock = ($get_blood_name[0]->blood_unit - $bld_stock->blood_unit);
								echo $blood_in_stock;
							?>
						</td>
						<td style="color: green">
							<?php 
								$total_bld_prc = $bld_stock->blood_price * $bld_stock->blood_unit;
								
							?>
							<span class="fa fa-rupee-sign"></span><?= number_format($total_bld_prc); ?>
						</td>
						<td style="color: red">
							<?php 
								$bld_prc_in_stock = ($get_blood_name[0]->total_blood_price - $total_bld_prc);
							?>
							<span class="fa fa-rupee-sign"></span><?= number_format($bld_prc_in_stock); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;">Records Not Found</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>
</div>

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
<script type="text/javascript" src="<?= base_url('public/assets/select2/dist/js/select2.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
       // Initialize select2
     	$("#blood_group").select2();	
        });
</script>
</body>
</html>