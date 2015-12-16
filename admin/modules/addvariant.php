<?php
include "../../global/global.php";
	$success= array();
	$query = "SELECT * FROM item WHERE id_product='$_SESSION[idproductinputed]' AND id_size='$_POST[productsize]' AND id_color='$_POST[productcolor]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$success[0] = 0;
		$success[1] = "This variant is already exists, please choose another.";
	}
	else
	{
		// posting results
		$sql = "INSERT INTO item ";
		$sql .= "VALUES ('', '$_SESSION[idproductinputed]', '$_POST[productsize]', '$_POST[productcolor]','$_POST[sku]', '0','','$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		$qr = mysql_query($sql);
		
		if($qr)
		{
			$success[0] = 1;
			$success[1] = 'item saved succesfully.';
		}
		else
		{	$success[0] = 0;	
			$success[1] = 'Failed to save item';
		}
	}	
	echo json_encode($success);
	exit();
?>