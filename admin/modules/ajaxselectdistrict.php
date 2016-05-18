<?php
include "../../global/global.php";

// get id city
$idcity = $_POST['idcity'];

// query load disctrict
$sql = "SELECT * FROM district WHERE id_city='$idcity' 
		ORDER BY district_name ASC";
$result = mysql_query($sql);

// processing to form
if($result){
	while($row=mysql_fetch_array($result)){								
		echo "<option value='$row[id_district]'>".$row['district_name']."</option>";
	}
}
?>