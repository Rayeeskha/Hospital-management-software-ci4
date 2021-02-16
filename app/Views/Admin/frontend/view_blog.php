<!DOCTYPE html>
<html>
<head>
	<title>View Blogs</title>
	<!---Include Css File --->
	<?= view('Admin/css_file.php'); ?>
	<!---Include Css File --->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start ---->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Publish Blogs Post Content</h5>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col l2 m2 s2">
					<h6 style="text-align: center;color: green;">
						<span style="border-bottom:  1px solid silver"><?= $blogs[0]->created_date ?></span>
					</h6>
					<h6 style="text-align: center;color: green">
						<span style="border-bottom: 1px solid silver;"><?= $blogs[0]->created_month ?></span>
					</h6>
					<h6 style="text-align: center;color: green">
						<span style="border-bottom: 1px solid silver;"><?= $blogs[0]->created_year ?></span>
					</h6>
				</div>
				<div class="col l10 m10 s10">
					<img src="<?= base_url('public/uploads/frontend/blog_image/'.$blogs[0]->blog_image); ?>" style="width: 100%;height: 300px;">
					<div class="row">
						<div class="col l6 m6 s6">
							<h6 style="font-weight: 500;font-size: 14px;">By : <?= $blogs[0]->doctor_name;?></h6> 
						</div>
						<div class="col l6 m6 s6">
							<h6 style="font-weight: 500;font-size: 14px;">In : <?= $blogs[0]->department_name; ?></h6>
						</div>
					</div>
					<h6 style="font-weight: 500;font-size: 18px;"><?= $blogs[0]->blog_title; ?></h6>
					<h6 style="font-weight: 500;font-size: 16px;"><?= $blogs[0]->blog_content; ?></h6>
				</div>
			</div>
		</div>
	</div>
</div>
<!---Body Section End ---->


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>