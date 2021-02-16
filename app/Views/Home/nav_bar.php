    
    <!-- BEGAIN PRELOADER -->
    <div id="preloader">
      <div id="status" style="background-image:url(<?= base_url('public/assets/home_image/images/status.gif') ?>);">&nbsp;</div>
    </div>
    <!-- END PRELOADER -->

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-heartbeat"></i></a>
    <!-- END SCROLL TOP BUTTON -->    



    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  
          <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             
              <!-- IMG BASED LOGO  -->
              <a class="navbar-brand" href="<?= base_url('Home/index'); ?>"><img src="<?= base_url('public/assets/home_image/images/logo2.png'); ?>" alt="logo"></a>                       
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="<?= base_url('Home/features'); ?>">Features</a></li>
                <li><a href="<?= base_url('Home/about_us'); ?>">About Us</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Service <span class="fa fa-angle-down"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    
                    <li><a href="<?= base_url('Blood_bank_registration/index'); ?>" target="_blank">Blood Bank</a></li>
                  </ul>
                </li>
                <li><a href="<?= base_url('Home/gallary'); ?>">Gallery</a></li>
                <li class="dropdown">
                  <a href="<?= base_url('Home/blog_archive'); ?>">News</a>
                </li>
                              
                <li><a href="<?= base_url('Home/contact_us'); ?>">Contact</a></li>
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>
    <!--=========== END HEADER SECTION ================-->  