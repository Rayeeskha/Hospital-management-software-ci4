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
        #input_box{border: 1px solid silver;box-shadow: none;box-sizing: border-box;padding-left: 10px;padding-right: 10px;height: 40px;border-radius: 3px}  
        #blood_bank_dropdown, #transition_dropdown, #enquiry_dropdown,#donor_dropdown{width: 20% !important;}
        #blood_bank_dropdown li a, #transition_dropdown a, #enquiry_dropdown a,#donor_dropdown a{color: grey;font-size: 16px;}   
</style>

  <div class="navbar-fixed">
    <nav class="">
      <div class="container">
        <div class="nav-wrapper">
          <!-- <a href="#!" class="brand-logo">TravelVille</a> -->
           <a href="<?= base_url('Blood_bank/index'); ?>">&nbsp;
            <img src="<?= base_url('public/assets/images/doc.jpg'); ?>" style="width: 50px;border-radius: 50px; margin-top: 5px;">
              <?= $userdata->username; ?>
            </a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
            <li>
                <a href="#!" class="dropdown-trigger" data-target="blood_bank_dropdown"><span class="fa fa-tasks" ></span>&nbsp; Blood Bank</a>
            </li>
            <li>
                <a href="#!" class="dropdown-trigger" data-target="transition_dropdown"><span class="fa fa-tasks" ></span>&nbsp;  Blood Transition</a>
            </li>
            <li>
                <a href="<?= base_url('Blood_bank/donor_details'); ?>" class="dropdown-trigger" data-target="donor_dropdown"><span class="fa fa-users" ></span>&nbsp;  Donor Details</a>
            </li>
             
            <li>
                <a href="#!"  class="dropdown-trigger" data-target="enquiry_dropdown"><span class="fa fa-tasks"></span>&nbsp;  View Enquiry</a>
            </li>
           <li>
                <a href="<?= base_url('Accountent_login/Logout_accountent'); ?>"><span class="fa fa-key" ></span>&nbsp; Logout</a>
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
        <div class="collapsible-header">Blood Bank</div>
        <div class="collapsible-body">
            <ul>
              <li>
                <a href="<?= base_url('Blood_bank/add_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-tasks" style="color: white"></span> Add Blood
                </a>
              </li>
              <li>
                <a href="<?= base_url('Blood_bank/manage_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-trophy" style="color: white"></span> Manage Blood
                </a>
              </li>
              <li>
                <a href="<?= base_url('Blood_bank/total_blood_stock'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-trophy" style="color: white"></span> Total Blood Bank Stock
                </a>
              </li>
             </ul>
        </div>
    </li>
    <li>
        <div class="collapsible-header">Blood Transition</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Blood_bank/blood_transition'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Blood Transition </a>
                </li>
                <li>
                  <a href="<?= base_url('Blood_bank/manage_blood_transition'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Manage Transition </a>
                </li> 
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Donor Details</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Blood_bank/donor_details'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Donor Details </a>
              </li>
              <li>
                  <a href="<?= base_url('Blood_bank/buy_donor_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Buy Donor Blood  </a>
              </li>
              <li>
                  <a href="<?= base_url('Blood_bank/manage_donor_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Manage Donor Blood Transition </a>
              </li> 
              <li>
                <a href="<?= base_url('Blood_bank/donor_blood_trans'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-bug" style="color: #005a87"></span> Donor Blood Transition
                </a>
              </li> 
              <li>
                <a href="<?= base_url('Blood_bank/manage_donor_blood_trans'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-bug" style="color: #005a87"></span> Manage Donor Blood Transition
                </a>
              </li>
            </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">View Enquiry</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Blood_bank/view_enquiry'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; View Enquiry </a>
              </li>
              <li>
                  <a href="<?= base_url('Blood_bank/view_enquirygoogleusers'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-tasks" ></span>&nbsp; View Enquiry Google User</a>
              </li> 
            </ul>
        </div>
    </li>
 
     <li>
        <div class="collapsible-header">Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Accountent_login/Logout_accountent'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-key" style="border-bottom: 1px dashed"></span>&nbsp; Logout</a>
                </li>
             </ul>
        </div>
    </li>
    
    
</ul>
<!---Side menu Section End --->

<!---Announcement Dropdown  --->

<!---Blood Bank Dropdown   ----->
<ul class="dropdown-content" id="blood_bank_dropdown">
    <li>
      <a href="<?= base_url('Blood_bank/add_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-tasks" style="color: #005a87"></span> Add Blood
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/manage_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span> Manage Blood
      </a>
    </li> 
    <li>
      <a href="<?= base_url('Blood_bank/total_blood_stock'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span> Total Blood Stock
      </a>
    </li>       
</ul>
<!---Blood Bank Dropdown   ----->

<!----Transition Dropdown ----->
<ul class="dropdown-content" id="transition_dropdown">
    <li>
      <a href="<?= base_url('Blood_bank/blood_transition'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-tasks" style="color: #005a87"></span> Blood Transition
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/manage_blood_transition'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span> Manage Transition
      </a>
    </li> 
           
</ul>
<!----Transition Dropdown ----->

<!-----Enquiry Dropdown ----->
<ul class="dropdown-content" id="enquiry_dropdown">
    <li>
      <a href="<?= base_url('Blood_bank/view_enquiry'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-tasks" style="color: #005a87"></span> View Enquiry
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/view_enquirygoogleusers'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span>  View Enquiry Google User
      </a>
    </li> 
           
</ul>
<!-----Enquiry Dropdown ----->
<!-----Donors Dropdown ---->
<ul class="dropdown-content" id="donor_dropdown">
    <li>
      <a href="<?= base_url('Blood_bank/donor_details'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-tasks" style="color: #005a87"></span> Donor Details
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/buy_donor_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span> Buy Donor Blood
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/manage_donor_blood'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span>  Manage Donor Blood
      </a>
    </li> 
    <li>
      <a href="<?= base_url('Blood_bank/donor_blood_trans'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span> Donor Blood Transition
      </a>
    </li>
    <li>
      <a href="<?= base_url('Blood_bank/manage_donor_blood_trans'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-bug" style="color: #005a87"></span> Manage Donor Blood Transition
      </a>
    </li>
           
</ul>
<!-----Donors Dropdown ---->



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
