<?php
include "../global/global.php";

$resload = mysql_query("SELECT i.* 
	FROM item i 
	WHERE id_item='$_POST[iditem]'");
	
if($resload){
	$rowload = mysql_fetch_array($resload);
	$max = $rowload['stock'];
	// maximum 5 items per size
	if($max>5){$max=5;}
	for ($x = 1; $x <= $max; $x++) {
		echo "<option value='$x'>$x</option>";	
	}
}
?>				
