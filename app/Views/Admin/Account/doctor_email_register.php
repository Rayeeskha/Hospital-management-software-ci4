<!DOCTYPE html>
<html>
<head>
	<title>Doctor Email Registerd</title>
	<!---Css File Include --->
	<?= view('Admin/css_file.php'); ?>
	<!---Css File Include --->
	<style type="text/css">
		 body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<!---Body Section Start --->
<div class="container">
	<div class="card" style="background: green">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h6 style="color: white"><span class="fa fa-users"></span>&nbsp;Register Doctor Email</h6>
		</div>
		<div class="card-content" style="background: white">
			<table class="table">
				<tr>
					<th>Doctor Name</th>
					<th>Doctor Email</th>
					<th>Doctor Phone</th>
					<th>Status</th>
					<th>Request Date</th>
				</tr>
				<?php if($request_email):
					count($request_email);
					foreach($request_email as $req_email): ?>
						<tr>
							<td>
								<?= $req_email->doctor_name; ?>
							</td>
							<td>
								<a href="mailto:<?= $req_email->doctor_email; ?>"><?= $req_email->doctor_email; ?></a>
							</td>
							<td>
								<a href="tel:<?= $req_email->doctor_phone; ?>"><?= $req_email->doctor_phone; ?></a>
							</td>
							<td style="color: green">
								<?= $req_email->status; ?>
							</td>
							<td>
								<span class="fa fa-clock" style="color: green;">&nbsp;<?= date('D, M. d Y', strtotime($req_email->created_at)); ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red">Email Not Found</h6>
				<?php endif; ?>
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