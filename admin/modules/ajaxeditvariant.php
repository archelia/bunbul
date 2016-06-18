<?php
include "../../global/global.php";
$success = array();
$success[0] = 1;

// cek if there's already a product variant
$query = "SELECT id_item FROM item 
		WHERE id_product='".$_POST['id_product']."' 
		AND id_size='".$_POST['productsize']."' 
		AND id_color='".$_POST['productcolor']."' 
		AND id_item != '".$_POST['iditem']."'";
$result=mysql_query($query);	
	
// cek if sku exists
$query2 = "SELECT id_item FROM item 
		   WHERE sku='".$_POST['productsku']."' 
		   AND id_item != '".$_POST['iditem']."'";
$result2 = mysql_query($query2);

if(mysql_num_rows($result)>0){
	$success[0] = 0;
	$success[1] = "This variant is already exists, please choose another.";
	
}
if(mysql_num_rows($result2)>0){
	$success[0] = 0;
	$success[1] = "This SKU is already exists, please choose another.";
}

if($success[0]!=0){		
	// update if no error
	$sql = "UPDATE item ";
	$sql .= "SET sku='".$_POST['productsku']."' ";
	$sql .= ",id_size='".$_POST['productsize']."' ";
	$sql .= ",id_color='".$_POST['productcolor']."' ";
	$sql .= ",stock='".$_POST['productstok']."' ";
	$sql .= ",location='".$_POST['location']."' ";
	$sql .= ",barcode='".$_POST['barcode']."' ";
	
	
	$sql .= ", date_edited=now() ";
	$sql .= ", user_edit='".$_SESSION['viouser']."' ";
	$sql .= "WHERE id_item='".$_POST['iditem']."'";
	$success[0] = 0;	
	$success[1] = $sql;
	$qr = mysql_query($sql);
	
	if($qr)
	{
		$success[0] = 1;
		$success[1] = 'Item saved succesfully.';
	}
	else
	{	$success[0] = 0;	
		$success[1] = 'Failed to save item';
		//$success[1] = $sql;
	}
	
}	
echo json_encode($success);
exit();
?>