<?php
include "../../global/global.php";

$sql_res = mysql_query("
			SELECT * FROM item i, size s 
			WHERE id_product = '$_POST[idproduct]' 
			AND i.id_size = s.id_size 
			ORDER BY size_name ASC LIMIT 5");

while($row=mysql_fetch_array($sql_res))
{
	echo '<option value="'.$row['id_item'].'">'.$row['size_name'].'</option>';
}
?>