<!DOCTYPE html>
<html>
<head>
	<title>Manage Slider Image</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start -->
<div style="margin-left: 15px; margin-right: 15px">
<div class="card">
	<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Manage Slider Image</h5>
		</div>
	<div class="card-content">
		<table class="table">
			<tr>
				<th style="text-align: center;">Slider Image</th>
				<th>Image Title</th>
				<th>Website Link</th>
				<th>Image Discription</th>
				<th>Status</th>
				<th style="text-align: center;">Action</th>
			</tr>
			<?php if($slider):
				count($slider); 
				foreach($slider as $doc):?>
			<tbody>
				<tr>
					<td>
						<center>
							<a class="tooltipped" data-position="top" data-tooltip="<?= $doc->image_title; ?>">
							 <img src="<?= base_url().'./public/uploads/frontend/slider/'.$doc->image_gallery; ?>" class="responsive-img" id="doctor_image" height="50">
						 	</a>
						 </center>
					</td>
					<td>
						<?= word_limiter($doc->image_title, 4); ?>
					</td>
					
					<td>
						<a href="<?= $doc->website_link; ?>" target="_blank"><?= $doc->website_link; ?></a>
					</td>
					<td>
						<?= word_limiter($doc->image_discription, 4); ?>
					</td>
					<td>
						<?php if($doc->status == "Active"):
							echo '<span style="color:green">Active</span>';
							 elseif($doc->status == "InActive"):
								echo '<span style="color:red">InActive</span>';
							?>
						<?php endif; ?>
					</td>
					<td>
						<center>
							<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $doc->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
						</center>

						<!---Action Dropdown --->
						<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $doc->id; ?>">
							<li><a href="<?= base_url('Admin/edit_slider_image/'.$doc->id); ?>" style="border-bottom: 1px dashed silver"><span class="fa fa-edit" style="color: green;"></span>&nbsp;Edit</a></li>
							<li><a href="<?= base_url('Admin/delete_slider/'.$doc->id); ?>" onclick="return confirm('Are you sure you want to  delete this Slider Image ?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

							<?php if ($doc->status == "Active"):  ?>
							<li><a href="<?= base_url('Admin/change_slider_image_status/'.$doc->id.'/InActive'); ?>">
								<span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
							InActive</a></li>
							<?php else: ?>
								<li><a href="<?= base_url('Admin/change_slider_image_status/'.$doc->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Active</a></li>
							<?php endif; ?>
						</ul>
						<!---Action Dropdown --->
					</td>

				</tr>

			</tbody>
		<?php endforeach; ?>
		<?php else: ?>
			<h6 style="color: red;">Slider Image  Not Found</h6>
		<?php endif; ?>
		</table>		
	</div>
</div>

<!---Body Section End--->
<!---Body Section End -->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>