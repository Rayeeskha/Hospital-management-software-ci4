<!DOCTYPE html>
<html>
<head>
	<title>Book Doctor Appointment</title>
	<!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->
    <style type="text/css">
    	body{background: rgb(224, 227, 231)}
    </style>
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  --->
<br><br><br><br><br>
<!----Body Section Start---->
<div class="container">
	<div style="margin-left: 15px;margin-right: 15px;">
		<?= form_open('Home/book_appointment'); ?>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label class="control-label">Your name <span class="required">*</span>
                    </label>
                    <input type="text" name="name" class="wp-form-control wpcf7-text" placeholder="Your name">
                    <span style="color: red"><?= display_error($validation,'name'); ?></span>
                </div>
                <div class="col-md-6 col-sm-6">
                    <label class="control-label">Your Email <span class="required">*</span>
                    </label>
                    <input type="mail" name="email" class="wp-form-control wpcf7-email" placeholder="Email address">  
                    <span style="color: red"><?= display_error($validation,'email'); ?></span> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label class="control-label">Symptoms <span class="required">*</span>
                    </label>
                    <input type="text" name="Symptoms" class="wp-form-control wpcf7-text" placeholder="Enter Issue Symptoms">
                    <span style="color: red"><?= display_error($validation,'Symptoms'); ?></span> 
                </div>
                <div class="col-md-6 col-sm-6">
	                <label class="control-label">Your Phone <span class="required">*</span>
	                </label>
	                <input type="text" name="mobile" class="wp-form-control wpcf7-text" placeholder="Phone No"> <span style="color: red"><?= display_error($validation,'mobile'); ?></span> 
	            </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label class="control-label">Appointment Date <span class="required">*</span>
                    </label>
                    <input type="date" name="appointment_date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy">
                    <span style="color: red"><?= display_error($validation,'appointment_date'); ?></span>
                </div>
                <div class="col-md-6 col-sm-6">
                    <label class="control-label">Appointment Time <span class="required">*</span>
                    </label>
                    <input type="time" name="appointment_time" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy">
                    <span style="color: red"><?= display_error($validation,'appointment_time'); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <label class="control-label">Select Department <span class="required">*</span>
                    </label>
                    <select class="wp-form-control wpcf7-select"  name="department">
                    	<option selected="" disabled="">Select Department</option>
                    	<?php if($department):
                    	count($department);
                    	foreach($department as $dep): ?>
                    		<option value="<?= $dep->department_name ?>"><?= $dep->department_name ?></option>
                    	<?php endforeach; ?>
                    	<?php else: ?>
                    		<h6 style="color: red">Department Not Found</h6>
                    	<?php endif; ?>
                    </select>
                    <span style="color: red"><?= display_error($validation,'department'); ?></span>
				</div>
				<input type="hidden" name="doctor_id" value="<?= $doctors[0]->id; ?>">      
            	<input type="hidden" name="doctor_name" value="<?= $doctors[0]->doctor_name; ?>">      
            </div>   
            	
                <textarea class="wp-form-control wpcf7-textarea" name="description" cols="30" rows="10" placeholder="What would you like to tell us"></textarea>
                <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-share"></i><span>Book Appointment</span></button>  
        <?= form_close(); ?>
	</div>
</div>

<!----Body Section End---->
<!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
<!--=========== End Footer SECTION ================-->
<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->
</body>
</html>