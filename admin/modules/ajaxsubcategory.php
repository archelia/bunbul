<?php
	include "../../global/global.php";
	$query = "SELECT * FROM subcategory WHERE active='1' AND id_category='$_POST[idcat]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)!=0){
		while($row=mysql_fetch_array($result)){
			echo '
				<option value="'.$row['id_category'].'">'.$row['subcategory_name'].'</option>';
		}	
		
	} else return 0;
?>			