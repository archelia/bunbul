<?php
	include "../../global/global.php";
	$success= array();
	$query = "SELECT * FROM product WHERE product_name='$_POST[productname]' AND id_category='$_POST[idcategory]' ";
	// if edit
	if($_POST['submit']=="EDIT"){$query .= "AND id_product != '$_POST[id]'";}
	$result=mysql_query($query);
	
	if(mysql_num_rows($result) > 0)
	{
		$success[0] = 0;
		$success[1] = "Product Name is already exists, please choose another name.";
	}
	else
	{
		$diskon=0;
		if(isset($_POST['discactive'])&&($_POST['discactive']=='1')){$diskon=1;}
		$description = htmlspecialchars($_POST['productdesc']);
		
		
		// if there's posting Edit	
		if($_POST['submit']=="EDIT"){	
			$id = $_POST['id'];
			$sql = "UPDATE product ";
			$sql .= "SET product_name = '$_POST[productname]' ";
			$sql .= ",product_description = '$description' ";
			$sql .= ",id_category = '$_POST[idcategory]' ";
			$sql .= ",id_subcategory = '$_POST[idsubcategory]' ";
			$sql .= ",product_price = '$_POST[productprice]' ";
			$sql .= ",product_dimension = '$_POST[productdimension]' ";
			$sql .= ",product_discount_active ='$diskon' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_product='$id'";
		}
		else{				
			// posting results
			$sql = "INSERT INTO product ";
			$sql .= "VALUES ('', '$_POST[idcategory]', '$_POST[idsubcategory]', '$_POST[productname]','$description', '$_POST[productdimension]','$_POST[productprice]','$_POST[discount]','$diskon', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}	

		$qr = mysql_query($sql);
			
		if($qr)
		{
			$success[0] = 1;
			$success[1] = 'Product saved succesfully.';
			
			// save the id for future editting
			$rowsaved = mysql_fetch_array(mysql_query("SELECT id_product, product_name, id_category FROM product WHERE product_name='$_POST[productname]'"));
			$success[2]= $rowsaved["id_product"];			
			$success[3]= $rowsaved["product_name"];			
			$success[4]= $rowsaved["id_category"];			
		}
		else
		{	$success[0] = 0;	
			$success[1] = 'Failed to save product';
		}
	}	
		
	echo json_encode($success);
	exit();
?>