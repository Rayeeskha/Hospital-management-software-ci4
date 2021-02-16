<!DOCTYPE html>
<html>
<head>
	<title>Manage Blogs</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Doctor/top_bar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start  ---->
<div style="margin-left: 15px; margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Manage Blogs Content</h5>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<!--Search Bar & Filter Bar Section Start -->
			<div class="row">
				<div class="col l6 m6 s12"></div>
				<div class="col l6 m6 s12">
					<span class="right">
						<button type="button" class="btn waves-effect waves-light dropdown-trigger" data-target="doctor_filter" style="background: #005a87;box-shadow: none;text-transform: capitalize;height: 38px;margin-top: 15px;">
							<span class="fa fa-filter">&nbsp;Filter Blogs</span>
						</button>
					</span>
					<!---Student filter -->
					<ul class="dropdown-content" id="doctor_filter">
						
						<li><a href="<?= base_url('Doctor/filter_blogs/new_blogs'); ?>" class="waves-effect" style="border-bottom: 1px dashed silver">
							<span class="fa fa-images" style="color: #005a87"></span>&nbsp;New  Blogs </a></li>
						<li><a href="<?= base_url('Doctor/filter_blogs/old_blogs'); ?>" class="waves-effect">
							<span class="fa fa-images" style="color: #005a87"></span>&nbsp;Old Blogs </a></li>
					</ul>
				</div>	
			<!--Search Bar & Filter Bar Section End -->
		</div>
		
	</div>
	<div class="card-content">
		<table class="table">
			<th>Blog Image</th>
			<th>Blog Title</th>
			<th>Blog Content</th>
			<th>Doctor Name</th>
			<th>Department</th>
			<th>Post Date</th>
			<th>Post Months</th>
			<th>Post Year</th>
			<th>Status</th>
			
			<th style="text-align: center;">Action</th>
		<?php if($blogs_content):
			count($blogs_content); ?>	
		<?php foreach($blogs_content as $blog): ?>	
			<tr>
				<td>
					<center>
						<a class="tooltipped" data-position="top" data-tooltip="<?= $blog->blog_title; ?>">
						<img src="<?= base_url().'./public/uploads/frontend/blog_image/'.$blog->blog_image; ?>" class="responsive-img" id="doctor_image" height="50">
						</a>
				   </center>
				</td>
				<td>
					<?= word_limiter($blog->blog_title, 4); ?>
				</td>
				<td>
					<?= word_limiter($blog->blog_content, 4); ?>
				</td>
				<td>
					<?php
						$get_doctor =  get_doctor_name('doctor',$blog->doctor_id);
					?>
					<center>
						<a class="tooltipped" data-position="top" data-tooltip="<?= $get_doctor[0]->doctor_name; ?>">
							<img src="<?= base_url().'./public/uploads/doctor/'.$get_doctor[0]->doctor_image; ?>" class="responsive-img" id="doctor_image" height="50">
						</a>
					</center>
				</td>
				<td>
					<?= $blog->department_name; ?>
				</td>
				<td>
					<?= $blog->created_date; ?>
				</td>
				<td>
					<?= $blog->created_month; ?>
				</td>
				<td>
					<?= $blog->created_year; ?>
				</td>
				<td>
					<?php if($blog->status == "Preview"):
						echo '<span style="color:red">Preview</span>';
					else:
						echo '<span style="color:green">Active</span>';
					?>
					<?php endif; ?>
				</td>
				
				<td>
					<center>
						<a href="#!" class="btn  btn-waves-effect waves-light dropdown-trigger" data-target="action_dropdown_<?= $blog->id; ?>" style="background: #005a87;text-transform: capitalize;font-weight: 500"> Action</a>
					</center>
					<!---Action Dropdown --->
					<ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $blog->id; ?>">
						<li><a href="<?= base_url('Doctor/delete_blogs/'.$blog->id); ?>" onclick="return confirm('Are you sure you want to  delete this Post?..');"  style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>
						<?php if ($blog->status == "Preview"):  ?>
							<li><a href="<?= base_url('Doctor/change_blog_status/'.$blog->id.'/Active'); ?>">
								<span class="fa  fa-eye" style="color: green"></span>&nbsp;
								Active</a></li>
							<?php else: ?>
							<li><a href="<?= base_url('Doctor/change_blog_status/'.$blog->id.'/Preview'); ?>"><span class="fa fa-flash" style="color: #005a87"></span>&nbsp;Preview</a></li>
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
						<span class="fa fa-times"></span>&nbsp;Blogs Not Found</h6>
				</div>
			</div>
			
		<?php endif; ?>
	</table>		
	</div>
</div>
<!---Body Section End  ---->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>