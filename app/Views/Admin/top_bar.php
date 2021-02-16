<style type="text/css">
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
         #doctor_dropdown,#appointment_dropdown, #settings_dropdown, #account_dropdown, #verification_dropdown{width: 20% !important;}
         #doctor_dropdown li a, #appointment_dropdown li a, #mediciens_dropdoen a, #settings_dropdown a, #account_dropdown a, #verification_dropdown a, #department_dropdown a {color: grey;font-size: 16px;}
         #services_dropdown, #mediciens_dropdoen,#department_dropdown{width: 20% !important;}
         #services_dropdown li a {color: grey;font-size: 16px;}
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
      <div>
        <div class="nav-wrapper">
          <!-- <a href="#!" class="brand-logo">TravelVille</a> -->
           <a href="<?= base_url('Admin/index'); ?>" class="brand-logo">&nbsp;<?= $userdata->username; ?> Admin</a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
           
            <li>
                <a href="#!" class="dropdown-trigger" data-target="department_dropdown"><span class="fa fa-tasks"></span>&nbsp;Department</a>
            </li>
             <li>
                <a href="#!" class="dropdown-trigger" data-target="doctor_dropdown"><span class="fa fa-users"></span>&nbsp;Doctors</a>
            </li>
    
            <li>
                <a href="#!" class="dropdown-trigger" data-target="services_dropdown"><span class="fa fa-users" ></span>&nbsp;Patients</a>
            </li>
            
             <li>
                <a href="#!"  class="dropdown-trigger" data-target="mediciens_dropdoen"><span class="fa fa-bug" ></span>&nbsp;Medical</a>
            </li>
            <li>
                <a href="#!"  class="dropdown-trigger" data-target="verification_dropdown"><span class="fa fa-exclamation-triangle" ></span>&nbsp;Verification</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="appointment_dropdown"><span class="fa fa-comments" ></span>&nbsp;Appointment </a>
            </li>
            
            <li>
                <a href="#!" class="dropdown-trigger" data-target="account_dropdown"><span class="fa fa-key" ></span>&nbsp;Accounts</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="settings_dropdown"><span class="fa fa-images" ></span>&nbsp;Frontend Settings</a>
            </li>
             <li>
                <a href="<?= base_url('Login/Logout'); ?>"><span class="fa fa-key" ></span>&nbsp;Logout</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
  </div>



  <!---Side menu Section Start --->
<ul class="sidenav collapsible" id="side_menu" >
     <li><a href="<?= base_url('Admin/index'); ?>">Home</a></li>
      <li>
        <div class="collapsible-header">Department</div>
        <div class="collapsible-body">
            <ul>
                </li>
                 <li>
                    <a href="<?= base_url('Admin/add_department'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-tasks"></span>&nbsp; Add Department
                    </a>
                </li>
               
                <li>
                    <a href="<?= base_url('Admin/manage_department'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-hourglass-start" ></span>&nbsp;Manage Department
                    </a>
                </li>  
                   
             </ul>
        </div>
    </li>


    <li>
        <div class="collapsible-header">Doctors</div>
        <div class="collapsible-body">
            <ul>
                </li>
                 <li>
                    <a href="<?= base_url('Admin/doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users"></span>&nbsp; Add Doctors
                    </a>
                </li>
               
                <li>
                    <a href="<?= base_url('Admin/manage_doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-hourglass-start" ></span>&nbsp;Manage Doctors
                    </a>
                </li>  
                <li>
                    <a href="<?= base_url('Admin/add_doctor_fee'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-bug" ></span>&nbsp;Add Doctor Fee
                    </a>
                </li> 
                <li>
                    <a href="<?= base_url('Admin/manage_doctor_fee'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-hourglass-start" ></span>&nbsp;Manage Doctors Fee
                    </a>
                </li>   
             </ul>
        </div>
    </li>

    <li>
        <div class="collapsible-header">Patents</div>
        <div class="collapsible-body">
            <ul>
               
                <li>
                    <a href="<?= base_url('Admin/add_patents'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users"></span> Add Patents
                    </a>
                </li>
               
                <li>
                    <a href="<?= base_url('Admin/manage_patents'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                       <span class="fa fa-users"></span> Manage Patents
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/manage_doctor_discharge_patients'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                       <span class="fa fa-users"></span>Doctor Dischrage Patents
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('Admin/manage_discharge_patient'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                       <span class="fa fa-users"></span>Manage Dischrage Patents
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/manage_revisit_patient'); ?>" style="font-size: 14px; color: orange; border-bottom: 1px dashed">
                      <span class="fa  fa-users" style="color: #005a87"></span>&nbsp;Revisit Patents
                    </a>
                </li>
              </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Medical</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Admin/med_category'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp;Add Medicions Category</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/manage_med_category'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start" ></span>&nbsp;Manage Medicions Category</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/add_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp;Add Medicions</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/manage_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start" ></span>&nbsp;Manage Medicions</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/manage_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start" ></span>&nbsp;Manage Medicions</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/today_medical_cus_report'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-bug" ></span>&nbsp;Today Customer Report</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/all_sale_reports'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-bug" ></span>&nbsp;All Customer Report</a>
              </li>
            </ul>
        </div>
    </li>
      <li>
        <div class="collapsible-header">Verification</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Admin/accountent_verification'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-exclamation-triangle" ></span>&nbsp; Accountent Verification</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/doctor_verification'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-exclamation-triangle"></span>&nbsp; Doctor Verification</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/doctor_email_register'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-envelope"></span>&nbsp; Doctor Email Register</a>
              </li>
               <li>
                <a href="<?= base_url('Admin/patients_review'); ?>"><span class="fa fa-share" style="font-size: 14px; border-bottom: 1px dashed;color: green"></span>&nbsp; Patients Review</a>
              </li> 
               <li>
                   <a href="<?= base_url('Admin/blood_bank_admin'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-exclamation-triangle" style="color: #005a87"></span>   View Blood Bank Admin Verification
                  </a>
                </li>
            </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Appointment</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Admin/today_appointment'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Today Appointment</a>
              </li>
              <li>
                  <a href="<?= base_url('Admin/doctor_discharge_appointment'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; Doctor Discharge Appointment</a>
              </li>
              
              </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Accounts</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Login/create_doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-user"></span>&nbsp; Create Doctor Account</a>
                </li>
                 <li>
                  <a href="<?= base_url('Admin/manage_doctor_account'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start"></span>&nbsp; Manage Doctor Account</a>
                </li>
                <li>
                  <a href="<?= base_url('Login/create_med_account'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-user"></span>&nbsp; Medical Account</a>
                </li>
                <li>
                  <a href="<?= base_url('Admin/manage_medical_acc'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start"></span>&nbsp;Manage Medical Account</a>
                </li>
                 <li>
                      <a href="<?= base_url('Admin/blood_bank_accountent'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Accountent
                      </a>
                  </li>
                   <li>
                      <a href="<?= base_url('Admin/manage_blood_accc'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-hourglass-start" style="color: #005a87"></span>&nbsp;Manage Blood Accountent
                      </a>
                  </li>
                <li>
                  <a href="<?= base_url('Admin/check_login_activity'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa fa-hourglass-start" style="color: #005a87"></span>Check Login Activity
                  </a>
              </li>

              </ul>
        </div>
    </li>
      <li>
        <div class="collapsible-header">Frontent Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Admin/add_slider_image'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-images"></span>&nbsp; Upload Slider Image</a>
                </li>
                 <li>
                  <a href="<?= base_url('Admin/manage_slider'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start"></span>&nbsp; Manage Slider Image</a>
                </li>
                <li>
                  <a href="<?= base_url('Admin/image_gallery'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-images"></span>&nbsp; Image Gallary</a>
                </li>
                <li>
                  <a href="<?= base_url('Admin/manage_image_gallary'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks"></span>&nbsp; Manage Image Gallary</a>
                </li>
                 <li>
                  <a href="<?= base_url('Admin/manage_blogs'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks"></span>&nbsp; Manage Blogs</a>
                </li>
                <li>
                  <a href="<?= base_url('Admin/contact_us'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-share"></span>&nbsp; Contact us</a>
                </li>
              </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Logout</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Login/Logout'); ?>" ><span class="fa fa-key" ></span>&nbsp;  Logout</a>
              </li>
              </ul>
        </div>
    </li>
    
    
</ul>
<!---Side menu Section End --->

<!---Department Dropdown Section ---->
<ul class="dropdown-content" id="department_dropdown">
    <li>
      <a href="<?= base_url('Admin/add_department'); ?>" style="font-size: 15px; border-bottom: 1px dashed">
        <span class="fa  fa-file" style="color: #005a87"></span> Add Department
      </a>
    </li>  
    <li>
      <a href="<?= base_url('Admin/manage_department'); ?>" style="font-size: 15px; border-bottom: 1px dashed"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Manage Department</a>
    </li>      
 </ul>
<!---Department Dropdown Section ---->


<!---Announcement Dropdown  --->
 <ul class="dropdown-content" id="doctor_dropdown">
        <li>
            <a href="<?= base_url('Admin/doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                <span class="fa fa-users" style="color: #005a87"></span>&nbsp; Add Doctor
            </a>
        </li>
       
        <li>
            <a href="<?= base_url('Admin/manage_doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                <span class="fa fa-hourglass-start" style="color: #005a87"></span>&nbsp;Manage Doctor
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/add_doctor_fee'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                <span class="fa fa-bug" style="color: #005a87"></span>&nbsp;Add Doctor Fee
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/manage_doctor_fee'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                <span class="fa fa-hourglass-start" style="color: #005a87"></span>&nbsp;Manage Doctor Fee
            </a>
        </li>
        
    </ul>
<!---Announcement Dropdown  --->
<!---Services Dropdown --->
 <ul class="dropdown-content" id="services_dropdown">
        <li>
            <a href="<?= base_url('Admin/add_patents'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
               <span class="fa  fa-users" style="color: #005a87"></span> Add Patents
            </a>
        </li>
       
        <li>
            <a href="<?= base_url('Admin/manage_patents'); ?>" style="font-size: 14px; color: green; border-bottom: 1px dashed">
              <span class="fa  fa-users" style="color: #005a87"></span>   Manage Admit Patents
            </a>
        </li>
        <li>
            <a href="<?= base_url('Admin/manage_doctor_discharge_patients'); ?>" style="font-size: 14px;color: orange; border-bottom: 1px dashed">
              <span class="fa  fa-users" style="color: #005a87"></span>   Manage Doctor Discharge Patents
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/manage_discharge_patient'); ?>" style="font-size: 14px; color: red; border-bottom: 1px dashed">
              <span class="fa  fa-users" style="color: #005a87"></span>Manage Discharge Patents
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/manage_revisit_patient'); ?>" style="font-size: 14px; color: orange; border-bottom: 1px dashed">
              <span class="fa  fa-users" style="color: #005a87"></span>&nbsp;Revisit Patents
            </a>
        </li>        
</ul>
<!---Services Dropdown --->

<!---Mediciens Dropdown --->
 <ul class="dropdown-content" id="mediciens_dropdoen">
    <li>
      <a href="<?= base_url('Admin/med_category'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-file" style="color: #005a87"></span> Add Medicines Category
      </a>
    </li>
    <li>
      <a href="<?= base_url('Admin/manage_med_category'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa fa-hourglass-start" style="color: #005a87"></span> Manage Medicines Category
      </a>
    </li> 
    <li>
      <a href="<?= base_url('Admin/add_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-file" style="color: #005a87"></span> Add Medicines 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Admin/manage_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa fa-hourglass-start" style="color: #005a87"></span> Manage Medicines 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Admin/today_medical_cus_report'); ?>" style="font-size: 14px; border-bottom: 1px dashed;"><span class="fa fa-bug" style="color: blue"></span>&nbsp;Today Customer Report</a>
    </li>
    <li>
      <a href="<?= base_url('Admin/all_sale_reports'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-bug" style="color: blue"></span>&nbsp;All Customer Report</a>
    </li>       
</ul>
<!---Mediciens Dropdown --->

<!---Settings Dropdown Script --->
<ul class="dropdown-content" id="account_dropdown">
        <li>
            <a href="<?= base_url('Login/create_doctor'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
               <span class="fa  fa-user" style="color: #005a87"></span>Create Doctor Account
            </a>
        </li>
       
        <li>
            <a href="<?= base_url('Admin/manage_doctor_account'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
              <span class="fa fa-hourglass-start" style="color: #005a87"></span>   Manage Doctor Account
            </a>
        </li>
          <li>
            <a href="<?= base_url('Login/create_med_account'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
               <span class="fa  fa-user" style="color: #005a87"></span>Create Medical Account
            </a>
        </li>
        <li>
            <a href="<?= base_url('Admin/manage_medical_acc'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
              <span class="fa fa-hourglass-start" style="color: #005a87"></span>Manage Medical Account
            </a>
        </li>
       
        <li>
            <a href="<?= base_url('Admin/blood_bank_accountent'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
              <span class="fa fa-users" style="color: #005a87"></span>&nbsp;Blood Accountent
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/manage_blood_accc'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
              <span class="fa fa-hourglass-start" style="color: #005a87"></span>&nbsp;Manage Blood Accountent
            </a>
        </li>
         <li>
            <a href="<?= base_url('Admin/check_login_activity'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
              <span class="fa fa-hourglass-start" style="color: #005a87"></span>Check Login Activity
            </a>
        </li>
 </ul>
<!---Settings Dropdown Script --->

<!---Verification Dropdown ---->
<ul class="dropdown-content" id="verification_dropdown">
    <li>
      <a href="<?= base_url('Admin/accountent_verification'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-exclamation-triangle" style="color: #005a87"></span>Vew Accountent Verification
      </a>
    </li>
       
    <li>
       <a href="<?= base_url('Admin/doctor_verification'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-exclamation-triangle" style="color: #005a87"></span>   View Doctor Verification
      </a>
    </li>
    <li>
       <a href="<?= base_url('Admin/blood_bank_admin'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-exclamation-triangle" style="color: #005a87"></span>   View Blood Bank Admin Verification
      </a>
    </li> 
    <li>
      <a href="<?= base_url('Admin/doctor_email_register'); ?>" style="font-size: 14px; border-bottom: 1px dashed;color: green"><span class="fa fa-envelope"></span>&nbsp; Doctor Email Register</a>
    </li>
    <li>
      <a href="<?= base_url('Admin/patients_review'); ?>"><span class="fa fa-share" style="font-size: 14px; border-bottom: 1px dashed;color: green"></span>&nbsp; Patients Review</a>
    </li>        
 </ul>
<!---Verification Dropdown ---->

<!----Appointment Dropdown ---->
<ul class="dropdown-content" id="appointment_dropdown">
    <li>
      <a href="<?= base_url('Admin/today_appointment'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-exclamation-triangle" style="color: #005a87"></span>Today Appointment
      </a>
    </li>  
    <li>
      <a href="<?= base_url('Admin/doctor_discharge_appointment'); ?>"><span class="fa fa-user" style="font-size: 14px; border-bottom: 1px dashed"></span>&nbsp; Doctor Discharge Appointment</a>
    </li>      
 </ul>
<!----Appointment Dropdown ---->

<!---Settings Dropdown ----->
<ul class="dropdown-content" id="settings_dropdown">
    <li>
      <a href="<?= base_url('Admin/add_slider_image'); ?>" style="font-size: 15px; border-bottom: 1px dashed">
        <span class="fa  fa-hourglass-start" style="color: #005a87"></span> Add Slider Image
      </a>
    </li>  
    <li>
      <a href="<?= base_url('Admin/manage_slider'); ?>" style="font-size: 15px; border-bottom: 1px dashed"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp;Manage Slider</a>
    </li>
    <li>
      <a href="<?= base_url('Admin/image_gallery'); ?>" style="font-size: 15px; border-bottom: 1px dashed"><span class="fa fa-images" style="color: #005a87"></span>&nbsp;Image Gallary</a>
    </li>
    <li>
      <a href="<?= base_url('Admin/manage_image_gallary'); ?>" style="font-size: 15px; border-bottom: 1px dashed"><span class="fa fa-images" style="color: #005a87"></span>&nbsp;Manage Image Gallary</a>
    </li>  
    <li>
        <a href="<?= base_url('Admin/manage_blogs'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" style="color: #005a87"></span>&nbsp; Manage Blogs</a>
    </li>
    <li>
        <a href="<?= base_url('Admin/contact_us'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-share"></span>&nbsp; Contact us</a>
    </li>    
 </ul>
<!---Settings Dropdown ----->

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
