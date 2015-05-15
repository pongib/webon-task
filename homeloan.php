<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#loanTable').dataTable();
		} );
	</script>
</head>
<body>

<div class="container-fluid">
<table id="loanTable" class="table hover table-bordered" style="text-align: center;">
	<thead>
		<tr>
			<td>Month</td>
			<td>Repayment</td>
			<td>Principal Payment</td>
			<td>Interest</td>
			<td>Unpaid Balance</td>
		</tr>
	</thead>
	<tbody>
	<?php 
		include('loanclass.php');

		$homeLoan = new homeLoan($_POST['amount'], $_POST['year'], $_POST['type']);
	
		$homeLoan->calculate();
		
	?>
	</tbody>
</table>
</div>
</body>

</html>
<!-- 
// $num = 12;
		// $interestInMonth = floatval($_POST['interest']) / 100 / $num;
		// $amount = floatval($_POST['amount']);
		// $month = intval($_POST['year']) * $num;
		// $cal = pow(1 + $interestInMonth, $month);

		// $total = round(($amount * $interestInMonth * $cal) / ($cal - 1), 2);
		// for($i = 0 ; $i < $month; $i++){
		// 	$period = $i + 1;
		// 	$principal = round($total * pow((1 + $interestInMonth), -(1 + $month - $period)), 2);
		// 	$interestPeriod = $total - $principal;
		// 	$unpaidBalance = round(($interestPeriod / $interestInMonth) - $principal, 2);
		// 	echo "<tr>
		// 			<td>$period</td>
		// 			<td>$total</td>
		// 			<td>$principal</td>
		// 			<td>$interestPeriod</td>
		// 			<td>$unpaidBalance</td>
		// 		  </tr>";
		// } -->