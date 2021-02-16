<!DOCTYPE html>
<html>
<head>
	<title>Update Doctor Fee Details </title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		h6{font-weight: 500}
		#input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block;}
		select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		span{cursor: pointer;}
		h6{font-weight: 500}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content">
			<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
				<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Update Doctor Details</h5>
			</div>

			<?= form_open('Admin/update_doctor_fee/'.$update_doctor_fee[0]->id); ?>	
			<div class="row">
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-user" style="color: #005a87"></span>&nbsp;Doctor Name</h6>
					<select name="doctor_name">
					<?php if(count($doctors)):
						foreach($doctors as $doc):
					 ?>
					 <?php if($update_doctor_fee[0]->doctor_name == $doc->doctor_name): ?>
						<option value="<?= $doc->doctor_name; ?>" selected><?= $doc->doctor_name; ?></option>
						<?php else: ?>
						<option value="<?= $doc->doctor_name; ?>" ><?= $doc->doctor_name; ?></option>
						<?php endif; ?>
					<?php endforeach;
					else: ?>
							<option value="">Doctor Not Found's</option>
					<?php endif; ?>
				</select>
				</div>
				<div class="col l6 m6 s6">
					<h6><span class="fa fa-globe" style="color: #005a87"></span>&nbsp;Doctor Fee</h6>
					<input type="number" name="doctor_fee" id="input_box" value="<?= $update_doctor_fee[0]->doctor_fee; ?>" required>
					
				</div>
				
				<br>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-user"></span>&nbsp;Update Dotor Fee</button>
				</center>
			<?= form_close(); ?>
		
		</div>
	</div>
</div>


<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>