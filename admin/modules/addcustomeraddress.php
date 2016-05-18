<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	// if default checked
	if(isset($_POST['shippingaddress'])){
		$shipping=1;
		// reset all default of the customer's shipping address
		$sqsearch = "UPDATE customeraddress SET shipping_address='0' ";
		$sqsearch .= "WHERE id_customer='$_POST[idcust]'";
		$resnon = mysql_query($sqsearch);
		
	}else{$shipping=0;}
	
	if(isset($_POST['billingaddress'])){
		$billing=1;
		// reset all default of the customer's billing address
		$sqsearch = "UPDATE customeraddress SET billing_address='0' ";
		$sqsearch .= "WHERE id_customer='$_POST[idcust]'";
		$resnon = mysql_query($sqsearch);
	}else{$billing=0;}
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$sql = "UPDATE customeraddress ";
		$sql .= "SET address_name='$_POST[addressname]' ";
		$sql .= ",address='$_POST[customeraddress1]' ";
		$sql .= ",address2='$_POST[customeraddress2]' ";
		$sql .= ",address_phone='$_POST[phonenumber]' ";
		$sql .= ",id_district='$_POST[district]' ";
		$sql .= ",postal_code='$_POST[postalcode]' ";
		$sql .= ",shipping_address='$shipping' ";
		$sql .= ",billing_address='$billing' ";
		$sql .= ", date_edited=now() ";
		$sql .= "WHERE id_customeraddress='$_POST[id]'";
	}
	else{
		// do query results
		$sql = "INSERT INTO customeraddress ";
		$sql .= "VALUES ('', '$_POST[idcust]', '$_POST[district]', '$_POST[customeraddress1]', '$_POST[customeraddress2]', '$_POST[postalcode]', '$_POST[addressname]', '$_POST[phonenumber]', $shipping, $billing, now(), now(), 1)";
	}
	
	$qr = mysql_query($sql);

	if($qr)
	{
		$pesan = 'Customer saved succesfully.';		
		$success=1;
		//$pesan = $sql;
	}
	else
	{		
		$pesan = 'Failed to save customer.';
		//$pesan = $sql;
	}
	
}
?>