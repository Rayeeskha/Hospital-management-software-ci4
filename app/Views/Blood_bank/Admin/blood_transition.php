<!DOCTYPE html>
<html>
<head>
	<title>Blood Transition</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		select{display: block;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		h6{font-weight: 500;font-size: 15px;}
		select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;width: 100%}
		#input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Blood Transition</h5>
		</div>
		<?= form_open_multipart('Blood_bank/upload_blood_transition'); ?>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h6>Choose Blood Group</h6>
			<select name="blood_group" id="blood_group">
				<option selected="" disabled="">---Select Blood Group ----</option>
				<?php if($blood_transition):
				count($blood_transition);
				foreach($blood_transition as $bld_trans): ?>
					<option value="<?= $bld_trans->id; ?>"><?= $bld_trans->blood_group; ?></option>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;">Blood Not Found</h6>
				<?php endif; ?>
			</select>
			<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'blood_group'); ?></span>
			<h6>Blood Price 1 Unit</h6>
			<select id="blood_price" name="blood_price">
				<option value=""></option>
			</select>
			<h6>Selling Blood Group</h6>
			<select id="sale_blood_group" name="sale_blood_group">
				<option value=""></option>
			</select>
			<h6>Username</h6>
			<input type="text" name="username" id="input_box" placeholder="Enter Username">
			<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'username'); ?></span>
			<h6>Mobile Number</h6>
			<input type="number" name="mobile" id="input_box" placeholder="Enter Mobile Number">
			<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'mobile'); ?></span>
			<h6>Photo</h6>
			<input type="file" name="photo" id="input_file" required="">
			<h6>Email</h6>
			<input type="email" name="email" id="input_box" placeholder="Enter Email Address">
			<h6>Blood Unit</h6>
			<input type="text" name="blood_unit" id="input_box" placeholder="Enter Blood Unit">
			<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'blood_unit'); ?></span>
			<h6>Address</h6>
			<textarea name="address" placeholder="Enter Address"></textarea>
			<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'address'); ?></span>
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Blood Transition</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->

<script type="text/javascript">
	//Blood Price Indipendece 
	$(document).ready(function(){
 
            $('#blood_group').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : '<?php echo site_url('Blood_bank/get_blood_price_one_unit/');?>'+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var bhtml = '';
                        var i;
                        var j;
                        for(i=0; i<data.length; i++){
                        	 html += '<option value='+data[i].blood_price+'>'+data[i].blood_price+'</option>';
                            $('#blood_price').html(html);    
						}
						for(j=0; j<data.length; j++){
                        	 bhtml += '<option value='+data[j].blood_group+'>'+data[j].blood_group+'</option>';
                            $('#sale_blood_group').html(bhtml);    
						}
                    }
                });
                return false;
            }); 
             
        });
	//Blood Price Indipendece 
</script>
</body>
</html>