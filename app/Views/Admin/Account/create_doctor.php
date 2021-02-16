<!DOCTYPE html>
<html>
<head>
	<title>Create Doctor Account</title>
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
<!---Body Section Start --->
<div class="container">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-key" style="color: #005a87"></span>&nbsp;Create Doctor Account</h5>
		</div>
		<?= form_open_multipart('Login/Create_doctor_account'); ?>
		<div class="card-content">
			<div class="row">
				<div class="col l12  m12 s12">
					<h6>Selct Doctor Name</h6>
					<select name="selected_name" id="selected_name"> value="<?= set_value('doctor_name'); ?>">
						<option selected="" disabled="">Select doctor  Name</option>
						<?php if(count($doctor)):
						foreach($doctor as $doc): ?>
							<option value="<?= $doc->id; ?>"><?= $doc->doctor_name; ?></option>
						<?php endforeach; ?>
						<?php else: ?>
							<h6 style="color: red">Select Doctor Name</h6>
						<?php endif; ?>
					</select>
					<span style="color: red"><?= display_error($validation,'doctor_name'); ?></span>
				</div>
				<div class="col l6 m6 s12">
					<h6>Doctor Name</h6>
					<select name="doctor_name" id="doctor_name">
						<option value=""></option>
					</select>
					<h6>Gender</h6>
					<select name="gender" >
						<option selected="" disabled="">----Select Gender----</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
					<span style="color: red"><?= display_error($validation,'gender'); ?></span>
					<h6>Password</h6>
					<input type="text" name="password" id="input_box" placeholder="Password" value="<?= set_value('password'); ?>">
					<span style="color: red"><?= display_error($validation,'password'); ?></span>
					
				</div>
				<div class="col l6 m6 s12">
					<h6>Doctor Email</h6>
					<select name="doctor_email" id="doctor_email"> 
						<option selected=""></option>	
					</select>
					<span style="color: red"><?= display_error($validation,'doctor_email'); ?></span>
					<h6>Confirm Password</h6>
					<input type="text" name="conf_password" id="input_box" placeholder="Confirm Password" value="<?= set_value('conf_password'); ?>">
					<span style="color: red"><?= display_error($validation,'conf_password'); ?></span>
					<h6>Doctor Mobile</h6>
					<input type="number" name="mobile" id="input_box" value="<?= set_value('mobile'); ?>" placeholder="Enter Mobile Number">
				<span style="color: red"><?= display_error($validation,'mobile'); ?></span>
				</div>
				<br>
				
				
				<center>
					<button type="submit" class="btn btn-waves-effect waves-light" style="background: #005a87;text-transform: capitalize;font-weight: 500">Create Account</button>
				</center>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!---Body Section End --->
<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->

<script type="text/javascript">
	$(document).ready(function(){
 
            $('#selected_name').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : '<?php echo site_url('Login/get_doctor_data/');?>'+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var ehtml = '';
                        var i;
                        var j;
                        for(i=0; i<data.length; i++){
                        	 html += '<option value='+data[i].doctor_email+'>'+data[i].doctor_email+'</option>';
                            $('#doctor_email').html(html);    
						}
						for(j=0; j<data.length; j++){
                        	 ehtml += '<option value='+data[j].doctor_name+'>'+data[j].doctor_name+'</option>';
                            $('#doctor_name').html(ehtml);    
						}

                    }
                });
                return false;
            }); 
             
        });
</script>
</body>
</html>