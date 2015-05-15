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

		$homeLoan = new HomeLoan($_POST['amount'], $_POST['year'], $_POST['type']);
		$homeLoan->calculate();
		
	?>
	</tbody>
</table>
</div>
</body>

</html>
