<?php
include "../../global/global.php";

// counting the date based on the year and month
$number = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']); 
// processing to form
if($number){
	for ($d=1; $d<=$number; $d++) {								
		echo "<option value='$d'>".$d."</option>";
	}
}
?>