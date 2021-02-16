<!DOCTYPE html>
<html>
<head>
	<title>Add Department</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
        h6{font-weight: 500}

        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		 #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
		 select{display: block;}
		#select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
		
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		span{cursor: pointer;}
		h6{font-weight: 500}
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start -->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-tasks"></span>&nbsp;Add Department</h5>
		</div>
		<div class="card-content">
			<?= form_open_multipart('Admin/upload_department'); ?>	
				<h6>Department Name</h6>
				<input type="text" name="department_name" value="<?= set_value('department_name'); ?>" id="input_box" placeholder="Enter Department Name">
				<span style="color: red"><?= display_error($validation,'department_name'); ?></span>
				<h6>Department Discription</h6>
					<textarea name="dep_desc" placeholder="Department Discription"></textarea>
				<center>
					<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87"><span class="fa fa-tasks"></span>&nbsp;Add Department</button>
				</center>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!---Body Section Start -->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>