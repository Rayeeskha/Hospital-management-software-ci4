<style type="text/css">
  body{background: rgb(224, 227, 231)}
    nav{background: #005a87; height: 60px;line-height: 60px;}
        nav .brand-logo{font-size: 20px;font-weight: 500;}
        .collapsible-header{padding-left:30px !important; font-size: 14px;font-weight: 500;color: black }
        .collapsible-header:hover{background: pink !important; }
         #side_menu li a:hover{background: pink !important; }
         #side_menu{background: rgb(224, 227, 231)}
         #side_menu .collapsible-body{background:black;}
         #side_menu .collapsible-body li a{color: white}
         #side_menu .collapsible-body li a:hover{background: red !important} 
        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;}     
</style>

  <div class="navbar-fixed">
    <nav class="">
      <div class="container">
        <div class="nav-wrapper">
          <!-- <a href="#!" class="brand-logo">TravelVille</a> -->
           <a href="<?= base_url('Patients/index'); ?>">&nbsp;
            <img src="<?= base_url('public/assets/images/doc.jpg'); ?>" style="width: 50px;border-radius: 50px; margin-top: 5px;">
              <?= $userdata->username; ?>
            </a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
            <li>
                <a href="<?= base_url('Patients/view_receipt'); ?>"><span class="fa fa-file" ></span>&nbsp;  View Recept</a>
            </li>
            <li>
                <a href="<?= base_url('Patients/discharge_report'); ?>"><span class="fa fa-hourglass-start" ></span>&nbsp;  View Discharge Report</a>
            </li>
            <li>
                <a href="<?= base_url('Patients/view_doctor'); ?>"><span class="fa fa-trophy" ></span>&nbsp;  View Doctor</a>
            </li>
            <li>
                <a href="<?= base_url('Patients/review_hosp_activity'); ?>"><span class="fa fa-tasks" ></span>&nbsp;  Review Hospital Activity</a>
            </li>
           <li>
                <a href="<?= base_url('Patients_login/Logout'); ?>"><span class="fa fa-key" ></span>&nbsp; Logout</a>
            </li>
             
            
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <!---Side menu Section Start --->
<ul class="sidenav collapsible" id="side_menu" >
     <li><a href="<?= base_url('Doctor/index'); ?>">Home</a></li>
    <li>
        <div class="collapsible-header">View Recept</div>
        <div class="collapsible-body">
            <ul>
              <li>
                <a href="<?= base_url('Patients/view_receipt'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-trophy" style="color: #005a87"></span> View Recept
                </a>
              </li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">View Discharge Report</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Patients/discharge_report'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; View Discharge Report </a>
              </li> 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">View Doctor</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Patients/view_doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; View Doctor </a>
              </li> 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Review Hospital Activity</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Patients/review_hosp_activity'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; Review Hospital Activity </a>
              </li> 
            </ul>
        </div>
    </li>
 
     <li>
        <div class="collapsible-header">Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Patients_login/Logout'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-key" style="border-bottom: 1px dashed"></span>&nbsp; Logout</a>
                </li>
             </ul>
        </div>
    </li>
    
    
</ul>
<!---Side menu Section End --->

<!---Announcement Dropdown  --->



<!---Php Meassge Show --->
<div style="margin-left: 20px;margin-right: 10px">
  <?php  if(session()->getTempdata('success')): ?>
        <div class="card">
          <div class="card-content" style="margin-left: 20px;margin-right: 20;padding: 10px; background: green;color: white;font-weight: 500">
            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= session()->getTempdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php  if(session()->getTempdata('error')): ?>
        <div class="card">
          <div class="card-content" style="margin-left: 10px;margin-right: 10;padding: 10px; background: red;color: white;font-weight: 500">
            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= session()->getTempdata('error'); ?>
          </div>
        </div>
<?php endif; ?>
</div>


<!---Php Meassge Show --->
