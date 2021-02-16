<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  --->
<br><br><br><br>

<!--=========== BEGIN Google Map SECTION ================-->
    <section id="googleMap">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227821.9337621567!2d80.80242503190256!3d26.848929330925085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1606314902263!5m2!1sen!2sin" width="100%" height="500" frameborder="0" style="border:0;"></iframe>
    </section>
<!--=========== END Google Map SECTION ================-->

 <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-6">
            <div class="contact-form">
              <div class="section-heading">
                <h2>Contact Us</h2>
                <div class="line"></div>
              </div>
              <p>Fill out all required Field to send a Message. Please don't spam,Thank you!</p>
              <?= form_open(); ?>
                <input type="text" name="name" class="wp-form-control wpcf7-text" placeholder="Your name">
                <span style="color: red"><?= display_error($validation,'name'); ?></span><br>
                <input type="email" name="email" class="wp-form-control wpcf7-email" placeholder="Email address">
                <span style="color: red"><?= display_error($validation,'email'); ?></span> <br>
                <input type="number" name="mobile" class="wp-form-control wpcf7-mobile" placeholder="Mobile Number">
                <span style="color: red"><?= display_error($validation,'mobile'); ?></span> <br>       
                <input type="text" name="subject" class="wp-form-control wpcf7-text" placeholder="Subject">
                <span style="color: red"><?= display_error($validation,'subject'); ?></span>
                <textarea name="message" class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="What would you like to tell us"></textarea>
               <button class="wpcf7-submit button--itzel" type="submit"><i class="button__icon fa fa-envelope"></i><span>Send Message</span></button>                
              <?= form_close(); ?>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-6">
            <div class="contact-address">
              <div class="section-heading">
                <h2>Contact Information</h2>
                <div class="line"></div>
              </div>
               <p>Luckow Aadilnager Uttar Pradesh Near Jankimandir Petrol Pump</p>
              <address class="contact-info">               
                <p><span class="fa fa-home"></span>226026 Lucknow Uttar Pradesh</p>
                <p><span class="fa fa-phone"></span>
                	<a href="tel:9554540271">9554540271</a></p>
                <p><span class="fa fa-envelope"></span>
                	<a href="mailto:rayeesinfotech@gmail.com">info@nobelheart.com</a></p>
              </address>
              <h3>Social Media</h3>
              <div class="social-share">               
               <ul>
                 <li><a href="https://www.facebook.com/FullstackDeveloperKhanRayees/?ref=bookmarks" target="_blank"><span class="fa fa-facebook"></span></a></li>
                 <li><a href="https://chat.whatsapp.com/ILoyV1OyJQMEZpVAmt9N5a" target="_blank"><span class="fa fa-whatsapp"></span></a></li>
                 <li><a href="https://www.instagram.com/rayees2696/?hl=en" target="_blank"><span class="fa fa-instagram"></span></a></li>
                 <li>
                 	<a href="https://twitter.com/KhanRay01907628" target="_blank"><span class="fa fa-twitter"></span></a>
                 </li>
                
               </ul>
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
<!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->
</body>
</html>