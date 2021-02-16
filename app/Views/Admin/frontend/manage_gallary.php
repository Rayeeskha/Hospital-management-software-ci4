<!DOCTYPE html>
<html>
<head>
	<title>Manage Gallary</title>
	<!---CSS File Include -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;}
        #search_doctor{display: flex;}
		 #search_doctor li:first-child{width: 250px}
		 #doctor_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
		 #doctor_filter li a{color: grey;font-size: 14px;font-weight: 500;}
		 #doctor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
		 td{font-size: 15px;font-weight: 500}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start -->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-images" style="color: #005a87"></span>&nbsp;Manage Gallary Image</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12"> </div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Gallary Image</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Admin/filter_gallary/new_gallary'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-images" style="color: #005a87"></span>&nbsp;New  Gallary </a></li>
						<li><a href="<?= base_url('Admin/filter_gallary/old_gallary'); ?>" class="waves-effect">
							<span class="fa fa-images" style="color: #005a87"></span>&nbsp;Old Gallary </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Status</th>
					<th>Created  Date</th>
					<th style="text-align: center;">Action</th>
				</tr>
				<?php if($gallary):
					count($gallary);
				foreach($gallary as $gal_img): ?>
				
				<tbody>
					<tr>
						<td >
							<a class="tooltipped" data-position="top" data-tooltip="<?= $gal_img->image_title; ?>">
							 <img src="<?= base_url().'./public/uploads/frontend/image_gallery/'.$gal_img->gallary_image; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						</td>
						<td >
							<?= $gal_img->image_title; ?>
						</td>
						<td>
							<!-- <?= $doc_fee->status; ?> -->
							<?php if($gal_img->status == "Active"):
							echo '<span style="color:green">Active</span>';
							 else:
							 	echo '<span style="color:red">InActive</span>';
							?>
						<?php endif; ?>
						</td>
						<td>
							<span class="fa fa-clock" style="color: green">
								<?= date('d M, Y', strtotime($gal_img->created_at)); ?>
							</span>
							
						</td>
						<td>
							<center>
								<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $gal_img->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
							</center>
							<!---Action Dropdown --->
							<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $gal_img->id; ?>">
								<li><a href="<?= base_url('Admin/delete_gallary_image/'.$gal_img->id); ?>" onclick="return confirm('Are you sure you want to  delete this Image Details?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

								<?php if ($gal_img->status == "Active"):  ?>
								<li><a href="<?= base_url('Admin/change_gallary_img_status/'.$gal_img->id.'/InActive'); ?>">
									<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
								InActive</a></li>
								<?php else: ?>
									<li><a href="<?= base_url('Admin/change_gallary_img_status/'.$gal_img->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
								<?php endif; ?>
							</ul>
						<!---Action Dropdown --->
						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">	Gallary  Record Not Found</h6>
				<?php endif; ?>
			</table>
		</div>
	</div>

</div>
<!---Body Section End -->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>