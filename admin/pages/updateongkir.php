<?php
include "../../global/global.php";
// get array from csv
$csv = array_map('str_getcsv', file('../../source/datajne.csv'));

//print_r($csv);

foreach ($csv as $arr) {	
	$sql = "SELECT id_district, district_name 
	FROM district d 
	Where id_district = '$arr[2]'";
	$query = mysql_query($sql);
	$i = 0;
	$e = 0;

	if($query){
		$harga = $arr[4];
		$districtname = trim($arr[3]);		
		$sqlupdate = "UPDATE district SET postal_fee = '$harga',
			district_name='$districtname' 
			WHERE id_district='$arr[2]'";
		$queryupdate = mysql_query($sqlupdate);
		if($queryupdate){
			echo "<br />";
			echo "Distrik $arr[3] updated successfully";
			echo "<br />";
			$i++;
		}		
	}
	else {
		echo "Distrik $arr[3] failed to update";
		echo "<br />";
		$e++;
	}
	
	/*
	if(mysql_num_rows($query)==1){		
		$row = mysql_fetch_array($query);
		if($arr[7]!=""){
			$harga = $arr[7];
		} else $harga = $arr[5];
		
		$sqlupdate = "UPDATE district SET postal_fee = '$harga' WHERE id_district='$row[id_district]'";
		$queryupdate = mysql_query($sqlupdate);
		if($queryupdate){
			echo "<br />";
			echo "Distrik $arr[2] updated successfully";
			echo "<br />";
		}
	}
	
	print_r($arr);
	print "<br/>"; 
	
	
	*/
}
echo "successful update ".$i."<br/>";
echo "failed update ".$e;
?>