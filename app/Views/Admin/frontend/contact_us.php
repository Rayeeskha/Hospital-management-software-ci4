<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<!----Css file Included ---->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Included ---->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-share" style="color: #005a87"></span>&nbsp;Manage Messages</h5>
		</div>
	
	<div class="card-content" style="border-bottom: 1px dashed silver">
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Subject</th>
				<th>Message</th>
			</tr>
			<?php if($contact_us):
			count($contact_us);
			foreach($contact_us as $contact): ?>
				<tr>
					<td>
						<?= $contact->name; ?>
					</td>
					<td>
						<a href="mailto:<?= $contact->email; ?>"><?= $contact->email; ?></a>
					</td>
					<td>
						<a href="tel:<?= $contact->mobile; ?>"><?= $contact->mobile; ?></a>
					</td>
					<td>
						<?= $contact->subject; ?>
					</td>
					<td>
						<?= $contact->message; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			<?php else: ?>
			<?php endif; ?>
		</table>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>