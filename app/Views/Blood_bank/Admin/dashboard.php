<!DOCTYPE html>
<html>
<head>
	<title>Blood Bank Dashboard</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		#donor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
     tr td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->
<!------Body Section Start ----->
<div class="row">
	<div class="col l4 m12 s12">
		<div class="card" style="background: red">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
                        <h4><span class="fa fa-tasks" style="color: white"></span></h4>
                    </div>
                    <div class="col l8 m8 s8">
                        <h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Blood Available</h6>
                        <h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
                            <?php if($blood_available):
                            count($blood_available);
                            $count_blood = 0; 
                            foreach($blood_available as $total_unit):
                            	$count_blood += $total_unit->blood_unit;
							?>
                            <?php endforeach; ?>
                            	<h5 class="right-align" style="color: white"><span class="fa fa-bug">&nbsp;<?= $count_blood; ?> : Unit</span></h5>
                            <?php else: 
                            	echo "0";
                            ?>
                            <?php endif; ?>
                        </h4>
                            
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="card" style="background: blue">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
                        <h4><span class="fa fa-users" style="color: white"></span></h4>
                    </div>
                    <div class="col l8 m8 s8">
                        <h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Blood Donors</h6>
                        <h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
                           <?php if($donors):
                           echo count($donors); ?>
                           <?php else: echo "0"; ?>
                           <?php endif; ?>
                        </h4>
                            
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col l4 m12 s12">
		<div class="card" style="background: green">
			<div class="card-content">
				<div class="row" style="margin-bottom: 0px;">
					<div class="col l4 m4 s4">
                        <h4><span class="fa fa-users" style="color: white"></span></h4>
                    </div>
                    <div class="col l8 m8 s8">
                        <h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Blood Buyers</h6>
                        <h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
                            <?php if($donor_blood_sale):
                            $count = count($donor_blood_sale); ?>
                            <?php else: echo "0"; ?>
                            <?php endif; ?>
                            <?php if($has_blood_sale):
                            $count_two = count($has_blood_sale); 
                            	$total_sale = $count + $count_two;
                            	echo number_format($total_sale);
                            ?>
                            <?php else: echo "0"; ?>
                            <?php endif; ?>
                        </h4>
                            
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="background: blue; border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500;color: white"><span class="fa fa-bug" style="color: #fff"></span>&nbsp;Blood Donor's Details</h5>
		</div>
		<div class="card-content">
			<div class="card-content">
			<table class="table">
				<tr>
					<th style="text-align: center;">Image</th>
					<th>Donor Name</th>
					<th>Blood Group</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Status</th>
					<th>Created Date</th>
					<th style="text-align: center;">Request</th>
				</tr>
				<?php if($donor_details):
				count($donor_details);
				foreach($donor_details as $search_donors): ?>
					<tr>
						<td>
							<center>
								<a class="tooltipped" data-position="top" data-tooltip="<?= $search_donors->donor_name; ?>">
								 <img src="<?= base_url().'./public/uploads/donar_users/'.$search_donors->donor_image; ?>" class="responsive-img" id="donor_image" height="50">
							 	</a>
							 </center>
						</td>
						<td>
							<?= $search_donors->donor_name; ?>
						</td>
						<td style="color: red">
							<?= $search_donors->blood_group; ?>
						</td>
						<td>
							<a href="tel:<?= $search_donors->contact_number; ?>"><?= $search_donors->contact_number; ?></a>
						</td>
						<td>
							<?= $search_donors->address; ?>
						</td>
						<td>
							<?php if($search_donors->status == "Active"):
								echo '<span style="color:green">Active</span>';
								 elseif($search_donors->status == "InActive"):
									echo '<span style="color:red">InActive</span>';
								?>
							<?php endif; ?>
						</td>
						<td>
							<span  class="fa fa-clock" style="color: green" >&nbsp;<?= date('d M, Y, h:i:s', strtotime($search_donors->created_at)); ?></span>
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $search_donors->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>

							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $search_donors->id; ?>">
								<li><a href="<?= base_url('Blood_bank/blood_response_data/'.$search_donors->id); ?>"><span class="fa fa-eye" style="color: #005a87;"></span>&nbsp;Response</a></li>
							</ul>
							<!---Action Dropdown --->
						</td>
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Not Any Donors</h6>
				<?php endif; ?>
			</table>
		</div>
		</div>
	</div>
</div>


<!------Body Section Start ----->
<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
</body>
</html>