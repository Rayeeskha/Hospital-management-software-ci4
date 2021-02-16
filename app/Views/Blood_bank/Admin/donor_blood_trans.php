<!DOCTYPE html>
<html>
<head>
	<title>Donor Blood Transition</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<style type="text/css">
		select{display: block;}
		select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;width: 100%}
		h6{font-weight: 500;font-size: 16px;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
		#input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!-----Donor Blood Transition ------>
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-users" style="color: #005a87"></span>&nbsp;Donor Blood Transition</h5>
		</div>
		<?= form_open_multipart('Blood_bank/donor_blood_transition'); ?>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<h6>Select Blood Group</h6>
			<select name="blood_group" id="blood_group">
				<option selected="" disabled="">----Select Blood Transition ----</option>
				<?php if($donor_blood):
				count($donor_blood);
				foreach($donor_blood as $blood): ?>
					<option value="<?= $blood->id; ?>"><?= $blood->blood_group; ?></option>
				<?php endforeach; ?>
				<?php else: ?>
					<h6 style="color: red;font-weight: 500;">Blood Group Not Found</h6>
				<?php endif; ?>
			</select>
			<span style="color: red"><?= display_error($validation,'blood_group'); ?></span>
			<h6>Blood Price</h6>
			<select id="blood_price" name="blood_price">
				<option value="" ></option>
			</select>
			<h6>Blood Unit</h6>
			<select id="blood_unit" name="blood_unit">
				<option value="" ></option>
			</select>
			<h6>Selling Blood Group</h6>
			<select id="blood_group_sale" name="blood_group_sale">
				<option value="" ></option>
			</select>
			<h6>User Name</h6>
			<input type="text" name="username" value="<?= set_value('username'); ?>" id="input_box" placeholder="Enter Blood Needed Username">
			<span style="color: red"><?= display_error($validation,'username'); ?></span>
			<h6>Mobile</h6>
			<input type="number" name="mobile" value="<?= set_value('mobile'); ?>" id="input_box" placeholder="Enter Blood Needed User Mobile">
			<span style="color: red"><?= display_error($validation,'mobile'); ?></span>
			<h6>Email</h6>
			<input type="text" name="email" value="<?= set_value('email'); ?>" id="input_box" placeholder="Enter Blood Needed User Email">
			<h6>Photo</h6>
			<input type="file" name="photo" id="input_file" required="">

			<h6>Address</h6>
			<textarea placeholder="Enter Needed User Address" name="address" value="<?= set_value('address'); ?>"></textarea>
			<span style="color: red"><?= display_error($validation,'address'); ?></span>
			<center>
				<button type="submit" class="btn btn-waves-effect waves-light" style="background: red;font-weight: 500;text-transform: capitalize;">Blood Transition</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<!-----Donor Blood Transition ------>

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->

<script type="text/javascript">
	//Blood Donor Group Depedencies
      $(document).ready(function(){
 			$('#blood_group').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : '<?php echo site_url('Blood_bank/get_blood_price/');?>'+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var uhtml = '';
                        var bhtml = '';
                        var i;
                        var j;
                        var k;
                        for(i=0; i<data.length; i++){
                        	 html += '<option value='+data[i].selling_price+'>'+data[i].selling_price+'</option>';
                            $('#blood_price').html(html);    
						}
						for(j=0; j<data.length; j++){
                        	 uhtml += '<option value='+data[j].blood_unit+'>'+data[j].blood_unit+'</option>';
                            $('#blood_unit').html(uhtml);    
						}
						for(k=0; k<data.length; k++){
                        	 bhtml += '<option value='+data[k].blood_group+'>'+data[k].blood_group+'</option>';
                            $('#blood_group_sale').html(bhtml);    
						}
                    }
                });
                return false;
            }); 
             
        });
    //Blood Donor Group Depedencies
</script>
</body>
</html>