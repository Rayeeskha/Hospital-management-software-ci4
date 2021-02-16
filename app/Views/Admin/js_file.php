

<!---Materialize js file include --->
<script type="text/javascript" src="<?= base_url('public/assets/jquery/jquery.js'); ?>"></script>
<!--Ajax js file include ---->

<script type="text/javascript" src="<?= base_url('public/assets/materialize/js/materialize.js'); ?>"></script>
<!--Chart js file --->




<!---custome js file include -->
<script type="text/javascript">
	$(document).ready(function(){
		//modal script
		$('.modal').modal();
		// $('#product_detail_modal').modal('open');
		//modal script
		//sidenav script 
		$('.sidenav').sidenav();
		//sidenav script 
		//collapsible 
		$('.collapsible').collapsible();
		//collapsible 
		//dropdown script show start
		$('.dropdown-trigger').dropdown({
			coverTrigger:false
		});

	  $('.carousel.carousel-slider').carousel({
	    fullWidth: true,
	    indicators: true
	  });	

		
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>

<script type="text/javascript">
	//Dependence Doctor FEE Script Section Start
	  $(document).ready(function(){
 
            $('#doctor').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : '<?php echo site_url('Admin/get_doctor_fee_details/');?>'+id,
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                        	 html += '<option value='+data[i].doctor_fee+'>'+data[i].doctor_fee+'</option>';
                            $('#doctor_fee').html(html);
                            
						}
                    }
                });
                return false;
            }); 
             
        });
	//Dependence Doctor FEE Script Section End
</script>
