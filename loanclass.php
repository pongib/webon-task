<?php
	class homeLoan{
		public $interest;
		public $amount;
		public $year;
		public $ratetype;

		public function __construct($amount, $year, $ratetype){
			$this->amount = floatval($amount);
			$this->year = intval($year);
			$this->interest = 5.00;
			$this->ratetype = $ratetype;
		}

		public function setInterest($interest){
			$this->interest = floatval($interest);
		}

		public function getInterest(){
			echo $this->interest;
		}

		public function calculate(){
			if($this->ratetype == "Effective"){
				$interestInMonth = $this->interest / 100 / 12;
				$month = $this->year * 12;
				$cal = pow(1 + $interestInMonth, $month);
				$repayment = round(($this->amount * $interestInMonth * $cal) / ($cal - 1), 2);
				for($i = 0 ; $i < $month; $i++){
					$period = $i + 1;
					$principal = round($repayment * pow((1 + $interestInMonth), -(1 + $month - $period)), 2);
					$interestPeriod = round($repayment - $principal, 2);
					$unpaidBalance = round(($interestPeriod / $interestInMonth) - $principal, 2);
					if($unpaidBalance <= 0)
						$unpaidBalance = 0;
					echo "<tr>
							<td>$period</td>
							<td>$repayment</td>
							<td>$principal</td>
							<td>$interestPeriod</td>
							<td>$unpaidBalance</td>
						  </tr>";
				}
			}else if($this->ratetype == "Flat"){
				$interestInMonth = $this->interest / 100 / 12;
				$month = $this->year * 12;
				$totalInterest = $this->amount * $interestInMonth * $month;
				$interestPeriod = round($this->amount * $interestInMonth, 2);
				$repayment = round(($totalInterest + $this->amount) / $month, 2);
				$unpaidBalance  = $this->amount;
				for($i = 0; $i < $month; $i++){
					$period = $i + 1;
					$principal = round($repayment - $interestPeriod, 2);
					$unpaidBalance -= $principal;
					$unpaidBalance = round($unpaidBalance, 2);
					if($unpaidBalance <= 0)
						$unpaidBalance = 0;
					echo "<tr>
							<td>$period</td>
							<td>$repayment</td>
							<td>$principal</td>
							<td>$interestPeriod</td>
							<td>$unpaidBalance</td>
						  </tr>";
				}
			}
		}

	}
?>