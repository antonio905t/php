<div class="row">
	<center><div class=""><h3>Transactions</h3></div></center>
	<div class="col-md-1"><a href="<?php echo APP_URL; ?>transactions/add"><spam class="glyphicon glyphicon-plus"></spam></a></div>
</div>

<table class="table table-hover">
	<tr>
		<th>ID</th>
		<th>Description</th>
		<th>Date</th>
		<th>Amount</th>
		<th>Category</th>
		<th>Action</th>
	</tr>
	<?php 
	foreach ($transactions as $transaction): 
			$date = date_create($transaction["4"]);
			$amount = $transaction["5"];
			$simbol = "$";
			if ($transaction["5"]<0) {
				$amount = str_replace("-", "", $transaction["5"]);
				$simbol = "-$";
				$amount = number_format($amount, 2);
				$amount = '<div style="color:red;">'.$simbol.$amount.'</div>';
			}else{
				$amount = number_format($amount, 2);
				$amount = '<div style="color:green;">&nbsp;'.$simbol.$amount.'</div>';
			}
		?>
	 	<tr>
	 		<td><?php echo $transaction["0"]; ?></td>
	 		<td><?php echo $transaction["3"]; ?></td>
	 		<td><?php echo date_format($date, 'd/m/Y'); ?></td>
	 		<td><?php echo $amount; ?></td>
	 		<td><?php echo $transaction["7"]; ?></td>
	 		<td>
	 			<a href="<?php echo APP_URL; ?>transactions/edit/<?php echo $transaction["0"]; ?>">
	 				<spam class="glyphicon glyphicon-edit"></spam>
	 			</a> | 
	 			<a href="<?php echo APP_URL; ?>transactions/delete/?id=<?php echo $transaction["0"]; ?>">
	 				<spam class="glyphicon glyphicon-trash"></spam>
	 			</a>
	 		</td>
	 	</tr>
	 <?php endforeach ?>
</table>