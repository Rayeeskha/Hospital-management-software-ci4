<!DOCTYPE html>
<html>
<head>
	<title>Donor Blood Transition</title>
	<!----Css file Include --->
	<?= view('Admin/css_file.php'); ?>
	<!----Css file Include --->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		h6{font-weight: 500;font-size: 15px;}
		#blood_group{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;border-radius: 3px}
		select{display: block;}
		textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
	</style>
</head>
<body>
<!----Top Bar Section Start ---->
<?= view('Blood_bank/Admin/top_bar'); ?>
<!----Top Bar Section Start ---->

<!-----Body Section Start ----->
<div class="container">
	<div class="card">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
			<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-user" style="color: green"></span>&nbsp;Buy Donor Blood</h5>
		</div>
		<?= form_open('Blood_bank/buy_blood_donor'); ?>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m12 s12">
					<h6>Blood Donor Name</h6>
					<select id='blood_donors' name="blood_donors" style='width: 100%;'>
			        	 <option selected="" disabled="">-- Select Blood Donors Name --</option> 
			        <?php if($blood_donor):
						count($blood_donor);
						foreach($blood_donor as $donors):
					 ?> 
			        <option value='<?= $donors->id; ?>'><?= $donors->donor_name; ?></option>  
			        <?php endforeach; ?>
			        </select> 
			   		<?php else: ?>
				    	<h6 style="color: red">Blood Donors Not Found</h6>
				    <?php endif; ?>
					 <br/><br>
					<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'blood_donors'); ?></span>
					 <h6>Blood Unit</h6>
					 <input type="text" name="blood_unit" id="input_box" placeholder="Enter Blood Unit">
					 <span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'blood_unit'); ?></span>
				</div>
				<div class="col l6 m12 s12">
					<h6>Blood Goup</h6>
					<select name="blood_group" id="blood_group">
						<option value="" ></option>
					</select>
					<h6>Blood Price</h6>
					<input type="text" name="blood_price" id="input_box" placeholder="Enter Blood Price">
					<span style="color: red;font-weight: 500;font-size: 15px;"><?= display_error($validation,'blood_price'); ?></span>
				</div>
			</div>
			<center>
				<button type="submit" id="btn_register_now" class="btn btn-waves-effect waves-light" style="text-transform: capitalize;font-weight: 500;font-size: 16px;background: #005a87;margin-top: 30px;"><span class="fa fa-user"></span>&nbsp;Buy Donor Blood</button>
			</center>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<!-----Body Section End   ----->

<!----Js File Include ---->
<?= view('Admin/js_file.php'); ?>
<!----Js File Include ---->
<script type="text/javascript" src="<?= base_url('public/assets/select2/dist/js/select2.min.js'); ?>"></script>
 <script>
    $(document).ready(function(){
       // Initialize select2
     	$("#blood_donors").select2();
			
        });

    //Blood Donor Group Depedencies
      $(document).ready(function(){
 
            $('#blood_donors').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : '<?php echo site_url('Blood_bank/get_donor_blood_group/');?>'+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                        	 html += '<option value='+data[i].blood_group+'>'+data[i].blood_group+'</option>';
                            $('#blood_group').html(html);    
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