<!DOCTYPE html>
<html>
<head>
	<title>Print Medicine Slip</title>
	<!---CSS File Include  -->
	<?= view('Admin/css_file.php'); ?>
	<!---CSS File Include  -->
	<style type="text/css">
		body{background: rgb(224, 227, 231)}
		h6{font-weight: 500;font-size: 15px;}
		tr  td{font-weight: 500;font-size: 14px;}
	</style>
</head>
<body onload="window.print();">
	
<!---Body Section Start --->
<div style="margin-top: 10px;margin-left: 15px;margin-right: 15px;">
	<div class="card" style="box-shadow: none;">
		<div class="card-content" style="border-bottom: 1px solid silver;padding: 10px;">
			<a href="<?= base_url('Medical_Accountent/add_customer_name'); ?>" class="brand-logo">&nbsp;
	            <img src="<?= base_url('public/assets/images/logo3.png'); ?>" class="responsive-img" style="height: 55px;width: 200px;margin-top: 2px;"> 
	        </a>
		</div>
		<div class="card-content" style="border-bottom: 1px dashed silver">
			<div class="row">
				<div class="col l6 m6 s6">
					<h6>Customer Name : <?= $print_slip[0]->customer_name; ?></h6>
					<h6>Customer Address : <?= $print_slip[0]->customer_add; ?></h6>
				</div>
				<div class="col l6 m6 s6">
					<h6>Slip Date : <?= date('D, M. d Y', strtotime($print_slip[0]->date)); ?></h6>
				</div>
			</div>
		</div>
		<div class="card-content">
			<table class="table">
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total Price</th>

			<?php if($print_slip):
				count($print_slip);
				$t_amount = 0;
				foreach($print_slip as $p_slip):
					$t_amount += ($p_slip->rate * $p_slip->quantity);
			?>
			<tr>
				<td>
					<?= $p_slip->product_id; ?>
				</td>
				<td>
					 
					<?= $p_slip->product_name; ?>
				</td>
				<td>
					<?= $p_slip->rate; ?>
				</td>
				<td>
					<?= $p_slip->quantity; ?>
				</td>
				<td>
					<?php
						$sum_amount  = $p_slip->rate * $p_slip->quantity;
						echo number_format($sum_amount);
						// echo number_format($t_amount);
					?>
				</td>
			</tr>

			<?php endforeach; ?>
			<?php else: ?>
				<h6 style="color: red">Prodcuct Not Buy</h6>
			<?php endif; ?>
				<tr >
					<td></td>
					<td></td>
					<td>Total Amount</td>
					<td colspan="5" style="text-align: center;" >
						
						<span class="fa fa-rupee-sign" style="color: green">&nbsp;<?= number_format($t_amount); ?></span> 
						
					</td>
				</tr>

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