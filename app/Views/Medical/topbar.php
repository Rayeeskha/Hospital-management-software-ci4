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
         #doctor_dropdown li a, #mediciens_dropdoen a, #settings_dropdown a, #stock_dropdown a {color: grey;font-size: 16px;}
         #products_dropdown, #mediciens_dropdoen,  #stock_dropdown, #expired_dropdown, #sale_dropdown{width: 20% !important;}
         #products_dropdown li a, #expired_dropdown li a , #sale_dropdown li a{color: grey;font-size: 16px;}
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
           <a href="<?= base_url('Medical_Accountent/index'); ?>" class="brand-logo">&nbsp;
            <img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 
            </a>
          <a href="#" data-target="side_menu" class="sidenav-trigger"><span class="fa fa-bars"></span>&nbsp;Menu</a>
           <ul class="right hide-on-med-and-down">
            <li>
                <a href="#!" class="dropdown-trigger" data-target="sale_dropdown"><span class="fa fa-file" ></span>&nbsp;  Sale</a>
            </li>
            <li>
                <a href="#!"  class="dropdown-trigger" data-target="mediciens_dropdoen"><span class="fa fa-users" ></span>&nbsp;  Company</a>
            </li>
           
    
            <li>
                <a href="#!" class="dropdown-trigger" data-target="products_dropdown"><span class="fa fa-file" ></span>&nbsp;  Products</a>
            </li>
           <li>
                <a href="#!"  class="dropdown-trigger" data-target="expired_dropdown"><span class="fa fa-comments" ></span>&nbsp; Expired Products </a>
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
     <li><a href="<?= base_url('Medical_Accountent/index'); ?>">Home</a></li>
    <li>
        <div class="collapsible-header">Sale</div>
        <div class="collapsible-body">
            <ul>
              <li>
                <a href="<?= base_url('Medical_Accountent/add_customer_name'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                    <span class="fa  fa-trophy" style="color: #005a87"></span> Add Customer Name
                </a>
              </li>
                </li>
                 <li>
                    <a href="<?= base_url('Medical_Accountent/product_sale'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-file"></span>&nbsp; Sale
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Medical_Accountent/todays_sale_records'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-trophy"></span>&nbsp; Today Sale Report
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Medical_Accountent/all_sale_reports'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-trophy"></span>&nbsp; Manage Sale Report
                    </a>
                </li>
               
                  
             </ul>
        </div>
    </li>
     <li>
        <div class="collapsible-header">Medicine Company</div>
        <div class="collapsible-body">
            <ul>
                </li>
                 <li>
                    <a href="<?= base_url('Medical_Accountent/add_company'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users"></span>&nbsp; Add Medicine Company
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Medical_Accountent/manage_company'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
                        <span class="fa fa-users"></span>&nbsp; Manage Medicine Comapny
                    </a>
                </li>
               
                  
             </ul>
        </div>
    </li>

   
    <li>
        <div class="collapsible-header">Medicions</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Medical_Accountent/add_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-file" ></span>&nbsp; Add Medicions </a>
              </li>
              <li>
                  <a href="<?= base_url('Medical_Accountent/manage_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-hourglass-start" ></span>&nbsp; Manage Medicions </a>
              </li>
             
            </ul>
        </div>
    </li>
    
    <li>
        <div class="collapsible-header">Expired Products</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Medical_Accountent/expiry_products'); ?>"><span class="fa fa-eye" style="font-size: 14px; border-bottom: 1px dashed"></span>&nbsp; View Expired Products</a>
              </li>
              
            </ul>
        </div>
    </li>
     
     <li>
        <div class="collapsible-header">Settings</div>
        <div class="collapsible-body">
            <ul>
                <li>
                  <a href="<?= base_url('Medical_Accountent/change_password'); ?>" style="font-size: 14px; border-bottom: 1px dashed"><span class="fa fa-user" style="border-bottom: 1px dashed"></span>&nbsp; Change Password</a>
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


<!---Mediciens Dropdown --->
 <ul class="dropdown-content" id="mediciens_dropdoen">
    
    <li>
      <a href="<?= base_url('Medical_Accountent/add_company'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa  fa-file" style="color: #005a87"></span> Add Company 
      </a>
    </li>
    <li>
      <a href="<?= base_url('Medical_Accountent/manage_company'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa fa-hourglass-start" style="color: #005a87"></span> Manage Company 
      </a>
    </li>        
</ul>
<!---Mediciens Dropdown --->

<!---Products Dropdown --->
<ul class="dropdown-content" id="products_dropdown">
    <li>
      <a href="<?= base_url('Medical_Accountent/add_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span>Add Medicine
      </a>
    </li>
    <li>
      <a href="<?= base_url('Medical_Accountent/manage_medicine'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-file" style="color: #005a87"></span>Manage Medicine
      </a>
    </li>
        
</ul>
<!---Products Dropdown --->
<!---Sale Dropdown --->
<ul class="dropdown-content" id="sale_dropdown">
    <li>
      <a href="<?= base_url('Medical_Accountent/add_customer_name'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span> Add Customer Name
      </a>
    </li>
    <li>
      <a href="<?= base_url('Medical_Accountent/product_sale'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-trophy" style="color: #005a87"></span> Sale
      </a>
    </li>
    <li>
      <a href="<?= base_url('Medical_Accountent/todays_sale_records'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-file" style="color: #005a87"></span>Today Sale Report
      </a>
    </li>
    <li>
      <a href="<?= base_url('Medical_Accountent/all_sale_reports'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
        <span class="fa fa-trophy"></span>&nbsp; All Sale Report
      </a>
    </li>
        
</ul>
<!---Sale Dropdown --->

<!---Expired Products Dropdown ---->
<ul class="dropdown-content" id="expired_dropdown">
    <li>
      <a href="<?= base_url('Medical_Accountent/expiry_products'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
          <span class="fa  fa-eye" style="color: #005a87"></span>View Expired Products
      </a>
    </li>        
</ul>
<!---Expired Products Dropdown ---->

<!---Settings Dropdown Script --->
<ul class="dropdown-content" id="settings_dropdown">
  <li>
    <a href="<?= base_url('Medical_Accountent/change_password'); ?>" style="font-size: 14px; border-bottom: 1px dashed">
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
