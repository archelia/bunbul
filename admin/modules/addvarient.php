<?php
include "../../global/global.php";
	$success= array();
	$query = "SELECT * FROM product WHERE product_name='$_POST[productname]' AND id_category='$_POST[idcategory]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$success[0] = 0;
		$success[1] = "Product Name is already exists, please choose another name.";
	}
	else
	{
		$diskon=0;
		if($_POST['discactive']=='1'){$diskon=1;}
		$description = htmlspecialchars($_POST['productdesc']);
		// posting results
		$sql = "INSERT INTO product ";
		$sql .= "VALUES ('', '$_POST[idcategory]', '$_POST[idsubcategory]', '$_POST[productname]','$description', '$_POST[productdimension]','$_POST[productprice]','$_POST[discount]','$diskon', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		$qr = mysql_query($sql);
		$ids = mysql_insert_id();
			
		if($qr)
		{
			// save the id for future editting
			$_SESSION["idproductinputed"]=mysql_fetch_array(mysql_query("SELECT id_product FROM product WHERE product_name='$_POST[productname]'"));		
			$success[0] = 1;
			$success[1] = 'Product saved succesfully.';
		}
		else
		{	$success[0] = 0;	
			$success[1] = 'Failed to save product';
		}
	}	
	echo json_encode($success);
	exit();
?>