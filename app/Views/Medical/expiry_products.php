
<!DOCTYPE html>
<html>
<head>
	<title>Manage Medicine</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Expiry Medicine</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12">
					<?= form_open('Medical_Accountent/search_exp_medicine'); ?>
					<ul id="search_doctor">
						<li>
							<input type="text" name="medicine_name" id="input_box" value="<?= set_value('medicine_name'); ?>" placeholder="Enter Medicine Name" required="">
						</li>
						<li>
							<button type="submit" class="btn waves-effect waves-light" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px">Search Now</button>
						</li>
					</ul>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Medicine</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Medical_Accountent/filter_exp_medicine/new_medicine'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;New  Medicine </a></li>
						<li><a href="<?= base_url('Medical_Accountent/filter_exp_medicine/old_medicine'); ?>" class="waves-effect">
							<span class="fa fa-users" style="color: #005a87"></span>&nbsp;Old Medicine </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Name</th>
					<th>Company Name</th>
					<th>Price</th>
					<th>Discount Price</th>
					<th>Stock</th>
					<th>Expiry Date</th>
					
					<th>Status</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if(count($mediciens)):
				foreach($mediciens as $pat_rec): ?>
					<tr>
						<td>
							<center>
								<?php if( empty($pat_rec['med_image']) ): ?>
									<a  class="tooltipped" data-position="top" data-tooltip="<?= $pat_rec['med_name']; ?>">
										<img class="img-circle" src="<?= base_url('public/assets/images/aw.jpg') ?>" width="50"id="doctor_image"/>
									</a>
								    
								<?php else: ?>
								    <a class="tooltipped" data-position="top" data-tooltip="<?= $pat_rec['med_name']; ?>">
									 <img src="<?= base_url().'./public/uploads/medicien_image/'.$pat_rec['med_image']; ?>" class="responsive-img" id="doctor_image" height="50">
								 	</a>
								<?php endif;?>
								
							 </center>
						</td>
						<td>
							<?= $pat_rec['med_name']; ?>
						</td>
						<td>
							<?php
								$get_company_name =  get_doctor_name('mediciens_category',$pat_rec['med_company']);
								
							 ?>
							<?= $get_company_name[0]->company_name; ?>
						</td>
						<td>
							<?= $pat_rec['med_price']; ?>
						</td>
						<td>
							<?= $pat_rec['med_d_price']; ?>
						</td>
						<td>
							<?= $pat_rec['med_stock']; ?>
						</td>
						<td>
							<span class="fa fa-time" style="color: red"><?= date('D, M. d Y',strtotime($pat_rec['expiry_date'])); ?>
							</span><br>
							<span style="color: red">Expire Products</span>
						</td>
						
						<td>
							<?php if($pat_rec['status'] == "Active"):
								echo '<span style="color:green">Active</span>';
								 elseif($pat_rec['status'] == "InActive"):
									echo '<span style="color:red">InActive</span>';
								?>
							<?php endif; ?>
						</td>

						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $pat_rec['id']; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $pat_rec['id']; ?>">
								<li><a href="<?= base_url('Medical_Accountent/delete_expiry_medicine/'.$pat_rec['id']); ?>" onclick="return confirm('Are you sure you want to  delete this Medicine Details?..');"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($pat_rec['status'] == "Active"):  ?>
								<li><a href="<?= base_url('Medical_Accountent/change_exp_medicine_status/'.$pat_rec['id'].'/InActive'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Medical_Accountent/change_exp_medicine_status/'.$pat_rec['id'].'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>
							</ul>
						<!---Action Dropdown --->
						</td>

					</tr>
				<?php endforeach; ?>

				<?php else: ?>
					<div class="card" style="padding: 5px">
						<div class="card-content" style="background: red;padding: 3px;">
							<h6 style="color: white;font-weight: 500;margin-left: 20px;">
								<span class="fa fa-times"></span>&nbsp;Products Not Found</h6>
						</div>
					</div>
				<?php endif; ?>
				<tr>
					<td colspan="7">
						<div id="pagination" style="color: white">
							<?= $pager->links() ?>
						</div>
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