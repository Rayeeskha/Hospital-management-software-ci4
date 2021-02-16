<!DOCTYPE html>
<html lang="en">
  <head>
    <!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->   
  </head>
  <body>  
 

<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  ---> 

    <!--=========== BEGIN SLIDER SECTION ================-->
    <?= view('Home/slider_section'); ?>
    <!--=========== END SLIDER SECTION ================-->

    <!--=========== BEGIN Top Feature SECTION ================-->
    <?= view('Home/top_feature_section'); ?>
    <!--=========== END Top Feature SECTION ================-->

    <!--=========== BEGIN Service SECTION ================-->
    <?= view('Home/front_service_section'); ?>
    <!--=========== End Service SECTION ================-->

    <!--=========== BEGAIN Why Choose Us SECTION ================-->
    <?= view('Home/why_choose_us'); ?>
    <!--=========== END Why Choose Us SECTION ================-->

    <!--=========== BEGAIN Counter SECTION ================-->
    <?= view('Home/counter_section'); ?>
    <!--=========== End Counter SECTION ================-->

    <!--=========== BEGAIN Doctors SECTION ================-->
    <?= view('Home/doctor_section'); ?>
    <!--=========== End Doctors SECTION ================-->

    <!--=========== BEGAIN Testimonial SECTION ================-->
   <?= view('Home/testimonial_section'); ?>
    <!--=========== End Testimonial SECTION ================-->

    <!--=========== BEGAIN Home Blog SECTION ================-->
    <?= view('Home/home_blog_section'); ?>
    <!--=========== End Home Blog SECTION ================-->

    <!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
    <!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
<!----Js  file Include --->

     
  </body>
</html>