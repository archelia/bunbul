<?php
	include "../../global/global.php";
	
	echo $_POST["submit"];
	if(isset($_POST['submit']))
	{	
		$success= array();
		
		$query = "SELECT * FROM product WHERE product_name='$_POST[productname]' AND id_category='$_POST[idcategory]'";
		$result=mysql_query($query);
		if(mysql_num_rows($result) > 0)
		{
			$success[0]=0;
			$success[1]="Product Name is already exists, please choose another name.";
		}
		else
		{
			// posting results
			$sql = "INSERT INTO product ";
			$sql .= "VALUES ('', '$_POST[idcategory]', '$_POST[idsubcategory]', '$_POST[productname]','$_POST[productdesc]', '$_POST[productdimension]','$_POST[productprice]','$_POST[discount]','$_POST[discactive]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
			$qr = mysql_query($sql);
				
			if($qr)
			{
				$success[0] = 1;
				$success[1] = 'product saved succesfully.';
			}
			else
			{	$success[0]=0;	
				$success[1]='Failed to save product';
			}
		}
	}
	//return $success;
?>
