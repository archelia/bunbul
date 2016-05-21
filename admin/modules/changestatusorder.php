<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$sql = "UPDATE purchase_order 
			SET status = '$_POST[statusorder]' 
			WHERE id_order='$_POST[idorder]'";
	$qr = mysql_query($sql);
	
	if($qr)
	{
		$pesan = 'Order status changed.';
		$success=1;
	}
	else
	{		
		$pesan = 'Failed to change order status.';
	}	
}
?>