<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		tr td{font-weight: 500;font-size: 16px;}
		#search_donors{display: flex;}
    	#search_donors li:first-child{width: 300px}
    	select{display: block;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Donor/top_bar'); ?>
<!----Top Bar Section Start ---->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Bank</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Blood_bank_donor/search_hos_bld_user'); ?>
					<ul id="search_donors">
						<li>
							<select required="" name="blood_group" id="username" value="<?= set_value('username'); ?>">
								<option selected="" disabled="">---Search Username ---</option>
									<?php if($blood_bank):
									count($blood_bank);
									foreach($blood_bank as $blood_group): ?>
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
					<th style="text-align: center;">Blood Group</th>
					<th>Blood Unit</th>
					<th>Blood Price 1 Unit</th>
				
				</tr>
				<?php if($blood_bank):
				count($blood_bank);
				foreach($blood_bank as $blood): ?>
					<tr>
						<td style="text-align: center;color: red"><?= $blood->blood_group; ?></td>
						<td style="color: orange"><?= $blood->blood_unit; ?></td>
						<td style="color: green">
							<span class="fa fa-rupee-sign">&nbsp;<?= number_format($blood->blood_price); ?></span>
						</td>
						
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;font-size: 16px;">Blood Not Available</h6>
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
     	$("#username").select2();
			
        });
</script>
</body>
</html>