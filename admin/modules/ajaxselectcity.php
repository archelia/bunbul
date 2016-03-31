<?php
include "../../global/global.php";

// get id Province
$idprovince = $_POST['idprovince'];

// query load city
$sql = "SELECT * FROM city WHERE id_province='$idprovince' ORDER BY city_name ASC";
$result = mysql_query($sql);

// processing to form
if($result){
	while($row=mysql_fetch_array($result)) {								
		echo "<option value='$row[id_city]'>".$row['city_name']."</option>";
	}
}
?>