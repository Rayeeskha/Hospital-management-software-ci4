<!DOCTYPE html>
<html>
<head>
	<title>Product Sale</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/select2/dist/css/select2.min.css'); ?>">
	<style type="text/css">
		
	</style>
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start --->
<div style="margin-right: 15px;margin-left: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Product Sale</h5>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m12 s12">
					<?= form_open('Medical_Accountent/add_to_Cart'); ?>
					<h6>Product Name</h6>
					<!-- Dropdown --> 
					<select id='product_id' name="product_id" style='width: 100%;'>
			        	 <option selected="" disabled="">-- Select Product Name --</option> 
			        <?php if($product_name):
						count($product_name);
						foreach($product_name as $pro_name):
					 ?> 
			        <option value='<?= $pro_name->id; ?>'><?= $pro_name->med_name; ?></option>  
			        <?php endforeach; ?>
			        </select> 
			   		<?php else: ?>
				    	<h6 style="color: red">Product Not Found</h6>
				    <?php endif; ?>
					 <br/>
        			<div id='result'></div>
					<h6>Quantity</h6>
					<input type="number" name="quantity" id="input_box" placeholder="Enter Product Quantity" required="">
					<center>
						<a href="#!" class="btn btn-waves-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500;">Cancel</a>
						<button type="submit" class="btn btn-waves-effect waves-light" style="background: green;text-transform: capitalize;font-weight: 500;">Add to Cart</button>
					</center>
					<?= form_close(); ?>
				</div>
				<div class="col l6 m12 s12">
					<h5 style="font-weight: 500;">Your Cart</h5>
					<table class="table">
						<th>Product Id</th>
						<th>Product Name</th>
						<th>Unit Price</th>
						<th>Quantity</th>
						<th>Total Price</th>
						<th>X</th>
						<?php if($carts):
						count($carts); 
						$t_amount = 0;
										
						foreach($carts as $cart) :
							$t_amount += ($cart->rate * $cart->quantity);
						?>
							<tbody>
								<td>
									<?php
										$get_company_name =  get_doctor_name('mediciens',$cart->product_id);
										
									 ?>
									<?= $get_company_name[0]->id; ?>
								</td>
								<td>
									<?= $get_company_name[0]->med_name; ?>
								</td>
								<td>
									<?= $cart->rate; ?>
								</td>
								<td>
									<?= $cart->quantity; ?>
								</td>
								<td>
									<?php
										$sum_amount  = $cart->rate * $cart->quantity;
										echo number_format($sum_amount);
										// echo number_format($t_amount);
									?>
								</td>
								<td>
									<a href="<?= base_url('Medical_Accountent/delete_cart_product/'.$cart->id); ?>" onclick="return confirm('Are you sure you want to  Remove this Product ?..');">Remove</a>
								</td>
								
							</tbody>
						<?php endforeach; ?>
							<tr>
								<td>
									Total Amount
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<?= number_format($t_amount); ?>
								</td>
							</tr>
						<?php else: ?>
							<h6 style="color: red">Products Not Available in your Carts</h6>
						<?php endif; ?>
					</table>
					<br>
					<?php if($cart->id == null): ?>
						<center>
							<a onclick="M.toast({html: 'Please Add Product Fisrt '})" class="btn btn-waves-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500"><span class="fa fa-print"></span>&nbsp;Generate Payment  Bill</a>
						</center>
					<?php else: ?>
						<center>
						<a href="<?= base_url('Medical_Accountent/check_out_products/'.$cart->session_id); ?>" class="btn btn-waves-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500"><span class="fa fa-print"></span>&nbsp;Generate Payment  Bill</a>
					</center>
					<?php endif; ?>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<!---Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
<script type="text/javascript" src="<?= base_url('public/assets/select2/dist/js/select2.min.js'); ?>"></script>
 <script>
    $(document).ready(function(){
       // Initialize select2
     	$("#product_id").select2();
			
        });
 </script>
</body>
</html>