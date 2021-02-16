<!DOCTYPE html>
<html>
<head>
	<title>Hospital Software</title>
	<?= view('Admin/css_file.php'); ?>
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
        h6{font-weight: 500}
        #income_dropdown,#medical_income,#patents_dropdown{width: 200px !important; padding-top: 8px;padding-bottom: 8px;}
		 #income_dropdown a,#medical_income a,#patents_dropdown a{color: grey; font-size: 16px;font-weight: 500}
         tr td{font-weight: 500;font-size: 14px;}
        
	</style>
</head>
<body>
<?= view('Admin/top_bar'); ?>

<!---Body Section Start --->

<!---4Cards Section Start -->
<div class="row" style="margin-top: 10px; margin-bottom: 0px;">
    <div class="col l3 m12 s12">
        <!--Card Section -->
        <div class="card" style=" background: green">
            <div class="card-content" >
                <div class="row" style="margin-bottom: 0px;">
                    <div class="col l4 m4 s4">
                        <h4><span class="fa fa-tasks" style="color: white"></span></h4>
                    </div>
                    <div class="col l8 m8 s8">
                        <h6 class="right-align" style="color: #fff; font-size: 18px; font-weight: 600">Total Doctors</h6>
                        <h4 class="right-align" style="margin-top: 0px; font-weight: 500;color: white">
                            <?php if($doctors): 
                               echo count($doctors);
                            ?>

                            <?php else: ?>
                                <h6 style="color: red">Doctor Not Found</h6>
                            <?php endif; ?>
                        </h4>
                            
                    </div>
                </div>
            </div>
            <div class="card-action">
                <a href="<?= base_url('Admin/manage_doctor'); ?>" style="text-transform: capitalize;font-weight: bold;color: white">View Doctors</a>
            </div> 
        </div> 
        <!--Card Section -->
    </div>
    <div class="col l3 m12 s12">
        <!--Card Section -->
        <div class="card" style="background: red">
             <div class="card-content">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Patients <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="patents_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: white;"><b>
					<span id="show_patent"></span>
				</b> <span class="right"><span class="fa fa-users" style="color:  white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_patent_heading"></span>
				</h6>
			</div>
             
        </div> 
            
        
        <!--Card Section -->
    </div>
    <div class="col l3 m12 s12">
        <!--Card Section -->
        <div class="card" style="background: orange">
            <div class="card-content" id="card_income_image">
				<h6 style="font-size: 19px;color: #fff;font-weight: 550">Medical Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="medical_income" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: #fff;"><b>
					<span id="show_medical_income">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:  white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_medical_heading"></span>
				</h6>
			</div>
             
        </div>  
        <!--Card Section -->
    </div>
      <div class="col l3 m12 s12">
        <!--Card Section -->
        <div class="card" style=" background: blue">
           <div class="card-content" id="card_income_image">
				<h6 style="font-size: 19px;color: white;font-weight: 550">Patients Income <span class="right">
					<span class="fa fa-ellipsis-v dropdown-trigger" data-target="income_dropdown" style="cursor: pointer;"></span></span>
				</h6>
				<h5 style="margin-top: 20px; color: white;"><b>
					<span id="show_income">0</span>
				</b> <span class="right"><span class="fa fa-rupee-sign " style="color:  white"></span></span></h5>
				<h6 style="font-size: 14px;color: red;font-weight: 500">
					<span id="show_income_heading"></span>
				</h6>
			</div>
            
        </div> 
        <!--Card Section -->
    </div>
</div>



<!----Chart Section Script Start ---->
<div class="row">
    <div class="col l5 m12 s12">
        <div class="card">
            <div class="card-content">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col l7 m12 s12">
        <div class="card">
            <div class="card-content" style="border-bottom: 1px solid silver;padding: 5px;">
                <h6 style="font-weight: 500;font-size: 18px;"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Today Appointment <span style="color: red;text-align:center;display: block;">Total Appointment (
                    <?php if($today_appointment): 
                        echo count($today_appointment);?>
                    <?php endif; ?>
                )</span></h6>
            </div>
            <div class="card-content">
                <table class="table" style="overflow-x:auto;">
                    <tr>
                        <th>Name</th>
                       <!--  <th>Email</th> -->
                        <th>Doctor Name</th>
                        <th>Mobile</th>
                        <th>Booked date</th>
                        <th>Booked Time</th>
                        <th>Issue</th>
                        <th style="text-align: center;">Status</th>
                        <th>Action</th>
                    </tr>
                    <?php if($today_appointment):
                    count($today_appointment); ?>
                    <?php foreach($today_appointment as $t_app): ?>
                        <tr>
                            <td>
                                <?= $t_app->patient_name; ?>
                            </td>
                            <!-- <td>
                                <a href="mailto:<?= $t_app->patient_email; ?>"><?= word_limiter($t_app->patient_email, 4); ?></a>
                            </td> -->
                            <td>
                                <?php 
                                    $get_doctor = get_doctor_name('doctor',$t_app->doctor_id); 
                                    echo $get_doctor[0]->doctor_name;
                                ?>
                            </td>
                            <td>
                                <a href="tel:<?= $t_app->patient_mobile; ?>"><?= $t_app->patient_mobile; ?></a>
                            </td>
                            <td>
                                <span class="fa fa-clock" style="color: orange">&nbsp;<?= date('d M, Y', strtotime($t_app->boking_date)); ?></span>
                            </td>
                            <td>
                                <span class="fa fa-clock" style="color: green">&nbsp;<?= date('h:i:s', strtotime($t_app->boking_time)); ?></span>
                            </td>
                            <td style="color: red">
                                <?= $t_app->pateint_issue; ?>
                            </td>
                            <td>
                                <?php if($t_app->status == "Appointment"):
                                echo '<span style="color:green">Appointment</span>';
                                 elseif($t_app->status == "Active"):
                                    echo '<span style="color:blue">Active</span>';
                                ?>
                            <?php endif; ?>
                            </td>
                            <td>
                                <center>
                                    <a href="#!" class="btn btn-flat btn-floating dropdown-trigger" data-target="action_dropdown_<?= $t_app->id; ?>"><span class="fa fa-ellipsis-v"></span></a>
                                </center>

                        <!---Action Dropdown --->
                        <ul class="dropdown-content action_dropdown" id="action_dropdown_<?= $t_app->id; ?>">
                            
                            <li><a href="<?= base_url('Admin/delete_appointment/'.$t_app->id); ?>" onclick="return confirm('Are you sure you want to  delete this Appointment Details ?..');" style="border-bottom: 1px dashed silver"><span class="fa fa-trash" style="color: red;"></span>&nbsp;Delete</a></li>

                            <?php if ($t_app->status == "Appointment"):  ?>
                            <li><a href="<?= base_url('Admin/change_Appointment_status/'.$t_app->id.'/Active'); ?>">
                                <span class="fa  fa-eye-slash" style="color: red"></span>&nbsp;
                            Active</a></li>
                            <?php else: ?>
                                <li><a href="<?= base_url('Admin/change_Appointment_status/'.$t_app->id.'/Active'); ?>"><span class="fa fa-eye" style="color: #005a87"></span>&nbsp;Inactive</a></li>
                            <?php endif; ?>
                        </ul>
                        <!---Action Dropdown --->
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <h6 style="color: red;font-weight: 500;font-size: 15px;">Not any Appointment</h6>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!----Chart Section Script End ---->


<!---Dropdown Section Start --->
<ul class="dropdown-content" id="income_dropdown">
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_income('today')">Today Income</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_income('yesterday')">Privious Day Income</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_income('last_30_days')">Last 30 Days Income</a></li>
	<div class="divider"></div>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_income('all')">All Income</a></li>
</ul>
<ul class="dropdown-content" id="medical_income">
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_medical_income('today')">Today Income</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_medical_income('yesterday')">Privious Day Income</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_medical_income('last_30_days')">Last 30 Days Income</a></li>
	<div class="divider"></div>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_medical_income('all')">All Day Income</a></li>
</ul>
<ul class="dropdown-content" id="patents_dropdown">
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_patents('today')">Today Patients</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_patents('yesterday')">Privious Day Patients</a></li>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_patents('last_30_days')">Last 30 Days  Patients</a></li>
	<div class="divider"></div>
	<li style="border-bottom: 1px dashed silver"><a href="#!" onclick="count_patents('all')">All Patients</a></li>
</ul>
<!---Dropdown Section End --->

<!---Body Section End --->
<?= view('Admin/js_file.php'); ?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<!---Custome Js file Include --->
<?= view('Admin/custom_js.php'); ?>
<!---Custome Js file Include --->


</body>
</html>