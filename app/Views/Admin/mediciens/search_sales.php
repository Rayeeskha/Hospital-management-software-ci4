<!DOCTYPE html>
<html>
<head>
	<title>Manage Sale Records</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
</head>
<body>
<!--Top Bar Section Include --->
<?= view('Admin/top_bar'); ?>
<!--Top Bar Section Include --->	
<!----Body Section Start --->
<div class="card" style="box-shadow: none;margin-right: 15px;margin-left: 15px;">
	<div class="card-content" style="border-bottom: 1px dashed silver;padding: 10px;">
		<h5 style="font-weight: 500;margin-top: 5px; font-size: 20px;"><span class="fa fa-flask" style="color: #ff3d00"></span>&nbsp;Manage Sales <span class="right"><a href="#!" class="modal-trigger" data-target="customize_sale_modal" style="font-size: 15px;font-weight: 500;">
				<span class="fa fa-filter"></span>&nbsp;Customize Sales</a></span></h5>
		<h6 style="color: grey;font-size: 15px; font-weight: 500;"> Date : <?= date('d-M-Y'); ?> 
			<span class="right">
				<a href="<?= base_url('Admin/all_sale_reports'); ?>" style="font-size: 15px;color: red;">
					Reset</a>
			</span>
		</h6>

		<!--Customize Sale Modal Section Start --->
			<div class="modal" id="customize_sale_modal">
				<div class="modal-content" style="padding: 10px;border-bottom: 1px solid silver;">
					<h6 style="font-size: 15px;color: grey;font-weight: 500;"><span class="fa fa-filter"></span>&nbsp;Customize Sales Report</h6>
				</div>
				<div class="modal-content" style="padding: 10px;">
				<?= form_open('Medical_Accountent/search_sales'); ?>
					<div  class="row" style="margin-bottom: 0px;margin-top: 10px;">
						<div class="col l6 m6 s12">
							<input type="date" name="start_date" id="input_box" required>
						</div>
						<div class="col l6 m6 s12">
							<input type="date" name="last_date" id="input_box" required>
						</div>
						<div class="col l12 m12 s12">
							<button type="submit" class="btn waves-effect waves-light" style="background: black; text-transform: capitalize;font-weight: 500;font-size: 14px;  margin-top: 10px;">
								Search Reports
							</button>
						</div>
					</div>
				</div>
				<?= form_close(); ?>
			</div>
			<!--Customize Sale Modal Section End --->
	</div>
	<div class="card-content">
		<table class="tbale">
			<tr>
				<th style="text-align: center;">DATE</th>
				<th>CUSTOMER</th>
				<th style="text-align: right;">UNIT SALES</th>
				<th style="text-align: right;">TOTAL AMOUNT</th>
			</tr>
			<?php if($sales):
				count($sales);
				foreach($sales as $all_sale):
			?>
			<tr>
				<td style="text-align: center; font-size: 14px;color: black;font-weight: 500;">
					<span class="fa fa-clock" style="color: green">&nbsp;<?= date('D, M. d Y',strtotime($all_sale->order_date)); ?></span>
				</td>
				<td style="font-size: 14px;font-weight: 500;color: black;">(<?= date('D, M. d Y',strtotime($all_sale->order_date)); ?>) Customers <br/>
					<?php 
						$total_customer  = get_all_customer('order_product', $all_sale->order_date);
					?>
					<?php
						$i = 0;
						if($total_customer):
							count($total_customer);
							foreach($total_customer as $total_cus):
							 $i++;
					?>
						<i><span style="color: grey;">Sold By : <?=  $total_cus->customer_name; ?></span></i> <br/>
					<?php endforeach;
					else: ?>
						<i>Customer Not Found's</i>
					<?php endif; ?>
				</td>
				<td style="text-align: right;">
					
					<?php
						$i = 0;
						if($total_customer):
							count($total_customer);
							foreach($total_customer as $total_cus):
							 $i++;
					?>
						<i><span style="color: grey;">Unit : <?= $total_cus->total_quantity; ?></span></i> <br/>
					<?php endforeach;
					else: ?>
						<i style="color: red;">Quantity Not Found's</i>
					<?php endif; ?>
				</td>
				<td style="text-align: right;">
					
					<?php
						$i = 0;
						if($total_customer):
							count($total_customer);
							foreach($total_customer as $total_cus):
							 $i++;
					?>
						<i><span style="color: grey;"><span class="fa fa-rupee-sign"></span>&nbsp;
							 <?= number_format($total_cus->total_amount,2, '.',','); ?> /-</span></i> <br/>
					<?php endforeach;
					else: ?>
						<i style="color: red;">Amount Not Found's</i>
					<?php endif; ?>
				</td>
			</tr>

			<?php endforeach; ?>
			<?php else: ?>
				<h6>Sales Not Found</h6>
			<?php endif; ?>
		</table>
	</div>
</div>

<!----Body Section End --->

<!---Js file Include -->
<?= view('Admin/js_file.php'); ?>
<!---Js file Include -->
</body>
</html>