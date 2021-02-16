 <style type="text/css">
    #set_social_icons li{
      display: inline-block;
    }
    #set_social_icons li a {
      color: white; padding: 10px 15px; border: 1px solid white;

    }

        .phonelink{
            position: fixed; /* Lock location always on the scree */
            bottom: 0; /* Set to the bottom */
            right: 0; /* Set to the right */
            margin: 30px; /* Add space around background */
        }
        .phoneicon{
            width: 40px; /* Set width of icon */
            height: 40px; /* Set height of icon */
        }
        @media screen and (max-width: 480px){
            .lgscreenphone{
                display: ;  /* On small screens make phone icon disappear */
            }
            .mbscreenphone{
                 /* On small screens make phone icon appear */
            }
        }
        @media screen and (min-width: 481px){
            .mbscreenphone{
                 /* On large screens make phone icon disappear */
            }
            .lgscreenphone{
                display: block; /* On large screens make phone icon appear */
            }
        }
  
 </style>
 <footer id="footer">
      <!-- Start Footer Top -->
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="single-footer-widget">
                <div class="section-heading">
                <h2>About Us</h2>
                <div class="line"></div>
              </div>           
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="single-footer-widget">
                <div class="section-heading">
                <h2>Important Links</h2>
                <div class="line"></div>
              </div>
              <ul class="footer-service">
                <li><a href="<?= base_url('Login'); ?>" target="_blank"><span class="fa fa-check"></span>Admin Login</a></li>
                <li><a href="<?= base_url('Doctor_login'); ?>" target="_blank"><span class="fa fa-check"></span>Doctor Login</a></li>
                <li><a href="<?= base_url('Accountent_login'); ?>" target="_blank"><span class="fa fa-check"></span>Medical Accountent Login</a></li>
                <li><a href="<?= base_url('Blood_bank_registration/login_account'); ?>" target="_blank"><span class="fa fa-check"></span>Blood Bank Donor</a></li>
                <li><a href="<?= base_url('Patients_login'); ?>" target="_blank"><span class="fa fa-check"></span>Patients Login</a></li>
                <li><a href="<?= base_url('Blood_bank_registration/admin_registration'); ?>" target="_blank"><span class="fa fa-check"></span>Blood Bank Admin</a></li>
              </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="single-footer-widget">
                <div class="section-heading">
                <h2>Tags</h2>
                <div class="line"></div>
              </div>
                <ul class="tag-nav">
                  <li><a href="#">Dental</a></li>
                  <li><a href="#">Surgery</a></li>
                  <li><a href="#">Pediatric</a></li>
                  <li><a href="#">Cardiac</a></li>
                  <li><a href="#">Ophthalmology</a></li>
                  <li><a href="#">Diabetes</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="single-footer-widget">
                <div class="section-heading">
                <h2>Contact Info</h2>
                <div class="line"></div>
              </div>
              <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
              <address class="contact-info">
                <p><span class="fa fa-home"></span>305 Intergraph Way
                Lucknow, AL 2712026, India</p>
                <p><span class="fa fa-phone"></span>1.256.730.2000</p>
                <p><span class="fa fa-envelope"></span>
                  <a href="mailto:flexionsoftwaresolution@gmail.com">info@flexionsoftware.com</a></p>
              </address>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Start Footer Middle -->
      <div class="footer-middle" style="background: #005a87;color: white">
        <div class="container">
          <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="footer-copyright">
              <p>&copy; Copyright <span style="color: red">&nbsp;<?= date('Y'); ?></span> All right reserved by : <a href="http://khanrayees.000webhostapp.com/" target="_blank">Khan Rayees</a></p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="footer-social">              
                <a href="https://www.facebook.com/FullstackDeveloperKhanRayees/?ref=bookmarks" target="_blank"><span class="fa fa-facebook"></span></a>
                <a href="https://twitter.com/KhanRay01907628" target="_blank"><span class="fa fa-twitter"></span></a>
                <a href="https://chat.whatsapp.com/ILoyV1OyJQMEZpVAmt9N5a" target="_blank"><span class="fa fa-whatsapp"></span></a>
                <a href="https://www.instagram.com/rayees2696/?hl=en" target="_blank"><span class="fa fa-instagram"></span></a>     
            </div>
          </div>
        </div>
        </div>
      </div>
      <!---Whats app image section ---->
      <a href="https://chat.whatsapp.com/ILoyV1OyJQMEZpVAmt9N5a" class="lgscreenphone phonelink" data-action="share/whatsapp/share" target="_blank"><img class="phoneicon" src="https://freeiconshop.com/wp-content/uploads/edd/phone-flat.png"></a>
      <!---Whats app image section ---->
      <!-- Start Footer Bottom -->
      <div class="footer-bottom" style="background: red;color: white;font-weight: 500">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p>Design & Developed By: <a rel="nofollow" href="http://khanrayees.000webhostapp.com/" target="_blank
                "> (Khan Rayees)</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>