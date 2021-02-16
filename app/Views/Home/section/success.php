<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <!----Css File Include --->
    <?= view('Home/css_file'); ?>
    <!----Css File Include --->
</head>
<body>
<!---Nav Bar Section Include  --->
<?= view('Home/nav_bar'); ?> 
<!---Nav Bar Section Include  ---> 
<br><br><br><br><br><br><br><br><br><br>
<!---Php Meassge Show --->
<div style="margin-left: 20px;margin-right: 10px">
  <?php  if(session()->getTempdata('success')): ?>
        <div class="toast" data-autohide="false">
          <div class="toast-header" style="margin-left: 20px;margin-right: 20;padding: 10px; background: green;color: white;font-weight: 500">
            <span class="fa fa-check"></span>&nbsp;&nbsp;<?= session()->getTempdata('success'); ?>
            <small class="text-muted"><span class="fa fa-check"></span>&nbsp;</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
          </div>
        </div>
      <?php endif; ?>
      <?php  if(session()->getTempdata('error')): ?>

      <div class="toast" data-autohide="false">
          <div class="toast-header" style="margin-left: 20px;margin-right: 20;padding: 10px; background: red;color: white;font-weight: 500">
            <span class="fa fa-times"></span>&nbsp;&nbsp;<?= session()->getTempdata('error'); ?>
            <small class="text-muted"><span class="fa fa-check"></span>&nbsp;</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
          </div>
        </div>
      
<?php endif; ?>
</div>
<!---Php Meassge Show --->


   <!--=========== Start Footer SECTION ================-->
   <?= view('Home/footer_section'); ?>
    <!--=========== End Footer SECTION ================-->

<!----Js  file Include --->
<?= view('Home/js_file'); ?>
</body>
</html>

<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>