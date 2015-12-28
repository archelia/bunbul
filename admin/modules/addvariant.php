<?php
include "../../global/global.php";
$success = array();

// cek if there's already a product variant
$query = "
	SELECT id_item FROM item 
	WHERE id_product='$_POST[id_product_saved]' 
	AND id_size='$_POST[productsize]' 
	AND id_color='$_POST[productcolor]'";
$result=mysql_query($query);
// cek if sku exists
$query2 = "SELECT id_item FROM item WHERE sku='$_POST[productsku]'";
$result2 = mysql_query($query2);

if(mysql_num_rows($result2)>0){
	$success[0] = 0;
	$success[1] = "This SKU is already exists, please choose another.";

}
else if(mysql_num_rows($result)>0){
	$success[0] = 0;
	$success[1] = "This variant is already exists, please choose another.";
}
else
{
	// posting results
	$sql = "
		INSERT INTO item 
		VALUES ('', '$_POST[id_product_saved]', '$_POST[productsize]', 
		'$_POST[productcolor]', '$_POST[productsku]', '$_POST[productstok]', 
		'$_POST[location]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
	
	$qr = mysql_query($sql);
	if($qr)
	{
		$success[0] = 1;
		$success[1] = 'Item saved succesfully.';
	}
	else
	{	$success[0] = 0;	
		$success[1] = 'Failed to save item';
	}
}	

echo json_encode($success);
exit();
?>