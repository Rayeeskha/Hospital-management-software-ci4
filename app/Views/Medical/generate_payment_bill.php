<!DOCTYPE html>
<html>
<head>
	<title>Generate Payement Bill</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Medical/topbar'); ?>
<!--Top Bar Section Include --->

<!---Body Section Start --->
<div style="margin-left: 15px;margin-right: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px dashed silver;padding: 5px;">
			<h5 style="font-weight: 500"><span class="fa fa-flask" style="color: #005a87"></span>&nbsp;Generate Payment Bill</h5>
		</div>
		<div class="card-content">
			<div class="row">
				<div class="col l6 m6 s6">
					<h6>Customer Name : <?= $generate_bill[0]->customer_name; ?></h6>
					<h6>Customer Address : <?= $generate_bill[0]->customer_add; ?></h6>
				</div>
				<div class="col l6 m6 s6">
					<h6>Date : <?= date('D, M. d Y', strtotime($generate_bill[0]->date)); ?></h6>
				</div>
			</div>
			<table class="table">
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<?php if($generate_bill):
						count($generate_bill); 
						$t_amount = 0;
										
						foreach($generate_bill as $cart) :
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
									<span class="fa fa-rupee-sign" style="color: green" ></span>&nbsp;<?= number_format($t_amount); ?>
								</td>
							</tr>
						<?php else: ?>
							<h6 style="color: red">Products Not Added</h6>
						<?php endif; ?>
					</table>
					<br>
					<center>
						<a href="<?= base_url('Medical_Accountent/print_slip/'.$cart->customer_id); ?>" class="btn btn-waves-effect waves-light" style="background: black;text-transform: capitalize;font-weight: 500"><span class="fa fa-print"></span>&nbsp;Print Slip</a>
					</center>
				
			</table>
		</div>
	</div>
</div>
<!---Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>