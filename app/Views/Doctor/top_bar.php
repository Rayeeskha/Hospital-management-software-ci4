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
         #nav_bar{background:black;height: 40px;line-height: 40px; box-shadow: none;} 
         #chat_dropdown li a {color: grey;font-size: 16px;}
         #doctor_dropdown, #settings_dropdown{width: 25% !important;}
         #doctor_dropdown li a, #appointment_dropdown a, #settings_dropdown a, #stock_dropdown a {color: grey;font-size: 16px;}
         #discharge_patent, #appointment_dropdown,  #stock_dropdown, #expired_dropdown, #Patient_dropdown,#news_from_blog{width: 20% !important;}
         #discharge_patent li a,  #expired_dropdown li a , #Patient_dropdown li a, #news_from_blog li a{color: grey;font-size: 16px;}
        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;}
        #search_doctor{display: flex;}
       #search_doctor li:first-child{width: 250px}
       #doctor_filter{width: 180px !important;padding-top: 8px;padding-bottom: 8px;}
       #doctor_filter li a{color: grey;font-size: 14px;font-weight: 500;}
       #doctor_image{width: 40px;height: 40px;border-radius: 100%;border: 1px  solid silver}
       td{font-size: 15px;font-weight: 500}

       /* Pagination Css File Include  */
       .pagination li.active{background: none;}
      .pagination a{color: black; font-weight: 500;border: 1px solid black;padding:2px 5px;margin-left: 2px;border-radius: 3px;}
      #pagination nav {background:none;box-shadow: none; }
      .pagination  li.active a{color: white;background: black}         
       /* Pagination Css File Include  */    


        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
     #input_file{border: 1px solid silver;padding: 8px;width: 100%;margin-bottom: 15px;font-size: 14px;font-weight: 500}
     select{display: block;}
    select{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px; border-radius: 3px;}
    
    textarea{border: 1px solid silver;padding: 10px;outline: none;height: 100px;resize: none; border-radius: 3px;}
    span{cursor: pointer;}
    h6{font-weight: 500}     
</style>

  <div class="navbar-fixed">
    <nav class="">
      <div class="container">
        <div class="nav-wrapper">
          <!-- <a href="#!" class="brand-logo">TravelVille</a> -->
           <a href="<?= base_url('Doctor/index'); ?>">&nbsp;
            <img src="<?= base_url('public/assets/images/doc.jpg'); ?>" style="width: 50px;border-radius: 50px; margin-top: 5px;">
              <?= $userdata->username; ?>
            </a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
            <li>
                <a href="#!" class="dropdown-trigger" data-target="Patient_dropdown"><span class="fa fa-users" ></span>&nbsp;  Patients</a>
            </li>
            <li>
                <a href="#!"  class="dropdown-trigger" data-target="appointment_dropdown"><span class="fa fa-users" ></span>&nbsp;  Appointment</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="discharge_patent"><span class="fa fa-file" ></span>&nbsp;  Discharge Patient</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="news_from_blog"><span class="fa fa-tasks" ></span>&nbsp;  News from Blog</a>
            </li>
           <li>
                <a href="#!" class="dropdown-trigger" data-target="settings_dropdown"><span class="fa fa-key" ></span>&nbsp; Settings</a>
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
        <div class="collapsible-header">Patients</div>
        <div class="collapsible-body">
            <ul>
              <li>
                <a href="<?= base_url('Doctor/today_patient') ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-trophy" style="color: #005a87"></span> Today Patents Under You
                </a>
              </li>
             
                 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Appointment</div>
        <div class="collapsible-body">
            <ul>
                </li>
                 <li>
                    <a href="#!" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users"></span>&nbsp; Today Appointment
                    </a>
                </li>      
             </ul>
        </div>
    </li>

   
    <li>
        <div class="collapsible-header">Discharge Patents</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Doctor/today_discharge_patient'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Today Discharge Patents </a>
              </li>
              <li>
                  <a href="<?= base_url('Doctor/total_discharge_patient') ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Total Discharge Patents </a>
              </li>  
            </ul>
        </div>
    </li>

     <li>
        <div class="collapsible-header">News from Blog</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Doctor/news_from_blog'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; Upload  from Thinking </a>
              </li>
              <li>
                  <a href="<?= base_url('Doctor/manage_blogs'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; Manage Blogs </a>
              </li>  
            </ul>
        </div>
    </li>
 
     <li>
        <div class="collapsible-header">Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Doctor/change_doctor_password'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-user" style="border-bottom: 1px dashed"></span>&nbsp; Change Password</a>
                </li>
                <li>
                  <a href="<?= base_url('Accountent_login/Logout_accountent'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-key" ></span>&nbsp;  Logout</a>
              </li>
             </ul>
        </div>
    </li>
    
    
</ul>
<!---Side menu Section End --->

<!---Announcement Dropdown  --->

<!--News from Blog Section ---->
<ul class="dropdown-content" id="news_from_blog">
    <li>
      <a href="<?= base_url('Doctor/news_from_blog'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-tasks" style="color: #005a87"></span> Upload your thinking 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Doctor/manage_blogs'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-tasks" style="color: #005a87"></span> Manage Blogs 
      </a>
    </li>       
</ul>
<!--News from Blog Section ---->


<!---Mediciens Dropdown --->
 <ul class="dropdown-content" id="Patient_dropdown">
    
    <li>
      <a href="<?= base_url('Doctor/today_patient'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-file" style="color: #005a87"></span> Today Patent Under You 
      </a>
    </li>       
</ul>
<!---Mediciens Dropdown --->

<!---Products Dropdown --->
<ul class="dropdown-content" id="appointment_dropdown">
    <li>
      <a href="<?= base_url('Doctor/today_appointement'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span>Today Appointment
      </a>
    </li>       
</ul>
<!---Products Dropdown --->
<!---Sale Dropdown --->
<ul class="dropdown-content" id="discharge_patent">
    <li>
      <a href="<?= base_url('Doctor/today_discharge_patient'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span> Today Discharge Patents
      </a>
    </li>
    <li>
      <a href="<?= base_url('Doctor/total_discharge_patient') ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span> Total Patients Discharge 
      </a>
    </li>        
</ul>
<!---Sale Dropdown --->



<!---Settings Dropdown Script --->
<ul class="dropdown-content" id="settings_dropdown">
  <li>
    <a href="<?= base_url('Doctor/change_doctor_password'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
      <span class="fa  fa-user" style="color: #005a87"></span>Change Password
    </a>
  </li>
  <li>
    <a href="<?= base_url('Accountent_login/Logout_accountent'); ?>"><span class="fa fa-key" ></span>&nbsp; Logout</a>
  </li>
        
</ul>
<!---Settings Dropdown Script --->

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
